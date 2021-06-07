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
  <img src="<?php echo base_url() ?>assets4/uploads/icon/kop.png" width="100%">
    
    <hr color="black"><hr color="black">
    <b><?php echo $ket; ?></b><br /><br />
    <table width="1000px" class="text-center">
      <tr align='center'>
        <th style="border: 1px solid black; padding: 5px;" width="5%" height="50px">NO</th>
        <th style="border: 1px solid black; padding: 5px;" width="10%">Tanggal</th>
        <th style="border: 1px solid black; padding: 5px;" width="20%">Nomor Surat</th>
        <th style="border: 1px solid black; padding: 5px;" width="10%">Pengirim</th>
        <th style="border: 1px solid black; padding: 5px;" width="10%">Ringkasan</th>

      </tr>
      <?php 
        $no = 1;
        foreach ($lapsuratmasuk as $data) : ?>
        <tr align="center">
          <td style="border: 1px solid black; padding: 5px;" height="50px"><?php echo $no++ ?></td>
          <td style="border: 1px solid black; padding: 5px;"><?php echo tgl_indo($data->tgl_terima)?></td>
          <td style="border: 1px solid black; padding: 5px;"><?php echo $data->nosurat?></td>
          <td style="border: 1px solid black; padding: 5px;"><?php echo $data->pengirim?></td>
          <td style="border: 1px solid black; padding: 5px;"><?php echo $data->ringkasan?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <br>

    <table style="float:right;">
         <tr>
             <th width="326px"> Bengkulu, <?php echo tgl_indo(date('Y-m-d'));  ?> </th>
         </tr>
         <tr>
             <th width="326px"> MENGETAHUI </th>
         </tr>
         <tr>
             <th width="326px"> <b>KASUBAG UMUM DAN KEPEGAWAIAN</b> </th>
         </tr>
         <tr>
             <th width="326px" height="100px">   </th>
         </tr>
         <tr>
             <th width="326px"><b><u>DINI, S.Sos</u></b> </th>
         </tr>
         <tr>
             <th width="326px">NIP. 196901071993032006</th>
         </tr>

     </table>

    <script type="text/javascript">
      window.print();
    </script>

  </body>
</html>
