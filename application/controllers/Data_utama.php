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
					}
				}
			}else
			if($aksi=='edit'){
				$where = [
					'uniq_lokasi' => $this->input->post('lokasi'),
					'nama' => $this->input->post('nama'),
					'kapasitas' => $this->input->post('kapasitas'),
				];
				$cekKandang = $this->db->get_where('kandang', $where)->result();
				if($cekKandang){
					?> <div class="alert-info alert">Gagal memperbaharui data, terdeteksi <?= $this->input->post('nama') ?>, <?= $this->input->post('kapasitas') ?> sudah tersedia</div> <?php
				}else{
					$this->db->where('uniq', $this->input->post('id'));
					$this->db->update('kandang', $where);
					if($this->db->affected_rows()>>0){
						echo "<div class='alert alert-success'>Berhasil memperbaharui data</div>";
					}else{
						echo "<div class='alert alert-danger'>Gagal memperbaharui data</div>";
					}
				}
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

	function peternak($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('kontak', 'Nomor Kontak', 'trim|required|is_numeric');
				if ($this->form_validation->run() == FALSE) {
					echo "<div class='alert alert-danger'>".validation_errors()."</div>";
				} else {
					$uniq = ['uniq'=>uniqid(),];
					$merge = array_merge($uniq, $_POST);
					$this->db->insert('peternak', $merge);
					if($this->db->affected_rows()>>0){
						echo "<div class='alert alert-success'>Berhasil menambahkan data</div>";
					}else{
						echo "<div class='alert alert-danger'>Gagal menambahkan data</div>";
					}
				}
			}else
			if($aksi=='edit'){
				$this->db->where('uniq', $this->input->post('id'));
				$this->db->update('peternak', $_POST);
				if($this->db->affected_rows()>>0){
					echo "<div class='alert alert-success'>Berhasil menambahkan data</div>";
				}else{
					echo "<div class='alert alert-danger'>Gagal menambahkan data</div>";
				}
			}else
			if($aksi=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('peternak');
				if($this->db->affected_rows()>>0){
					echo "<div class='alert alert-success'>Berhasil menghapus data</div>";
				}else{
					echo "<div class='alert alert-danger'>Gagal menghapus data</div>";
				}
			}
		}
		$data = [
			'peternak' => $this->data_utama->peternak(),
		];
		$this->load->view('pages/data_utama/peternak', $data, FALSE);
	}

	function pelanggan($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('kontak', 'Nomor Kontak', 'trim|required|is_numeric');
				if ($this->form_validation->run() == FALSE) {
					echo "<div class='alert alert-danger'>".validation_errors()."</div>";
				} else {
					$uniq = ['uniq'=>uniqid(),];
					$merge = array_merge($uniq, $_POST);
					$this->db->insert('pelanggan', $merge);
					if($this->db->affected_rows()>>0){
						echo "<div class='alert alert-success'>Berhasil menambahkan data</div>";
					}else{
						echo "<div class='alert alert-danger'>Gagal menambahkan data</div>";
					}
				}
			}else
			if($aksi=='edit'){
				$this->db->where('uniq', $this->input->post('id'));
				$this->db->update('pelanggan', $_POST);
				if($this->db->affected_rows()>>0){
					echo "<div class='alert alert-success'>Berhasil menambahkan data</div>";
				}else{
					echo "<div class='alert alert-danger'>Gagal menambahkan data</div>";
				}
			}else
			if($aksi=='hapus'){
				$this->db->where('uniq', $id);
				$this->db->delete('pelanggan');
				if($this->db->affected_rows()>>0){
					echo "<div class='alert alert-success'>Berhasil menghapus data</div>";
				}else{
					echo "<div class='alert alert-danger'>Gagal menghapus data</div>";
				}
			}
		}
		$data = [
			'pelanggan' => $this->data_utama->pelanggan(),
		];
		$this->load->view('pages/data_utama/pelanggan', $data, FALSE);
	}

	function pengguna($aksi=null, $id=null)
	{
		if($aksi){
			if($aksi=='tambah'){
				$this->form_validation->set_rules('hak_akses', 'Peran', 'trim|required');
				$this->form_validation->set_rules('user', 'User', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					echo "<div class='alert alert-danger'>".validation_errors()."</div>";
				} else {
					$table = $this->level()[$this->input->post('hak_akses')];
					$detailUser = $this->db->get_where($table, ['uniq'=>$this->input->post('user')])->row_array();
					if($detailUser['email']){
						$email = $detailUser['email'];
					}else{
						$email = strtolower(str_replace(' ', '', $detailUser['nama'])).'@pengguna.id';
					}
					$object = [
						'uniq' => $detailUser['uniq'],
						'nama' => $detailUser['nama'],
						'username' => $email,
						'password' => password_hash('123456', PASSWORD_DEFAULT),
						'hak_akses' => $this->input->post('hak_akses'),
						'status' => 1,
					];
					$cekPengguna = $this->db->get_where('users', $object)->result();
					if($cekPengguna){
						echo "<div class='alert alert-danger'>Pengguna sudah tersedia</div>";
					}else{
						$this->db->insert('users', $object);
						if($this->db->affected_rows()>>0){
							echo "<div class='alert alert-success'>Berhasil menambahkan data</div>";
						}else{
							echo "<div class='alert alert-danger'>Gagal menambahkan data</div>";
						}
					}
				}
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
			$hak_akses = $this->input->post('hak_akses');
			$table = $this->level()[$hak_akses];
			$cekPengguna = $this->db->query("SELECT * from $table where uniq not in(SELECT uniq from users)")->result();
			if($cekPengguna){
				?>
				<option value="">...</option>
				<?php foreach ($cekPengguna as $key => $value): ?>
					<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
				<?php endforeach ?>
				<?php
			}else{
				?> <option value="">0 Results</option> <?php
			}
		}
	}

	function level()
	{
		return $level = [
			'1' => 'admin',
			'2' => 'peternak',
			'3' => 'pelanggan',
		];
	}

}

/* End of file Data_uatama.php */
/* Location: ./application/controllers/Data_uatama.php */