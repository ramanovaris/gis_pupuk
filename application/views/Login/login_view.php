<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets_login/images/icons/favicon.ico');?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login/vendor/animate/animate.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login/vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_login/css/main.css');?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url('assets_login/images/img-01.png');?>" alt="IMG">
				</div>

				<?php echo form_open('Login/masuk'); ?>
				<form class="login100-form">
					<span class="login100-form-title">
						Selamat Datang
					</span>
					<div class="wrap-input100"">
						<input class="input100" type="text" name="txtUsername" placeholder="Masukan Username" autocomplete="off" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100" data-validate = "Password is required">
						<input class="input100" type="password" name="txtPassword" placeholder="Masukan Password" autocomplete="off" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<?php if($this->session->flashdata('login_gagal')):?>
                    <div class="text-center p-t-12" id="pesan_login">
						<span class="txt1"><font color="red" >
							Username atau Password Anda Salah
						</font></span>
					</div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('blm_konfirmasi')):?>
                    <div class="text-center p-t-12" id="pesan_login">
						<span class="txt1"><font color="red" >
							Akun Anda Belum di Konfirmasi, <br> Silahkan Tunggu Konfirmasi ADMIN
						</font></span>
					</div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('daftar_berhasil')):?>
                    <div class="text-center p-t-12" id="pesan_daftar">
						<span class="txt1"><font color="green" >
							Terimakasih Telah Mendaftar, <br> Silahkan Tunggu Konfirmasi ADMIN
						</font></span>
					</div>
                    <?php endif; ?>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Masuk
						</button>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="button" style="background-color: red;" onclick="window.location='<?php echo site_url("Home");?>'">Kembali
						</button>
					</div>

					<div class="text-center p-t-50">
						Belum mempunyai Akun? 
						<a class="txt2" href="<?php echo base_url(); ?>Daftar">
							Buat Akun Sekarang
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
				<?php echo form_open(); ?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		setTimeout(function() {
		    $('#pesan_login').fadeOut('slow');
		}, 5000);
		setTimeout(function() {
		    $('#pesan_daftar').fadeOut('slow');
		}, 10000); 
	</script>
	
<!--===============================================================================================-->	
	<script src="<?php echo base_url('assets_login/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets_login/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?php echo base_url('assets_login/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets_login/vendor/select2/select2.min.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets_login/vendor/tilt/tilt.jquery.min.js');?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets_login/js/main.js');?>"></script>

</body>
</html>