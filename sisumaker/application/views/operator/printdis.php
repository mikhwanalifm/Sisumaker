<?php
function tgl_indo($tanggal){
  if($tanggal == '0000-00-00'){
    return "-";
  }
  else{

  	$bulan = array (
  		1 =>   'Januari',
  		'Februari',
  		'Maret',
  		'April',
  		'Mei',
  		'Juni',
  		'Juli',
  		'Agustus',
  		'September',
  		'Oktober',
  		'November',
  		'Desember'
  	);
  	$pecahkan = explode('-', $tanggal);

  	// variabel pecahkan 0 = tanggal
  	// variabel pecahkan 1 = bulan
  	// variabel pecahkan 2 = tahun

  	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
  }

  }
  function jam($j){
    $jam = explode(':',$j);
    if($j == '00:00:00') return "-";
    else{
    if($jam<10){
      return '0'.$jam[0]. ":".$jam[1]." - 0".($jam[0]+1).":".$jam[1]." WIB";
    }
    else{
      return $jam[0]. ":".$jam[1]." - ".($jam[0]+1).":".$jam[1]." WIB";
    }}
}

?>

<html >
  <head>
  <link href="<?= base_url() ?>assets4/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
  <img src="<?php echo base_url() ?>assets5/lap/pemkot.png" width="140" height="140" align="left">
    <p style="text-align: center; font-family: Times; font-size: 30px; line-height:47px;"><span><b>PEMERINTAH KOTA BENGKULU</b><br><b>KECAMATAN SELEBAR</b><br><b>Jalan Telaga Dewa Baru Pagar Dewa (Telp.0736) 51003</b><br><b>Bengkulu</b></span></p>
    <hr color="black"><hr color="black">
    <?php foreach($disposisi as $dis) : ?>
    <p style="text-align: center; font-family: Times New Roman; font-size:20px; text-decoration:underline;"><b>LEMBAR DISPOSISI</b></p>
    <table width="1000px" class="text-center">
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="50%">&nbspSurat Dari &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : <?php echo $dis->pengirim ?></td>
          <td style="border: 1px solid black" colspan="2" height="50px" width="50%">&nbspDiterima Tanggal &nbsp: <?php echo tgl_indo($dis->tgl_terima) ?></td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="50%">&nbspTanggal Surat &nbsp: <?php echo tgl_indo($dis->tgl_masuk) ?></td>
          <td style="border: 1px solid black" colspan="2" height="50px" width="50%">&nbspNo. Agenda &nbsp &nbsp &nbsp  &nbsp  &nbsp :</td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" rowspan="2" height="50px" width="50%">&nbspNo. Surat &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp : <?php echo $dis->nosurat ?></td>
          <td style="border: 1px solid black" colspan="2" height="50px" width="50%">&nbspDiteruskan &nbsp &nbsp &nbsp  &nbsp  &nbsp &nbsp:</td>
        </tr>
        <tr align="left">
          <!-- <td style="border: 1px solid black" height="50px" width="50%">6</td> -->
          <td style="border: 1px solid black" rowspan="2" colspan="2" height="80px" width="50%">&nbspParaf Sekcam &nbsp &nbsp &nbsp&nbsp: </td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="80px" width="50%">&nbspPerihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : <?php echo $dis->perihal ?></td>
          <!-- <td style="border: 1px solid black" colspan="2" height="50px" width="50%"></td> -->
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" rowspan="8" height="50px" width="50%">&nbspIsi Disposisi &nbsp &nbsp : <?php echo $dis->disposisi ?></td>
          <td style="border: 1px solid black" height="50px" width="40%"><p align="center">&nbspSeksi/Sub Sebagian</p></td>
          <td style="border: 1px solid black" height="50px" width="10%"><p align="center">Tanda &#10003;</p></td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="40%">&nbspSel Pemerintahan</td>
          <td style="border: 1px solid black" height="50px" width="10%"></td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="40%">&nbspSel Pelayanan Umum</td>
          <td style="border: 1px solid black" height="50px" width="10%"></td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="40%">&nbspSel Kensos</td>
          <td style="border: 1px solid black" height="50px" width="10%"></td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="40%">&nbspSel Terantib</td>
          <td style="border: 1px solid black" height="50px" width="10%"></td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="40%">&nbspSel PMK</td>
          <td style="border: 1px solid black" height="50px" width="10%"></td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="40%">&nbspSub Bagian Kepegawaian dan Umum</td>
          <td style="border: 1px solid black" height="50px" width="10%"></td>
        </tr>
        <tr align="left">
          <td style="border: 1px solid black" height="50px" width="40%">&nbspKeuangan</td>
          <td style="border: 1px solid black" height="50px" width="10%"></td>
        </tr>
    </table>
    <?php endforeach; ?>
    <br>
    <br>
    <script type="text/javascript">
      window.print();
    </script>

  </body>
</html>
