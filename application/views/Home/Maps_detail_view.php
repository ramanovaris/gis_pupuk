<!DOCTYPE html>
<html lang="en">
<head>
	<title>Map Detail</title>
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
					<!-- Header Icon -->
					<div class="header-icons">
						<a href="<?php echo base_url(); ?>Login">Masuk</a>
				
						<a href="<?php echo base_url(); ?>Login" class="header-wrapicon1 dis-block m-l-30">
							<img src="<?php echo base_url('assets_freeuser/images/icons/icon-header-01.png');?>">
						</a>
					</div>
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

	<!-- Title Page -->
	<section>
		<?php foreach ($kandang as $row):?>
		<h2 class="l-text100 t-center">
			Detail Maps Kandang <?php echo $row['nama_pemilik']; ?>
		</h2>
		<?php endforeach;?>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-12 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="map"></div>
					</div>
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

	<script>
		// var view = document.getElementById("tampilkan");
		// function getLocation() {
		//     if (navigator.geolocation) {
		//         navigator.geolocation.getCurrentPosition(showPosition);
		//     } else {
		//         view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
		//     }
		// }
		//  function showPosition(position) {
		//     view.innerHTML = "Latitude: " + position.coords.latitude + 
		//     "<br>Longitude: " + position.coords.longitude; 
		//  }

		//  function showError(error) {
		//     switch(error.code) {
		//         case error.PERMISSION_DENIED:
		//             view.innerHTML = "Yah, mau deteksi lokasi tapi ga boleh :("
		//             break;
		//         case error.POSITION_UNAVAILABLE:
		//             view.innerHTML = "Yah, Info lokasimu nggak bisa ditemukan nih"
		//             break;
		//         case error.TIMEOUT:
		//             view.innerHTML = "Requestnya timeout bro"
		//             break;
		//         case error.UNKNOWN_ERROR:
		//             view.innerHTML = "An unknown error occurred."
		//             break;
		//     }
		//  }
    	function initMap(){
             var locations = [ 
                    <?php
                    	$kd_kandang = $this->uri->segment(3);

                        $query = $this->db->query('SELECT * FROM kandang WHERE kd_kandang = '.$kd_kandang.'');
						$data   =   array();
						foreach ($query->result_array() as $row):
							$data[] = $row['lintang'];
							$data[] = $row['bujur'];
							$data[] = $row['kd_kandang'];
							echo '["'.$row['lintang'].'",'.$row['bujur'].','.$row['kd_kandang'].'],';
						endforeach; 
                    ?>

             ];

                    var directionsService = new google.maps.DirectionsService;
                    var directionsDisplay = new google.maps.DirectionsRenderer;

                    for (var i=0; i<locations.length; i++) {
                        var lintang = parseFloat(locations[i][0]);
                        var bujur = parseFloat(locations[i][1]);
                        
                        var map = new google.maps.Map(document.getElementById('map'),{
	                        center: {lat:lintang, lng:bujur},
	                        zoom: 15
	                    }); 
                    }

                    var marker;
                    var infowindow = new google.maps.InfoWindow();

                    for (var i=0; i<locations.length; i++) {
                        marker = new google.maps.Marker({
                            position : new google.maps.LatLng(locations[i][0],locations[i][1]),
                        map: map

                        });

                        google.maps.event.addListener(marker,'click', (function(marker, i) {
                            return function() {
                                kd_kandang = locations[i][2];
                            	window.location.href = "<?php echo base_url('Home/product_detail/')?>"+kd_kandang;
                            }
                        })(marker, i));    
                    }
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
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script> -->
	<!-------------------------  Key Google Maps API --------------------->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdd5HZzwPBwQMUfD28ODjb74lgCJDt1_o&callback=initMap&callback=initMap">
    </script>
	<script src="<?php echo base_url('assets_freeuser/js/map-custom.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets_freeuser/js/main.js');?>"></script>

</body>
</html>
