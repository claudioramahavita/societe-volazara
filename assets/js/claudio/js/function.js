


function showConfirme(textmsg="Voulez-vous continuer?",redirect=null,type="question",textconfirm="Oui",textcancel="Non",titre="Confirmation"){

  Swal.fire({
    title: titre,
    text: textmsg,
    icon: type,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: textconfirm,
    cancelButtonText: textcancel
  }).then(function (result) {
    if (result.isConfirmed) {
      if(redirect!=null){
      window.location.replace(redirect);
    }
    }
  });

}
function showModal(data_={lien:'',size:'lg',id:'lien-modal-id',title:'tst'}){
  if(data_.size==null){
    data_.size='lg';
  }
  if(data_.id==null){
    data_.id='lien-modal-id';
  }
  if(data_.title==null){
    data_.title='';
  }

    $.ajax({
      url:data_.lien,
      dataType:'html',
      success:function(data){
        console.log(data_);
        
        $(`#${data_.id}`).remove();
        
        let content=` <div class="modal fade" id="${data_.id}">
        <div style="background-color: rgb(0, 0, 0);" class="modal-dialog modal-${data_.size}">  
        <div style="background-color: rgb(0, 0, 0);"  class="modal-content">
        <div style="background-color: rgb(0, 0, 0);" class="modal-header text-white">
        <h4 class="modal-title text-center"><b>${data_.title}</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times text-danger"></i></button>
      </div>
            <div style="background-color: rgb(0, 0, 0);" class="modal-body text-white">
              ${data}
            </div>
            </div>
        </div>
      </div>`;
      $("body").prepend(content);
      $(`#${data_.id}`).modal('show');
      
      },
		error:function(req, status, err) {
			console.log("ajax call went wrong:" + req.responseText);
			console.error(err);
						}
    })
  
  }


function send_msg_error(msg) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: msg
      });
    
}

function send_msg_info(msg,type="info",tp="Information...") {
  Swal.fire({
      icon: type,
      title: tp,
      text: msg
    });
  
}


function catchTableAuto(id,table="table"){
  
  let val = $(`#${id}`).val().toLowerCase();
  $(`#${table} tbody tr`).filter(function() {
    console.log(this);
    $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1)
  });
}

function send_msg_success(msg) {
    Swal.fire(
        'Good job!',
        msg,
        'success'
      );
}

function send_msg_operation_success(redirect=null){
  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Operation effectué avec succes',
    showConfirmButton: false,
    timer: 1500,
    onClose: () => {
      if(redirect!=null){
        window.location.replace(redirect);
      }
     
    }
  });
}
my_pagination();
function my_pagination(id_name=null,pagination="pagination",id_val=null){


$(`#${pagination}`).on('click',".pagination a[href!='#']",function(e){
  e.preventDefault();
 // var page_no = $(this).attr("data-ci-pagination-page");
 let getid_name=$(`#${id_name}`).val();
 let url=$(this).attr("href");
 $.ajax({
   type:'post',
   data:{id:getid_name,id_:id_val},
   dataType:'html',
   url:url,
   beforeSend:function(){
       //startloader();
},
   success:function(rst){
   // stoploader();
   $(`#${pagination}`).html(rst);
   }
   ,
					error:function(req, status, err) {
					//	stoploader();
							console.log("ajax call went wrong:" + req.responseText);
							console.error(err);
						}
 })
  });
  
  }


  function searchprod(id,i=1){
    let lst=$(`${id}`).val();
    let lien =$("#searchprod").data('url');
    let type_prod=$(`#type_produit${i}`).val();
    let type_produit=null;
    if(typeof type_prod!="undefined"&& type_prod.length>0){
      type_produit=type_prod;
    }
    $(`#list${i}`).html('');
    $(`#list${i}`).hide();
    $(`#prod_id${i}`).val('');
    
    if(lst.length<1){
      return null;
    }
    
    $.ajax({
        url:lien,
        data:{arg:lst,i:i,type_produit:type_produit},
        type:'post',
        dataType:'html',
        success:function(da){
          console.log(da);
          
            $(`#list${i}`).html(da);
            $(`#list${i}`).show();

        },
        	error:function(req, status, err) {
					//	stoploader();
							console.log("ajax call went wrong:" + req.responseText);
							console.error(err);
						}
    });

}

  function setReadonly(id='test',desactive=true){
    $(`${id}`).prop('readonly',desactive);
  }

  function set_item_prod(id_prod,i=1){
    let lien =$("#getproduit").data('url');
    $.ajax({
      url:lien,
      type:'post',
      data:{id:id_prod},
      dataType:'json',
      success:function(da){
        if(da!=null){
          $(`#prod_id${i}`).val(da.id_produits);
          $(`#prod${i}`).val(da.designation_produits);
          $(`#prix${i}`).val(da.prix_unitaire);
          $(`#montant${i}`).val(da.prix_unitaire);
          $(`#prixachats${i}`).val(da.prix_achats);
          $(`#qte${i}`).val(1);

          setReadonly(`#prod${i}`,true);          
        $(`#list${i}`).hide();
        update_somme();
        }
        
    },
      error:function(req, status, err) {
    
          console.log("ajax call went wrong:" + req.responseText);
          console.error(err);
        }
    })

  }
 
