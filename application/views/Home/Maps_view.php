<!DOCTYPE html>
<html lang="en">
<head>
	<title>Maps</title>
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
	
	<style>
      /*html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
      }
      #map {
        height: 400px;
        width: 100%;
      }*/
      #legend {
        font-family: Arial, sans-serif;
        background: #fff;
        padding: 10px;
        margin: 10px;
        border: 3px solid #000;
      }
      #legend h3 {
        margin-top: 0;
      }
      #legend img {
        vertical-align: middle;
      }
  </style>
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

							<li>
								<a href="<?php echo base_url(); ?>Home/marketplace">Marketplace</a>
							</li>

							<li class="sale-noti">
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

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-12 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<div class="contact-map size21" id="map"></div>
					</div>
				</div>
				<div id="legend"><h3>Pusat Kluster</h3></div>
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
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script> -->
	
	<script src="<?php echo base_url('assets_freeuser/js/map-custom.js');?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('assets_freeuser/js/main.js');?>"></script>

	<script>
		var map, infoWindow;

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
    		// var bounds  = new google.maps.LatLngBounds();
             var locations = [ 
                    <?php
                        $query = $this->db->query('SELECT * FROM kandang JOIN pemilik ON pemilik.id_pemilik = kandang.id_pemilik');
						$data   =   array();
						foreach ($query->result_array() as $row):
							$data[]=$row['lintang'];
							$data[]=$row['bujur'];
							$data[]=$row['kd_kandang'];
							$data[]=$row['alamat_kandang'];
							$data[]=$row['jumlah_pupuk'];
							$data[]=$row['harga_pupuk'];
							$data[]=$row['nama_pemilik'];
							$data[]=$row['no_hp'];
							$data[]=$row['foto'];
							echo '['.$row['lintang'].','.$row['bujur'].',"'.$row['kd_kandang'].'","'.$row['alamat_kandang'].'",'.$row['jumlah_pupuk'].','.$row['harga_pupuk'].',"'.$row['nama_pemilik'].'","'.$row['no_hp'].'","'.$row['foto'].'"],';
						endforeach; 
                    ?>

             ];



                    var directionsService = new google.maps.DirectionsService;
                    var directionsDisplay = new google.maps.DirectionsRenderer;
                    var map = new google.maps.Map(document.getElementById('map'),{
                        // center: {lat:-3.76400, lng:114.769400},
                        zoom: 12
                    });       

                    var marker; 
                    var lokasi_saya;              
                    var infoWindow = new google.maps.InfoWindow();

