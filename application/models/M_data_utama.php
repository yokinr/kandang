<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_utama extends CI_Model {

	function lokasi_semua()
	{
		return $this->db->get('lokasi')->result();
	}	

}

/* End of file M_data_utama.php */
/* Location: ./application/models/M_data_utama.php */