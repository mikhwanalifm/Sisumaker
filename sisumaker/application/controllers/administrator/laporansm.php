<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Spipu\Html2Pdf\Html2Pdf;

class Laporansm extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
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
    $this->load->model('Laporan_sm_model');
  }
  
  public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Surat Masuk Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'administrator/laporansm/cetak?filter=1&tahun='.$tgl;
                $transaksi = $this->Laporan_sm_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Surat Masuk Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'administrator/laporansm/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Laporan_sm_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Surat Masuk Tahun '.$tahun;
                $url_cetak = 'administrator/laporansm/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Laporan_sm_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Surat Masuk';
            $url_cetak = 'administrator/laporansm/cetak';
            $transaksi = $this->Laporan_sm_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url($url_cetak);
    $data['lapsuratmasuk'] = $transaksi;
    $data['option_tahun'] = $this->Laporan_sm_model->option_tahun();

    $this->load->view('template_admins/header');
	$this->load->view('template_admins/sidebar');
    $this->load->view('administrator/laporansm', $data);
    $this->load->view('template_admins/footer');
  }
  
  public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Surat Masuk Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->Laporan_sm_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Surat Masuk Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Laporan_sm_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Surat Masuk Tahun '.$tahun;
                $transaksi = $this->Laporan_sm_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Surat Masuk';
            $transaksi = $this->Laporan_sm_model->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        
        $data['ket'] = $ket;
        $data['lapsuratmasuk'] = $transaksi;

    //ob_start();
    //$html = $this->load->view('administrator/print_sm',$data, TRUE);
    $this->load->view('administrator/print_sm1',$data);
      //  ob_end_clean();
        
    /*    require_once('./assets5/html2pdf1/Html2Pdf.php');
    $pdf = new MyPdf('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Rekap Data Surat Masuk.pdf', 'D'); */

       /* $html2pdf = new Html2Pdf('L','A4','en');
        $html2pdf->writeHTML($html);
        $html2pdf->output('Rekap Data Surat Masuk.pdf','D');*/
  }

}