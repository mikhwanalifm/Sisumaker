<?php

class Jenis extends CI_Controller{
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
		$data['jenis'] = $this->jenis_model->tampil_data('tb_jenis')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/jenis_surat',$data);
		$this->load->view('template_admins/footer');
	}
	public function tambah_jenis()
	{	$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(

			 'id_user' => $data->id_user,
         );
         $config['total_rows'] = $this->jenis_model->tampil_data('tb_jenis')->num_rows();
         $data['id_jenissurat'] = "JS".str_pad($config['total_rows']+1, 3 ,0,STR_PAD_LEFT);
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/jenis_form',$data);
		$this->load->view('template_admins/footer');
	}

	public function tambah_jenis_aksi()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE){
			$this->tambah_jenis();
		}else{

            $kode_jenissurat 					= $this->input->post('kode_jenissurat');
 			$nama_jenissurat 					= $this->input->post('nama_jenissurat');
 			$id_user 							= $this->input->post('id_user');

			 $sql = $this->db->query("SELECT count(nama_jenissurat) as surat FROM tb_jenis where nama_jenissurat='$nama_jenissurat'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->surat;
			 }
			 
			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Jenis Surat Sudah Ada!');
			 redirect('administrator/jenis');
			 }


			 else {
 			$data = array(
 				'kode_jenissurat' 		=> $kode_jenissurat,
 				'nama_jenissurat' 		=> $nama_jenissurat,
 				'id_user' 				=> $id_user,
 
 			);
			$this->jenis_model->insert_data($data,'tb_jenis');
			/* $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Ditambahkan! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>'); */
			$this->session->set_flashdata('pesan',' Jenis Surat Berhasil Ditambahkan');
			redirect('administrator/jenis');
		}
	}

			
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_jenissurat','kode_jenissurat','required',['required' => 'Nama wajib di isi!']);
		$this->form_validation->set_rules('nama_jenissurat','nama_jenissurat','required',['required' => 'Username wajib di isi!']);
		$this->form_validation->set_rules('id_user','id_user','required',['required' => 'Password wajib di isi!']);
		
	}

	public function update($id)
	{
		$where = array('id_jenissurat' => $id);
		$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
		 	//'id_jenissurat' 	=> set_value('id_jenissurat'),
		 	//'kode_jenissurat' 		=> set_value('kode_jenissurat'),
			 //'nama_jenissurat' 		=> set_value('nama_jenissurat'),
			 'id_user' => $data->id_user,
		 	//'id_user' 		=> set_value('id_user'),
         );
		$data['jenis'] = $this->jenis_model->edit_data($where,'tb_jenis')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/jenis_update',$data);
		$this->load->view('template_admins/footer');
	}

	public function update_aksi()
	{
		$id 					= $this->input->post('id_jenissurat');
		$kode_jenissurat 		= $this->input->post('kode_jenissurat');
		$nama_jenissurat 		= $this->input->post('nama_jenissurat');
		$id_user 				= $this->input->post('id_user');

		$sql = $this->db->query("SELECT count(nama_jenissurat) as surat FROM tb_jenis where nama_jenissurat='$nama_jenissurat'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->surat;
			 }
			 
			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Jenis Surat Sudah Ada!');
			 redirect('administrator/jenis');
			 }


			 else {
		$data = array(
			'kode_jenissurat' => $kode_jenissurat,
			'nama_jenissurat' => $nama_jenissurat,
			'id_user' => $id_user,


		);

		$where = array(

			'id_jenissurat' => $id,
		);

		$this->jenis_model->update_data($where,$data,'tb_jenis');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Diubah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Jenis Surat Berhasil Diubah!');
		redirect('administrator/jenis');
			 }
	}

	public function hapus($id)
	{
		$where = array('id_jenissurat' => $id,);
		$this->jenis_model->hapus_data($where,'tb_jenis');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Data User Berhasil Dihapus! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Jenis Surat Berhasil Dihapus');
		redirect('administrator/jenis');
	}
}
?>