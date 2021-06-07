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
                    Edit Rak
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Rak</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    	<?php foreach ($rak as $rk)  : ?>
                    
                       <form method="post" action ="<?php echo base_url('administrator/rak/update_aksi')?>">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_rak" value="<?php echo $rk->id_rak?>" >
    
                                </div>
                                <div class="form-group">
                                    
                                    <?php 
                                    $raku = $this->db->query("Select * from tb_lemari where id_lemari='$rk->id_lemari'")->result();
                                    foreach($raku as $js) : ?>
                                    <input type="hidden" class="form-control" name="id_lemari" value="<?php echo $js->id_lemari?>" readonly >
                                    <?php endforeach; ?>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Nama Rak</label>
                                    <select name="nama_rak" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih Rak')" oninput="setCustomValidity('')">
                                    <option value="" selected disabled>-- Pilih Rak --</option>
                                        <option value="Rak 1" <?php if($rk->nama_rak=='Rak 1') { echo 'selected'; } ?>>Rak 1</option>
                                        <option value="Rak 2"<?php if($rk->nama_rak=='Rak 2') { echo 'selected'; } ?>>Rak 2</option>
                                        <option value="Rak 3"<?php if($rk->nama_rak=='Rak 3') { echo 'selected'; } ?>>Rak 3</option>
                                        <option value="Rak 4"<?php if($rk->nama_rak=='Rak 4') { echo 'selected'; } ?>>Rak 4</option>
                                        <option value="Rak 5"<?php if($rk->nama_rak=='Rak 5') { echo 'selected'; } ?>>Rak 5</option>
                                        <option value="Rak 6"<?php if($rk->nama_rak=='Rak 6') { echo 'selected'; } ?>>Rak 6</option>
                                        <option value="Rak 7"<?php if($rk->nama_rak=='Rak 7') { echo 'selected'; } ?>>Rak 7</option>
                                        <option value="Rak 8"<?php if($rk->nama_rak=='Rak 8') { echo 'selected'; } ?>>Rak 8</option>
                                        <option value="Rak 9"<?php if($rk->nama_rak=='Rak 9') { echo 'selected'; } ?>>Rak 9</option>
                                        <option value="Rak 10"<?php if($rk->nama_rak=='Rak 10') { echo 'selected'; } ?>>Rak 10</option>
                                    </select>
                                   </div>
                                <div class="form-group">
                                    <label>ID File</label>
                                    <input type="text" class="form-control" maxlength="25" name="id_file" readonly value="<?php echo $rk->id_file?>">
                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user?>" >
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih Tahun')" oninput="setCustomValidity('')">
                                            <option>Pilih Tahun</option>
                                            <?php 
                                            $years = range(2000, strftime("%Y", time()));
                                            foreach($years as $year) : ?>
                                                <option value="<?php echo $year; ?>" <?php if($year=="$rk->tahun") { echo 'selected="selected"'; } ?> ><?php echo $year; ?></option>
                                            <?php endforeach; ?>
                                            </select>
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