<?php

class Lemari extends CI_Controller{
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
		$data['lemari'] = $this->lemari_model->tampil_data('tb_lemari')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/lemari',$data);
		$this->load->view('template_admins/footer');
	}
	public function tambah_lemari()
	{	$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(

			 'id_user' => $data->id_user,
         );
         $config['total_rows'] = $this->lemari_model->tampil_data('tb_lemari')->num_rows();
         $data['kode_lemari'] = chr(($config['total_rows']+65));
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/lemari_form',$data);
		$this->load->view('template_admins/footer');
	}

	public function tambah_lemari_aksi()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE){
			$this->tambah_lemari();
		}else{

            $kode_lemari 					= $this->input->post('kode_lemari');
 			$keterangan 					= $this->input->post('keterangan');
 			$id_user 							= $this->input->post('id_user');

			 $sql = $this->db->query("SELECT count(keterangan) as kode FROM tb_lemari where keterangan='$keterangan'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->kode;
			 }
			 
			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Kode Lemari Sudah Terpakai!');
			 redirect('administrator/lemari');
			 }


			 else {
 			$data = array(
 				'kode_lemari' 		=> $kode_lemari,
 				'keterangan' 		=> $keterangan,
 				'id_user' 				=> $id_user,
 
 			);
			$this->lemari_model->insert_data($data,'tb_lemari');
			/* $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Ditambahkan! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>'); */
			$this->session->set_flashdata('pesan',' Kode Lemari Berhasil Ditambahkan');
			redirect('administrator/lemari');
		}
	}

			
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kode_lemari','kode_lemari','required',['required' => 'Nama wajib di isi!']);
		$this->form_validation->set_rules('keterangan','keterangan','required',['required' => 'Username wajib di isi!']);
		$this->form_validation->set_rules('id_user','id_user','required',['required' => 'Password wajib di isi!']);
		
	}

	public function update($id)
	{
		$where = array('id_lemari' => $id);
		$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
		 	//'id_jenissurat' 	=> set_value('id_jenissurat'),
		 	//'kode_jenissurat' 		=> set_value('kode_jenissurat'),
			 //'nama_jenissurat' 		=> set_value('nama_jenissurat'),
			 'id_user' => $data->id_user,
		 	//'id_user' 		=> set_value('id_user'),
         );
		$data['lemari'] = $this->lemari_model->edit_data($where,'tb_lemari')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/lemari_update',$data);
		$this->load->view('template_admins/footer');
	}

	public function update_aksi()
	{
		$id 				= $this->input->post('id_lemari');
		$kode_lemari 		= $this->input->post('kode_lemari');
		$keterangan 		= $this->input->post('keterangan');
		$id_user 				= $this->input->post('id_user');
		
		$sql = $this->db->query("SELECT count(keterangan) as kode FROM tb_lemari where keterangan='$keterangan'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->kode;
			 }
			 
			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Kode Lemari Sudah Terpakai!');
			 redirect('administrator/lemari');
			 }


			 else {
		$data = array(
			'kode_lemari' => $kode_lemari,
			'keterangan' => $keterangan,
			'id_user' => $id_user,


		);

		$where = array(

			'id_lemari' => $id,
		);

		$this->lemari_model->update_data($where,$data,'tb_lemari');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Diubah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Kode Lemari Berhasil Diubah!');
		redirect('administrator/lemari');
			 }
	}

	public function hapus($id)
	{
		$where = array('id_lemari' => $id,);
		$this->lemari_model->hapus_data($where,'tb_lemari');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Data User Berhasil Dihapus! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Kode Lemari Berhasil Dihapus');
		redirect('administrator/lemari');
	}
}
?>