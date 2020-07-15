<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Slip_gaji extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_slip_gaji');
	}

	public function index()
	{
		$tmp = [
			'data_freelance' => $this->db->get('tb_freelance')->result(),
			'data_proyek' => $this->db->get('tb_proyek')->result()

		];
		$tmp['contents'] = 'admin/view_slip_gaji/index';
		$this->load->view('admin/layout/template', $tmp);
	}
	public function cetak_laporan()
	{
		$model = $this->Model_slip_gaji;
		$nik = $this->input->get('freelance', true);
		$proyek = $this->input->get('proyek', true);

		$temp = [
			'data' => $model->get_by_nik_dan_id_proyek($nik, $proyek)
		];
		$this->load->view('admin/view_slip_gaji/cetak_laporan', $temp);
	}
}

/* End of file Slip_gaji.php */
