<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_utama extends CI_Model {

	function lokasi_semua()
	{
		return $this->db->get('lokasi')->result();
	}	

	function pelanggan()
	{
		return $this->db->get('pelanggan')->result();
	}

	function pengguna()
	{
		return $this->db->get_where('users', ['hak_akses!='=>1])->result();
	}

	function peternak()
	{
		return $this->db->get('peternak')->result();
	}

}

/* End of file M_data_utama.php */
/* Location: ./application/models/M_data_utama.php */