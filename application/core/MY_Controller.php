<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' ); 

abstract class MY_Controller extends MX_Controller 
{
	protected $layout='default';//Layout à utiliser pour la vue
    public $data = array();//variable passer à la vue
    protected $my_configPage= array();//parametre de configurationde pagination
    protected $class_name;
    protected $info_user;
    protected $date_time_now;
    protected $date_now;
    protected $time_now;
    protected $my_arg;

    public function __construct($subclass){
    parent::__construct();
  
    $this->class_name=get_class($subclass);
    $this->my_helper();
  
 
    $this->my_template();
    $this->data['layout_back']='<p align="right">
	<a href="javascript:history.back(-1);"><button class="btn btn-round btn-dark col-lg-1"><i class="fas fa-arrow-left"></i></button></a>
	</p>';
   
    $this->my_arg=$this->uri->segment(3);
    $this->my_configPagination();
   
  }

  public function my_helper(){
    $this->load->helper('download');
  $this->load->helper('html');
}

public function my_template(){
    $this->load->module('Templates');
    $this->load->module('Media');
}

protected function loadview($view='index',$default_controller='') {
    if(empty($default_controller)){
        $default_controller=$this->class_name;
    }
    $this->data['view_content']=$default_controller.'/'.$view;
    $this->dataview->setData($this->data);
    $this->templates->loadlayoutsviews();
}

protected function my_configPagination(){
    $this->my_configPage= $this->config->item('my_configPage');
         //page
         $this->my_page=($this->my_arg&&is_numeric($this->my_arg))? $this->my_arg:0;
         
         
 }

}
