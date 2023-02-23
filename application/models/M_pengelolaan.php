<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengelolaan extends CI_Model {

	function isi_kandang($id)
	{
		return $this->db->get_where('isi_kandang', ['uniq_kandang'=>$id])->result();
	}

	function isi_kandang_id($id)
	{
		return $this->db->get_where('isi_kandang', ['uniq'=>$id])->row_array();
	}

	function peternak_kandang($id)
	{
		return $this->db->get_where('peternak_kandang', ['uniq_kandang'=>$id])->result();
	}

	function peternak_kandang_id($id)
	{
		return $this->db->get_where('peternak_kandang', ['uniq'=>$id])->row_array();
	}

	function barang_masuk()
	{
		return $this->db->get('barang_masuk')->result();
	}

	function barang_masuk_id($id)
	{
		return $this->db->get_where('barang_masuk', ['uniq'=>$id])->row_array();
	}

}

/* End of file M_pengelolaan.php */
/* Location: ./application/models/M_pengelolaan.php */