        <div class="header">
            <h2>
                DATA DIRI
            </h2>
        </div>
        <div class="body">
            <div class="row clearfix">
                <form id="form" action="#" class="form-horizontal">
                <input type="hidden" value="" name="txtIdUser">
                <input type="hidden" value="" name="txtIdPemilik">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txtNamaPemilik">Nama Pemilik</label>
                    <div class="col-md-10">
                        <div class="form-line">
                            <input type="text" name="txtNamaPemilik" id="txtNamaPemilik" placeholder="Masukkan Nama Pemilik" class="form-control">
                        </div>
                        <span class="pesan pesan-nama_pemilik">Silahkan Isi Kolom Nama Pemilik</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txtAlamat">Alamat</label>
                    <div class="col-md-10">
                        <div class="form-line">
                            <input type="text" name="txtAlamat" id="txtAlamat" placeholder="Masukkan Alamat" class="form-control">
                        </div>
                        <span class="pesan pesan-alamat">Silahkan Isi Kolom Alamat</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txtKec">Kecamatan</label>
                    <div class="col-md-10">
                            <select  name="txtKec" id="txtKec" class="form-control">
                                <option value="pilih">Pilih Kecamatan</option>
                                <?php foreach ($kecamatan as $kec ): ?>
                                    <option value="<?php echo $kec->kd_kec;?>"><?php echo $kec->nama_kec;?></option>
                                <?php endforeach;?>
                            </select>
                            <span class="pesan pesan-kecamatan">Harap Pilih Kecamatan</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txtAgama">Agama</label>
                    <div class="col-md-10">
                            <select  name="txtAgama" id="txtAgama" class="form-control">
                                <option value="pilih">Pilih Agama</option>
                                <?php foreach ($agama as $ag ): ?>
                                    <option value="<?php echo $ag->kd_agama;?>"><?php echo $ag->nama_agama;?></option>
                                <?php endforeach;?>
                            </select>
                            <span class="pesan pesan-agama">Harap Pilih Agama</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txtJK">Jenis Kelamin</label>
                    <div class="col-md-10">
                        <input name="rd_jk" type="radio" id="laki_laki" class="with-gap" value="2" /><label for="laki_laki" >Laki-laki</label>
                        <input name="rd_jk" type="radio" id="perempuan" class="with-gap" value="1" /><label for="perempuan">Perempuan</label>
                            <span class="pesan pesan-jenis_kelamin">Harap Pilih Jenis Kelamin</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txtNoHP">No. HP</label>
                    <div class="col-md-10">
                        <div class="form-line">
                            <input type="text" name="txtNoHP" id="txtNoHP" placeholder="Masukkan Nomor Handphone" class="form-control">
                        </div>
                        <span class="pesan pesan-no_hp">Silahkan Isi Kolom No. Hp</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txtFotoProfile">Ganti Foto Profile</label>
                    <div class="col-md-10">
                        <div class="form-line">
                            <input type="file" name="txtFotoProfile" id="txtFotoProfile" class="form-control" onchange="return validasiFile()">
                        </div>
                        <span class="pesan pesan-foto">Unggah Foto Gagal: Tipe file yang anda unggah tidak diizinkan. Silahkan unggah foto dengan tipe file: .jpg, .png atau .jpeg</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txtUsername">Username</label>
                    <div class="col-md-10">
                        <div class="form-line">
                            <input type="text" name="txtUsername" id="txtUsername" placeholder="Masukkan Username" class="form-control">
                        </div>
                        <span id="username_result"></span>
                        <span class="pesan pesan-username">Silahkan Isi Kolom Username</span>
                    </div>
                </div>
                <div class="form-group" id="edit_password">
                    <label class="col-md-2 control-label" for="txtPassword">Ganti Password</label>
                    <div class="col-md-10">
                        <div class="form-line">
                            <input type="text" name="txtPassword" id="txtPassword" placeholder="Masukkan Password" class="form-control">
                        </div>
                        <span class="pesan pesan-password">Silahkan Isi Kolom Password</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label"></label>
                    <div class="col-md-10">
                        <button type="button" onclick="simpan()" id="sub_button" class="btn btn-primary">Ubah</button>
                        <?php if($this->session->userdata('level') =='Superadmin') : ?>
                        <a href="<?php echo base_url(); ?>User"><button type="button" class="btn btn-default">Batal</button></a>
                        <?php endif; ?>
                        <?php if($this->session->userdata('level') =='user') : ?>
                        <a href="<?php echo base_url(); ?>Kandang"><button type="button" class="btn btn-default">Batal</button></a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
            </div>
        </div>

