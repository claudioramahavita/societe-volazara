<?php
class Monsession {
    protected $CI;
function __construct()
{
    $this->CI=& get_instance();
}


public function set_session_user($user){
    $this->CI->session->set_userdata(SESSION_USERNAME,$user);
    //$this->CI->myInfo->add_updatePostes();
}
public function user_role() {
    if($this->islogged()){
        return $this->CI->session->userdata(SESSION_USERNAME)->role;
    }else{
        return 'default';
    }
}
public function hash_password($password){
    return sha1($password);
}
public function get_user_info(){
    if($this->islogged()){
     return $this->CI->session->userdata(SESSION_USERNAME);
       
    }
    return new stdClass();
   
}
public function islogged(){
    return $this->CI->session->has_userdata(SESSION_USERNAME);
}

public function flashMessage(){
    $message_=$this->CI->session->flashdata(SESSION_USER_MESSAGE_NAME);
	$this->CI->session->set_flashdata(SESSION_USER_MESSAGE_NAME,null);
    $html='';
     if(!is_null($message_)&&!empty($message_)){
        $type= $message_['type'];
        $tp=$type;
        if($type=='danger'){
            $tp='ban';
        }elseif($type=='warning'){
            $tp='exclamation-triangle';
        }elseif($type=='success'){
            $tp='check';
        }
        elseif($type=='info'){
            $tp='info-circle';
        }

         $message=$message_['message'];
         $this->msg_session=$message;
         $html='<div class="alert alert-'.$type.' alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6> <i class="icon fas fa-'.$tp.'"></i>
         ';
         if(is_array($message)){
            foreach ($message as $v) {
                 $html.=$v.'<br/>';
            }
        }else{
      $html.= $message;
    }
         		
		$html.='</h6></div>';
        }
        return $html;
    
}
public function send_flashMessage($message,$type='success'){
    $mes['type']=$type;
    //$mes['message']=ADDSLASHES($message);
    $mes['message']=$message;
    $message_=$this->CI->session->flashdata(SESSION_USER_MESSAGE_NAME);
    if(is_null($message_)||empty($message_)||$message_==false){
        $this->CI->session->set_flashdata(SESSION_USER_MESSAGE_NAME,$mes);
    }
        
}

}
