<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jobdesk extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("model_jobdesk");
		if($this->session->userdata('status') != "login"){
			redirect(base_url("welcome/login"));
		}
	}

	public function index()
	{
		$tmp['contents'] = 'admin/view_jobdesk/index';
		$tmp['data'] =$this->model_jobdesk->getAll();
		$this->load->view('admin/layout/template', $tmp);	
	}


	public function tambah(){
		$tmp['contents'] = 'admin/view_jobdesk/input';
		$this->load->view('admin/layout/template', $tmp);
	}
	

	public function tambah_proses(){
	
		$itema = $this->model_jobdesk;
		$data = array(
			'id_jobdesk' => $this->input->post('id_jobdesk'),
			'jobdesk' => $this->input->post('jobdesk'),
			'persen_upah' => $this->input->post('persen_upah'),
			);
		if($itema->insert_data($data)){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		redirect(base_url('jobdesk'));
	}




	public function edit($id)
    {
		$anggota = $this->model_jobdesk;
		$tmp['contents'] = 'admin/view_jobdesk/edit';
        $tmp["data"] = $anggota->getById($id);
		if (!$tmp["data"]) show_404();
		$this->load->view('admin/layout/template', $tmp);
	}

	
	public function edit_proses()
    {
		$itema = $this->model_jobdesk;
		$data = array(
			'id_jobdesk' => $this->input->post('id_jobdesk'),
			'jobdesk' => $this->input->post('jobdesk'),
			'persen_upah' => $this->input->post('persen_upah'),
			);
		if($itema->edit_data($data)){
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
		redirect(base_url('jobdesk'));
        
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->model_jobdesk->delete($id)) {
            redirect(site_url('jobdesk'));
        }
    }
}