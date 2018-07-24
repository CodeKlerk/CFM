<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	public function __construct()
	{    	
		parent::__construct();
		$this->load->library('Session');

	}

	public function index()
	{
		$this->home();
	}

	public function home()
	{

		if(!$this->session->userdata('userid')){
			redirect("account/home");
		}
		$this->load->view('home_view');

	}


	public function login()
	{
		if($this->session->userdata('userid')){
			redirect("Account/home");
		}       
		$this->load->view('login_view');
	}
		public function forgot()
	{
		if($this->session->userdata('userid')){
			redirect("Account/home");
		}       
		$this->load->view('forgot_view');
	}
	public function create()
	{
		$this->load->view('register_view');
	}


	public function pledges(){
		$this->load->view('pledges_view');
	}

	public function members(){
		$this->load->view('members_view');
	}
}