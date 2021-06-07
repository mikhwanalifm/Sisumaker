

 <div class="right_col" role="main">
 
 <div class="x_title">
   <h2>Dashboard</h2>
   <div class="clearfix"></div>
 </div>
     <div class="alert alert-success" role="alert">
       <h4 class="alert-heading">Selamat Datang!</h4>
       <b><p>Selamat Datang <strong><?php echo $nama_lengkap; ?></strong> di Sistem Informasi Surat Masuk dan Surat Keluar Kantor Camat Selebar Kota Bengkulu<br> Anda Login sebagai <strong><?php echo $level; ?></strong> </p>
     </div>
<!-- page content -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
  Panduan Penggunaan
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Panduan Penggunaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1 align="center"><span><b> Berikut Panduan Penggunaan Sistem Informasi Ini </b><br> </span><br>
        <p align="left" style="font-family: Times New Roman; font-size: 18px;">1. Silahkan Login Terlebih Dahulu <a href="<?php echo base_url('login') ?>" style="color: black;"><b>Disini</b></a> (Abaikan Jika Sudah) </p>
        <p align="left" style="font-family: Times New Roman; font-size: 18px;">2. Pilih Fitur Yang Akan Digunakan Dibagian Samping Kiri Layar Anda</p>
        <p align="left" style="font-family: Times New Roman; font-size: 18px;">3. Gunakan Fitur Sesuai Dengan Fungsinya </p>
        <p align="left" style="font-family: Times New Roman; font-size: 18px;">4. Jika Terdapat Error Silahkan Hubungi Tim Yang Berwenang </p>
        <p align="center" style="font-family: Times New Roman; font-size: 18px;">Terima Kasih </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
</div>




</div>
</div>
</div>
<!-- /page content -->
