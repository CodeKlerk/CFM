<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pledges extends CI_Controller {
	public function __construct()
	{    	
		parent::__construct();
		$this->load->library('Session');
		(!$this->session->userdata('userid')) ? redirect("account/login") : '' ;

	}

	public function index($id = null){
		$data['pagetitle'] = 'pledges';
		$this->load->view('pledges_view',$data);
	}
	public function create(){
		$data['pagetitle'] = 'Create Pledge';
		$this->load->view('create_pledges_view',$data);
	}

}