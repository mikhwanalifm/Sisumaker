<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $("#lemari").change(function (){
                var url = "<?php echo site_url('operator/suratmasuk/add_ajax_rak');?>/"+$(this).val();
                $('#rak').load(url);
                return false;
            })
   
   $("#rak").change(function (){
                var url = "<?php echo site_url('operator/suratmasuk/add_ajax_file');?>/"+$(this).val();
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
                    Tambah Surat Masuk
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Silahkan Isi Data Dibawah ini</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    <?php echo form_open_multipart('operator/suratmasuk/tambah_sm_aksi') ?>
                                <div class="form-group">
                                    <label>Pengirim</label>
                                    <input type="text" class="form-control text-capitalize" name="pengirim" placeholder="Masukan Pengirim" maxlength="35" required oninvalid="this.setCustomValidity('Masukan Pengirim')" oninput="setCustomValidity('')">
                                </div>
                               
                                <div class="row">
                            <div class='col-sm-6'>
                                Tanggal Surat Masuk
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <input type="date" class="form-control" name="tgl_masuk" required oninvalid="this.setCustomValidity('Masukan Tanggal Masuk')" oninput="setCustomValidity('')">
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
                                    <input type="date" class="form-control" name="tgl_terima" required oninvalid="this.setCustomValidity('Masukan Tanggal Diterima')" oninput="setCustomValidity('')">
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
                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user?>">
                                    <input type="text" class="form-control" name="nosurat" maxlength="50" placeholder="Masukan Nomor Surat" required oninvalid="this.setCustomValidity('Masukan Nomor Surat')" oninput="setCustomValidity('')">
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
                                    <input type="text" class="form-control" name="perihal" maxlength="100" placeholder="Masukan Perihal" required oninvalid="this.setCustomValidity('Masukan Perihal')" oninput="setCustomValidity('')">
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
                                        <option value="<?php echo $js->id_jenissurat ?>"><?php echo $js->nama_jenissurat;?></option>
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
                                        <option value="Tidak Ada"> Tidak Ada </option>
                                        <option value="Sekretaris Daerah"> Sekretaris Daerah </option>
                                        <option value="Walikota"> Walikota </option>
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
                                    <input name="disposisi" maxlength="50" class="form-control" placeholder="Masukan Disposisi">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>

                                <div class="row">
                            <div class='col-sm-6'>
                                Lokasi Lemari
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <select name="" class="form-control" id="lemari" required oninvalid="this.setCustomValidity('Silahkan Pilih Lokasi Penyimpanan Yang Benar')" oninput="setCustomValidity('')">
                                    <option value="" selected disabled>-- Pilih Lokasi Lemari --</option>
                                    <?php 
                                    $rak = $this->db->query("SELECT * from tb_lemari")->result();
                                    foreach($rak as $raku) : ?>
                                        <option value="<?php echo $raku->id_lemari?>"><?php echo $raku->kode_lemari."-".$raku->keterangan ;?></option>
                                        <?php endforeach; ?>
                                    </select>  
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                Lokasi Rak dan File
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker2'>
                                    <select name="id_rak" class="form-control" id="rak" required oninvalid="this.setCustomValidity('Silahkan Pilih Lokasi Penyimpanan Yang Benar')" oninput="setCustomValidity('')">
                                        <option value=''>-- Pilih Lokasi Rak dan File --</option>
                                        </select>
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
                                    <input name="ringkasan" class="form-control" maxlength="100" placeholder="Masukan Ringkasan" required oninvalid="this.setCustomValidity('Masukan Ringkasan')" oninput="setCustomValidity('')">
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
                                    <input name="keterangan" maxlength="100" class="form-control" placeholder="Masukan Keterangan">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control" name="file">
                                </div>

                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                                <?php form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>