// ===============================================================================================
                    // FUZZY C-MEANS
                    // Inisialisasi kandang (dataset)
                    var karung = new Array();
                    var harga = new Array();
                    var min_karung, min_harga;
                    var max_karung, max_harga;
                    for (var i=0; i<locations.length; i++) {
                    	karung.push(locations[i][4]);
                    	harga.push(locations[i][5]);
                    	//Mencari jumlah karung paling sedikit dan paling banyak
                    	//Mencari harga termurah dan termahal
                    	if (i==0)
                    	{
                    		min_karung=karung[i];
                    		min_harga=harga[i];
                    		max_karung=karung[i];
                    		max_harga=harga[i];
                    	}
                    	else
                    	{
                    		min_karung=Math.min(karung[i],min_karung);
                    		min_harga=Math.min(harga[i],min_harga);
                    		max_karung=Math.max(karung[i],max_karung);
                    		max_harga=Math.max(harga[i],max_harga);
                    		// alert("Min Karung: "+min_karung+", Max Karung: "+max_karung+", Min Harga: "+min_harga+", Max Harga: "+max_harga);
                    	}
                    	// alert("Min Karung: "+min_karung+", Max Karung: "+max_karung+", Min Harga: "+min_harga+", Max Harga: "+max_harga);
                    }

                    //Normalisasi dataset
                    var karung_norm = new Array();
                    var harga_norm = new Array();
                    var x = new Array();
                    for (var i=0; i<locations.length; i++) {
                    	karung_norm.push((karung[i] - min_karung)/(max_karung - min_karung));
                    	harga_norm.push((harga[i] - min_harga)/(max_harga - min_harga));
                    	x.push([karung_norm[i], harga_norm[i]]);
                    	// alert(x);
                    	// alert("karung norm :"+karung_norm +", Harga norm:"+harga_norm);
                    }
                    
                    //Menentukan parameter awal
                    var N = locations.length; //jumlah data
                    var M = 2; //jumlah atribut
                    var kol1, kol2, kol3;
                   

                    //Menentukan matriks partisi awal
                    var miu = new Array();
                    var temp; 
                    for (var i=0; i<locations.length; i++) {
                    	for(var k=0;k<3;k++){
                    		kol1 = Math.random();
		                    kol2 = Math.random()*(1-kol1);
		                    kol3 = 1-(kol1+kol2);
                    		miu.push([kol1,kol2,kol3]);
                    	}
                    	temp = miu[i][0]+miu[i][1]+miu[i][2];
                    	// alert(miu);
                    	// alert(miu[i][0]+", "+miu[i][1]+", "+miu[i][2]+", Hasil :"+temp);
                    }
                    // alert(miu);

                    var cluster = 3;
                    var W = 2;
                    var maxiter = 100;
                    var error = 0.0001;
                    var p0 = 0;
                    var t = 1; // Iterasi Awal
                    var p1;

                    //Melakukan proses clustering dengan perulangan
                    while(t<maxiter)
                    {
                    	/*Menghitung pusat kluster ke - k => Vkj
                    	Pembilang // Penyebut*/
                    	var v = [];
                    	var pembilang, penyebut;
                    	for (var k = 0; k<cluster; k++) {
                    		v[k] = [];
                    		for (var j=0; j<M; j++) {
                    			pembilang = 0;
                    			penyebut = 0;
                    			for (var i=0; i<N; i++){
                    				pembilang += (Math.pow(miu[i][k],W)*x[i][j]);
                    				penyebut += (Math.pow(miu[i][k],W));
                    				// alert(x[i][j]);
                    				// alert(miu[i][k]);
                    				// alert("Pembilang :" + pembilang + ","+"Pembilang :" + penyebut);
                    			}
                    			v[k][j]=pembilang/penyebut;
                    			// alert(v[k][j]);
                    		}
                    		// alert(v[k]);
                    	}
                    	// alert(v);

                    	// Menghitung fungsi obyektif pada iterasi ke- t => P1
                    	p1 = 0;
                    	var tempP;
          				for (var i=0; i<N; i++) {
                    		for(var k=0; k<cluster; k++){
                    			tempP = 0;
                    			for(var j=0; j<M; j++){
                    				tempP += Math.pow((x[i][j]-v[k][j]), 2);
                    				// alert(tempP);
                    				// alert(v[k][j]);
                    				// alert(x[i][j]);
                    			}
                    			p1 += (tempP*Math.pow(miu[i][k], W));
                    			// alert(p1);
                    		}
                    		// alert(p1);
                    	}
                    	// alert(p1);
                    	//alert(t+", "+p1);

                    	// Menghitung perubahan matrik partisi => MiuIK
                    	var pembilangMiu = [];
                    	var penyebutMiu;

                    	for(var i=0; i<N; i++){
                    		penyebutMiu = 0;
                    		for(var k=0; k<cluster; k++){
                    			pembilangMiu[k]=0;
                    			// alert(pembilangMiu[k]);
                    			for(var j=0; j<M; j++){
                    				pembilangMiu[k] += Math.pow((x[i][j] - v[k][j]), 2);
                    			}
                    			pembilangMiu[k] = Math.pow(pembilangMiu[k], (-1/(W-1)));
                    			penyebutMiu += pembilangMiu[k];
                    			// alert(penyebutMiu);
                    		}
                    		// alert(penyebutMiu);

                    		for(var k=0; k<cluster; k++){
                    			miu[i][k] = pembilangMiu[k]/penyebutMiu;
                    			// alert(miu[i][k]);
                    		}
                    		// alert(miu[i][k]);
                    	}

                    	// Mengecek kondisi berhenti
                    	if (Math.abs(p1-p0)<error) {
                    		break;
                    	}
                    	t++;

                    	//perulangan berikutnya, p1 menjadi p0
                    	p0 = p1;
                    	// alert(p0);
                    	// alert(p1);
                    }

                    // alert("pusat cluster 1: " + v[0][0] + ", " + v[0][1]);
                    // alert("pusat cluster 2: " + v[1][0] + ", " + v[1][1]);
                    // alert("pusat cluster 3: " + v[2][0] + ", " + v[2][1]);

                    //Denormalisasi pusat cluster v_kj
                    for (var k=0; k<cluster; k++){
                    	v[k][0]= Math.round(min_karung+(v[k][0]*(max_karung-min_karung)));
                    	v[k][1]= Math.round(min_harga+(v[k][1]*(max_harga-min_harga)));

                    	// alert(v[k][0]+", "+v[k][1]);
                    }

                    // Menentukan cluster dari setiap data
                    var kluster = new Array();
                    var temp_clus;
                    var max_clus;
                    for(var i=0; i<N; i++){
                    	for(var k=0; k<cluster; k++){
                    		if (k==0) {
                    			temp_clus=k;
                    			max_clus=miu[i][k];
                    			// alert(temp_clus +", "+miu[i][k]);
                    			// alert(miu[i][k] +" > "+max_clus);
                    		}
                    		else{
                    			if(miu[i][k]>max_clus){
                    				temp_clus=k;
                    				max_clus=miu[i][k];
                    				// alert('tes');
                    			}
                    		}
                    	}
                    	kluster.push(temp_clus);
                    	// alert(i+", "+kluster[i]+", "+miu[i][0]+", "+miu[i][1]+", "+miu[i][2]);
                    	// alert(i+", "+kluster[i]);
                    	// alert(kluster[i]);
                    }

