<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_utama extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama', 'data_utama');
	}

	function lokasi()
	{
		$data = [
			'title' => "Data Lokasi",
			'dataget' => base_url('data_utama/data_lokasi'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_lokasi($page=null, $id=null)
	{
		if($page){
			if($page=='tambah'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?></div> <?php
				} else {
					$object = [
						'uniq' => uniqid(),
						'nama' => $this->input->post('nama'),
						'alamat' => $this->input->post('alamat'),
					];
					$this->db->insert('lokasi', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($page=='edit'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"> <?= validation_errors() ?></div> <?php
				} else {
					$object = [
						'nama' => $this->input->post('nama'),
						'alamat' => $this->input->post('alamat'),
					];
					$this->db->where('uniq', $id);
					$this->db->update('lokasi', $object);
					echo $this->alert->pesan('edit');
				}
			}else
			if($page=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('lokasi');
				echo $this->alert->pesan('hapus');
			}
		}
		$data = [
			'lokasi' => $this->data_utama->lokasi(),
		];
		$this->load->view('pages/data_utama/lokasi', $data, FALSE);
	}

	function kandang()
	{
		$data = [
			'title' => "Data Kandang",
			'dataget' => base_url('data_utama/data_kandang'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_kandang($page=null, $id=null)
	{
		if($page){
			if($page=='tambah'){
				$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$where = [
						'uniq_lokasi' => $this->input->post('lokasi'),
						'nama' => $this->input->post('nama'),
					];
					$cekKandang = $this->db->get_where('kandang', $where)->result();
					if(!$cekKandang){
						$object = [
							'uniq' => uniqid(),
							'uniq_lokasi' => $this->input->post('lokasi'),
							'nama' => $this->input->post('nama'),
							'kapasitas' => $this->input->post('kapasitas')
						];
						$this->db->insert('kandang', $object);
						echo $this->alert->pesan('tambah');
					}else{
						?> <div class="alert alert-danger">Data kandang <b><?= $this->input->post('nama') ?></b> sudah tersedia</div> <?php
					}
				}
			}else
			if($page=='edit'){
				$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq_lokasi' => $this->input->post('lokasi'),
						'nama' => $this->input->post('nama'),
						'kapasitas' => $this->input->post('kapasitas')
					];
					$this->db->where('uniq', $id);
					$this->db->update('kandang', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($page=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('kandang');
				echo $this->alert->pesan('hapus');
			}
		}

		if($this->input->get('lokasi')){
			$array = array(
				'lokasi' => $this->input->get('lokasi'),
			);
			$this->session->set_userdata( $array );
		}else{
			$this->session->unset_userdata('lokasi');
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
		$this->load->view('pages/data_utama/kandang', $data, FALSE);
	}

	function peternak()
	{
		$data = [
			'title' => "Data Peternak",
			'dataget' => base_url('data_utama/data_peternak'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_peternak($page=null, $id=null)
	{
		if($page){
			if($page=='tambah'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required');
				$this->form_validation->set_rules('kontak', 'Nomor Kontak', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'nama' => $this->input->post('nama'),
						'email' => $this->input->post('email'),
						'alamat' => $this->input->post('alamat'),
						'kontak' => $this->input->post('kontak'),
					];
					$cekPeternak = $this->db->get_where('peternak', $_POST)->result();
					if(!$cekPeternak){
						$this->db->insert('peternak', $object);
						echo $this->alert->pesan('tambah');
					}else{
						?> <div class="alert alert-danger">Data Peternak dengan nama <b><?= $this->input->post('nama') ?></b> sudah tersedia</div> <?php
					}
				}
			}else
			if($page=='edit'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required');
				$this->form_validation->set_rules('kontak', 'Nomor Kontak', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'nama' => $this->input->post('nama'),
						'email' => $this->input->post('email'),
						'alamat' => $this->input->post('alamat'),
						'kontak' => $this->input->post('kontak'),
					];
					$cekPeternak = $this->db->get_where('peternak', $object)->result();
					if(!$cekPeternak){
						echo $id;
						$this->db->where('uniq', $id);
						$this->db->update('peternak', $object);
						echo $this->alert->pesan('edit');
					}else{
						?> <div class="alert alert-danger">Data Peternak dengan nama <b><?= $this->input->post('nama') ?></b> sudah tersedia</div> <?php
					}
				}
			}else
			if($page=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('peternak');
				echo $this->alert->pesan('hapus');
			}
		}
		$data = [
			'peternak' => $this->data_utama->peternak(),
		];
		$this->load->view('pages/data_utama/peternak', $data, FALSE);
	}

	function pelanggan()
	{
		$data = [
			'title' => "Data Pelanggan",
			'dataget' => base_url('data_utama/data_pelanggan'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pelanggan($page=null, $id=null)
	{
		if($page){
			if($page=='tambah'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('kontak', 'Nomor Kontak', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'nama' => $this->input->post('nama'),
						'email' => $this->input->post('email'),
						'alamat' => $this->input->post('alamat'),
						'kontak' => $this->input->post('kontak'),
					];
					$cekPelanggan = $this->db->get_where('pelanggan', $_POST)->result();
					if(!$cekPelanggan){
						$this->db->insert('pelanggan', $object);
						echo $this->alert->pesan('tambah');
					}else{
						?> <div class="alert alert-danger"> Data sudah tersedia</div> <?php
					}
				}
			}else
			if($page=='edit'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('email', 'E-mail', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('kontak', 'Nomor Kontak', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'nama' => $this->input->post('nama'),
						'email' => $this->input->post('email'),
						'alamat' => $this->input->post('alamat'),
						'kontak' => $this->input->post('kontak'),
					];
					$cekPelanggan = $this->db->get_where('pelanggan', $_POST)->result();
					if(!$cekPelanggan){
						$this->db->where('uniq', $id);
						$this->db->update('pelanggan', $object);
						echo $this->alert->pesan('edit');
					}else{
						?> <div class="alert alert-danger"> Data sudah tersedia</div> <?php
					}
				}
			}else
			if($page=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('pelanggan');
				echo $this->alert->pesan('hapus');
			}
		}
		$data = [
			'pelanggan' => $this->data_utama->pelanggan(),
		];
		$this->load->view('pages/data_utama/pelanggan', $data, FALSE);
	}

	function kategori_barang()
	{
		$data = [
			'title' => "Kategori Barang",
			'dataget' => base_url('data_utama/data_kategori_barang'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_kategori_barang($page=null, $id=null)
	{
		if($page){
			if($page=='tambah'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'nama' => $this->input->post('nama'),
					];
					$this->db->insert('kategori_barang', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($page=='edit'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'nama' => $this->input->post('nama'),
					];
					$this->db->where('uniq', $id);
					$this->db->update('kategori_barang', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($page=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('kategori_barang');
				echo $this->alert->pesan('hapus');
			}
		}
		$data = [
			'kategori_barang' => $this->data_utama->kategori_barang(),
		];
		$this->load->view('pages/data_utama/kategori_barang', $data, FALSE);
	}

	function barang()
	{
		$data = [
			'title' => "Data Barang",
			'dataget' => base_url('data_utama/data_barang'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_barang($page=null, $id=null)
	{
		if($page){
			if($page=='tambah'){
				$this->form_validation->set_rules('kategori', 'Kategori Barang', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama Barang', 'trim|required|is_unique[barang.nama]');
				$this->form_validation->set_rules('keterangan', 'Keterangan Barang', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'uniq' => uniqid(),
						'nama' => $this->input->post('nama'),
						'uniq_kategori' => $this->input->post('kategori'),
						'keterangan' => $this->input->post('keterangan')
					];
					$this->db->insert('barang', $object);
					echo $this->alert->pesan('tambah');
				}
			}else
			if($page=='edit'){
				$this->form_validation->set_rules('kategori', 'Kategori Barang', 'trim|required');
				$this->form_validation->set_rules('nama', 'Nama Barang', 'trim|required');
				$this->form_validation->set_rules('keterangan', 'Keterangan Barang', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					$object = [
						'nama' => $this->input->post('nama'),
						'uniq_kategori' => $this->input->post('kategori'),
						'keterangan' => $this->input->post('keterangan')
					];
					$this->db->where('uniq', $id);
					$this->db->update('barang', $object);
					echo $this->alert->pesan('edit');
				}
			}else
			if($page='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('barang');
				echo $this->alert->pesan($id);
			}
		}
		$data = [
			'barang' => $this->data_utama->barang(),
		];
		$this->load->view('pages/data_utama/barang', $data, FALSE);
	}

	function pengguna()
	{
		$data = [
			'title' => "Data Pengguna",
			'dataget' => base_url('data_utama/data_pengguna'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pengguna($page=null, $id=null)
	{
		if($page){
			if($page=='tambah'){
				$this->form_validation->set_rules('hak_akses', 'Hak Akses', 'trim|required');
				$this->form_validation->set_rules('user', 'User', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					if($this->input->post('hak_akses')==2){
						$cekUser = $this->db->get_where('peternak', ['uniq'=>$this->input->post('user')])->row_array();
					}else
					if($this->input->post('hak_akses')==3){
						$cekUser = $this->db->get_where('pelanggan', ['uniq'=>$this->input->post('user')])->row_array();
					}
					$cekPengguna = $this->db->get_where('users', ['uniq'=>$this->input->post('user')])->result();
					if(!$cekPengguna){
						$object = [
							'uniq' => $this->input->post('user'),
							'username' => $cekUser['email'],
							'nama' => $cekUser['nama'],
							'password' => password_hash('123456', PASSWORD_DEFAULT),
							'hak_akses' => $this->input->post('hak_akses'),
							'status' => 1
						];
						$this->db->insert('users', $object);
						echo $this->alert->pesan('tambah');
					}else{
						?> <div class="alert alert-danger"> Data pengguna sudah tersedia</div> <?php
					}
				}
			}else
			if($page=='edit'){
				$this->form_validation->set_rules('status', 'Hak Akses', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo $this->alert->pesan('validasi');
				} else {
					if($this->input->post('password')){
						$object = [
							'status' => $this->input->post('status'),
						];
					}else{
						$object = [
							'status' => $this->input->post('status'),
							'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						];
					}
					$this->db->where('uniq', $id);
					$this->db->update('users', $object);
					echo $this->alert->pesan('edit');
				}
			}else
			if($page=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('users');
				echo $this->alert->pesan('hapus');
			}
		}
		$data = [
			'pengguna' => $this->data_utama->pengguna(),
		];
		$this->load->view('pages/data_utama/pengguna', $data, FALSE);
	}

	function peran_pengguna()
	{
		if($this->input->post('hak_akses')){
			if($this->input->post('hak_akses')==2){
				$cekPengguna = $this->db->query("SELECT * from peternak where uniq not in(SELECT uniq from users)")->result();
			}else
			if($this->input->post('hak_akses')==3){
				$cekPengguna = $this->db->query("SELECT * from pelanggan where uniq not in(SELECT uniq from users)")->result();
			}
			if($cekPengguna){
				foreach ($cekPengguna as $key => $value) {
					?> <option value="<?= $value->uniq ?>"><?= $value->nama ?></option> <?php
				}
			}else{
				?> <option value="">...</option> <?php
			}
		}
	}

}