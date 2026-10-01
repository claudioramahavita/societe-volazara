<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RQTAjax
{protected $CI;
  public $datetime_now;
    function __construct()
    {
        $this->CI =& get_instance();
        
        
    }
    function autoRecherhe(){
		$nom=$_POST['key'];
		$data['key']=$nom;
		
      $data['forum_list']=$this->CI->forum_table->search($nom);
      return $this->CI->load->view('Aljr/viewsearch',$data);
    }
   

	



}
