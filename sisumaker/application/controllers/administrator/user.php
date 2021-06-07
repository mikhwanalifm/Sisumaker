<?php

class User extends CI_Controller{
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
		$data['users'] = $this->user_model->tampil_data('tb_user')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/daftar_user',$data);
		$this->load->view('template_admins/footer');
	}
	public function tambah_users()
	{
		 $data = array(
		 	'nama_lengkap' 	=> set_value('nama_lengkap'),
		 	'username' 		=> set_value('username'),
		 	'password' 		=> set_value('password'),
		 	'email' 		=> set_value('email'),
		 	'no_hp' 		=> set_value('no_hp'),
		 	'level' 		=> set_value('level'),
		 	'blokir' 		=> set_value('blokir'),
		 );
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/user_form',$data);
		$this->load->view('template_admins/footer');
	}

	public function tambah_users_aksi()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE){
			$this->tambah_users();
		}else{

			$nama_lengkap 	= $this->input->post('nama_lengkap');
			$username 		= $this->input->post('username');
			$password 		= md5($this->input->post('password'));
			$email 			= $this->input->post('email');
			$no_hp 			= $this->input->post('no_hp');
			$level 			= $this->input->post('level');
			$blokir 		= $this->input->post('blokir');
			$id_sessions 	= md5($this->input->post('id_$id_sessions'));

			$sql = $this->db->query("SELECT count(username) as akun FROM tb_user where username='$username'")->result();
			$cek_akun;
			foreach($sql as $ss){
				$cek_akun = $ss->akun;
			}
			
		   if ($cek_akun > 0) {

		   $this->session->set_flashdata('pesan',' Pengguna Sudah Ada!');
			redirect('administrator/user');
			}
		   else{
			   $data = array(
				   'nama_lengkap' 	=> $nama_lengkap,
				   'username' 		=> $username,
				   'password' 		=> $password,
				   'email' 		=> $email,
				   'no_hp' 		=> $no_hp,
				   'level' 		=> $level,
				   'blokir' 		=> $blokir,
				   'id_sessions'	=> $id_sessions,
			   );
			   $this->user_model->insert_data($data,'tb_user');
			   /* $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
							 Data User Berhasil Ditambahkan! 
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						   <span aria-hidden="true">&times;</span>
							 </button>
						   </div>'); */
			   $this->session->set_flashdata('pesan',' Pengguna Berhasil Ditambahkan!');
			   redirect('administrator/user');
		   }
		}	
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_lengkap','nama_lengkap','required',['required' => 'Nama wajib di isi!']);
		$this->form_validation->set_rules('username','username','required',['required' => 'Username wajib di isi!']);
		$this->form_validation->set_rules('password','password','required',['required' => 'Password wajib di isi!']);
		$this->form_validation->set_rules('email','email','required',['required' => 'Email wajib di isi!']);
		$this->form_validation->set_rules('no_hp','no_hp','required',['required' => 'Nomor Handphone wajib di isi!']);
		$this->form_validation->set_rules('level','level','required',['required' => 'Level wajib di isi!']);
		$this->form_validation->set_rules('blokir','blokir','required',['required' => 'Blokir wajib di isi!']);
	}

	public function update($id)
	{
		$where = array('id_user' => $id);
		
		$data['users'] = $this->user_model->edit_data($where,'tb_user')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/user_update',$data);
		$this->load->view('template_admins/footer');
	}

	public function update_aksi()
	{
		$id 			= $this->input->post('id_user');
		$nama_lengkap 	= $this->input->post('nama_lengkap');
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$email 			= $this->input->post('email');
		$no_hp 			= $this->input->post('no_hp');
		$level 			= $this->input->post('level');
		$blokir 		= $this->input->post('blokir');
		$id_sessions 	= md5($this->input->post('id_sessions'));

		if($password == '0'){
			$data = array(
				'nama_lengkap' => $nama_lengkap,
				'username' => $username,
				// 'password' => $password,
				'email' => $email,
				'no_hp' => $no_hp,
				'level' => $level,
				'blokir' => $blokir,
				'id_sessions' => $id_sessions,
	
			);
		}
		else{
			$data = array(
				'nama_lengkap' => $nama_lengkap,
				'username' => $username,
				'password' => md5($password),
				'email' => $email,
				'no_hp' => $no_hp,
				'level' => $level,
				'blokir' => $blokir,
				'id_sessions' => $id_sessions,
	
			);
		}

		$where = array(

			'id_user' => $id,
		);

		$this->user_model->update_data($where,$data,'tb_user');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Diubah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Pengguna Berhasil Diubah!');
		redirect('administrator/user');
	
	}

	public function hapus($id)
	{
		$where = array('id_user' => $id,);
		$this->user_model->hapus_data($where,'tb_user');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Data User Berhasil Dihapus! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Pengguna Berhasil Dihapus!');
		redirect('administrator/user');
	}

	public function change_pass()
	{
		// $where = array('id_user' => $id);
		
		// $data['users'] = $this->user_model->edit_data($where,'tb_user')->result();
		$this->form_validation->set_rules('old_pass','Old Password','trim|required|max_length[150]');
		$this->form_validation->set_rules('new_pass','New Password','trim|required|max_length[150]');
		$this->form_validation->set_rules('rep_new_pass','Repeat New Passwword','trim|required|max_length[150]|matches[new_pass]');
		if($this->form_validation->run()== false)  
			{
				$this->load->view('template_admins/header');
				$this->load->view('template_admins/sidebar');
				$this->load->view('administrator/user_pass');
				$this->load->view('template_admins/footer');
			}
			else{
				$data = array(
					'password' => md5($this->input->post('new_pass')),
				);
				$result = $this->user_model->check_old_password($this->session->userdata('id_user'),$data['password']);
				var_dump($result);
			}
		
	}
}
?>