<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $("#lemari").change(function (){
                var url = "<?php echo site_url('adminitrator/suratmasuk/add_ajax_rak');?>/"+$(this).val();
                $('#rak').load(url);
                return false;
            })
   
   $("#rak").change(function (){
                var url = "<?php echo site_url('administrator/suratmasuk/add_ajax_file');?>/"+$(this).val();
                $('#file').load(url);
                return false;
            })

        });
    </script>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Edit Surat Masuk
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Silahkan Perbaiki Data Yang Salah Dibawah ini</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <?php foreach($suratmasuk as $sm) : ?>
                    <?php echo form_open_multipart('operator/suratmasuk/update_aksi') ?>
                            
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
                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user?>" >
                                    <input type="text" class="form-control" name="nosurat" value="<?php echo $sm->nosurat?>" maxlength="50" placeholder="Masukan Nomor Surat" required oninvalid="this.setCustomValidity('Masukan Nomor Surat')" oninput="setCustomValidity('')">
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
                                    <input type="text" class="form-control" name="perihal" value="<?php echo $sm->perihal?>" maxlength="100" placeholder="Masukan Perihal" required oninvalid="this.setCustomValidity('Masukan Nomor Surat')" oninput="setCustomValidity('')">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>
                                <div class="form-group">
                                    <label>Jenis Surat </label>
                                    <select name="id_jenissurat" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih Jenis Surat Yang Benar')" oninput="setCustomValidity('')">
                                    <option value="" selected disabled>-- Pilih Jenis Surat --</option>
                                    <?php 
                                    $jenis = $this->db->query("Select * from tb_jenis")->result();
                                    foreach($jenis as $js) : ?>
                                        <option value="<?php echo $js->id_jenissurat ?>" <?php if($js->id_jenissurat=="$sm->id_jenissurat") { echo 'selected="selected"'; } ?>><?php echo $js->nama_jenissurat;?></option>
                                        <?php endforeach; ?>
                                    </select>            
                                </div>
                                <div class="row">
                            <div class='col-sm-6'>
                                Pejabat
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <select name="pejabat" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih Pejabat Yang Benar')" oninput="setCustomValidity('')">
                                    <option value="" selected disabled>-- Pilih Pejabat --</option>
                                        <option value="Tidak Ada"  <?php if($sm->pejabat=='Tidak Ada') { echo 'selected'; } ?> > Tidak Ada </option>
                                        <option value="Sekretaris Daerah" <?php if($sm->pejabat=='Sekretaris Daerah') { echo 'selected'; } ?>  > Sekretaris Daerah </option>
                                        <option value="Walikota" <?php if($sm->pejabat=='Walikota') { echo 'selected'; } ?> > Walikota </option>
                                    </select> 
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
                                    <input name="disposisi" class="form-control" maxlength="50" value="<?php echo $sm->disposisi?>">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>

                                <div class="row">
                            <div class='col-sm-6'>
                                Ringkasan
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <input name="ringkasan" class="form-control" maxlength="100" value="<?php echo $sm->ringkasan?>" required oninvalid="this.setCustomValidity('Masukan Ringkasan')" oninput="setCustomValidity('')">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                Keterangan
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker2'>
                                    <input name="keterangan" class="form-control" value="<?php echo $sm->keterangan?>" maxlength="100">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                    <!-- <label>Lokasi Penyimpanan </label> -->
                                    <?php 
                                        $lokasi = $this->db->query("SELECT * from tb_suratmasuk LEFT JOIN tb_rak ON tb_suratmasuk.id_rak = tb_rak.id_rak where tb_suratmasuk.id_suratmasuk='$sm->id_suratmasuk'")->result();
                                     foreach($lokasi as $lok)
                                     : ?>
                                    <input type="hidden" class="form-control" name="id_rak" value="<?php echo $lok->id_rak ?>" readonly>
                                        <?php endforeach; ?>
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control" name="file">
                                </div>      
                             <?php foreach($suratmasuk as $pdmk) :
                                        if($pdmk->file=='-'){
                                        ?>
                                        <!-- <img src="<?php echo base_url(). 'assets4/uploads/suratmasuk/jangandihapus.jpg'?>" width="200" height="200" style="display: block; margin: auto;"> -->
                                        <input type="hidden" name="upload2" value="<?php echo '-' ?>">
                                        <?php
                                        }
                                        else{
                                        ?>

                                        <!-- <img src="<?php echo base_url(). 'assets4/uploads/suratmasuk/'.$pdmk->file ?>" width="200" height="200" style="display: block; margin: auto;"> -->
                                        <input type="hidden" name="upload2" value="<?php echo 'assets4/uploads/suratmasuk/'.$pdmk->file ?>">
                                        <?php
                    }
                                    endforeach; ?>
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                                <?php form_close(); ?>
                                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>