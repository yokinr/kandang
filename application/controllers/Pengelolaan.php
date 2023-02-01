<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data_utama', 'data_utama');
	}

	function page($page=null, $id=null)
	{
		$data = [
			'title' => "<i class='fas fa-home'></i> ".ucwords(str_replace('_', ' ', $page)),
			'dataget' => base_url('pengelolaan/'.$page),
			'dataid' => $id,
		];
		$this->load->view('template', $data, FALSE);
	}

	function kandang($aksi=null, $id=null, $id1=null)
	{
		if($aksi){
			if($aksi=='tambah_jumlah_masuk'){
				$this->form_validation->set_rules('jml_masuk', 'Jumlah Masuk', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"><?= validation_errors() ?></div> <?php
				} else {
					$cekIsiKandang = $this->db->get_where('isi_kandang', ['uniq_kandang'=>$this->input->post('id'),'status'=>1])->result();
					$object = [
						'uniq' => uniqid(),
						'uniq_kandang' => $this->input->post('id'),
						'jml_masuk' => $this->input->post('jml_masuk'),
					];
					if(!$cekIsiKandang){
						$this->db->insert('isi_kandang', $object);
						if($this->db->affected_rows()>>0){
							?> <div class="alert-success alert"> Berhasil menyimpan data</div> <?php
						}else{
							?> <div class="alert alert-danger">Gagal menyimpan data</div> <?php
						}
					}else{
						// $this->db->where('uniq', $cekIsiKandang['uniq']);
						echo "<pre>";
						print_r ($cekIsiKandang);
						echo "</pre>";
					}
				}
			}else
			if($aksi=='tambah_peternak_kandang'){
				$this->form_validation->set_rules('peternak', 'Peternak', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					?> <div class="alert alert-danger"><?= validation_errors()?></div> <?php
				} else {
					echo "<pre>";
					print_r ($_POST);
					echo "</pre>";
					$object = [
						'uniq' =>uniqid(),
						'uniq_kandang' => $this->input->post('id'),
						'uniq_peternak' => $this->input->post('peternak'),
						'status' => 1,
					];
					$this->db->insert('peternak_kandang', $object);
					if($this->db->affected_rows()>>0){
						?> <div class="alert-success alert"> Berhasil menyimpan data</div> <?php
					}else{
						?> <div class="alert alert-danger">Gagal menyimpan data</div> <?php
					}
				}
			}
		}
		$lokasi = $this->data_utama->lokasi_semua();
		if($this->input->get('lokasi')){
			$getLokasi = $this->input->get('lokasi');
		}else{
			$getLokasi = $lokasi[0]->uniq;
		}

		$kandang = $this->db->get_where('kandang', ['uniq_lokasi'=>$getLokasi])->result();
		$data = [
			'lokasi' => $lokasi,
			'getLokasi' => $getLokasi,
			'kandang' => $kandang,
		];
		$this->load->view('pages/pengelolaan/kandang', $data, FALSE);
	}

}

/* End of file Pengelolaan.php */
/* Location: ./application/controllers/Pengelolaan.php */