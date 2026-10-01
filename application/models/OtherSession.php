<?php  
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OtherSession
{   
    private $CI;
     public function __construct() {
        $this->CI =& get_instance();
    }
   
public function get_other_info($tp=SESSION_CMD){
    if($this->CI->session->has_userdata($tp)){
     return $this->CI->session->userdata($tp);
    }else{
        return array();
    }
      
        
 }
 
 public function set_other_session($user,$tp=SESSION_CMD){
     $this->CI->session->set_userdata($tp,$user);
  }
}