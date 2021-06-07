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
                    Ubah Agenda Legalisir
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Ubah Agenda Legalisir</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <form method="post" action ="<?php echo base_url('operator/legalisir/update_aksi')?>">
                       <?php foreach($legalisir as $leg) : ?>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="hidden" name="id_user" value="<?php echo $leg->id_user ?>">
                                    <input type="hidden" name="id_legalisir" value="<?php echo $leg->id_legalisir?>">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $leg->nama?>" maxlength="30" placeholder="Masukan Nama" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Surat</label>
                                    <input type="text" class="form-control" name="noreg"  value="<?php echo $leg->noreg?>" maxlength="30" placeholder="Masukan Nomor Surat" required oninvalid="this.setCustomValidity('Masukan Nomor Surat')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Keluar</label>
                                    <input type="date" class="form-control" name="tgl_keluar" value="<?php echo $leg->tgl_keluar?>" maxlength="30" placeholder="Masukan Tanggal Keluar" required oninvalid="this.setCustomValidity('Masukan Tanggal Keluar')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" maxlength="100" value="<?php echo $leg->alamat?>" placeholder="Masukan Alamat" required oninvalid="this.setCustomValidity('Masukan Alamat')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"  maxlength="100" value="<?php echo $leg->keterangan?>" placeholder="Masukan Keterangan" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')">
                                    
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