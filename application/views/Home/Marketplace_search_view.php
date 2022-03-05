<!DOCTYPE html>
<html lang="en">
<head>
	<title>Marketplace</title>
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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_freeuser/vendor/noui/nouislider.min.css');?>">
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
		<div class="wrap-side-menu">
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


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<?php echo form_open('Home/search') ?>
							<div class="search-product pos-relative bo4 of-hidden">
								<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="keyword" placeholder="Cara Nama Kandang">

								<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" type="submit" name="search_submit" value="Cari">
									<i class="fs-12 fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
							<?php echo form_close() ?>
							
							<br>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<!-- <div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting">
									<option>Default Sorting</option>
									<option>Popularity</option>
									<option>Price: low to high</option>
									<option>Price: high to low</option>
								</select>
							</div>
						</div>
					</div> -->

					<!-- Product -->
					<div class="row">
						<?php foreach ($kandang as $row):?>
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="<?php echo base_url('assets/upload/kandang/'.$row['foto_kandang'])?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<!-- <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button> -->
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a href="<?php echo base_url('Home/product_detail/'.$row['kd_kandang'])?>" class="block2-name dis-block s-text3 p-b-5">
										Kandang <b><?php echo $row['nama_pemilik']; ?></b>
									</a>
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>


					<!-- <div class="row">
				        <div class="col">
				            Tampilkan pagination
				            <?php echo $pagination; ?>
				        </div>
				    </div> -->
				</div>
			</div>
		</div>
	</section>


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
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/daterangepicker/moment.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/daterangepicker/daterangepicker.js');?>"></script>
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
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url('assets_freeuser/vendor/noui/nouislider.min.js');?>"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets_freeuser/js/main.js');?>"></script>

</body>
</html>
