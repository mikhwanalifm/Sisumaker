<script>
function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript">
    
    $(function(){
      $("#lemari").change(function(){
        var displaycourse=$("#lemari option:selected ").text();
        $("#txtresults").val(displaycourse);
      });
    });


    window.onload = function() {
    document.getElementById('myField').onkeyup = function() {
        // Validate that the first letter is A-Za-z and capture it
        var letter = this.value.match(/^([A-Za-z])/);

        // If a letter was found
        if(letter !== null) {
            // Change it to lowercase and update the value
            letter = letter[0].toLowerCase();
            this.value = letter + this.value.substring(1);

            // Do the request
        }
    }
}
  </script>


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>
                    Tambah Rak
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>
 
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Rak</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                       <form method="post" action ="<?php echo base_url('administrator/rak/tambah_rak_aksi')?>">
                                <div class="form-group">
                                    <label>Kode Lemari</label>
                                    <select name="id_lemari" class="form-control" id="lemari" required oninvalid="this.setCustomValidity('Silahkan Pilih Lemari')" oninput="setCustomValidity('')">
                                    <option value="" selected disabled>-- Pilih Lemari --</option>
                                    <?php 
                                    $lemari = $this->db->query("Select * from tb_lemari")->result();
                                    foreach($lemari as $lem) : ?>
                                        <option value="<?php echo $lem->id_lemari ?>"><?php echo $lem->kode_lemari." ( ".$lem->keterangan." ) ";?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Rak</label>
                                    <select name="nama_rak" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih Rak')" oninput="setCustomValidity('')">
                                    <option value="" selected disabled>-- Pilih Rak --</option>
                                        <option value="Rak 1">Rak 1</option>
                                        <option value="Rak 2">Rak 2</option>
                                        <option value="Rak 3">Rak 3</option>
                                        <option value="Rak 4">Rak 4</option>
                                        <option value="Rak 5">Rak 5</option>
                                        <option value="Rak 6">Rak 6</option>
                                        <option value="Rak 7">Rak 7</option>
                                        <option value="Rak 9">Rak 8</option>
                                        <option value="Rak 9">Rak 9</option>
                                        <option value="Rak 10">Rak 10</option>
                                    </select>
                                   </div>
                                <div class="form-group">
                                    <label>Id File</label>
                                    <input type="text" class="form-control" name="id_file" placeholder="Contoh: A1,A2 | B1,B2, Samakan Dengan Kode Lemari" maxlength="3" onkeyup="this.value = this.value.toUpperCase()" required oninvalid="this.setCustomValidity('Masukan Angka Saja')" oninput="setCustomValidity('')">
                                </div>
                                    </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <select name="tahun" class="form-control" required oninvalid="this.setCustomValidity('Silahkan Pilih Tahun')" oninput="setCustomValidity('')">
                                            <option>Pilih Tahun</option>
                                            <?php 
                                            $years = range(2000, strftime("%Y", time()));
                                            foreach($years as $year) : ?>
                                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php endforeach; ?>
                                            </select>
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