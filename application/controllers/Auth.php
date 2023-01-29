<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$this->form_validation->set_rules('inputEmail', 'Email', 'trim|required');
		$this->form_validation->set_rules('inputPassword', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo "<div class='alert alert-danger'>".validation_errors()."</div>";
		} else {
			$cekUser = $this->db->get_where('users', ['username'=>$this->input->post('inputEmail')])->row_array();
			if($cekUser){
				$pass = $this->input->post('inputPassword');
				if(password_verify($pass, $cekUser['password'])){					
					$this->session->set_userdata( $cekUser );
					echo "<pre>";
					print_r ($this->session->all_userdata());
					echo "</pre>";
					echo '<script>window.location.href = "app";</script>';
				}else{
					echo "<div class='alert alert-danger'>Kombinasi Email dan Password tidak cocok</div>";
				}
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('.','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */