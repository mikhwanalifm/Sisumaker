<?php

class Rak extends CI_Controller{
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
		$data['rak'] = $this->db->query("SELECT * FROM tb_rak ORDER BY id_file ASC")->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/rak',$data);
		$this->load->view('template_admins/footer');
	}
	public function tambah_rak()
	{	$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(

			 'id_user' => $data->id_user,
         );
		 $config['total_rows'] = $this->rak_model->tampil_data('tb_rak')->num_rows();
		
         $data['id_file'] = ($config['total_rows']+1);
         
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/rak_form',$data);
		$this->load->view('template_admins/footer');
	}

	public function tambah_rak_aksi()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE){
			$this->tambah_rak();
		}else{

            $id_file 					= $this->input->post('id_file');
            $tahun 					    = $this->input->post('tahun');
            $nama_rak 					= $this->input->post('nama_rak');
            $id_lemari 					= $this->input->post('id_lemari');
 			$id_user 					= $this->input->post('id_user');

			 $sql = $this->db->query("SELECT count(id_file) as kode FROM tb_rak where id_file='$id_file'")->result();
			 $cek_akun;
			 foreach($sql as $ss){
				 $cek_akun = $ss->kode;
			 }

			if ($cek_akun > 0) {
 
			$this->session->set_flashdata('pesan',' Kode Rak Sudah Ada!');
			 redirect('administrator/rak');
			 }


			 else {
                 
 			$data = array(
 				'id_file' 		=> $id_file,
                'tahun' 		=> $tahun,
                'nama_rak' 		=> $nama_rak,
                'id_lemari' 	=> $id_lemari,
 				'id_user' 		=> $id_user,
 
 			);
			$this->rak_model->insert_data($data,'tb_rak');
			/* $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Ditambahkan! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>'); */
			$this->session->set_flashdata('pesan',' Kode Rak Berhasil Ditambahkan');
			redirect('administrator/rak');
		}
	}

			
	}

	public function _rules()
	{
		$this->form_validation->set_rules('id_file','id_file','required',['required' => 'Nama wajib di isi!']);
        $this->form_validation->set_rules('tahun','tahun','required',['required' => 'Username wajib di isi!']);
        $this->form_validation->set_rules('id_lemari','id_lemari','required',['required' => 'Username wajib di isi!']);
		$this->form_validation->set_rules('id_user','id_user','required',['required' => 'Password wajib di isi!']);
		$this->form_validation->set_rules('nama_rak','nama_rak','required',['required' => 'Password wajib di isi!']);
	}

	public function update($id)
	{
		$where = array('id_rak' => $id);
		$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
		 	//'id_jenissurat' 	=> set_value('id_jenissurat'),
		 	//'kode_jenissurat' 		=> set_value('kode_jenissurat'),
			 //'nama_jenissurat' 		=> set_value('nama_jenissurat'),
			 'id_user' => $data->id_user,
		 	//'id_user' 		=> set_value('id_user'),
         );
		$data['rak'] = $this->rak_model->edit_data($where,'tb_rak')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/rak_update',$data);
		$this->load->view('template_admins/footer');
	}

	public function update_aksi()
	{
		$id 				= $this->input->post('id_rak');
		$id_file 		    = $this->input->post('id_file');
        $tahun 		        = $this->input->post('tahun');
        $nama_rak 		        = $this->input->post('nama_rak');
        $id_lemari 		    = $this->input->post('id_lemari');
		$id_user 			= $this->input->post('id_user');
		
		$data = array(
            'nama_rak' => $nama_rak,
            'id_file' => $id_file,
			'id_user' => $id_user,
			'tahun' => $tahun,
			'id_lemari' => $id_lemari,
		);

		$where = array(
			'id_rak' => $id,
		);

		$this->rak_model->update_data($where,$data,'tb_rak');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Diubah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Kode Rak Berhasil Diubah!');
		redirect('administrator/rak');
			 
	}

	public function hapus($id)
	{
		$where = array('id_rak' => $id,);
		$this->rak_model->hapus_data($where,'tb_rak');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Data User Berhasil Dihapus! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Kode Rak Berhasil Dihapus');
		redirect('administrator/rak');
	}
	public function fill_rak(){
		$id_lemari=$this->input->post('id');
        $where=array(
			'id_lemari'=>$id_lemari,
		);
		$data_lemari=$this->lemari_model->edit_data($where,'tb_lemari')->row();
		$huruf=$data_lemari->kode_lemari;
		$data_rak=$this->rak_model->edit_data($where,'tb_rak')->result();
		if(empty($data_rak)){
            $huruf=$huruf.'1';
		}
		else{
			$huruf=$huruf.(count($data_rak)+1);
		}
		echo json_encode($huruf);
	}
}
?>
