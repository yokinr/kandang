<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$cekUser = $this->db->get_where('users', ['hak_akses'=>1])->result();
		if(!$cekUser){
			$object = [
				'uniq' => uniqid(),
				'username' => 'admin@admin.id',
				'password' => password_hash('123456', PASSWORD_DEFAULT),
				'nama' => 'Administrator',
				'hak_akses' => 1,
				'status' => 1,
			];
			$this->db->insert('users', $object);
		}
	}

	public function index()
	{
		if(!$this->session->userdata('username')&&!$this->session->userdata('password')&&!$this->session->userdata('hak_akses')){
			$this->login();
		}else{
			$data = [
				'title' => 'Dashboard',
				'dataget' => base_url('app/dashboard'),
				'dataid' => null
			];
			$this->load->view('template', $data, FALSE);
		}
	}

	function login()
	{
		$data = [
			'title' => 'Login'
		];
		$this->load->view('auth/login', $data, FALSE);
	}

	function dashboard()
	{
		$this->load->model('m_data_utama', 'data_utama');
		$data = [
			'title' => "Dahboard",
			'lokasi' => $this->data_utama->lokasi(),
			'kandang' => $this->data_utama->kandang(),
			'peternak' => $this->data_utama->peternak(),
			'pelanggan' => $this->data_utama->pelanggan(),
			'pengguna' => $this->data_utama->pengguna(),
		];
		$this->load->view('pages/dashboard', $data, FALSE);
	}
}
