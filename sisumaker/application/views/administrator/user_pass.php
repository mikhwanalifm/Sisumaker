<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Ganti Password
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Ganti Password</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    	
                    
                       <form method="post" action ="<?php echo base_url('administrator/user/change_pass')?>">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" class="form-control" name="old_pass" value="<?= set_value('old_pass') ?>" class="form-control" placeholder="Masukan Password Lama">
                                    <?= form_error('old_pass') ?>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" class="form-control" name="new_pass" value="<?= set_value('new_pass') ?>" class="form-control" placeholder="Masukan Password Baru">
                                    <?= form_error('new_pass') ?>
                                </div>
                                <div class="form-group">
                                    <label>Ulangi Password Baru</label>
                                    <input type="password" class="form-control" name="rep_new_pass" value="<?= set_value('rep_new_pass') ?>" class="form-control" placeholder="Masukan Password Baru">
                                    <?= form_error('rep_new_pass') ?>
                                </div>

                                <button type="submit" class="btn btn-primary">SIMPAN</button>

                            </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>