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
		$data['pagetitle'] = 'index';
		$this->home();
	}

	public function home()
	{
		// var_dump($this->session->userdata('name'));die;
		// var_dump($this->session->all_userdata());die;
		$data['pagetitle'] = 'home';
		(!$this->session->userdata('userid')) ? redirect("account/login") : '' ;
		$this->load->view('home_view',$data);

	}
	public function profile()
	{
		$data['pagetitle'] = 'home';
		(!$this->session->userdata('userid')) ? redirect("account/login") : '' ;
		$this->load->view('profile_view',$data);

	}

	public function login()
	{
		$data['pagetitle'] = 'Member Login';
		($this->session->userdata('userid')) ? redirect("account/home") : '' ;
		$this->load->view('login_view',$data);
	}
	public function forgot()
	{
		$data['pagetitle'] = 'forgot';
		if($this->session->userdata('userid')){
			redirect("Account/home");
		}       
		$this->load->view('forgot_view',$data);
	}
	public function create()
	{
		$data['pagetitle'] = 'Create Account';
		$this->load->view('register_view',$data);
	}


	public function pledges(){
		$data['pagetitle'] = 'pledges';
		$this->load->view('pledges_view',$data);
	}

	public function members($member_id = null){
		$data['pagetitle'] = 'members';
	
		$view = (isset($member_id)) ? 'member_profile_view' : 'members_view' ;
		$this->load->view($view,$data);
	}
	public function logout()
	{
		$data['pagetitle'] = 'logout';
		$this->session->sess_destroy();
		$data['logged_out'] = TRUE;
		redirect('account/login');
	}
}