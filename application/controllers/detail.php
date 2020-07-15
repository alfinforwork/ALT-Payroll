<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("model_penggajian");
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("welcome/login"));
		}
	}

	public function index($id_proyek = null)
	{
		$q = urldecode($this->input->get('q', TRUE));
		$start = intval($this->input->get('start'));

		if ($q <> '') {
			$config['base_url'] = base_url() . "detail/$id_proyek?q=" . urlencode($q);
			$config['first_url'] = base_url() . "detail/$id_proyek?q=" . urlencode($q);
		} else {
			$config['base_url'] = base_url() . "detail/$id_proyek";
			$config['first_url'] = base_url() . "detail/$id_proyek";
		}
		$config['per_page'] = 10;               //Tes
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
		$tmp['contents'] = 'admin/view_penggajian/index';
		$tmp['data'] = $data;
		$this->load->view('admin/layout/template', $tmp);
	}


	public function tambah($id_proyek = null)
	{
		$tmp = [
			'id_proyek'			=> $id_proyek,
			'data_freelance' => $this->db->get('tb_freelance')->result(),
			'data_jobdesk' => $this->db->get('tb_jobdesk')->result(),
			'data_proyek_row'	=> $this->db->where('id_proyek', $id_proyek)->get('tb_proyek')->row()
		];
		$tmp['contents'] = 'admin/view_penggajian/input';
		$this->load->view('admin/layout/template', $tmp);
	}

	public function api_persen($id_jobdesk = null)
	{
		$this->db->where('id_jobdesk', $id_jobdesk);
		$data = $this->db->get('tb_jobdesk')->row();
		echo json_encode($data);
	}

	public function tambah_proses($id_proyek = null)
	{
		$this->form_validation->set_rules('freelance', 'freelance', 'trim|required');
		$this->form_validation->set_rules('jobdesk', 'jobdesk', 'trim|required');
		$this->form_validation->set_rules('gaji', 'gaji', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->tambah($id_proyek);
		} else {
			$tes = $this->db->where('id_proyek', $id_proyek)
				// ->where('nik', $this->input->post('freelance'))
				->where('id_jobdesk', $this->input->post('jobdesk'))
				->get('tb_penggajian')->result();

			if (!empty($tes)) {
				$this->message('gagal', 'Jobdesk atau Freelance sudah ada');
				redirect(base_url('detail/index/' . $id_proyek));
			}
			$data = array(
				'id_proyek' => $id_proyek,
				'nik' => $this->input->post('freelance'),
				'id_jobdesk' => $this->input->post('jobdesk'),
				'gaji' => $this->input->post('gaji'),
			);
			if ($this->db->insert('tb_penggajian', $data)) {
				$this->message('berhasil', 'Berhasil disimpan');
			} else {
				$this->message('gagal', 'Gagal disimpan');
			}
			redirect(base_url('detail/index/' . $id_proyek));
		}
	}

	public function edit($id_proyek = null, $id_penggajian = null)
	{
		$tmp = [
			'id_proyek'			=> $id_proyek,
			'id_penggajian'		=> $id_penggajian,
			'data_freelance' => $this->db->get('tb_freelance')->result(),
			'data_jobdesk' => $this->db->get('tb_jobdesk')->result(),
			'data_proyek_row'	=> $this->db->where('id_proyek', $id_proyek)->get('tb_proyek')->row()
		];
		$tmp['contents'] = 'admin/view_penggajian/edit';
		$tmp['data'] = $this->db->where('id_penggajian', $id_penggajian)->get('tb_penggajian')->row();;

		if (!$tmp["data"]) show_404();
		$this->load->view('admin/layout/template', $tmp);
	}


	public function edit_proses($id_proyek = null, $id_penggajian = null)
	{
		$this->form_validation->set_rules('freelance', 'freelance', 'trim|required');
		$this->form_validation->set_rules('jobdesk', 'jobdesk', 'trim|required');
		$this->form_validation->set_rules('gaji', 'gaji', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->tambah($id_proyek);
		} else {
			$data = array(
				'id_proyek' => $id_proyek,
				'nik' => $this->input->post('freelance'),
				'id_jobdesk' => $this->input->post('jobdesk'),
				'gaji' => $this->input->post('gaji'),
			);
			if ($this->db->where('id_penggajian', $id_penggajian)->update('tb_penggajian', $data)) {
				$this->message('berhasil', 'Berhasil disimpan');
			} else {
				$this->message('gagal', 'Gagal disimpan');
			}
			redirect(base_url('detail/index/' . $id_proyek));
		}
	}

	public function delete($id_proyek = null, $id_penggajian = null)
	{
		if ($this->db->where('id_penggajian', $id_penggajian)->delete('tb_penggajian')) {
			$this->message('berhasil', 'Berhasil dihapus');
			redirect(base_url('detail/index/' . $id_proyek));
		} else {
			$this->message('gagal', 'Gagal dihapus');
		}
	}

	function message($status = null, $message = null)
	{
		if ($status == 'gagal') {
			$this->session->set_flashdata('message', '<div style="background-color: red;color: white;text-align: center;padding: 10px">' . $message . '</div>');
		} else {
			$this->session->set_flashdata('message', '<div style="background-color: green;color: white;text-align: center;padding: 10px">' . $message . '</div>');
		}
	}
}
