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


<div class="right_col" role="main">
  <div class="x_title">
                    <h2>Laporan Surat Keluar</h2>
                    
                    <div class="clearfix"></div>
                    
                  </div>
                  <!-- <?php echo $this->session->flashdata('pesan') ?> -->
                  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"> </div>
                  <?php if ($this->session->flashdata('pesan')) : ?>
                <?php endif; ?>
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>Surat Keluar</h2>
                                      <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahkategori">Tambah Data</button> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <form method="get" action="">
        <label>Filter Berdasarkan</label><br>
        <select name="filter" id="filter">
            <option value="">Pilih</option>
            <!-- <option value="1">Per Tanggal</option> -->
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
        </select>
        <br /><br />
        <!-- <div id="form-tanggal">
            <label>Tanggal</label><br>
            <input type="text" name="tanggal" class="input-tanggal" />
            <br /><br />
        </div> -->
        <div id="form-bulan">
            <label>Bulan</label><br>
            <select name="bulan">
                <option value="">Pilih</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>
        <div id="form-tahun">
            <label>Tahun</label><br>
            <!-- <select name="tahun">
                <option value="">Pilih</option>
                <?php
                foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                    echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                }
                ?>
            </select> -->
            <select name="tahun">
            <option disabled="disabled" value="" selected="selected">Pilih Tahun</option>
                <?php for($i=2019;$i<= 2020;$i++){ ?>
                  <option value="<?= $i ?>" <?php if(isset($_GET['tahun'])){ if($i==$_GET['tahun']){echo 'Selected';}} ?>><?= $i ?></option>
                  <?php
                } ?>
          </select>
            <br /><br />
        </div><br>
        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check-circle-o"> Tampilkan </i></button>
        <!-- <a href="<?php echo base_url('operator/laporansm'); ?>"><button type="submit" class="btn btn-sm btn-info" ><i class="fa fa-refresh"> Reset</i></button></a> -->
    </form>
    <hr />
    
    <b><?php echo $ket; ?></b><br /><br />
    <?php
            if(isset($_GET['filter'])){
          ?>
         <a href="<?php echo $url_cetak; ?>"><button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"> PRINT</i></button></a><br /><br />
        <?php } ?>
    
                    <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Tanggal Keluar</th>
                          <th>Tujuan</th>
                          <th>Nomor Surat</th>
                          <th>Ringkasan</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach ($lapsuratkeluar as $lsk) : ?>
                      <tr>
                          <td width="20px"><?php echo $no++ ?></td>
                          <td><?php echo tgl_indo($lsk->tgl_keluar) ?></td>
                          <td><?php echo $lsk->tujuan ?></td>
                          <td><?php echo $lsk->nosurat ?></td>
                          <td><?php echo $lsk->ringkasan ?></td>
                          
                        <?php  endforeach; ?>
                      </tbody>
                      <!-- <script src="<?php echo base_url('assets5/jquery-ui/jquery-ui.min.js'); ?>"></script> --> <!-- Load file plugin js jquery-ui -->
                    <script> 
                    $(document).ready(function(){ // Ketika halaman selesai di load
                        /*( $('.input-tanggal').datepicker({
                            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
                        }); */
                        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
                        $('#filter').change(function(){ // Ketika user memilih filter
                            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                                $('#form-tanggal').show(); // Tampilkan form tanggal
                            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                            }else{ // Jika filternya 3 (per tahun)
                                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                                $('#form-tahun').show(); // Tampilkan form tahun
                            }
                            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
                        })
                    })
                    </script>

                    </table>
                  </div>
                </div>
              </div>
            </div>
                </div>
              </div>
                




            </div>
          </div>
        </div>
        <!-- /page content -->
