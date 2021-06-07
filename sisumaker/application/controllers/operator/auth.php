<?php

class Auth extends CI_Controller{
	public function index()
	{
		//$this->load->view('template_administrator/header');
		// $this->load->view('operator/login');
		//$this->load->view('template_administrator/footer');
	}

	public function logout()
	{
        $this->session->sess_destroy();
		// redirect('operator/auth');
		redirect('login');
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username','username','required',['required' => 'Username wajib di isi!']);
		$this->form_validation->set_rules('password','password','required',['required' => 'Password wajib di isi!']);
		if ($this->form_validation->run() == FALSE) {

		$this->load->view('template_administrator/header');
		$this->load->view('operator/login');
		$this->load->view('template_administrator/footer');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $username;
			$pass = md5($password);

			$cek = $this->login_model->cek_login($user,$pass);
			if ($cek->num_rows()>0) {
				foreach ($cek->result() as $ck) {
					$sess_data['username'] = $ck->username;
					$sess_data['email'] = $ck->email;
					$sess_data['level'] = $ck->level;

					$this->session->set_userdata($sess_data);
				}
				if ($sess_data['level']=='operator') {
					$_SESSION['level']= 'operator';
					redirect('operator/dashboard');
				}elseif($sess_data['level']=='admin'){
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Anda Bukan Operator! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');
					redirect('operator/auth');

				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Username atau Password Salah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');
					redirect('operator/auth');
				}
				
				# code...
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Username atau Password Salah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');
					redirect('operator/auth');
			}

		}
	}
}

?>