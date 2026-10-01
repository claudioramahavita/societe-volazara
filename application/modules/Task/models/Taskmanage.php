<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Taskmanage
{   
      private $CI;
      public $date_time_now;
      public $user_cmd;
      public $id_client;
     public function __construct() {
        $this->CI =& get_instance();
        $this->date_time_now=$this->CI->tab_produits->get_sqlBy('NOW()');
        $this->user_cmd=$this->CI->OtherSession->get_other_info(SESSION_CMD);
    }

   function addCmd($input=array()){
    $tot=$this->CI->OtherSession->get_other_info(SESSION_CMD);
   if(count($tot)==0){
       $this->CI->monsession->send_flashMessage('Aucun produit trouvé','danger');
return null;
   }else{
    $var_ventes=array();
   
       $id=$this->CI->tab_visiteur->insert_($input['client']);

       $clt['visiteur_id']=$id;
       $clt['date_factures']=$this->date_time_now;
       $clt['type_client']='livraison';
       $clt['isaddition']=1;
       $clt['isreadycmd']=0;

       $tab_client=new My_Model('client');
       $id_client=$tab_client->insert_($clt);

       foreach ($tot as $k => $v) {
        $da=new stdClass();
        $da->qte=$v->qte;
        $da->produits_id=$v->produits_id;
        $da->prix_achats_ventes=$v->prix_achats;
        $da->prix_ventes=$v->prix_unitaire_en_ligne;
        $da->is_with_prix_echelle=1;
        $da->client_id=$id_client;
        $var_ventes[]=$da;
     }

       $tab_ventes=new My_Model('ventes');

       $i=$tab_ventes->multi_insert($var_ventes);
       if($i){
        $this->CI->session->unset_userdata(SESSION_CMD);
 $this->CI->monsession->send_flashMessage(MSG_SUCCES);
       }else{
        $this->CI->monsession->send_flashMessage(MSG_ERROR,'danger');
       }
      
       return 0;
   }

   }
    function addsess($input=array()){
        $id=$input['produits_id'];
$w['id_produits']=$id;
$prod=$this->CI->tab_produits->get_info($w);

$user_cmd=$this->user_cmd;
$existe=false;
$error=false;
if(!is_null($prod)){
  
if(!isset($user_cmd["$id"])){
    $inut=$prod;
    $inut->qte=$input['qte'];
    $inut->produits_id=$input['produits_id'];
    $user_cmd["$id"]=$inut;
$this->CI->OtherSession->set_other_session($user_cmd);
}else{
    $existe=true;
}  
}else{
    $error=true;
}
$data['isexiste']=$existe;
$data['error']=$error;
$data['redirect']=$this->CI->agent->referrer();

$r=$data['pr']=$this->CI->OtherSession->get_other_info(SESSION_CMD);
$data['view']=$this->CI->load->view('Societevolazara/table_panier_cmd',$data,true);
$t=0;
foreach ($r as $k => $v) {
   $t+=$v->prix_unitaire_en_ligne*$v->qte;
}
$u=$this->CI->autoformat->chiffre($t,0);
$data['total_montant']=$t;
$data['total']=$u;
$data['nbrcmd']=count($user_cmd);
return $data;

	}
 function updatesess($input=array()){
    $id=$input['produits_id'];
$w['id_produits']=$id;
$prod=$this->CI->tab_produits->get_info($w);
$user_cmd=$this->user_cmd;
$data['nbrcmd']=count($user_cmd);
if(!is_null($prod)){

$inut=$prod;
$inut->qte=$input['qte'];
$inut->produits_id=$input['produits_id'];
$user_cmd["$id"]=$inut;
$this->CI->OtherSession->set_other_session($user_cmd);

}
$data['redirect']=$this->CI->agent->referrer();

$r=$data['pr']=$this->CI->OtherSession->get_other_info(SESSION_CMD);
$data['view']=$this->CI->load->view('Societevolazara/table_panier_cmd',$data,true);
$t=0;
foreach ($r as $k => $v) {
   $t+=$v->prix_unitaire_en_ligne*$v->qte;
}

$u=$this->CI->autoformat->chiffre($t,0);
$data['total_montant']=$t;
$data['total']=$u;

return $data;
}

function deletesess($id){
    $user_cmd=$this->user_cmd;
    unset($user_cmd["$id"]);
    $this->CI->OtherSession->set_other_session($user_cmd);
    
$data['redirect']=$this->CI->agent->referrer();
$r=$data['pr']=$this->CI->OtherSession->get_other_info(SESSION_CMD);
$data['view']=$this->CI->load->view('Societevolazara/table_panier_cmd',$data,true);
$t=0;
foreach ($r as $k => $v) {
   $t+=$v->prix_unitaire_en_ligne*$v->qte;
}

$u=$this->CI->autoformat->chiffre($t,0);
$data['total_montant']=$t;
$data['total']=$u;
$data['nbrcmd']=count($user_cmd);
return $data;
}
}