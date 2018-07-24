<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pledges extends CI_Controller {
	public function __construct()
	{    	
		parent::__construct();
		$this->load->library('Session');

	}

	public function index(){
		$this->load->view('pledges_view');
	}

}