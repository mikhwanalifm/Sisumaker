<?php

class Spt extends CI_Controller{
	function __construct(){
		parent:: __construct();

		if(!isset($this->session->userdata['username'])){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Anda Belum Login! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');
			// redirect('operator/auth');
			redirect('login');
		}
	}

	public function index()
	{
		// $data['spt'] = $this->spt_model->tampil_data('tb_spt')->result();
		$data['spt'] = $this->db->query("SELECT * FROM tb_spt ORDER BY tgl_keluar ASC")->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/spt',$data);
		$this->load->view('template_admins/footer');
	}
	public function tambah_spt()
	{	$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(

			 'id_user' => $data->id_user,
         );
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/spt_form',$data);
		$this->load->view('template_admins/footer');
	}

	public function tambah_spt_aksi()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE){
			$this->tambah_spt();
		}else{

            $tgl_keluar 		= $this->input->post('tgl_keluar');
            $nosurat 			= $this->input->post('nosurat');
            $tmt 				= $this->input->post('tmt');
            $pengelola 			= $this->input->post('pengelola');
            $keterangan 		= $this->input->post('keterangan');
 			$id_user 			= $this->input->post('id_user');

			 $sql = $this->db->query("SELECT count(nosurat) as kode FROM tb_spt where nosurat='$nosurat'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->kode;
			 }
			 
			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Nomor Surat Sudah Terpakai!');
			 redirect('operator/spt');
			 }


			 else {
 			$data = array(
 				'tgl_keluar' 	=> $tgl_keluar,
                'nosurat' 		=> $nosurat,
                'tmt' 		    => $tmt,
                'pengelola' 	=> $pengelola,
                'keterangan'    => $keterangan,
 				'id_user' 		=> $id_user,
 
 			);
			$this->spt_model->insert_data($data,'tb_spt');
			/* $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Ditambahkan! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>'); */
			$this->session->set_flashdata('pesan',' Agenda Surat Tugas Berhasil Ditambahkan');
			redirect('operator/spt');
		}
	}

			
	}

	public function _rules()
	{
        $this->form_validation->set_rules('tgl_keluar','tgl_keluar','required',['required' => 'Nama wajib di isi!']);
        $this->form_validation->set_rules('nosurat','nosurat','required',['required' => 'Nama wajib di isi!']);
        $this->form_validation->set_rules('tmt','tmt','required',['required' => 'Nama wajib di isi!']);
        $this->form_validation->set_rules('pengelola','pengelola','required',['required' => 'Nama wajib di isi!']);
		$this->form_validation->set_rules('keterangan','keterangan','required',['required' => 'Username wajib di isi!']);
		$this->form_validation->set_rules('id_user','id_user','required',['required' => 'Password wajib di isi!']);
		
	}

	public function update($id)
	{
		$where = array('id_spt' => $id);
		$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
		 	//'id_jenissurat' 	=> set_value('id_jenissurat'),
		 	//'kode_jenissurat' 		=> set_value('kode_jenissurat'),
			 //'nama_jenissurat' 		=> set_value('nama_jenissurat'),
			 'id_user' => $data->id_user,
		 	//'id_user' 		=> set_value('id_user'),
         );
		$data['spt'] = $this->spt_model->edit_data($where,'tb_spt')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/spt_update',$data);
		$this->load->view('template_admins/footer');
	}

	public function update_aksi()
	{
		$id 			= $this->input->post('id_spt');
		$tgl_keluar 	= $this->input->post('tgl_keluar');
        $nosurat 		= $this->input->post('nosurat');
        $tmt 		    = $this->input->post('tmt');
        $pengelola 		= $this->input->post('pengelola');
        $keterangan     = $this->input->post('keterangan');
		$id_user 		= $this->input->post('id_user');
		
		$sql = $this->db->query("SELECT count(nosurat) as kode FROM tb_spt where nosurat='$nosurat'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->kode;
			 }
			 
			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Kode Surat Sudah Terpakai!');
			 redirect('operator/spt');
			 }


			 else {
		$data = array(
            'tgl_keluar' => $tgl_keluar,
            'nosurat' => $nosurat,
            'tmt' => $tmt,
            'pengelola' => $pengelola,
			'keterangan' => $keterangan,
			'id_user' => $id_user,


		);

		$where = array(

			'id_spt' => $id,
		);

		$this->spt_model->update_data($where,$data,'tb_spt');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Diubah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Agenda Surat Tugas Berhasil Diubah!');
		redirect('operator/spt');
			 }
	}

	public function hapus($id)
	{
		$where = array('id_spt' => $id,);
		$this->spt_model->hapus_data($where,'tb_spt');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Data User Berhasil Dihapus! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Agenda Surat Tugas Berhasil Dihapus');
		redirect('operator/spt');
	}
}
?>