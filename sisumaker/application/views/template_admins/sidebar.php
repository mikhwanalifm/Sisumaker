 <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('administrator/dashboard') ?>" class="site_title"><i class="fa fa-building"></i> <span>SISUMAKER</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('assets4/uploads/icon/admin.png')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo  $this->session->userdata['username'] ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('administrator/dashboard')?> "><i class="fa fa-home"></i> Dashboard</a>
                  </li>
                  <li><a><i class="fa fa-database"></i> Manajemen Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('administrator/jenis') ?>">Jenis Surat</a></li>
                      <!-- <li><a href="<?= base_url('administrator/ordner') ?>">Ordner (Penyimpanan)</a></li> -->
                      <li><a href="<?= base_url('administrator/lemari') ?>">Lemari</a></li>
                      <li><a href="<?= base_url('administrator/rak') ?>">Rak</a></li>
                      <li><a href="<?= base_url('administrator/suratmasuk') ?>">Surat Masuk</a></li>
                      <li><a href="<?= base_url('administrator/suratkeluar') ?>">Surat Keluar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Manajemen User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('administrator/user') ?>">Data User</a></li>
                      <!-- <li><a href="<?= base_url('administrator/user/change_pass') ?>">Ganti Password</a></li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder"></i> Manajemen Lain-lain <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('administrator/legalisir') ?>">Legalisir</a></li>
                      <li><a href="<?= base_url('administrator/spt') ?>">Surat Tugas</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-print"></i>Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('administrator/laporansm') ?>">Laporan Surat Masuk</a></li>
                      <li><a href="<?= base_url('administrator/laporansk') ?>">Laporan Surat Keluar</a></li>
                      <li><a href="<?= base_url('administrator/laporanst') ?>">Laporan Surat Tugas</a></li>
                      <li><a href="<?= base_url('administrator/laporanlega') ?>">Laporan Legalisir</a></li>
                    </ul>
                  </li>
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

          
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url('assets4/uploads/icon/admin.png')?>" alt=""><?php echo  $this->session->userdata['username'] ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                     <!-- <a class="dropdown-item"  href="javascript:;"> Profile</a>
                       <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a> 
                  <a class="dropdown-item"  href="javascript:;">Help</a> -->
                    <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out pull-right"></i> Keluar</a>
                  </div>
                </li>
           
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik "Keluar" Jika Anda Yakin Keluar Dari Sistem Informasi Ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-danger" href="<?php echo base_url('login/logout') ?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>