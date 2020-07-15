<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proyek extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("model_proyek");
		if($this->session->userdata('status') != "login"){
			redirect(base_url("welcome/login"));
		}
	}

	public function index()
	{
		$tmp['contents'] = 'admin/view_proyek/index';
		$tmp['data'] =$this->model_proyek->getAll();
		$this->load->view('admin/layout/template', $tmp);	
	}


	public function tambah(){
		$tmp['contents'] = 'admin/view_proyek/input';
		$this->load->view('admin/layout/template', $tmp);
	}
	

	public function tambah_proses(){
	
		$itema = $this->model_proyek;
		$data = array(
			'id_proyek' => $this->input->post('id_proyek'),
			'nama_proyek' => $this->input->post('nama_proyek'),
			'nama_client' => $this->input->post('nama_client'),
			'tanggal_mulai_proyek' => $this->input->post('tanggal_mulai_proyek'),
			'deadline_proyek' => $this->input->post('deadline_proyek'),
			'total_budget' => $this->input->post('total_budget'),
			'keterangan' => $this->input->post('keterangan'),
			);
		if($itema->insert_data($data)){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		redirect(base_url('proyek'));
	}

	public function edit($id)
    {
		$anggota = $this->model_proyek;
		$tmp['contents'] = 'admin/view_proyek/edit';
        $tmp["data"] = $anggota->getById($id);
		if (!$tmp["data"]) show_404();
		$this->load->view('admin/layout/template', $tmp);
	}

	
	public function edit_proses()
    {
		$itema = $this->model_proyek;
		$data = array(
			'id_proyek' => $this->input->post('id_proyek'),
			'nama_proyek' => $this->input->post('nama_proyek'),
			'nama_client' => $this->input->post('nama_client'),
			'tanggal_mulai_proyek' => $this->input->post('tanggal_mulai_proyek'),
			'deadline_proyek' => $this->input->post('deadline_proyek'),
			'total_budget' => $this->input->post('total_budget'),
			'keterangan' => $this->input->post('keterangan'),
			);
		if($itema->edit_data($data)){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		redirect(base_url('proyek'));
        
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_proyek->delete($id)) {
            redirect(site_url('proyek'));
        }
    }
}