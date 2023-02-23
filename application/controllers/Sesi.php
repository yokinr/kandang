<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi extends CI_Controller {

	public function lokasi()
	{
		if($this->input->get('lokasi')){
			$array = array(
				'lokasi' => $this->input->get('lokasi'),
			);
			
			$this->session->set_userdata( $array );
		}
	}

}

/* End of file Sesi.php */
/* Location: ./application/controllers/Sesi.php */