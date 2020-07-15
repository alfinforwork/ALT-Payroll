<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model_slip_gaji extends CI_Model
{
	function get_by_nik_dan_id_proyek($nik, $id_proyek)
	{
		$this->db->join('tb_freelance', 'tb_penggajian.nik = tb_freelance.nik');
		$this->db->join('tb_proyek', 'tb_penggajian.id_proyek = tb_proyek.id_proyek');
		$this->db->join('tb_jobdesk', 'tb_penggajian.id_jobdesk = tb_jobdesk.id_jobdesk');
		if (!empty($nik)) {
			$this->db->where('tb_penggajian.nik', $nik);
		}
		if (!empty($id_proyek)) {
			$this->db->where('tb_penggajian.id_proyek', $id_proyek);
		}
		return $this->db->get('tb_penggajian')->result();
	}
}

/* End of file Model_slip_gaji.php */
