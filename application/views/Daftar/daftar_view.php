<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v5 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_daftar/css/roboto-font.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets_daftar/fonts/font-awesome-5/css/fontawesome-all.min.css');?>">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="<?php echo base_url('assets_daftar/css/style.css');?>"/>
    <!-- CSS SELECT -->
    <style type="text/css">
		 .styled-select {
			  width: 95%;
			  height: 34px;
			  overflow: hidden;
			  background: no-repeat right #ffffff;
			  border: 1px solid #ccc;
			  border-radius: 5px;
			  -webkit-border-radius: 5px;
			  transition:ease all 0.3s;
			  -webkit-transition:ease all 0.3s;
			  
			}
			.styled-select:hover{
			  box-shadow:0 0 7px 5px lightblue;
			}
			.styled-select select {
			  background: transparent;
			  width: 100%;
			  padding: 5px;
			  font-size: 16px;
			  line-height: 1;
			  border: 0;
			  border-radius: 0;
			  height: 34px;
			  -webkit-appearance: none;
			}

			.styled-select select {
			  color: #000000;
			}

			input[type=text], textarea {
			  border: 1px solid #DDDDDD;
			}
			 
			input[type=text]:focus, textarea:focus {
			  /*@include box-shadow(0 0 5px rgba(81, 203, 238, 1));*/
			  border: 1px solid rgba(81, 203, 238, 1);
			}

			input[type="radio"] {
			 -webkit-appearance: radio; 
			 width: 100%;
			}

			.col-25 {
			  float: left;
			  width: 25%;
			  margin-top: 6px;
			}

			.col-75 {
			  float: left;
			  width: 75%;
			  margin-top: 6px;
			}
    </style>
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.css');?>" rel="stylesheet">
</head>
<body class="form-v5">
	<div class="page-content">
		<div class="form-v5-content">

			<form class="form-detail" action="<?php echo base_url('Daftar/tambah_user');?>" method="post" id="form_input">
				<h2>Daftar Akun</h2>
				<div class="form-row">
					<label for="full-name">Nama Lengkap</label>
					<input type="text" name="txtNamaPemilik" id="txtNamaPemilik" class="input-text" placeholder="Masukkan Nama Lengkap" autocomplete="off" oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" required>
				</div>
				<div class="form-row">
					<label for="full-name">Alamat</label>
					<input type="text" name="txtAlamat" id="txtAlamat" class="input-text" placeholder="Masukkan Alamat" autocomplete="off" oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" required>
				</div>
				<label for="txtKec">Kecamatan</label>
				<div class="styled-select">
                    <select  name="txtKec" id="txtKec" oninvalid="this.setCustomValidity('Silahkan Pilih Kecamatan')" oninput="setCustomValidity('')" required>
                            <option value="">Pilih Kecamatan</option>
                                <?php foreach ($kecamatan as $kec ): ?>
                                    <option value="<?php echo $kec->kd_kec;?>"><?php echo $kec->nama_kec;?></option>
                                <?php endforeach;?>
                    </select>
                </div>
                <br>
                <label for="txtAgama">Agama</label>
				<div class="styled-select">
                    <select  name="txtAgama" id="txtAgama" oninvalid="this.setCustomValidity('Silahkan Pilih Agama')" oninput="setCustomValidity('')" required>
                            <option value="">Pilih Agama</option>
                                <?php foreach ($agama as $ag ): ?>
                                    <option value="<?php echo $ag->kd_agama;?>"><?php echo $ag->nama_agama;?></option>
                                <?php endforeach;?>
                    </select>
                </div>
                <br>
				<div class="form-row">
					<label for="txtJenisKelamin">Jenis Kelamin</label>
					<div class="col-75">
						<input type="radio" name="rd_jk" id="laki_laki" value="2" style="width: 20%;" oninvalid="this.setCustomValidity('Silahkan Pilih Jenis Kelamin')" oninput="setCustomValidity('')" required> Laki-Laki
					</div>
					<div class="col-75">
						<input type="radio" name="rd_jk" id="perempuan" value="1" style="width: 20%;" required> Perempuan
					</div>
				</div>
				<br>
				<br>
				<br>
				<div class="form-row">
					<label for="full-name">No. Hp</label>
					<input type="text" name="txtNoHP" id="txtNoHP" class="input-text" placeholder="Masukkan No. Hp" autocomplete="off" oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" required>
				</div>
				<div class="form-row">
					<label for="myObject-email">Username</label>
					<input type="text" name="txtNamaPengguna" id="txtNamaPengguna" class="input-text" placeholder="Masukkan Username" autocomplete="off" onfocus="this.value=''" oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" required style="margin-bottom: 2px;">
					<span id="username_result"></span>
				</div>
				<div class="form-row">
					<label for="password">Password</label>
					<input type="password" name="txtKataSandi" id="txtKataSandi" class="input-text" placeholder="Masukkan Password" autocomplete="off" onfocus="this.value=''" oninvalid="this.setCustomValidity('Data Tidak Boleh Kosong')" oninput="setCustomValidity('')" required>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" style="background-color: #00cc66" value="Daftar" id="sub_button">
					<input type="button" name="register" class="register" style="background-color: #FFF; color: #000000" value="Kembali" id="kembali">
				</div>
			</form>
		</div>
	</div>

	<script src="<?php echo base_url('assets/dist/sweetalert2.all.min.js');?>"></script>
	<!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js');?>"></script>
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
        $("#txtNamaPengguna").keyup(delay(function (e) {
	            var username = $('#txtNamaPengguna').val();
	            
	            if(username != ''){
	                $.ajax({
	                url: "<?php echo base_url(); ?>Daftar/cekUsername",
	                method: "POST",
	                data: {username:username},
	                success: function(response){
	                    if (response == 'taken') {
	                        $('#username_result').html('<label class="text-danger"><span> Username sudah ada</span></label>');
	                        $('#sub_button').attr("disabled", true);
	                    } 
	                    else if (response == 'not_taken') {
	                        $('#username_result').html('<label class="text-success"><span> Username tersedia</span></label>');
	                        $('#sub_button').attr("disabled", false);
	                    }
	                }
	                });
	            }
	            else{
	                $('#username_result').html('');
	            }
	        },  400));
	    }); 		

        function delay(callback, ms) {
	      var timer = 0;
	      return function() {
	        var context = this, args = arguments;
	        clearTimeout(timer);
	        timer = setTimeout(function () {
	          callback.apply(context, args);
	        }, ms || 0);
	      };
	    }

	    document.getElementById("kembali").onclick = function () {
	        window.location.href = "<?php echo site_url('Login'); ?>";
	    };
	    
	    function init() {
			document.getElementById("form_input").reset();
		}
		init();
	
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>