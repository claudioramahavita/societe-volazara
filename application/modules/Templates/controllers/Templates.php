<?php
class Templates extends MY_Controller{
    function __construct()
    {
        parent::__construct($this);
    }
     function loadlayoutsviews(){
    $this->layout=$this->monsession->user_role();
    
    $this->load->view('Templates/'.$this->layout,$this->dataview->getData());
   }
   
  
   
}