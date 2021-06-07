<div class="right_col" role="main">
  <div class="x_title">
                    <h2>Daftar Jenis Surat</h2>
                    
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
                      echo anchor('operator/jenis/tambah_jenis','<button class="btn btn-sm btn-primary float-right mb-3"><i class="fa fa-plus fa-sm"></i> TAMBAH</button>')
                    ?>
                    <h2>Jenis Surat</h2>
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
                          <th>Kode Jenis Surat</th>
                          <th>Jenis Surat</th>
                          <th>Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach ($jenis as $js) : ?>
                      <tr>
                          <td width="20px"><?php echo $no++ ?></td>
                          <td><?php echo $js->kode_jenissurat ?></td>
                          <td><?php echo $js->nama_jenissurat ?></td>
                          <td class="text-center" width="160px">
                          <a href=""><?php echo anchor('operator/jenis/update/'.$js->id_jenissurat,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'); ?></a>
                          <a href="<?= base_url(); ?>operator/jenis/hapus/<?= $js->id_jenissurat; ?>" class=" btn btn-sm btn-danger tombol-hapus"><i class="fa fa-trash"> </i></a>
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
