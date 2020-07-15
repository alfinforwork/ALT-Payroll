<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_penggajian extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model("model_proyek");
		$this->load->model("model_penggajian");
	}


	public function index()
	{
		$tmp['contents'] = 'admin/view_laporan_penggajian/index';
		$tmp['data'] = $this->model_proyek->getAll();
		$this->load->view('admin/layout/template', $tmp);
	}
	public function detail($id_proyek = null)
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('per_page'));

		if ($q <> '') {
			$config['base_url'] = base_url() . "laporan_penggajian/detail/$id_proyek?q=" . urlencode($q);
			$config['first_url'] = base_url() . "laporan_penggajian/detail/$id_proyek?q=" . urlencode($q);
		} else {
			$config['base_url'] = base_url() . "laporan_penggajian/detail/$id_proyek";
			$config['first_url'] = base_url() . "laporan_penggajian/detail/$id_proyek";
		}
		$config['per_page'] = 1;               //Tes
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->model_penggajian->jumlah_data($q, $id_proyek);
		$data = $this->model_penggajian->limit_data($config['per_page'], $start, $q, $id_proyek);

		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$tmp = array(
			'q'                 => $q,
			'id_proyek'                 => $id_proyek,
			'total_rows'        => $config['total_rows'],           //Tes
			'pagination'        => $this->pagination->create_links(),
			'tombol_aktif'      => 'detail'

		);
		// ------------------------------------------------------------------------
		$tmp['contents'] = 'admin/view_laporan_penggajian/detail';
		$tmp['data'] = $data;
		$this->load->view('admin/layout/template', $tmp);
	}

	public function cetak_laporan($id_proyek = null)
	{
		$tmp = [
			'data' => $this->db->where('tb_penggajian.id_proyek', $id_proyek)
				->join('tb_proyek', 'tb_penggajian.id_proyek = tb_proyek.id_proyek')
				->join('tb_freelance', 'tb_penggajian.nik = tb_freelance.nik')
				->join('tb_jobdesk', 'tb_penggajian.id_jobdesk = tb_jobdesk.id_jobdesk')
				->get('tb_penggajian')->result()
		];
		$this->load->view('admin/view_laporan_penggajian/cetak_laporan', $tmp);
	}
}

/* End of file Laporan_penggajian.php */
