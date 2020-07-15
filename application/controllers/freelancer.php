<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class freelancer extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("model_freelancer");
		if($this->session->userdata('status') != "login"){
			redirect(base_url("welcome/login"));
		}
	}

	public function index()
	{
		$tmp['contents'] = 'admin/view_freelancer/index';
		$tmp['data'] =$this->model_freelancer->getAll();
		$this->load->view('admin/layout/template', $tmp);	
	}


	public function tambah(){
		$tmp['contents'] = 'admin/view_freelancer/input';
		$this->load->view('admin/layout/template', $tmp);
	}
	

	public function tambah_proses(){
	
		$itema = $this->model_freelancer;
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'email' => $this->input->post('email'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
			);
		if($itema->insert_data($data)){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		redirect(base_url('freelancer'));
	}




	public function edit($id)
    {
		$anggota = $this->model_freelancer;
		$tmp['contents'] = 'admin/view_freelancer/edit';
        $tmp["data"] = $anggota->getById($id);
		if (!$tmp["data"]) show_404();
		$this->load->view('admin/layout/template', $tmp);
	}

	
	public function edit_proses()
    {
		$itema = $this->model_freelancer;
		$data = array(
			'nik' => $this->input->post('nik'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'email' => $this->input->post('email'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
			);
		if($itema->edit_data($data)){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		redirect(base_url('freelancer'));
        
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_freelancer->delete($id)) {
            redirect(site_url('freelancer'));
        }
    }
}