function edit_fiche(desactive=false){
     $(`#nom_client`).prop('readonly',desactive);
     $(`#cin_client`).prop('readonly',desactive);
     /*
    $(`#prenom_client`).prop('readonly',desactive);
    $(`#pharmacie_client`).prop('readonly',desactive);
    $(`#adresse_client`).prop('readonly',desactive);
    $(`#telephone_client`).prop('readonly',desactive);*/
    
}
$("#refresh_fiche").click(function(){
    edit_fiche();
    init_fiche();
    $(`#list_client`).hide();
});
function init_fiche(){
    $(`#nom_client`).val(null);
    $(`#prenom_client`).val(null);
    $(`#pharmacie_client`).val(null);
    $(`#adresse_client`).val(null);
    $(`#telephone_client`).val(null);

    $(`#nom_client`).removeAttr('value');
    $(`#prenom_client`).removeAttr('value');
    $(`#pharmacie_client`).removeAttr('value');
    $(`#adresse_client`).removeAttr('value');
    $(`#telephone_client`).removeAttr('value');
    $(`#cin_client`).removeAttr('value');

    $("#id_client").empty();
}
function auto_cin(){
  let arg=$("#cin_client").val();
  let lien=$("#auto_cin").data('url');
  $("#id_personnes").empty();
  $("#list_client").hide();
  $.ajax({
    data:{arg:arg},
    url:lien,
    type:'post',
    dataType:'html',
    success:function (p) {
      
      $("#list_client").html(p);
      $("#list_client").show();
    },
    error:function(req, status, err) {
  
        console.log("ajax call went wrong:" + req.responseText);
        console.error(err);
      }

  });
}
  function auto_client(){
    let arg=$("#nom_client").val();
    let lien=$("#auto_client").data('url');
    $("#id_personnes").empty();
    $("#list_client").hide();
    $.ajax({
      data:{arg:arg},
      url:lien,
      type:'post',
      dataType:'html',
      success:function (p) {
        
        $("#list_client").html(p);
        $("#list_client").show();
      },
      error:function(req, status, err) {
    
          console.log("ajax call went wrong:" + req.responseText);
          console.error(err);
        }

    });
  }

  function set_item_personnes(id){
    let lien=$("#get_client").data('url');
    $.ajax({
      data:{id:id},
      url:lien,
      type:'post',
      dataType:'json',
      success:function (p) {
        
        if(p!=null){
          
          let input=`<input type="hidden" id="id_perso" name="id_personnes" value="${p.id_personnes}">`;
          $("#id_personnes").html(input);
           $("#nom_client").val(p.nom_complet);
            

           $("#sexe_client").val(p.sexe);
            

           $("#adresse_client").val(p.adresse);
          

           $("#telephone_client").val(p.telephone);
           $("#cin_client").val(p.cin_personnes);
           
           set_readonly_client(true);
        $("#list_client").hide();
        }
       
      },
      error:function(req, status, err) {
    
          console.log("ajax call went wrong:" + req.responseText);
          console.error(err);
        }

    });
  }
  function set_readonly_client(active=true){
  /*  setReadonly(`#telephone_client`,active); 
    setReadonly(`#adresse_client`,active); 
    setReadonly(`#sexe_client`,active); */
    setReadonly(`#nom_client`,active); 
    setReadonly(`#cin_client`,active);  
  }

  

