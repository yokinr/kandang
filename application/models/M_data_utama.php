<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_utama extends CI_Model {

	function lokasi()
	{
		return $this->db->get('lokasi')->result();
	}

	function lokasi_id($id)
	{
		return $this->db->get_where('lokasi', ['uniq'=>$id])->row_array();
	}

	function kandang()
	{
		return $this->db->get('kandang')->result();
	}

	function kandang_lokasi()
	{
		return $this->db->get_where('kandang', ['uniq_lokasi'=>$this->session->userdata('lokasi')])->result();
	}

	function peternak()
	{
		return $this->db->get('peternak')->result();
	}

	function pelanggan()
	{
		return $this->db->get('pelanggan')->result();
	}

	function kategori_barang()
	{
		return $this->db->get('kategori_barang')->result();
	}

	function kategori_barang_id($id)
	{
		return $this->db->get_where('kategori_barang', ['uniq'=>$id])->row_array();
	}

	function barang()
	{
		return $this->db->get('barang')->result();
	}

	function barang_id($id)
	{
		return $this->db->get_where('barang', ['uniq'=>$id])->row_array();
	}

	function pengguna()
	{
		return $this->db->get_where('users', ['hak_akses!='=>1])->result();
	}

}

/* End of file M_data_utama.php */
/* Location: ./application/models/M_data_utama.php */