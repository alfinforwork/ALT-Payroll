<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("model_karyawan");
		if($this->session->userdata('status') != "login"){
			redirect(base_url("welcome/login"));
		}
	}

	public function index()
	{
		$tmp['contents'] = 'admin/view_karyawan/index';
		$tmp['data'] =$this->model_karyawan->getAll();
		$this->load->view('admin/layout/template', $tmp);	
	}


	public function tambah(){
		$tmp['contents'] = 'admin/view_karyawan/input';
		$this->load->view('admin/layout/template', $tmp);
	}
	

	public function tambah_proses(){
	
		$itema = $this->model_karyawan;
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'jabatan' => $this->input->post('jabatan'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
			);
		if($itema->insert_data($data)){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		redirect(base_url('karyawan'));
	}




	public function edit($id)
    {
		$anggota = $this->model_karyawan;
		$tmp['contents'] = 'admin/view_karyawan/edit';
        $tmp["data"] = $anggota->getById($id);
		if (!$tmp["data"]) show_404();
		$this->load->view('admin/layout/template', $tmp);
	}

	
	public function edit_proses()
    {
		$itema = $this->model_karyawan;
		$data = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'jabatan' => $this->input->post('jabatan'),
			'telp' => $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
			);
		if($itema->edit_data($data)){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		redirect(base_url('karyawan'));
        
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_karyawan->delete($id)) {
            redirect(site_url('karyawan'));
        }
    }
}