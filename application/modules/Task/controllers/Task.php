<?php

class Task extends MY_Controller{
    function __construct()
    {
        parent::__construct($this);
       
		$this->load->model('taskmanage');
    }
	
	function addsess(){
		$input=$this->input->post();
		echo json_encode($this->taskmanage->addsess($input));

	}
	function updatesess(){
		$input=$this->input->post();
		echo json_encode($this->taskmanage->updatesess($input));
	}

	function deletesess(){
		$input=$this->input->post();
		$id=$input['produits_id'];
		echo json_encode($this->taskmanage->deletesess($id));
	
	}
	function addCmd(){
		$input=$this->input->post();
		$this->taskmanage->addCmd($input);
		redirect($this->agent->referrer());
	}
}