function selection_from(url_,id_data='id1',id_to_app='id2',id_data2=null){
  let id_=null;
if(id_data2!=null){
  id_=$(`#${id_data2}`).val();
}
  $.ajax({
    url:url_,
        dataType:'html',
        data:{arg:$(`#${id_data}`).val(),id:id_},
        type:'post',
        success:function (rst) {
        
         $(`#${id_to_app}`).html(rst);
         $(`${id_to_app}`).fadeIn(1000);
         $(`${id_to_app}`).queue(function(){
       
           $(`${id_to_app}`).queue('fx', []);
         });
        },
        error:function(request, status, error) {
            console.log("ajax call went wrong:" + request.responseText);
            console.error(error);
        }

});
}


function change_from(url_,id_to_app='all_product'){
  let isprint=false;
  if($("#isprint").is(":checked")){
    isprint=true;
  }
  $.ajax({
    url:url_,
        dataType:'html',
        success:function (rst) {
       
         $(`#${id_to_app}`).html(rst);
         $("#isprint").attr("checked",isprint);
         $(`${id_to_app}`).fadeIn(1000);
         $(`${id_to_app}`).queue(function(){
         
           $(`${id_to_app}`).queue('fx', []);
         });

        },
        error:function(request, status, error) {
            console.log("ajax call went wrong:" + request.responseText);
            console.error(error);
        }

});
}
 
function desactive_btn_submit(v=true){

  $("#idvalidation").attr("disabled", v);
}

  function addsess(id,qte_=1){
let url_=$("#addsess").data('url');
$.ajax({
  url:url_,
  type:'post',
  data:{produits_id:id,qte:qte_},
      dataType:'json',
      success:function (rst) {
        if(rst.error){
send_msg_error("Ce produit n'existe plus");
        }else{

if(rst.isexiste){
  send_msg_info("Ce produit est déjà dans le panier");
}else{
  send_msg_operation_success();
  $("#nbr-cmd").html(rst.nbrcmd);
}
        }
      },
      error:function(request, status, error) {
          console.log("ajax call went wrong:" + request.responseText);
          console.error(error);
      }

});
  }

  function updatesess(id,qte_id){
    let qte_=$(`#${qte_id}`).val();
    qte_=parseInt(qte_);
    if(isNaN(qte_)){
      qte_=1;
    }

    let url_=$("#updatesess").data('url');
    $.ajax({
      url:url_,
      type:'post',
      data:{produits_id:id,qte:qte_},
          dataType:'json',
          success:function (rst) {

    $("#total-sess").html(rst.total+" MGA");
    $("#nbr-cmd").html(rst.nbrcmd);
          },
          error:function(request, status, error) {
              console.log("ajax call went wrong:" + request.responseText);
              console.error(error);
          }
    
    });
      }

      function deletesess(id){
        
    let url_=$("#deletesess").data('url');
    $.ajax({
      url:url_,
      type:'post',
      data:{produits_id:id},
          dataType:'json',
          success:function (rst) {
 
    $("#list-panier").html(rst.view);
    $("#nbr-cmd").html(rst.nbrcmd);
          },
          error:function(request, status, error) {
              console.log("ajax call went wrong:" + request.responseText);
              console.error(error);
          }
    
    });
      
      }