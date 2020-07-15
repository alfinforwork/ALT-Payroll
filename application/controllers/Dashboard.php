<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("Auth/login"));
		}
	}
		public function index(){
		$tmp['title'] = 'Dashboard';
		// $tmp['contents'] = $this->load->view('admin/dashboard/home', null, true);
		$tmp['contents'] = 'admin/dashboard/home';
		$this->load->view('admin/layout/template', $tmp);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Auth/login'));
	}
}
