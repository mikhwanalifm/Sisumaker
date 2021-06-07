 <div class="right_col" role="main">
  <div class="x_title">
                    <h2>Daftar Pengguna</h2>
                    
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
                      echo anchor('administrator/user/tambah_users','<button class="btn btn-sm btn-primary float-right mb-3"><i class="fa fa-plus fa-sm"></i> TAMBAH</button>')
                    ?>
                    <h2>Pengguna</h2>
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
                          <th>Username</th>
                          <th>Nama Lengkap</th>
                          <th>Email</th>
                          <th>Level</th>
                          <th>Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach ($users as $user) : ?>
                      <tr>
                          <td width="20px"><?php echo $no++ ?></td>
                          <td><?php echo $user->username ?></td>
                          <td><?php echo $user->nama_lengkap ?></td>
                          <td><?php echo $user->email ?></td>
                          <td><?php echo $user->level ?></td>
                          <td class="text-center" width="160px">
                          <a href=""><?php echo anchor('administrator/user/update/'.$user->id_user,'<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'); ?></a>
                          <!-- <a href="<?php echo site_url(); ?>/administrator/user/hapus/<?php echo $user->id_user; ?>" onclick="return confirm('Anda Yakin?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                          <a href="<?= base_url(); ?>administrator/user/hapus/<?= $user->id_user; ?>" class=" btn btn-sm btn-danger tombol-hapus"><i class="fa fa-trash">   </i></a>
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
