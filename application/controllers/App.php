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
			$this->dashboard();
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
		$data = [
			'title' => 'Dashboard',
			'dataget' => base_url('app/dashboard_data'),
			'dataid' => null
		];
		$this->load->view('template', $data, FALSE);
	}

	function dashboard_data()
	{
		echo "<pre>";
		print_r ($this->session->all_userdata());
		echo "</pre>";
	}
}
