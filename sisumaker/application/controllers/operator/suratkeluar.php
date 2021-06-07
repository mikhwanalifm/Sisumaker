<?php

class Suratkeluar extends CI_Controller{
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
		$data['suratkeluar'] = $this->sk_model->tampil_data('tb_suratkeluar')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/suratkeluar',$data);
		$this->load->view('template_admins/footer');
	}
	public function tambah_sk()
	{	$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
			 'id_user' => $data->id_user,
         );
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/sk_form',$data);
		$this->load->view('template_admins/footer');
	}

	public function tambah_sk_aksi()
	{
		$this->_rules();
		if($this->form_validation->run()==FALSE){
			$this->tambah_sk();
		}else{

            $pengirim 		    = $this->input->post('pengirim');
            $tujuan 			= $this->input->post('tujuan');
			$tgl_keluar 		= $this->input->post('tgl_keluar');
			$perihal 			= $this->input->post('perihal');
            $nosurat 	        = $this->input->post('nosurat');
            $ringkasan 		    = $this->input->post('ringkasan');
            $keterangan  	    = $this->input->post('keterangan');
            $id_jenissurat 		= $this->input->post('id_jenissurat');
            $id_user 	        = $this->input->post('id_user');
            $id_suratmasuk 		= $this->input->post('id_suratmasuk');
            $id_rak  	    	= $this->input->post('id_rak');
			// $file 				= $_FILES['file'];
			$file;

			if(empty($_FILES['file']['name'])){
				$file='-';
			} else{
				$config['upload_path'] = './assets4/uploads/suratkeluar';
				$config['allowed_types'] = 'pdf|jpeg|png|jpg';
				$config['file_name'] = "SK_".$tgl_keluar."_".$tujuan;

				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('file')){
					echo "Gagal upload"; die();
				}else{
					$file=$this->upload->data('file_name');
				}
			}
			 $sql = $this->db->query("SELECT count(nosurat) as surat FROM tb_suratkeluar where nosurat='$nosurat'")->result();
			 $cek_surat;
			 foreach($sql as $ss){
				 $cek_surat = $ss->surat;
			 }
			 
			if ($cek_surat > 0) {
 
			$this->session->set_flashdata('pesan','  Gagal, Surat Sudah Ada!');
			 redirect('operator/suratkeluar');
			 }


			else {

 			$data = array(

                'tujuan' 		    => $tujuan,
                'tgl_keluar' 	    => $tgl_keluar,
				'nosurat'       	=> $nosurat,
				'perihal'       	=> $perihal,
				'id_jenissurat' 	=> $id_jenissurat,
				'ringkasan' 		=> $ringkasan,
                'id_rak' 	    	=> $id_rak,
                'keterangan' 		=> $keterangan,
                'id_user' 			=> $id_user,
                'id_suratmasuk' 	=> $id_suratmasuk,
				'file' 	        	=> $file,

 			);
			$this->sk_model->insert_data($data,'tb_suratkeluar');

			$this->session->set_flashdata('pesan',' Surat Keluar Berhasil Ditambahkan');
			redirect('operator/suratkeluar');
		}
	}
	}
			
	

	public function _rules()
	{
		
		$this->form_validation->set_rules('tujuan','tujuan','required',['required' => 'Nama Lengkap wajib di isi!']);
		$this->form_validation->set_rules('tgl_keluar','tgl_keluar','required',['required' => 'NPM wajib di isi!']);
		$this->form_validation->set_rules('nosurat','nosurat','required',['required' => 'Barang wajib di isi!']);
		$this->form_validation->set_rules('id_jenissurat','id_jenissurat','required',['required' => 'Jumlah wajib di isi!']);
		$this->form_validation->set_rules('ringkasan','ringkasan','required',['required' => 'Status wajib di isi!']);
		$this->form_validation->set_rules('id_suratmasuk','id_suratmasuk','required',['required' => 'Nama Lengkap wajib di isi!']);
		//$this->form_validation->set_rules('disposisi','disposisi','required',['required' => 'NPM wajib di isi!']);
		$this->form_validation->set_rules('id_rak','id_rak','required',['required' => 'Program Studi di isi!']);
		//$this->form_validation->set_rules('keterangan','keterangan','required',['required' => 'Barang wajib di isi!']);
		$this->form_validation->set_rules('id_user','id_user','required',['required' => 'Jumlah wajib di isi!']);
		$this->form_validation->set_rules('perihal','perihal','required',['required' => 'Jumlah wajib di isi!']);

	}

	public function update($id)
	{
		$where = array('id_suratkeluar' => $id);
		$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
		 	//'id_jenissurat' 	=> set_value('id_jenissurat'),
		 	//'kode_jenissurat' 		=> set_value('kode_jenissurat'),
			 //'nama_jenissurat' 		=> set_value('nama_jenissurat'),
			 'id_user' => $data->id_user,
		 	//'id_user' 		=> set_value('id_user'),
         );
		$data['suratkeluar'] = $this->sm_model->edit_data($where,'tb_suratkeluar')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebarr');
		$this->load->view('operator/sk_update',$data);
		$this->load->view('template_admins/footer');
	}

	public function update_aksi()
	{
		$id 					= $this->input->post('id_suratkeluar');
		$tgl_keluar 			= $this->input->post('tgl_keluar');
		$nosurat 				= $this->input->post('nosurat');
		$ringkasan 				= $this->input->post('ringkasan');
		$perihal 				= $this->input->post('perihal');
		$id_suratmasuk 			= $this->input->post('id_suratmasuk');
		$tujuan 				= $this->input->post('tujuan');
		$keterangan 			= $this->input->post('keterangan');
		$id_jenissurat 			= $this->input->post('id_jenissurat');
		$id_rak 				= $this->input->post('id_rak');
		$id_user 				= $this->input->post('id_user');
		//$file 				= $_FILES['file'];
		$up2 = $this->input->post('upload2');
		if($_FILES['file']['name']!='' && $up2!='-'){
			if(unlink($up2)) {
			   echo 'deleted successfully';
			 }
			 else {
			   echo 'errors occured';
		  }
		  
		  }
		$file 					= $_FILES['file']['name'];
		if(!empty($file)){
			$config['upload_path'] 		= './assets4/uploads/suratkeluar';
			$config['allowed_types'] 	= 'pdf|jpeg|jpg|png';
			$config['file_name'] 		= "SK_".$tgl_keluar."_".$tujuan;

			 $this->load->library('upload',$config);

			 if($this->upload->do_upload('file')){
				 $file = $this->upload->data('file_name');
				 $this->db->set('file',$file);
			 }else{
				 echo "Gagal upload";
			 }

		$data = array(
			'tujuan' 		=> $tujuan,
			'tgl_keluar' 	=> $tgl_keluar,
			'nosurat' 		=> $nosurat,
			'perihal' 		=> $perihal,
			'ringkasan' 	=> $ringkasan,
			'id_suratmasuk' => $id_suratmasuk,
			'keterangan' 	=> $keterangan,
			'id_jenissurat' => $id_jenissurat,
			'id_rak' 	=> $id_rak,
			'id_user'	 	=> $id_user,
			'file' 			=> $file,

		);
	}	else{
		$data = array(
			'tujuan' 		=> $tujuan,
			'tgl_keluar' 	=> $tgl_keluar,
			'perihal' 		=> $perihal,
			'nosurat' 		=> $nosurat,
			'ringkasan' 	=> $ringkasan,
			'id_suratmasuk' => $id_suratmasuk,
			'keterangan' 	=> $keterangan,
			'id_jenissurat' => $id_jenissurat,
			'id_rak' 	=> $id_rak,
			'id_user'	 	=> $id_user,
			//'file' 			=> $file,
		);

	}

		$where = array(

			'id_suratkeluar' => $id,
		);

		$this->sk_model->update_data($where,$data,'tb_suratkeluar');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Diubah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Surat Keluar Berhasil Diubah!');
		redirect('operator/suratkeluar');
	
	}

	public function hapus($id)
	{
		$file = $this->db->query("Select * from tb_suratkeluar where id_suratkeluar='$id'")->result();
		foreach($file as $fl){
			$fotofile ='assets4/uploads/suratkeluar/'.$fl->file;
			unlink($fotofile);
		}
		$where = array('id_suratkeluar' => $id,);
		$this->sk_model->hapus_data($where,'tb_suratkeluar');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Data User Berhasil Dihapus! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Surat Keluar Berhasil Dihapus');
		redirect('operator/suratkeluar');
	}
	public function detail($kode)
		{
			$data['detail'] = $this->sk_model->ambil_kode_sk($kode);
			$this->load->view('template_admins/header');
			$this->load->view('template_admins/sidebarr');
			$this->load->view('operator/sk_details',$data);
			$this->load->view('template_admins/footer');
		}
		function add_ajax_rak($id_lemari){
			$query = $this->db->get_where('tb_rak',array('id_lemari'=>$id_lemari));
			$data = "<option value=''>-- Pilih Lokasi Rak dan File --</option>";
			foreach ($query->result() as $value) {
				$data .= "<option value='".$value->id_rak."'>".$value->nama_rak."-"."FILE-".$value->id_file." ( "."$value->tahun"." )"."</option>";
			}
			echo $data;
		}
}
?>