<script type="text/javascript">

    var save_method;
    var table;

    //Load data to form
    $(document).ready(function(){
        var id_user = "<?php echo $this->session->userdata('id_user');?>"

        //load data dari AJAX
        $.ajax({
            url: "<?php echo site_url('User/ubah_user/') ;?>"+id_user,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="txtIdUser"]').val(data.id_user);
                $('[name="txtIdPemilik"]').val(data.id_pemilik);
                $('[name="txtUsername"]').val(data.username);
                $('[name="txtNamaPemilik"]').val(data.nama_pemilik);
                $('[name="txtAlamat"]').val(data.alamat);
                $('[name="txtKec"]').val(data.kd_kec);
                $('[name="txtAgama"]').val(data.kd_agama);
                if (data.kd_jk == '2'){
                    $("#laki_laki").prop("checked", true);
                }
                else{
                    $("#perempuan").prop("checked", true);
                }
                $('[name="txtNoHP"]').val(data.no_hp);

                $('#modal_form').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Get Data From AJAX');
            }
        });
    });

    // Hide <span> when action
    $(document).ready(function(){
        $("#txtNamaPemilik").keyup(function () {
            $(".pesan-nama_pemilik").hide();
        });
        $("#txtAlamat").keyup(function () {
            $(".pesan-alamat").hide();
        });
        $("#txtNoHP").keyup(function () {
            $(".pesan-no_hp").hide();
        });
        $("#txtUsername").keyup(function () {
            $(".pesan-username").hide();
        });
        $("#txtPassword").keyup(function () {
            $(".pesan-password").hide();
        });
        $('#txtKec').change(function(){
            $(".pesan-kecamatan").hide();
        });
        $('#txtAgama').change(function(){
            $(".pesan-agama").hide();
        });
        $('#txtJK').change(function(){
            $(".pesan-jenis_kelamin").hide();
        });
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
    
    //Validasi Username
    $(document).ready(function(){
        $("#txtUsername").keyup(delay(function (e) {
            var username = $('#txtUsername').val();
            
            if(username != ''){
                $.ajax({
                url: "<?php echo base_url(); ?>User/cekUsername",
                method: "POST",
                data: {username:username},
                success: function(response){
                    if (response == 'taken') {
                        $('#username_result').html('<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> Username sudah ada</span></label>');
                        $('#sub_button').attr("disabled", true);
                    } 
                    else if (response == 'not_taken') {
                        $('#username_result').html('<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username tersedia</span></label>');
                        $('#sub_button').attr("disabled", false);
                    }
                }
                });
            }
            else{
                $('#username_result').html('');
            }
        },  800));
    });

    function simpan() {
        var url;

            url = '<?php echo site_url('Profile/ajax_ubah_user') ;?>';

            var nama_pemilik = $('#txtNamaPemilik').val().length;         
            var alamat = $('#txtAlamat').val().length;                    
            var no_hp = $('#txtNoHP').val().length;           
            var username = $('#txtUsername').val().length;           
            var kec = $('#txtKec').val();
            var agama = $('#txtAgama').val();

                if (nama_pemilik == 0 || alamat == 0 || kec == "pilih" || agama == "pilih" ||  no_hp == 0 || username == 0) {              
                    if (nama_pemilik == 0) {              
                        $(".pesan-nama_pemilik").css('display','block');
                    }
                    if (alamat == 0) {                
                        $(".pesan-alamat").css('display','block');
                    }
                    if (kec == "pilih") {                
                        $(".pesan-kecamatan").css('display','block');
                    }
                    if (agama == "pilih") {              
                        $(".pesan-agama").css('display','block');
                    }
                    if (no_hp == 0) {             
                        $(".pesan-no_hp").css('display','block');
                    }
                    if (username == 0) {             
                        $(".pesan-username").css('display','block');
                    }
                    return false;
                }

        var formData = new FormData($('#form')[0]);
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                toastr.success('Ubah Data Diri Berhasil!', 'Success', {timeOut: 5000})
                window.location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / upader data');
            }
        });
    }

    function validasiFile(){
        var inputFile = document.getElementById('txtFotoProfile');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
            if(!ekstensiOk.exec(pathFile)){
                $(".pesan-foto").css('display','block');
                inputFile.value = '';
                return false;
            }else{
                $(".pesan-foto").hide();
            }
    }
</script>