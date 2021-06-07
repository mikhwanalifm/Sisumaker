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
        <th style="border: 1px solid black" width="5%" height="50px">NO</th>
        <th style="border: 1px solid black" width="10%">Nama</th>
        <th style="border: 1px solid black" width="20%">No. Register</th>
        <th style="border: 1px solid black" width="10%">Tanggal Keluar</th>
        <th style="border: 1px solid black" width="10%">Alamat</th>
        <th style="border: 1px solid black" width="10%">Keterangan</th>

      </tr>
      <?php 
        $no = 1;
        foreach ($lapsuratlega as $data) : ?>
        <tr align="center">
          <td style="border: 1px solid black" height="50px"><?php echo $no++ ?></td>
          <td style="border: 1px solid black"><?php echo $data->nama?></td>
          <td style="border: 1px solid black"><?php echo $data->noreg?></td>
          <td style="border: 1px solid black"><?php echo tgl_indo($data->tgl_keluar)?></td>
          <td style="border: 1px solid black"><?php echo $data->alamat?></td>
          <td style="border: 1px solid black"><?php echo $data->keterangan?></td>
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
             <th width="326px"> Sumber Data </th>
         </tr>
         <tr>
             <th width="326px"> <b>Kasi Pelayanan Umum Kec. Selebar</b> </th>
         </tr>
         <tr>
             <th width="326px" height="100px">   </th>
         </tr>
         <tr>
             <th width="326px"><b><u>LILA ASIA, S.Sos</u></b> </th>
         </tr>
         <tr>
             <th width="326px">NIP. 196709121993032003</th>
         </tr>

     </table>

    <script type="text/javascript">
      window.print();
    </script>

  </body>
</html>
