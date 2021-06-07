
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Edit User
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit User</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                    	<?php foreach ($users as $user)  : ?>
                    
                       <form method="post" action ="<?php echo base_url('administrator/user/update_aksi')?>">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $user->id_user?>" >
                                    <input type="text" class="form-control" name="nama_lengkap" maxlength="30" placeholder="Masukan Nama Lengkap" required oninvalid="this.setCustomValidity('Masukan Nama Lengkap')" oninput="setCustomValidity('')" value="<?php echo $user->nama_lengkap?>">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" maxlength="20" placeholder="Masukan Username" required oninvalid="this.setCustomValidity('Masukan Username')" oninput="setCustomValidity('')" value="<?php echo $user->username?>">
                                </div>
                                <a href="#" id="hide"><div class="btn btn-sm btn-danger"><i class="fa fa-low-vision"></i> Sembunyikan Password</div></a>
                                <a href="#" id="show"><div class="btn btn-sm btn-success"><i class="fa fa-eye"></i> Ganti Password</div></a>
                                
                                <div class="form-group" id="pass">
                                    <label>Password</label>
                                    <input type="text" class="form-control" id="password"  name="password" maxlength="50" placeholder="Masukan Password" required oninvalid="this.setCustomValidity('Masukan Password')" oninput="setCustomValidity('')" value="0">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" maxlength="20" placeholder="Masukan Email" required oninvalid="this.setCustomValidity('Masukan Email')" oninput="setCustomValidity('')" value="<?php echo $user->email?>">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Handphone</label>
                                    <input type="hidden" class="form-control" name="id_sessions" placeholder="Masukan Username" value="<?php echo $user->id_sessions?>">
                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukan Nomor Handphone" maxlength="13" required oninvalid="this.setCustomValidity('Masukan Nomor Handphone')" oninput="setCustomValidity('')" onkeydown="return ( event.ctrlKey || event.altKey 
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9) 
                                        || (event.keyCode>34 && event.keyCode<40) 
                                        || (event.keyCode==46) )" value="<?php echo $user->no_hp?>">
                                </div>
                                
                                <div class="form-group">
                                <label> Level </label> <br>
                                <input type="radio" class="flat" name="level" value="admin" <?php if($user->level=='admin') { echo 'checked=""'; } ?>/> Administrator &nbsp;
                                <input type="radio" class="flat" name="level" value="operator"  required <?php if($user->level=='operator') { echo 'checked=""'; } ?> /> Operator
                                </div>

                                <div class="form-group">
                                <!-- <label> Blokir </label> <br>
                                <input type="radio" class="flat" name="blokir" value="Y" <?php if($user->blokir=='Y') { echo 'checked=""'; } ?>/> YA &nbsp;
                                <input type="radio" class="flat" name="blokir" value="N"  required <?php if($user->blokir=='N') { echo 'checked=""'; } ?> /> TIDAK -->
                                <input type="hidden" value="<?php echo $user->blokir ?>" />
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