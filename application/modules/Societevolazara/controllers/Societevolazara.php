<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Societevolazara extends MY_Controller{
    function __construct()
    {
        parent::__construct($this);
		 $this->load->model("RQTAjax");
    
    }
	
     function  index(){
		
		$this->loadview('index');
			
	
}



function  panier(){
			
		
				$this->loadview('panier');
			
	
}
function  detail(){
		
		
		$this->loadview('detail');
			
	
}


function  contact_message(){
			
			
			$visiteur=$this->input->post('input_val[visiteur]');
			$contact=$this->input->post('input_val[message_contact]');
			$contact['message_contact_at']=$this->tab_visiteur->get_sqlBy("DATE(NOW())");
			$w['email_visiteur']=$visiteur['email_visiteur'];
			$data=$this->tab_visiteur->get_single_data($w);
			if((!empty($data))&&(!is_null($data))){
				$this->tab_visiteur->update_($visiteur,$w);
			}else{
				$this->tab_visiteur->insert_($visiteur);
				
			}
			$visiteur_id=$this->tab_visiteur->get_single_data($visiteur);
			$contact['sender_id']=$visiteur_id->id_visiteur;
			$this->tab_message_contact->insert_($contact);
			
			$message="Merci de nous avoir contacter !";
			$this->monsession->send_flashMessage($message);
			redirect('Societevolazara/');
      
        }	


}