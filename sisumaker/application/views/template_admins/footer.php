
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; Copyright by Cipher - <strong><a href="https://www.instagram.com/tninformatika17/">Informatika'17</a></strong>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div><!-- jQuery -->
    <script src="<?php echo base_url('assets5/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
    <script src="<?= base_url() ?>assets4/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets4/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url() ?>assets4/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url() ?>assets4/build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url() ?>assets4/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>assets4/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="<?php echo base_url()?>sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url()?>sweetalert/myscript.js"></script>
    <script>
$(document).ready(function(){
  $('#pass').hide();
  $("#hide").click(function(){
    $("#pass").hide();
    $('#password').val('0');
  });
  $("#show").click(function(){
    $("#pass").show();
    $('#password').val('')
  });
});
</script>
		<script>
		$(document).ready(function () {
			$('#lemari').change(function (e) { 
				e.preventDefault();
				let id_lemari=$('#lemari').val();
				$.ajax({
					type: "post",
					url: "<?php echo base_url('administrator/rak/fill_rak')?>",
					data: {id:id_lemari},
					dataType: "JSON",
					success: function (response) {
						// console.log(response);
						$('#id_file').val(response);
					}
				});
			});
		});
		</script>

  </body>
</html>
