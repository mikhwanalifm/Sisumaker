<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent:: __construct();

		if(!isset($this->session->userdata['username'])){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Anda Belum Login! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');
			// redirect('administrator/auth');
			redirect('login');
		}
	}
	public function index()
	{
		$data = $this->user_model->ambil_data($this->session->userdata['username']);

		$data = array(
			'nama_lengkap' => $data->nama_lengkap,
			'username' => $data->username,
			'level'=> $data->level,
		);
		$data['hitung_user'] = $this->user_model->count_table("tb_user");
		$data['hitung_sm'] = $this->user_model->count_table("tb_suratmasuk");
		$data['hitung_sk'] = $this->user_model->count_table("tb_suratkeluar");
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/dashboard',$data);
		$this->load->view('template_admins/footer');		
	}	
}