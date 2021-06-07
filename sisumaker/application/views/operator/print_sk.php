<?php
    function tgl_indo($tanggal){
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
        
        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal
 
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
?>
<html>
<head>
  <title>Rekap Data Surat Masuk</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 100%;
    }
    table th {
      word-wrap:break-word;
      width: 20%;
    }

  </style>
</head>
<body>
  <img src="assets5/lap/bkl.png" height="100" align="left">
  <p style="text-align: center; font-family: Times; font-size: 20px; line-height:20px;"><span> <b>Kantor Camat Selebar Kota Bengkulu</b><br><b>Provinsi Bengkulu</b><br><b>Pagar Dewa, Bengkulu, Kota Bengkulu, Bengkulu 38216</b></span></p>
  <hr><br><br>
    <b><?php echo $ket; ?></b><br /><br />
    
  <table border="1" cellpadding="8" align="center">
  <tr align="center">
    <th>Tanggal</th>
    <th>Tujuan</th>
    <th colspan="2">Nomor Surat</th>
    <th>Ringkasan</th>
  </tr>
    <?php
    if( ! empty($lapsuratkeluar)){
      $no = 1;
      foreach($lapsuratkeluar as $data){
        echo "<tr>";
        echo "<td>".tgl_indo($data->tgl_keluar)."</td>";
        echo "<td>".$data->tujuan."</td>";
        echo "<td>".$data->nosurat."</td>";
        echo "<td>"."</td>";
        echo "<td>".$data->ringkasan."</td>";
        echo "</tr>";
        $no++;
      }
    }
    ?>
  </table><br><br>
  <table align="right">
  <tr>
    <td><p style="text-align: left; font-family: Times; font-size: 12px;"><span>Mengetahui, </span></p></td>
  </tr>
  <tr>
  <td><p style="text-align: left; font-family: Times; font-size: 12px;"><span>Bengkulu, <?php echo tgl_indo(date("Y-m-d"))?> </span></p></td>
  </tr>
  <tr rowspan="3">
    <td><p style="text-align: center; font-family: Times; font-size: 12px;"><span><br><br><br> Si Bapak</span></p></td>
  </tr>
  </table>
</body>
</html>