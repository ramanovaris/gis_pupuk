<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kandang Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url('assets_freeuser/images/icons/favicon.png');?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/vendor/bootstrap/css/bootstrap.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/fonts/themify/themify-icons.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/fonts/elegant-font/html-css/style.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/vendor/animate/animate.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/vendor/css-hamburgers/hamburgers.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/vendor/animsition/css/animsition.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/vendor/select2/select2.min.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/vendor/slick/slick.css');?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/css/main.css');?>">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="<?php echo base_url('assets_freeuser/images/icons/gis.png');?>" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="<?php echo base_url(); ?>Home">Home</a>
							</li>

							<li class="sale-noti">
								<a href="<?php echo base_url(); ?>Home/marketplace">Marketplace</a>
							</li>

							<li>
								<a href="<?php echo base_url(); ?>Home/maps">Maps</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="<?php echo base_url(); ?>Login">Masuk</a>
			
					<a href="<?php echo base_url(); ?>Login" class="header-wrapicon1 dis-block m-l-30">
						<img src="<?php echo base_url('assets_freeuser/images/icons/icon-header-01.png');?>">
					</a>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="<?php echo base_url('assets_freeuser/images/icons/gis.png');?>" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="<?php echo base_url('assets_freeuser/images/icons/icon-header-01.png');?>" class="header-icon1" alt="ICON">
					</a>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-menu-mobile">
						<a href="<?php echo base_url(); ?>Home">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url(); ?>Home/marketplace">Marketplace</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url(); ?>Home/maps">Maps</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<?php foreach ($kandang as $row):?>
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">

					<div class="slick3">
						<div class="item-slick3">
							<div class="wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/kandang/'.$row['foto_kandang'])?>" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<span class="m-text17">
					Kandang <b><?php echo $row['nama_pemilik']; ?></b>
				</span>

				<p class="s-text100 p-t-10">
					Harga: <b style="color: black"><?php echo ' Rp. '.$row['harga_pupuk']. ' / karung'; ?></b>
				</p>

				<p class="s-text100 p-t-10">
					Jumlah Pupuk: <b style="color: black"><?php echo $row['jumlah_pupuk']. ' karung'; ?></b>
				</p>
			
				<p class="s-text100 p-t-10">
					Alamat Kandang: <b style="color: black"><?php echo $row['alamat_kandang']; ?></b>
				</p>

				<p class="s-text100 p-t-10">
					Kecamatan Kandang: <b style="color: black"><?php echo $row['nama_kec']; ?></b>
				</p>
				
				<p class="s-text100 p-t-10">
					Terkahir Diubah: <b style="color: black"><?php echo $row['terakhir_diubah']; ?></b>
				</p>

				<!--  -->
				<div class="p-t-33 p-b-60">
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
								<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="Map_detail()">
									Lihat di Maps
								</button>
							</div>
						</div>
					</div>
				</div>

				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Data Diri Pemilik Kandang
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text100 p-t-10">
							Nama Pemilik Kandang : <b style="color: black"><?php echo $row['nama_pemilik']; ?></b>
						</p>

						<p class="s-text100 p-t-10">
							Jenis Kelamin : <b style="color: black"><?php echo $row['jk']; ?></b>
						</p>

						<p class="s-text100 p-t-10">
							Alamat : <b style="color: black"><?php echo $row['alamat']; ?></b>
						</p>

						<p class="s-text100 p-t-10">
							Kecamatan : <b style="color: black"><?php echo $row['nama_kec']; ?></b>
						</p>

						<p class="s-text100 p-t-10">
							Agama : <b style="color: black"><?php echo $row['nama_agama']; ?></b>
						</p>

						<p class="s-text100 p-t-10">
							No. HP : <b style="color: black"><?php echo $row['no_hp']; ?></b>
						</p>
						<br>

						<label>Foto Profile</label>
						<img src="<?php echo base_url('assets/upload/foto/'.$row['foto']);?>" width="100%" height="100%" border="5">
					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
	</div>

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="t-center p-l-15 p-r-15">
			<h4 class="s-text12 p-b-30">
					Kenal Lebih Dekat
			</h4>
			<div class="t-center">
				Ada pertanyaan? Silahkan hubungi kami di 082236941504
			</div>

			<div class="t-center p-t-30">
				<a href="https://www.instagram.com/ramanovaris/?hl=id" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
			<div class="t-center s-text8 p-t-20">
				Copyright © 2019 All rights reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>

	<script type="text/javascript">
		function Map_detail() {
			kd_kandang = <?php echo $this->uri->segment(3); ?>;
			window.location.href = "<?php echo base_url('Home/maps_detail/')?>"+kd_kandang;
		}
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/animsition/js/animsition.min.js');?>"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/bootstrap/js/popper.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/select2/select2.min.js');?>"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/slick/slick.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/js/slick-custom.js');?>"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/sweetalert/sweetalert.min.js');?>"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});

		// $('.btn-addcart-product-detail').each(function(){
		// 	var nameProduct = $('.product-detail-name').html();
		// 	$(this).on('click', function(){
		// 		swal(nameProduct, "is added to wishlist !", "success");
		// 	});
		// });
	</script>

<!--===============================================================================================-->
	<script src="<?php echo base_url('assets_freeuser/js/main.js');?>"></script>

</body>
</html>
