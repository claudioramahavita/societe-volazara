<?php

class Contact extends MY_Controller{
    function __construct()
    {
        parent::__construct($this);
        //$this->load->model('user');
       
    
    }
	
     
		
		
	function  contact_message(){
			$data['error']=false;
			
			$visiteur=$this->input->post('input_val[visiteur]');
			$contact=$this->input->post('input_val[contact]');
			
			$w['email_visiteur']=$visiteur['email_visiteur'];
			$data=$this->visiteur_table->get_single_data_if($w);
			if((!empty($data))&&(!is_null($data))){
				$this->visiteur_table->update_($visiteur,$w);
			}else{
				$id=$this->visiteur_table->insert_($visiteur);
				if(is_null($id)){
					$data['error']=true;
				}
			}
			$visiteur_id=$this->visiteur_table->get_single_data_if($visiteur);
			$contact['visiteur_id']=$visiteur_id->id_visiteur;
			$this->contact_table->insert_($contact);
			
			echo json_encode($data);
      
        }	

	function  visiteur_web(){
			
			$this->data['visiteur']=$this->visiteur_table->get_all_data();
			$this->loadview('visiteur_web');
      
        }
	
	 function  messages(){
			
			$this->data['messages']=$this->contact_table->get_info(null,null,'id_contact');
			$this->loadview('messages');
      
        }
		
		
	function  commentaire(){
			
			$this->data['commentaire']=$this->commentaire_table->get_info(null,null,'id_commentaire');
			$this->loadview('commentaire');
      
        }	
	
	public function messages_info(){
		 
		 if(isset($_POST['id'])&&!empty($_POST['id'])){
			$this->my_arg=$_POST['id'];
		}
		$where['id_contact']=$this->my_arg;
		
		$vu["vu_contact"]=1;
		$this->contact_table->update_($vu,$where);
		$mess=$this->data['messages']=$this->contact_table->get_single_data_if($where);
		$w['id_visiteur']=$mess->visiteur_id;
		$this->data['visiteur']=$this->visiteur_table->get_single_data_if($w);
		$data['view1']=$this->load->view('contact/messages_info',$this->data,true);
		$t['messages']=$this->contact_table->get_info(null,null,'id_contact');
		$data['view2']=$this->load->view('contact/view_msg',$t,true);
		echo json_encode($data); 
		
		
 }
 
 public function commentaire_info(){
		 
		 if(isset($_POST['id'])&&!empty($_POST['id'])){
			$this->my_arg=$_POST['id'];
		}
		$where['id_commentaire']=$this->my_arg;
		
		$vu["vu_comment"]=1;
		$this->commentaire_table->update_($vu,$where);
		$mess=$this->data['commentaire']=$this->commentaire_table->get_single_data_if($where);
		$w['id_visiteur']=$mess->visiteur_id;
		$w_['id_blog']=$mess->blog_id;
		$this->data['visiteur']=$this->visiteur_table->get_single_data_if($w);
		$this->data['blog']=$this->blog_table->get_single_data_if($w_);
		//echo $this->load->view('contact/commentaire_info',$this->data);
		$data['view_com1']=$this->load->view('contact/commentaire_info',$this->data,true);
		$t['commentaire']=$this->commentaire_table->get_info(null,null,'id_commentaire');
		$data['view_com2']=$this->load->view('contact/view_com',$t,true);
		echo json_encode($data);
 }
	
	
}