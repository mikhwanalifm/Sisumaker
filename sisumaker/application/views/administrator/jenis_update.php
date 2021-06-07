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
                    Edit Jenis Surat
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Jenis Surat</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    	<?php foreach ($jenis as $js)  : ?>
                    
                       <form method="post" action ="<?php echo base_url('administrator/jenis/update_aksi')?>">
                                <div class="form-group">
                                    <label>Kode Jenis Surat</label>
                                    <input type="hidden" class="form-control" name="id_jenissurat" value="<?php echo $js->id_jenissurat?>" >
                                    <input type="text" class="form-control" name="kode_jenissurat" readonly value="<?php echo $js->kode_jenissurat?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Surat</label>
                                    <input type="text" class="form-control text-capitalize" maxlength="20" onKeyPress="return ValidateAlpha(event);" name="nama_jenissurat" placeholder="Masukan Jenis Surat" required oninvalid="this.setCustomValidity('Masukan Jenis Surat')" oninput="setCustomValidity('')"  value="<?php echo $js->nama_jenissurat?>">
                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user?>" >
                                </div>
                                
                                <button type="submit" class="btn btn-primary">SIMPAN</button>

                            </form>
                            <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>