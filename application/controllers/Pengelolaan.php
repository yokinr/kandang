<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaan extends CI_Controller {

	function page($page=null, $id=null)
	{
		$data = [
			'title' => "<i class='fas fa-home'></i> ".ucwords(str_replace('_', ' ', $page)),
			'dataget' => base_url('pengelolaan/'.$page),
			'dataid' => $id,
		];
		$this->load->view('template', $data, FALSE);
	}

	function kandang()
	{
		echo "Kandang";
	}

}

/* End of file Pengelolaan.php */
/* Location: ./application/controllers/Pengelolaan.php */