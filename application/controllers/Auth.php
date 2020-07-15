<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('mlogin');
	if($this->session->userdata('status') != "login"){	
		}else{
			redirect(base_url("dashboard"));
		}
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function logout()
	{
		// $this->load->view('logout');
	}
	public function login_proses()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->mlogin->cek_login("tb_user",$where)->num_rows();
		if($cek >= 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);
			redirect(base_url("dashboard"));
			echo "jadi";
		}else{
			echo "Username dan password salah !";
		}
	}
}
