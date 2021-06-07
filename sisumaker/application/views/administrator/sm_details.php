<?php
    function tanggal_indonesia($tanggal){
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
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Informasi Surat Masuk
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Silahkan Dilihat Dengan Seksama</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <?php 
                    foreach($detail as $sm) : ?>
                    <?php echo form_open_multipart('administrator/suratmasuk/update_aksi') ?>
 
                    <div class="form-group">
                                    <label>Pengirim</label>
                                    <input type="hidden" name="id_suratmasuk" value="<?php echo $sm->id_suratmasuk ?>">
                                    <input type="text" class="form-control" name="pengirim" readonly value="<?php echo $sm->pengirim ?>" placeholder="Masukan Pengirim" maxlength="35" required oninvalid="this.setCustomValidity('Masukan Pengirim')" oninput="setCustomValidity('')">
                                </div>
                               
                                <div class="row">
                            <div class='col-sm-6'>
                                Tanggal Surat Masuk
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <input type="date" class="form-control" name="tgl_masuk" readonly value="<?php echo $sm->tgl_masuk ?>" required oninvalid="this.setCustomValidity('Masukan Tanggal Masuk')" oninput="setCustomValidity('')">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                Tanggal Surat Diterima
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker2'>
                                    <input type="date" class="form-control" name="tgl_terima" readonly value="<?php echo $sm->tgl_terima ?>" required oninvalid="this.setCustomValidity('Masukan Tanggal Diterima')" oninput="setCustomValidity('')">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="row">
                            <div class='col-sm-6'>
                                Nomor Surat
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                   
                                    <input type="text" class="form-control" readonly name="nosurat" value="<?php echo $sm->nosurat?>" maxlength="50" placeholder="Masukan Nomor Surat" required oninvalid="this.setCustomValidity('Masukan Nomor Surat')" oninput="setCustomValidity('')">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                Perihal
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker2'>
                                    <input type="text" class="form-control" readonly name="perihal" value="<?php echo $sm->perihal?>" maxlength="100" placeholder="Masukan Perihal" required oninvalid="this.setCustomValidity('Masukan Nomor Surat')" oninput="setCustomValidity('')">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>

                                <div class="row">
                            <div class='col-sm-6'>
                                Jenis Surat
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <?php 
                                        $jenis = $this->db->query("SELECT * FROM tb_jenis LEFT JOIN tb_suratmasuk ON tb_jenis.id_jenissurat = tb_suratmasuk.id_jenissurat where tb_jenis.id_jenissurat = '$sm->id_jenissurat' AND tb_suratmasuk.id_suratmasuk = '$sm->id_suratmasuk'")->result();
                                     foreach($jenis as $js)
                                     : ?>
                                    <input type="text" class="form-control" name="id_jenissurat" value="<?php echo $js->nama_jenissurat?>" readonly>     
                                
                                     <?php endforeach; ?>     
                                
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                Lokasi Penyimpanan
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker2'>
                                    <?php 
                                        $lokasi = $this->db->query("SELECT * from tb_suratmasuk LEFT JOIN tb_rak ON tb_suratmasuk.id_rak = tb_rak.id_rak where tb_suratmasuk.id_suratmasuk='$sm->id_suratmasuk'")->result();
                                     foreach($lokasi as $lok)
                                     : ?>
                                    <input type="text" class="form-control" name="id_rak" value="<?php echo $lok->nama_rak." (FILE- ". $lok->id_file. " )" ?>" readonly>
                                        <?php endforeach; ?>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>



                                <div class="row">
                            <div class='col-sm-6'>
                                Pejabat
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <input type="text" class="form-control" name="pejabat" value="<?php echo $sm->pejabat?>" readonly>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                Disposisi
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker2'>
                                    <input name="disposisi" class="form-control" value="<?php echo $sm->disposisi?>"readonly>
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>

                                
                            <div class="form-group">
                                    <label>Ringkasan</label><br> 
                                    <!-- <input name="ringkasan" class="form-control" value="<?php echo $sm->ringkasan?>" readonly > -->
                                    <textarea id="ringkasan" name="ringkasan" rows="4" cols="100" readonly style="resize:vertical;width:100%;height:100px;"><?php echo $sm->ringkasan?>
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label>Keterangan</label><br>
                                    <!-- <input name="keterangan" class="form-control" value="<?php echo $sm->keterangan?>" readonly> -->
                                    <textarea id="keterangan" name="keterangan" rows="4" cols="100" readonly style="resize:vertical;width:100%;height:100px;"><?php echo $sm->keterangan?>
                                    </textarea>
                                </div>
                                <table>
                                <label>FILE</label>
                                <tr class="text-center">
                                                <td>
                                                  <?php
                                                    if($sm->file=='-'){
                                                      ?>
                                                      <img src="<?php echo base_url(). 'assets4/uploads/suratmasuk/jangandihapus.jpg'?>" width="200" height="200" style="display: block; margin: auto;">
                                                      <?php
                                                    }
                                                    else{
                                                    ?>

                                                    <img src="<?php echo base_url(). 'assets4/uploads/suratmasuk/'.$sm->file ?>" width="200" height="200" style="display: block; margin: auto;">
                                                    <?php
                                                    } ?></td>
                                </tr>
                                </table>
                                    <!-- <a href="" ><?php echo anchor('assets4/uploads/suratmasuk/'.$sm->file,'<div class="text-center" ><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> DOWNLOAD</button>
                                </div></div>'); ?></a>
                                 -->
                                
                                <br><br>
                              
                                <?php form_close(); ?>
                                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
