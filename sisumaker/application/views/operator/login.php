<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<script language="JavaScript">
<!-- 
		var space = " ";
		var speed = "50";
		var pos = -20;
		var msg = "Kantor Camat Selebar Kota Bengkulu";
		function Scroll()
		{
		document.title = msg.substring(pos, msg.length) + space;
		pos++;
		if (pos > msg.length + 0) pos = -20;
		window.setTimeout("Scroll()", speed);

		}
		Scroll();
		-->
</script>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets1/images/icons/pemrov1.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets1/css/main1.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
	
		<div class="container-login100" style="background-image: url('<?= base_url() ?>assets1/images/bg-01.jpg');">
			<div class="wrap-login100">
			<p style="text-align: center; color: white; font-size:20px; "> Sistem Informasi Monitoring Surat Masuk dan Keluar </p> <br>
				<form class="login100-form validate-form" method="post" action="<?php echo base_url('operator/auth/proses_login') ?>" >
					<span class="login100-form-logo">
						<!-- <i class="zmdi zmdi-landscape"></i> -->
						<img src="../assets1/images/pemprov.png" width="75px" height="75px">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<?php echo $this->session->flashdata('pesan') ?>
					<br>
					<div class="wrap-input100 validate-input" data-validate = "Masukan Username">
						<input class="input100" type="text" name="username" placeholder="Username" maxlength="20">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Masukan Password">
						<input class="input100" type="password" name="password" placeholder="Password" maxlength="50">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets1/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets1/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= base_url() ?>assets1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets1/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= base_url() ?>assets1/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets1/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?= base_url() ?>assets1/js/main.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>