<?php

class Suratmasuk extends CI_Controller{
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
		// $data['suratmasuk'] = $this->sm_model->tampil_data('tb_suratmasuk')->result();
		$data['suratmasuk'] = $this->db->query("SELECT * FROM tb_suratmasuk ORDER BY tgl_masuk ASC")->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/suratmasuk',$data);
		$this->load->view('template_admins/footer');
	}
	public function tambah_sm()
	{	$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
			 'id_user' => $data->id_user,
         );
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/sm_form',$data);
		$this->load->view('template_admins/footer');
	}

	public function tambah_sm_aksi()
	{
		$this->_rules();
		if($this->form_validation->run()==FALSE){
			$this->tambah_sm();
		}else{

            $pengirim 		    = $this->input->post('pengirim');
            $tgl_masuk 			= $this->input->post('tgl_masuk');
			$tgl_terima 		= $this->input->post('tgl_terima');
			$perihal 			= $this->input->post('perihal');
            $nosurat 	        = $this->input->post('nosurat');
            $id_jenissurat 		= $this->input->post('id_jenissurat');
            $ringkasan  	    = $this->input->post('ringkasan');
            $pejabat 		    = $this->input->post('pejabat');
            $disposisi 	        = $this->input->post('disposisi');
            $id_rak 		    = $this->input->post('id_rak');
            $keterangan  	    = $this->input->post('keterangan');
            $id_user 		    = $this->input->post('id_user');
			// $file 				= $_FILES['file'];
			$file;

			if(empty($_FILES['file']['name'])){
				$file='-';
			} else{
				$config['upload_path'] = './assets4/uploads/suratmasuk';
				$config['allowed_types'] = 'pdf|jpeg|jpg|png';
				$config['file_name'] = "SM_".$tgl_masuk."_".$pengirim;

				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('file')){
					echo "Gagal upload"; die();
				}else{
					$file=$this->upload->data('file_name');
				}
			}
			 $sql = $this->db->query("SELECT count(nosurat) as surat FROM tb_suratmasuk where nosurat='$nosurat'")->result();
			 $cek_surat;
			 foreach($sql as $ss){
				 $cek_surat = $ss->surat;
			 }
			 
			if ($cek_surat > 0) {
 
			$this->session->set_flashdata('pesan','  Gagal, Surat Sudah Ada!');
			 redirect('administrator/suratmasuk');
			 }


			else {

 			$data = array(

                'pengirim' 		    => $pengirim,
                'tgl_masuk' 	    => $tgl_masuk,
				'tgl_terima' 		=> $tgl_terima,
				'perihal' 			=> $perihal,
                'nosurat'       	=> $nosurat,
				'id_jenissurat' 	=> $id_jenissurat,
				'ringkasan' 		=> $ringkasan,
                'pejabat'       	=> $pejabat,
                'disposisi' 		=> $disposisi,
                'id_rak' 	    	=> $id_rak,
                'keterangan' 		=> $keterangan,
				'id_user' 			=> $id_user,
				'file' 	        	=> $file,

 			);
			$this->sm_model->insert_data($data,'tb_suratmasuk');

			$this->session->set_flashdata('pesan',' Surat Masuk Berhasil Ditambahkan');
			redirect('administrator/suratmasuk');
		}
	}
	}
			
	

	public function _rules()
	{
		
		$this->form_validation->set_rules('pengirim','pengirim','required',['required' => 'Nama Lengkap wajib di isi!']);
		$this->form_validation->set_rules('tgl_masuk','tgl_masuk','required',['required' => 'NPM wajib di isi!']);
		$this->form_validation->set_rules('tgl_terima','tgl_terima','required',['required' => 'Program Studi di isi!']);
		$this->form_validation->set_rules('nosurat','nosurat','required',['required' => 'Barang wajib di isi!']);
		$this->form_validation->set_rules('id_jenissurat','id_jenissurat','required',['required' => 'Jumlah wajib di isi!']);
		$this->form_validation->set_rules('ringkasan','ringkasan','required',['required' => 'Status wajib di isi!']);
		$this->form_validation->set_rules('pejabat','pejabat','required',['required' => 'Nama Lengkap wajib di isi!']);
		$this->form_validation->set_rules('perihal','perihal','required',['required' => 'Nama Lengkap wajib di isi!']);
		//$this->form_validation->set_rules('disposisi','disposisi','required',['required' => 'NPM wajib di isi!']);
		$this->form_validation->set_rules('id_rak','id_rak','required',['required' => 'Program Studi di isi!']);
		//$this->form_validation->set_rules('keterangan','keterangan','required',['required' => 'Barang wajib di isi!']);
		$this->form_validation->set_rules('id_user','id_user','required',['required' => 'Jumlah wajib di isi!']);

	}

	public function update($id)
	{
		$where = array('id_suratmasuk' => $id);
		$data = $this->user_model->ambil_data($this->session->userdata['username']);

		 $data = array(
		 	//'id_jenissurat' 	=> set_value('id_jenissurat'),
		 	//'kode_jenissurat' 		=> set_value('kode_jenissurat'),
			 //'nama_jenissurat' 		=> set_value('nama_jenissurat'),
			 'id_user' => $data->id_user,
		 	//'id_user' 		=> set_value('id_user'),
         );
		$data['suratmasuk'] = $this->sm_model->edit_data($where,'tb_suratmasuk')->result();
		$this->load->view('template_admins/header');
		$this->load->view('template_admins/sidebar');
		$this->load->view('administrator/sm_update',$data);
		$this->load->view('template_admins/footer');
	}

	public function update_aksi()
	{
		$id 					= $this->input->post('id_suratmasuk');
		$pengirim 				= $this->input->post('pengirim');
		$tgl_masuk 				= $this->input->post('tgl_masuk');
		$tgl_terima 			= $this->input->post('tgl_terima');
		$perihal 				= $this->input->post('perihal');
		$nosurat 				= $this->input->post('nosurat');
		$ringkasan 				= $this->input->post('ringkasan');
		$pejabat 				= $this->input->post('pejabat');
		$disposisi 				= $this->input->post('disposisi');
		$keterangan 			= $this->input->post('keterangan');
		$id_jenissurat 			= $this->input->post('id_jenissurat');
		$id_rak 				= $this->input->post('id_rak');
		$id_user 				= $this->input->post('id_user');
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
				$config['upload_path'] 		= './assets4/uploads/suratmasuk';
				$config['allowed_types'] 	= 'pdf|jpg|jpeg|png';
				$config['file_name'] 		= "SM_".$tgl_terima."_".$pengirim;

 				$this->load->library('upload',$config);

 				if($this->upload->do_upload('file')){
 					$file = $this->upload->data('file_name');
 					$this->db->set('file',$file);
 				}else{
 					echo "Gagal upload";
				 }
				 $data = array(
					'pengirim' 		=> $pengirim,
					'tgl_masuk' 	=> $tgl_masuk,
					'tgl_terima' 	=> $tgl_terima,
					'perihal' 		=> $perihal,
					'nosurat' 		=> $nosurat,
					'ringkasan' 	=> $ringkasan,
					'pejabat' 		=> $pejabat,
					'disposisi' 	=> $disposisi,
					'keterangan' 	=> $keterangan,
					'id_jenissurat' => $id_jenissurat,
					'id_rak' 	=> $id_rak,
					'id_user'	 	=> $id_user,
					'file' 			=> $file,

				);
			 }
				else{
					$data = array(
						'pengirim' 		=> $pengirim,
						'tgl_masuk' 	=> $tgl_masuk,
						'tgl_terima' 	=> $tgl_terima,
						'perihal' 		=> $perihal,
						'nosurat' 		=> $nosurat,
						'ringkasan' 	=> $ringkasan,
						'pejabat' 		=> $pejabat,
						'disposisi' 	=> $disposisi,
						'keterangan' 	=> $keterangan,
						'id_jenissurat' => $id_jenissurat,
						'id_rak' 	=> $id_rak,
						'id_user'	 	=> $id_user,
						//'file' 			=> $file,
	
					);
				}
			 
	

		$where = array(

			'id_suratmasuk' => $id,
		);

		$this->sm_model->update_data($where,$data,'tb_suratmasuk');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
  						Data User Berhasil Diubah! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Surat Masuk Berhasil Diubah!');
		redirect('administrator/suratmasuk');
	
	}

	public function hapus($id)
	{	$file = $this->db->query("Select * from tb_suratmasuk where id_suratmasuk='$id'")->result();
		foreach($file as $fl){
			$fotofile ='assets4/uploads/suratmasuk/'.$fl->file;
			unlink($fotofile);
		}
		$where = array('id_suratmasuk' => $id,);
		$this->sm_model->hapus_data($where,'tb_suratmasuk');
		/*$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  						Data User Berhasil Dihapus! 
  						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  						</button>
						</div>');*/
		$this->session->set_flashdata('pesan',' Surat Masuk Berhasil Dihapus');
		redirect('administrator/suratmasuk');
	}
	public function detail($kode)
	{
			$data['detail'] = $this->sm_model->ambil_kode_sm($kode);
			$this->load->view('template_admins/header');
			$this->load->view('template_admins/sidebar');
			$this->load->view('administrator/sm_details',$data);
			$this->load->view('template_admins/footer');
	}
	public function disposisi($kode)
	{
			$data['disposisi'] = $this->sm_model->ambil_kode_sm($kode);
			$this->load->view('administrator/printdis',$data);
	}

		function add_ajax_file($id_file){
			$query = $this->db->get_where('tb_rak',array('nama_rak'=>$id_file));
			$data = "<option value=''>- Pilih Lemari -</option>";
			foreach ($query->result() as $value) {
				$data .= "<option value='".$value->id_rak."'>".$value->id_file."</option>";
			}
			echo $data;
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