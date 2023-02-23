<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function get($folder=null, $file=null, $id=null, $id1=null)
	{
		if($folder&&$file){
			$data = [
				'id' => $id,
				'id1' => $id1,
			];
			$this->load->view('forms/'.$folder.'/'.$file, $data, FALSE);
		}
	}

	function _edit_peternak_kandang($post)
	{
		$this->form_validation->set_rules('peternak', 'Peternak', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			?> <div class="alert-danger alert"><?= validation_errors() ?></div> <?php
		} else {
			$object = [
				'uniq_peternak' => $this->input->post('peternak'),
				'status' => $this->input->post('status'),
			];
			$this->db->where('uniq', $this->input->post('id'));
			$this->db->update('peternak_kandang', $object);
			if($this->db->affected_rows()>>0){
				?> <div class="p-3 alert-success">Berhasil memperbaharui data</div> <?php
			}else{
				?> <div class="p-3 alert-danger">Gagal memperbaharui data</div> <?php
			}
		}
	}

	function hapus_peternak_kandang($id=null, $id1=null)
	{
		echo $id;
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */