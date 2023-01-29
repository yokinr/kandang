<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_utama extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama', 'data_utama');
	}

	public function page($page=null, $id=null)
	{
		$data = [
			'title' => $page,
			'dataget' => base_url('data_utama/'.$page),
			'dataid' => $id,
		];
		$this->load->view('template', $data, FALSE);
	}

	function lokasi($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo "<div class='alert alert-danger'>".validation_errors()."</div>";
				} else {
					$where = [
						'nama' => $this->input->post('nama'),
						'alamat' => $this->input->post('alamat'),
					];
					$cekLokasi = $this->db->get_where('lokasi', $where)->result();
					if($cekLokasi){
						echo "<div class='alert alert-info'>Lokasi: ".$this->input->post('nama')." dan Alamat: ".$this->input->post('alamat')." sudah tersedia</div>";
					}else{
						$uniq = ['uniq'=>uniqid()];
						$merge = array_merge($uniq,$where);
						$this->db->insert('lokasi', $merge);
						if($this->db->affected_rows()>>0){
							echo "<div class='alert alert-success'>Berhasil menyimpan data</div>";
						}else{
							echo "<div class='alert alert-danger'>Gagal menyimpan data</div>";
						}
					}
				}
			}else
			if($aksi=='edit'){

			}else
			if($aksi=='hapus'){
				if($id){
					$this->db->where('uniq', $id);
					$this->db->delete('lokasi');
					if($this->db->affected_rows()>>0){
						echo "<div class='alert alert-success'>Berhasil menghapus data</div>";
					}else{
						echo "<div class='alert alert-danger'>Gagal menghapus data</div>";
					}
				}
			}
		}
		$data = [
			'lokasi' => $this->data_utama->lokasi_semua(),
		];
		$this->load->view('pages/data_utama/lokasi', $data, FALSE);
	}

	function kandang($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo "<div class='alert alert-danger'>".validation_errors().",/div>";
				} else {
					$where = [
						'uniq_lokasi' => $this->input->post('lokasi'),
						'nama' => $this->input->post('nama'),
					];

					$cekKandang = $this->db->get_where('kandang', $where)->result();
					if($cekKandang){
						echo "<div class='alert alert-danger'>Data kandang sudah tersedia</div>";
					}else{
						$uniq = [
							'uniq' => uniqid(),
							'kapasitas' => $this->input->post('kapasitas'),
						];
						$merge = array_merge($uniq, $where);
						$this->db->insert('kandang', $merge);
						if($this->db->affected_rows()>>0){
							echo "<div class='alert alert-success'>Berhasil menyimpan data</div>";
						}else{
							echo "<div class='alert alert-danger'>Gagal menyimpan data</div>";
						}
						// $getLokasi = $this->input->post('lokasi');
					}
				}
			}else
			if($aksi=='edit'){
				?> <div class="alert-info alert">Fitur ini masih dalam masa pengembangan</div> <?php
			}else
			if($aksi=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('kandang');
				if($this->db->affected_rows()>>0){
					echo "<div class='alert alert-success'>Berhasil menghapus data</div>";
				}else{
					echo "<div class='alert alert-danger'>Gagal menghapus data</div>";
				}
			}
		}
		$getLokasi = $this->input->get('lokasi');
		if($getLokasi){
			$kandang = $this->db->get_where('kandang', ['uniq_lokasi'=>$this->input->get('lokasi')])->result();
		}else{
			$kandang = $this->db->get('kandang')->result();
		}
		$data = [
			'getLokasi' => $getLokasi,
			'lokasi' => $this->data_utama->lokasi_semua(),
			'kandang' => $kandang,
		];
		$this->load->view('pages/data_utama/kandang', $data, FALSE);
	}

	function pelanggan()
	{
		echo "Pelanggan";
	}

	function pengguna()
	{
		echo "Pengguna";
	}

}

/* End of file Data_uatama.php */
/* Location: ./application/controllers/Data_uatama.php */