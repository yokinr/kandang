<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama', 'data_utama');
		$this->load->model('m_pengelolaan');
	}

	function kandang()
	{
		$data = [
			'title' => "Pengelolaan Kandang",
			'dataget' => base_url('pengelolaan/data_kandang'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_kandang($page=null, $id=null, $id1=null)
	{
		if($page){
			if($page=='tambahisikandang'){
				$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'trim|required');
				$this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'uniq_kandang' => $id,
						'tanggal_masuk' => $this->input->post('tanggal_masuk'),
						'jumlah_masuk' => $this->input->post('jumlah_masuk'),
						'status' => $this->input->post('status'),
					];
					$cekIsiKandang = $this->db->get_where('isi_kandang', ['status'=>1,'uniq_kandang'=>$id])->result();
					if(!$cekIsiKandang){
						$this->db->insert('isi_kandang', $object);
						echo $this->alert->pesan('tambah');
					}else{
						?> <div class="alert alert-danger">Tidak bisa menambahkan data isi kandang, karena terdeteksi ada data isi kandang yang berstatus Aktif !</div> <?php
					}
				}
			}else
			if($page=='editisikandang'){
				$object = [
					'tanggal_masuk' => $this->input->post('tanggal_masuk'),
					'jumlah_masuk' => $this->input->post('jumlah_masuk'),
					'status' => $this->input->post('status'),
				];
				
				if($this->input->post('status')==1){
					$cekIsiKandang = $this->db->get_where('isi_kandang', ['status'=>1,'uniq_kandang'=>$id1,'uniq!='=>$id])->result();
					if(!$cekIsiKandang){
						$this->db->where('uniq', $id);
						$this->db->update('isi_kandang', $object);
						echo $this->alert->pesan('edit');
					}else{
						?> <div class="alert alert-danger">Tidak bisa merubah data isi kandang, karena terdeteksi ada data isi kandang yang berstatus Aktif !</div> <?php
					}
				}else{
					$this->db->where('uniq', $id);
					$this->db->update('isi_kandang', $object);
					echo $this->alert->pesan('edit');
				}
			}else
			if($page=='hapusisikandang'){
				$this->db->where('uniq', $id);
				$this->db->delete('isi_kandang');
				echo $this->alert->pesan('hapus');
			}else
			if($page=='tambahpeternakkandang'){
				$this->form_validation->set_rules('peternak', 'Peternak', 'trim|required');
				$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'uniq_kandang' => $id,
						'uniq_peternak' => $this->input->post('peternak'),
						'tanggal_masuk' => $this->input->post('tanggal_masuk'),
						'status' => $this->input->post('status'),
					];
					$cekPeternakKandang = $this->db->get_where('peternak_kandang', ['uniq_kandang'=>$id, 'status'=>1])->result();
					if(!$cekPeternakKandang){
						$this->db->insert('peternak_kandang', $object);
						echo $this->alert->pesan('tambah');
					}else{
						?> <div class="alert alert-danger"> Tidak bisa menyiman data, terdeteksi <?= count($cekPeternakKandang) ?> data peternak aktif pada kandang ini </div> <?php
					}
				}
			}else
			if($page=='editpeternakkandang'){
				$this->form_validation->set_rules('peternak', 'Peternak', 'trim|required');
				$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'trim|required');
				$this->form_validation->set_rules('status', 'Status', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq_peternak' => $this->input->post('peternak'),
						'tanggal_masuk' => $this->input->post('tanggal_masuk'),
						'status' => $this->input->post('status'),
					];
					$cekPeternakKandang = $this->db->get_where('peternak_kandang', ['status'=>1,'uniq_kandang'=>$id1,'uniq!='=>$id])->result();
					if(!$cekPeternakKandang){
						$this->db->where('uniq', $id);
						$this->db->update('peternak_kandang', $object);
						echo $this->alert->pesan('edit');
					}else{
						?> <div class="alert alert-danger"> Tidak bisa menyiman data, terdeteksi <?= count($cekPeternakKandang) ?> data peternak aktif pada kandang ini </div> <?php
					}
					
				}
			}else
			if($page=='hapuspeternakkandang'){
				$this->db->where('uniq', $id);
				$this->db->delete('peternak_kandang');
				echo $this->alert->pesan('hapus');
			}
		}

		if($this->input->get('lokasi')){
			$array = array(
				'lokasi' => $this->input->get('lokasi'),
			);
			$this->session->set_userdata( $array );
		}

		if($this->session->userdata('lokasi')){
			$kandang = $this->data_utama->kandang_lokasi();
		}else{
			$kandang = $this->data_utama->kandang();
		}
		$data = [
			'lokasi' => $this->data_utama->lokasi(),
			'kandang' => $kandang,
		];
		$this->load->view('pages/pengelolaan/kandang', $data, FALSE);
	}

	function barang_masuk()
	{
		$data = [
			'title' => "Barang Masuk",
			'dataget' => base_url('pengelolaan/data_barang_masuk'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_barang_masuk($page=null, $id=null)
	{
		if($page){
			if($page=='tambah'){
				$this->form_validation->set_rules('barang', 'Barang', 'trim|required');
				$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
				$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'uniq_barang' => $this->input->post('barang'),
						'tanggal' => $this->input->post('tanggal'),
						'jumlah' => $this->input->post('jumlah'),
					];
					$this->db->insert('barang_masuk', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($page=='edit'){
				$this->form_validation->set_rules('barang', 'Barang', 'trim|required');
				$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
				$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq_barang' => $this->input->post('barang'),
						'tanggal' => $this->input->post('tanggal'),
						'jumlah' => $this->input->post('jumlah'),
					];
					$this->db->where('uniq', $id);
					$this->db->update('barang_masuk', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($page=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('barang_masuk');
				echo $this->alert->pesan('hapus');
			}
		}
		$data = [
			'barang_masuk' => $this->m_pengelolaan->barang_masuk(),
		];
		$this->load->view('pages/pengelolaan/barang_masuk', $data, FALSE);
	}

}

/* End of file Pengelolaan.php */
/* Location: ./application/controllers/Pengelolaan.php */