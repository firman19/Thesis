<?php

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();		

		if($this->session->userdata('login') == true){
		    redirect(base_url("map"));
		}     
	}

	public function index(){
		$this->load->view('login_page');
	}
}
