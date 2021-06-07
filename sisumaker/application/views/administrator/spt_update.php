<script>
function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
</script>


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Ubah Agenda Surat Tugas
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Ubah Agenda Surat Tugas</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <form method="post" action ="<?php echo base_url('administrator/spt/update_aksi')?>">
                       <?php foreach($spt as $sp) : ?>
                                <div class="form-group">
                                    <label>Nomor Surat</label>
                                    <input type="hidden" name="id_user" value="<?php echo $sp->id_user ?>">
                                    <input type="hidden" name="id_spt" value="<?php echo $sp->id_spt?>">
                                    <input type="text" class="form-control" name="nosurat" value="<?php echo $sp->nosurat?>" maxlength="30" placeholder="Masukan Nomor Surat" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
                                </div>
                                
                                <div class="form-group">
                                    <label>Tanggal Keluar</label>
                                    <input type="date" class="form-control" name="tgl_keluar" value="<?php echo $sp->tgl_keluar?>" maxlength="30" placeholder="Masukan Tanggal Keluar" required oninvalid="this.setCustomValidity('Masukan Tanggal Keluar')" oninput="setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <label>TMT</label>
                                    <input type="date" class="form-control" name="tmt"  value="<?php echo $sp->tmt?>" maxlength="30" placeholder="Masukan TMT" required oninvalid="this.setCustomValidity('Masukan TMT')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Pengelola</label>
                                    <input type="text" class="form-control" name="pengelola" maxlength="30" value="<?php echo $sp->pengelola?>" placeholder="Masukan Pengelola" required oninvalid="this.setCustomValidity('Masukan Pengelola')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"  maxlength="100" value="<?php echo $sp->keterangan?>" placeholder="Masukan Keterangan" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')">
                                    
                                </div>                 
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                       <?php endforeach; ?>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>