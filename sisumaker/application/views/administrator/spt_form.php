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
                    Tambah Agenda Surat Tugas
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Agenda Surat Tugas</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <form method="post" action ="<?php echo base_url('administrator/spt/tambah_spt_aksi')?>">
                                <div class="form-group">
                                    <label>Nomor Surat</label>
                                    <input type="text" class="form-control" name="nosurat" maxlength="30" placeholder="Masukan Nomor Surat" required oninvalid="this.setCustomValidity('Masukan Nomor Surat')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Keluar</label>
                                    <input type="date" class="form-control" name="tgl_keluar" maxlength="30" placeholder="Masukan Tanggal Keluar" required oninvalid="this.setCustomValidity('Masukan Tanggal Keluar')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Pengelola</label>
                                    <input type="text" class="form-control" name="pengelola" maxlength="100" placeholder="Masukan Pengelola" required oninvalid="this.setCustomValidity('Masukan Pengelola')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>TMT</label>
                                    <input type="date" class="form-control" name="tmt" maxlength="30" placeholder="Masukan TMT" required oninvalid="this.setCustomValidity('Masukan TMT')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"  maxlength="100" placeholder="Masukan Keterangan" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')">
                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user?>" >
                                </div>                 
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>