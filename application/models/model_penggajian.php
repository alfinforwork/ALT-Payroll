<?php

class Model_penggajian extends CI_Model
{
	private $_table = "tb_penggajian";


	function __construct()
	{
		parent::__construct();
	}

	function jumlah_data($q, $id_proyek)
	{
		$this->db->select('id_penggajian');
		$this->db->from('tb_penggajian');
		$this->db->join('tb_proyek', 'tb_penggajian.id_proyek = tb_proyek.id_proyek');
		$this->db->join('tb_freelance', 'tb_penggajian.nik = tb_freelance.nik');
		$this->db->join('tb_jobdesk', 'tb_penggajian.id_jobdesk = tb_jobdesk.id_jobdesk');
		$this->db->where('tb_penggajian.id_proyek', $id_proyek);


		$this->db->group_start();
		$this->db->like('tb_penggajian.id_penggajian', $q);
		$this->db->or_like('tb_penggajian.id_proyek', $q);
		$this->db->or_like('tb_penggajian.nik', $q);
		$this->db->or_like('tb_freelance.nama', $q);
		$this->db->or_like('tb_jobdesk.id_jobdesk', $q);
		$this->db->or_like('gaji', $q);
		$this->db->group_end();

		return $this->db->count_all_results();
	}
	function limit_data($limit, $start = 0, $q = NULL, $id_proyek)
	{
		$this->db->select('
			tb_penggajian.*,
			tb_freelance.nama as nama_freelance,
			jobdesk,
			gaji
		');

		$this->db->join('tb_proyek', 'tb_penggajian.id_proyek = tb_proyek.id_proyek');
		$this->db->join('tb_freelance', 'tb_penggajian.nik = tb_freelance.nik');
		$this->db->join('tb_jobdesk', 'tb_penggajian.id_jobdesk = tb_jobdesk.id_jobdesk');
		$this->db->where('tb_penggajian.id_proyek', $id_proyek);


		$this->db->group_start();
		$this->db->like('tb_penggajian.id_penggajian', $q);
		$this->db->or_like('tb_penggajian.id_proyek', $q);
		$this->db->or_like('tb_penggajian.nik', $q);
		$this->db->or_like('tb_freelance.nama', $q);
		$this->db->or_like('tb_jobdesk.id_jobdesk', $q);
		$this->db->or_like('gaji', $q);
		$this->db->group_end();

		$this->db->limit($limit, $start);

		return $this->db->get('tb_penggajian')->result();
	}

	public function insert_data($data)
	{
		$this->db->insert($this->_table, $data);
	}

	public function edit_Data($data)
	{
		$this->db->set($data);
		$this->db->update($this->_table, $this, array('id_penggajian' => $data['id_penggajian']));
	}


	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_penggajian" => $id])->row();
	}



	public function delete($id)
	{
		return $this->db->delete($this->_table, array("nip" => $id));
	}
}
