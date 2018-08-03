<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {
	public function __construct()
	{    	
		parent::__construct();
		$this->load->library('Session');
		(!$this->session->userdata('userid')) ? redirect("account/login") : '' ;

	}

	public function index(){
		$this->load->view('members_view');
	}

}