// ===============================================================================================
                    for (var i=0; i<locations.length; i++) {
                        if(kluster[i]==0){
                        	marker = new google.maps.Marker({
	                            position : new google.maps.LatLng(locations[i][0],locations[i][1]),
	                            icon : "<?php echo base_url('assets_freeuser/images/icons/icon_chicken_farm(red).png');?>",
		                        map: map
	                        });	
                        }
                        else if(kluster[i]==1){
                        	marker = new google.maps.Marker({
	                            position : new google.maps.LatLng(locations[i][0],locations[i][1]),
	                            icon : "<?php echo base_url('assets_freeuser/images/icons/icon_chicken_farm(green).png');?>",
		                        map: map
	                        });
                        }
                        else {
                        	marker = new google.maps.Marker({
	                            position : new google.maps.LatLng(locations[i][0],locations[i][1]),
	                            icon : "<?php echo base_url('assets_freeuser/images/icons/icon_chicken_farm(blue).png');?>",
		                        map: map
	                        });
                        }
                        

      //                   var loc = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
						// bounds.extend(loc);

                        google.maps.event.addListener(marker,'click', (function(marker, i) {
                            return function() {
                            	kd_kandang = locations[i][2];
                            	window.location.href = "<?php echo base_url('Home/product_detail/')?>"+kd_kandang;
                            }
                        })(marker, i));    

                        google.maps.event.addListener(marker,'mouseover', (function(marker, i) {
                            return function() {
                                infoWindow.setContent("<p><b4><img width='20' src='<?php echo base_url('assets_freeuser/images/icons/kandang.png');?>'> </b4>"+locations[i][6]+"</p><br><p><b4><img width='20' src='<?php echo base_url('assets_freeuser/images/icons/karung.png');?>'> </b4>"+locations[i][4]+" karung </p><br><p><b4><img width='20' src='<?php echo base_url('assets_freeuser/images/icons/harga.png');?>'> Rp. </b4>"+locations[i][5]+"<b4> / Karung</b4></p>");
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));

                        google.maps.event.addListener(marker,'mouseout', (function(marker, i) {
                            return function() {
                                infoWindow.setContent("<p><b4><img width='20' src='<?php echo base_url('assets_freeuser/images/icons/kandang.png');?>'> </b4>"+locations[i][6]+"</p><br><p><b4><img width='20' src='<?php echo base_url('assets_freeuser/images/icons/karung.png');?>'> </b4>"+locations[i][4]+" karung </p><br><p><b4><img width='20' src='<?php echo base_url('assets_freeuser/images/icons/harga.png');?>'> Rp. </b4>"+locations[i][5]+"<b4> / Karung</b4></p>");
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));
                    }

                    // map.fitBounds(bounds);       
					// map.panToBounds(bounds);     
					
                    // Try HTML5 geolocation.
			        if (navigator.geolocation) {
			          navigator.geolocation.getCurrentPosition(function(position) {
			            var pos = {
				            enableHighAccuracy: true,
							timeout: 5000,
							maximumAge: 0,
	          	        	lat: position.coords.latitude,
			            	lng: position.coords.longitude,
			            };

			            var bikeicon = "<?php echo base_url('assets_freeuser/images/icons/my_location.png');?>";

			            lokasi_saya = new google.maps.Marker({
                            position : new google.maps.LatLng(pos),
                            icon : bikeicon,
                        map: map
                        });

                        google.maps.event.addListener(lokasi_saya,'mouseover', (function(lokasi_saya) {
                            return function() {
                                infoWindow.setContent("Lokasi Anda");
                                infoWindow.open(map, lokasi_saya);
                            }
                        })(lokasi_saya));

                        google.maps.event.addListener(lokasi_saya,'mouseout', (function(lokasi_saya) {
                            return function() {
                                infoWindow.setContent("Lokasi Anda");
                                infoWindow.open(map, lokasi_saya);
                            }
                        })(lokasi_saya));

			            // infoWindow.setPosition(pos);
			            // infoWindow.setContent('Lokasi Anda');
			            // infoWindow.open(map);
			            map.setCenter(pos);
			            
			          }, function() {
			            handleLocationError(true, infoWindow, map.getCenter());
			          });
			        } else {
			          // Browser doesn't support Geolocation
			          handleLocationError(false, infoWindow, map.getCenter());
			        }

			        var legend = document.getElementById('legend');
					var div = document.createElement('div');
					var div2 = document.createElement('div2');
					var div3 = document.createElement('div3');
			        div.innerHTML = '<img width="30" src="<?php echo base_url('assets_freeuser/images/icons/chicken_farm(red).png');?>">'+v[0][0]+' karung, Rp. '+ v[0][1]+',- <br>' ;
			        div2.innerHTML = '<img width="30" src="<?php echo base_url('assets_freeuser/images/icons/chicken_farm(green).png');?>">'+v[1][0]+' karung, Rp. '+ v[1][1]+',- <br>';
			        div3.innerHTML = '<img width="30" src="<?php echo base_url('assets_freeuser/images/icons/chicken_farm(blue).png');?>">'+v[2][0]+' karung, Rp. '+ v[2][1]+'';
			        legend.appendChild(div);
			        legend.appendChild(div2);
			        legend.appendChild(div3);

			        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);
			        
			        // for (var key in icons) {
			        //   var type = icons[key];
			        //   var name = type.name;
			        //   var icon = type.icon;
			        //   var div = document.createElement('div');
			        //   div.innerHTML = '<img src="' + icon + '"> ' + name;
			        //   legend.appendChild(div);
			        // }
                }

    	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	        infoWindow.setPosition(pos);
	        infoWindow.setContent(browserHasGeolocation ?
	                              'Error: The Geolocation service failed.' :
	                              'Error: Your browser doesnt support geolocation.');
	        infoWindow.open(map);
	     }
    </script>
    <!-------------------------  Key Google Maps API --------------------->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdd5HZzwPBwQMUfD28ODjb74lgCJDt1_o&callback=initMap&callback=initMap">
    </script>
</body>
</html>
