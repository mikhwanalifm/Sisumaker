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
                    Tambah Lemari
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Lemari</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <form method="post" action ="<?php echo base_url('administrator/lemari/tambah_lemari_aksi')?>">
                                <div class="form-group">
                                    <label>Kode Lemari</label>
                                    <input type="text" class="form-control" name="kode_lemari" maxlength="2" onkeyup="this.value = this.value.toUpperCase()" readonly value="<?php echo $kode_lemari?>">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"  onKeyPress="return ValidateAlpha(event);" maxlength="25" placeholder="Masukan Keterangan" required oninvalid="this.setCustomValidity('Masukan Keterangan')" oninput="setCustomValidity('')" onkeyup="this.value = this.value.toUpperCase()">
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