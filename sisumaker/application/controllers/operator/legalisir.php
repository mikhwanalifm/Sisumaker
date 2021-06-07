<?php

class Legalisir extends CI_Controller{
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
		// $data['legalisir'] = $this->legalisir_model->tampil_data('tb_legalisir')->result();
		$data['legalisir'] = $this->db->query("SELECT * FROM tb_legalisir ORDER BY tgl_keluar ASC")->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/legalisir',$data);
		$this->load->view('template_admins/footer');
	}
	public function tambah_legalisir()
	{	$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(

			 'id_user' => $data->id_user,
         );
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/legalisir_form',$data);
		$this->load->view('template_admins/footer');
	}

	public function tambah_legalisir_aksi()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE){
			$this->tambah_legalisir();
		}else{

            $nama 					= $this->input->post('nama');
            $keterangan 			= $this->input->post('keterangan');
            $noreg 					= $this->input->post('noreg');
            $tgl_keluar 			= $this->input->post('tgl_keluar');
            $alamat 			    = $this->input->post('alamat');
 			$id_user 				= $this->input->post('id_user');

			 $sql = $this->db->query("SELECT count(noreg) as kode FROM tb_legalisir where noreg='$noreg'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->kode;
			 }
			 
			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Nomor Surat Sudah Terpakai!');
			 redirect('operator/legalisir');
			 }


			 else {
 			$data = array(
 				'nama' 		        => $nama,
                'keterangan' 		=> $keterangan,
                'noreg' 		    => $noreg,
                'tgl_keluar' 		=> $tgl_keluar,
                'alamat' 		    => $alamat,
 				'id_user' 			=> $id_user,
 
 			);
			$this->legalisir_model->insert_data($data,'tb_legalisir');
			/* $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Ditambahkan! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>'); */
			$this->session->set_flashdata('pesan',' Agenda Legalisir Berhasil Ditambahkan');
			redirect('operator/legalisir');
		}
	}

			
	}

	public function _rules()
	{
        $this->form_validation->set_rules('nama','nama','required',['required' => 'Nama wajib di isi!']);
        $this->form_validation->set_rules('noreg','noreg','required',['required' => 'Nama wajib di isi!']);
        $this->form_validation->set_rules('tgl_keluar','tgl_keluar','required',['required' => 'Nama wajib di isi!']);
        $this->form_validation->set_rules('alamat','alamat','required',['required' => 'Nama wajib di isi!']);
		$this->form_validation->set_rules('keterangan','keterangan','required',['required' => 'Username wajib di isi!']);
		$this->form_validation->set_rules('id_user','id_user','required',['required' => 'Password wajib di isi!']);
		
	}

	public function update($id)
	{
		$where = array('id_legalisir' => $id);
		$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
		 	//'id_jenissurat' 	=> set_value('id_jenissurat'),
		 	//'kode_jenissurat' 		=> set_value('kode_jenissurat'),
			 //'nama_jenissurat' 		=> set_value('nama_jenissurat'),
			 'id_user' => $data->id_user,
		 	//'id_user' 		=> set_value('id_user'),
         );
		$data['legalisir'] = $this->legalisir_model->edit_data($where,'tb_legalisir')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/legalisir_update',$data);
		$this->load->view('template_admins/footer');
	}

	public function update_aksi()
	{
		$id 				= $this->input->post('id_legalisir');
		$nama 		        = $this->input->post('nama');
        $keterangan 		= $this->input->post('keterangan');
        $tgl_keluar 		= $this->input->post('tgl_keluar');
        $noreg 		        = $this->input->post('noreg');
        $alamat 		        = $this->input->post('alamat');
		$id_user 			= $this->input->post('id_user');
		
		$sql = $this->db->query("SELECT count(noreg) as kode FROM tb_legalisir where noreg='$noreg'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->kode;
			 }
			 
			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Kode Surat Sudah Terpakai!');
			 redirect('operator/legalisir');
			 }


			 else {
		$data = array(
            'nama' => $nama,
            'noreg' => $noreg,
            'tgl_keluar' => $tgl_keluar,
            'alamat' => $alamat,
			'keterangan' => $keterangan,
			'id_user' => $id_user,


		);

		$where = array(

			'id_legalisir' => $id,
		);

		$this->legalisir_model->update_data($where,$data,'tb_legalisir');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Diubah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Agenda Legalisir Berhasil Diubah!');
		redirect('operator/legalisir');
			 }
	}

	public function hapus($id)
	{
		$where = array('id_legalisir' => $id,);
		$this->legalisir_model->hapus_data($where,'tb_legalisir');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Data User Berhasil Dihapus! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Agenda Legalisir Berhasil Dihapus');
		redirect('operator/legalisir');
	}
}
?>