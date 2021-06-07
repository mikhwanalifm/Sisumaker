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
                    Informasi Surat Keluar
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
                    foreach($detail as $sk) : ?>
                    <?php echo form_open_multipart('operator/suratkeluar/update_aksi') ?>
 
                    <div class="row">
                            <div class='col-sm-6'>
                                Tujuan
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <input type="hidden" name="id_suratkeluar" value="<?php echo $sk->id_suratkeluar ?>">
                                    <input type="text" readonly class="form-control" readonly name="tujuan" value="<?php echo $sk->tujuan ?>" placeholder="Masukan Tujuan" maxlength="25" required oninvalid="this.setCustomValidity('Masukan Pengirim')" oninput="setCustomValidity('')">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class='col-sm-6'>
                                Tanggal Keluar
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker2'>
                                    <input type="date"  readonly class="form-control" name="tgl_keluar" value="<?php echo $sk->tgl_keluar ?>" required oninvalid="this.setCustomValidity('Silahkan Pilih Tanggal Keluar')" oninput="setCustomValidity('')">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
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
                                    
                                    <input type="text" readonly class="form-control" name="nosurat" value="<?php echo $sk->nosurat?>" maxlength="50" placeholder="Masukan Nomor Surat" required oninvalid="this.setCustomValidity('Masukan Nomor Surat')" oninput="setCustomValidity('')">
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
                                    <input type="text" readonly class="form-control" name="perihal" value="<?php echo $sk->perihal ?>" placeholder="Masukan Perihal" maxlength="100" required oninvalid="this.setCustomValidity('Masukan Perihal')" oninput="setCustomValidity('')">
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
                                    <select name="id_jenissurat" readonly class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih Jenis Surat Yang Benar')" oninput="setCustomValidity('')">
                                    <option value="" selected disabled>-- Pilih Jenis Surat --</option>
                                    <?php 
                                    $jenis = $this->db->query("Select * from tb_jenis")->result();
                                    foreach($jenis as $js) : ?>
                                        <option value="<?php echo $js->id_jenissurat ?>" <?php if($js->id_jenissurat=="$sk->id_jenissurat") { echo 'selected="selected"'; } ?>><?php echo $js->nama_jenissurat;?></option>
                                        <?php endforeach; ?>
                                    </select>     
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
                                        $lokasi = $this->db->query("SELECT * from tb_suratkeluar LEFT JOIN tb_rak ON tb_suratkeluar.id_rak = tb_rak.id_rak where tb_suratkeluar.id_suratkeluar='$sk->id_suratkeluar'")->result();
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

                    <div class="form-group">
                                    <!-- <label>Lokasi Penyimpanan </label> -->
                                    <?php 
                                        $lokasi = $this->db->query("SELECT * from tb_suratkeluar LEFT JOIN tb_rak ON tb_suratkeluar.id_rak = tb_rak.id_rak where tb_suratkeluar.id_suratkeluar='$sk->id_suratkeluar'")->result();
                                     foreach($lokasi as $lok)
                                     : ?>
                                    <input type="hidden" class="form-control" name="id_rak" value="<?php echo $lok->id_rak ?>" readonly>
                                        <?php endforeach; ?>
                                
                                </div>

                    <div class="row">
                            <div class='col-sm-6'>
                                Ringkasan
                                <div class="form-group">
                                    <div class='input-group date' id='myDatepicker'>
                                    <input name="ringkasan" readonly class="form-control" maxlength="100" value="<?php echo $sk->ringkasan?>" required oninvalid="this.setCustomValidity('Masukan Ringkasan')" oninput="setCustomValidity('')">
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
                                    <input name="keterangan" readonly class="form-control"  maxlength="100" value="<?php echo $sk->ringkasan?>">
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-backward"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <table>
                                <label>FILE</label>
                                <tr class="text-center">
                                                <td>
                                                  <?php
                                                    if($sk->file=='-'){
                                                      ?>
                                                      <img src="<?php echo base_url(). 'assets4/uploads/suratkeluar/jangandihapus.jpg'?>" width="200" height="200" style="display: block; margin: auto;">
                                                      <?php
                                                    }
                                                    else{
                                                    ?>

                                                    <img src="<?php echo base_url(). 'assets4/uploads/suratkeluar/'.$sk->file ?>" width="200" height="200" style="display: block; margin: auto;">
                                                    <?php
                                                    } ?></td>
                                </tr>
                                </table>
                                <?php form_close(); ?>
                                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
