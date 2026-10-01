<?php
class Securite {
    private $CI;
	private $vue;
	private $control;
	private $default_home_v=Array('accueil');
	private $default_home_c=Array('Soavina');
	private $visiteur_v=Array();
	private $visiteur_c=Array();
	private $admin_c=Array('Admin');
	private $admin_v=Array('');
	private $redirection_visiteur="Soavina/ma_pharmacie";
	private $redirection_admin="Admin/page_admin";

function __construct()
{
    $this->CI=& get_instance();
	$this->control=$this->CI->uri->segment(1);
	$this->vue=$this->CI->uri->segment(2);
}
public function check(){
	
	$data=$this->CI->myInfo->getClientInfo();
	$where['adresse_mac']=$data->adresse_mac;
	$mac=$this->CI->adresse_mac_table->get_single_data_if($where);
	/*if(!in_array($this->control,$this->default_home_c)&&$this->vue!='logout'){
		redirect("Admin/logout");
	}*/
    if($this->CI->monsession->islogged()){
		
	}elseif(!in_array($this->control,$this->default_home_c)&&$this->vue!='login'){
		redirect("$this->redirection_visiteur");
	}
		

}


}
