<div class="right_col" role="main">
  <div class="x_title">
                    <h2>Daftar Rak Penyimpanan</h2>
                    
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
                      echo anchor('administrator/rak/tambah_rak','<button class="btn btn-sm btn-primary float-right mb-3"><i class="fa fa-plus fa-sm"></i> TAMBAH</button>')
                    ?>
                    <h2>Rak</h2>
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
                          <th>Kode File</th>
                          <th>Nama Rak </th>
                          <th>Tahun</th>
                          <th>Nama Lemari</th>
                          <th>Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      $rak = $this->db->query("SELECT * FROM tb_rak LEFT JOIN tb_lemari ON tb_rak.id_lemari = tb_lemari.id_lemari ORDER BY id_file ASC ")->result();
                      foreach ($rak as $rk) : ?>
                      <tr>
                          <td width="20px"><?php echo $no++ ?></td>
                          <td><?php echo "FILE-".$rk->id_file ?></td>
                          <td><?php echo $rk->nama_rak ?></td>
                          <td><?php echo $rk->tahun ?></td>
                          <td><?php echo $rk->kode_lemari." ( ".$rk->keterangan." ) " ?></td>
                          <td class="text-center" width="160px">
                          <a href=""><?php echo anchor('administrator/rak/update/'.$rk->id_rak,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'); ?></a>
                          <a href="<?= base_url(); ?>administrator/rak/hapus/<?= $rk->id_rak; ?>" class=" btn btn-sm btn-danger tombol-hapus"><i class="fa fa-trash"> </i></a>
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
