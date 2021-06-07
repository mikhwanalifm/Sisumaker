<script>

function isNumberKey(evt){  <!--Function to accept only numeric values-->
    //var e = evt || window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
        return false;
        return true;
	}
</script>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Tambah User
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah User</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <form method="post" action ="<?php echo base_url('administrator/user/tambah_users_aksi')?>">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" maxlength="30" name="nama_lengkap" placeholder="Masukan Nama Lengkap" required oninvalid="this.setCustomValidity('Masukan Nama Lengkap')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" maxlength="20" name="username" placeholder="Masukan Username" required oninvalid="this.setCustomValidity('Masukan Username')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" maxlength="50" placeholder="Masukan Password"
                                    required oninvalid="this.setCustomValidity('Masukan Passowrd')" oninput="setCustomValidity('')"
                                    id="myInput" >
                                    <input type="checkbox" onclick="myFunction()">Show Password
                                </div>
                                
                                


                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukan Email" maxlength="20" required oninvalid="this.setCustomValidity('Masukan Email')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Handphone</label>
                                    <input type="text" class="form-control" name="no_hp" placeholder="Masukan Nomor Handphone" maxlength="13" required oninvalid="this.setCustomValidity('Masukan Nomor Handphone')" oninput="setCustomValidity('')" onkeydown="return ( event.ctrlKey || event.altKey 
                                        || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                        || (95<event.keyCode && event.keyCode<106)
                                        || (event.keyCode==8) || (event.keyCode==9) 
                                        || (event.keyCode>34 && event.keyCode<40) 
                                        || (event.keyCode==46) )">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="blokir" value="N" >
                                </div>
                                <div class="form-group">
                                    <label> Level </label> <br>
                                    <input type="radio" class="flat" name="level" value="admin" /> Administrator &nbsp;
                                    <input type="radio" class="flat" name="level" value="operator" required /> Operator
                                    </div>

                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>