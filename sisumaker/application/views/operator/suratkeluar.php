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
                    <h2>Daftar Surat Keluar</h2>
                    
                    <div class="clearfix"></div>
                    
                  </div>
                  <!-- <?php echo $this->session->flashdata('pesan') ?> -->
                  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"> </div>
                  <?php if ($this->session->flashdata('pesan')) : ?>
                <?php endif; ?>
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <?php 
                      echo anchor('operator/suratkeluar/tambah_sk','<button class="btn btn-sm btn-primary float-right mb-3"><i class="fa fa-plus fa-sm"></i> TAMBAH</button>')
                    ?>
                    <h2>Surat Keluar</h2>
                                      <!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahkategori">Tambah Data</button> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable-keytable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr align="center">
                          <th>No</th>
                          <th>Tanggal Surat Keluar</th>
                          <th>Perihal</th>
                          <th>Nomor Surat</th>
                          <th>Tujuan</th>
                          <th>Jenis Surat</th>
                          <th>Isi Ringkasan </th>
                          <th>Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      $suratkeluar = $this->db->query("SELECT * from tb_suratkeluar LEFT JOIN tb_jenis ON tb_suratkeluar.id_jenissurat = tb_jenis.id_jenissurat ORDER BY tgl_keluar ASC")->result();
                      foreach ($suratkeluar as $sk) : ?>
                      <tr>
                          <td width="20px"><?php echo $no++ ?></td>
                          <td><?php echo tgl_indo($sk->tgl_keluar) ?></td>
                          <td><?php echo $sk->perihal ?></td>
                          <td><?php echo $sk->nosurat ?></td>
                          <td><?php echo $sk->tujuan ?></td>
                          <td><?php echo $sk->nama_jenissurat ?></td>
                          <td><?php echo word_limiter($sk->ringkasan,5) ?></td>
                          <td class="text-center" width="160px">
                          <a href=""><?php echo anchor('operator/suratkeluar/detail/'.$sk->id_suratkeluar,'<div class="btn btn-sm btn-info"><i class="fa fa-eye"></i></div>'); ?></a>
                          <a href=""><?php echo anchor('operator/suratkeluar/update/'.$sk->id_suratkeluar,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'); ?></a>
                          <a href="<?= base_url(); ?>operator/suratkeluar/hapus/<?= $sk->id_suratkeluar; ?>" class=" btn btn-sm btn-danger tombol-hapus"><i class="fa fa-trash"> </i></a>
                        </td>
                        <?php  endforeach; ?>
                      </tbody>
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
