<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function get($page=null, $aksi=null, $id=null)
	{
		if($page){
			$data = [
				'id' => $id,
			];
			$this->load->view('forms/'.$page.'/'.$aksi, $data, FALSE);
		}
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */