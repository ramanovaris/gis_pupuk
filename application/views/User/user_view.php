                        <div class="header">
                            <h2>
                                DATA USER
                            </h2>
                        </div>
                        <div class="body">
                         <button type="button" class="btn btn-success waves-effect m-r-20 navbar-right" data-toggle="modal" onclick="tambah_user()">Tambah Data User</button>
                         <br>
                         <br>
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Pemilik</th>
                                            <!-- <th>Alamat</th> -->
                                            <!-- <th>Kecamatan</th> -->
                                            <!-- <th>Agama</th> -->
                                            <!-- <th>Jenis Kelamin</th> -->
                                            <!-- <th>No. HP</th> -->
                                            <th>Foto</th>
                                            <!-- <th>Username</th> -->
                                            <th>Tanggal Daftar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

<!-- Modal Tambah User & Ubah User -->
<div id="modal_form" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah User</h4>
      </div>
      <div class="modal-body form">
            <form id="form" action="#" class="form-horizontal">
                <input type="hidden" value="" name="txtIdUser">
                <input type="hidden" value="" name="txtIdPemilik">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtNamaPemilik">Nama Pemilik</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtNamaPemilik" id="txtNamaPemilik" placeholder="Masukkan Nama Pemilik" autocomplete="off" class="form-control">
                        </div>
                        <span class="pesan pesan-nama_pemilik">Silahkan Isi Kolom Nama Pemilik</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtAlamat">Alamat</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtAlamat" id="txtAlamat" placeholder="Masukkan Alamat" autocomplete="off" class="form-control">
                        </div>
                        <span class="pesan pesan-alamat">Silahkan Isi Kolom Alamat</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtKec">Kecamatan</label>
                    <div class="col-md-9">
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
                    <label class="col-md-3 control-label" for="txtAgama">Agama</label>
                    <div class="col-md-9">
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
                    <label class="col-md-3 control-label" for="rd_jk">Jenis Kelamin</label>
                    <div class="col-md-9">
                        <input name="rd_jk" type="radio" id="laki_laki" class="with-gap" value="2" onclick="Hide_alert()" /><label for="laki_laki" >Laki-laki</label>
                        <input name="rd_jk" type="radio" id="perempuan" class="with-gap" value="1" onclick="Hide_alert()" /><label for="perempuan">Perempuan</label>
                            <span class="pesan pesan-jenis_kelamin">Harap Pilih Jenis Kelamin</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtNoHP">No. HP</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtNoHP" autocomplete="off" id="txtNoHP" placeholder="Masukkan Nomor Handphone" class="form-control">
                        </div>
                        <span class="pesan pesan-no_hp">Silahkan Isi Kolom No. Hp</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtFotoProfile">Foto Profile</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="file" name="txtFotoProfile" id="txtFotoProfile" class="form-control" size="20" onchange="return validasiFile()"/>
                        </div>
                        <span class="pesan pesan-foto">Unggah Foto Gagal: Tipe file yang anda unggah tidak diizinkan. Silahkan unggah foto dengan tipe file: .jpg, .png atau .jpeg</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtUsername">Username</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtUsername" id="txtUsername" placeholder="Masukkan Username" autocomplete="off" class="form-control">
                        </div>
                        <span id="username_result"></span>
                        <span class="pesan pesan-username">Silahkan Isi Kolom Username</span>
                    </div>
                </div>
                <div class="form-group" id="edit_password">
                    <label class="col-md-3 control-label" for="txtPassword">Password</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtPassword" id="txtPassword" placeholder="Masukkan Password" autocomplete="off" class="form-control">
                        </div>
                        <span class="pesan pesan-password">Silahkan Isi Kolom Password</span>
                    </div>
                </div>
                <div class="form-group" id="status_user">
                    <label class="col-md-3 control-label" for="txtStatus">Status</label>
                    <div class="col-md-9">
                            <select  name="txtStatus" id="txtStatus" class="form-control">
                                <option value="pilih">Pilih Status</option>
                                <option value="terdaftar">Terdaftar</option>
                                <option value="belum terdaftar">Belum Terdaftar</option>
                            </select>
                            <span class="pesan pesan-status">Harap Pilih Status</span>
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="simpan()" id="sub_button" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Delete -->
<div id="modal_delete" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>              
                <h4 class="modal-title" id="modal_delete_title"></h4>   
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p id="text_hapus"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
                <button type="button" id="button_delete" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lihat Foto -->
<div id="modal_foto" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Foto Profile</h4>
      </div>
      <div class="modal-body form">
           <img id="foto" style="width: 100%; height: 100%;">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(document).ready(function(){
         //datatables
        // var table;
        table = $('#table_id').DataTable({ 
 
            "processing": true, 
            "serverSide": true,
            "destroy": true,
            // "bDestroy": true,    
            "order": [], 
            // "searchDelay": 2000,
             
            "ajax": {
                "url": "<?php echo site_url('User/get_data_user')?>",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [1,4], 
                "orderable": false, 
            },
            { width: '1px', targets: 1},
            { width: '100px', targets: 2},
            { width: '60px', targets: 3},
            ],
 
        });
        $('#table_id').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
        });
        $('[data-toggle="tooltip"]').tooltip();
    });

    var save_method;
    var table;

    function Hide_alert() {
      $(".pesan-jenis_kelamin").hide();
    }

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
        $('#txtStatus').change(function(){
            $(".pesan-status").hide();
        });
        $('#txtAgama').change(function(){
            $(".pesan-agama").hide();
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

    function tambah_user() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#username_result').html('');
        $('#modal_form').modal('show');
        $(".pesan-nama_pemilik").hide();
        $(".pesan-alamat").hide();
        $(".pesan-kecamatan").hide();
        $(".pesan-agama").hide();
        $(".pesan-jenis_kelamin").hide();
        $(".pesan-no_hp").hide();
        $(".pesan-username").hide();
        $(".pesan-password").hide();
        $(".pesan-foto").hide();
        $(".pesan-status").hide();
        $('#edit_password').show();
    }

    function simpan() {
        var url;

        if(save_method == 'add') {
            url = '<?php echo site_url('User/tambah_user') ;?>';

            var nama_pemilik = $('#txtNamaPemilik').val().length;         
            var alamat = $('#txtAlamat').val().length;                    
            var no_hp = $('#txtNoHP').val().length;           
            var username = $('#txtUsername').val().length;           
            var password = $('#txtPassword').val().length; 
            var kec = $('#txtKec').val();
            var agama = $('#txtAgama').val();
            var status = $('#txtStatus').val();

                if (nama_pemilik == 0 || alamat == 0 || kec == "pilih" || agama == "pilih" || $('input[type=radio][name=rd_jk]:checked').length == 0 || no_hp == 0 || username == 0 || password == 0 || status == "pilih") {              
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
                    if ($('input[type=radio][name=rd_jk]:checked').length == 0) {               
                        $(".pesan-jenis_kelamin").css('display','block');
                    }
                    if (no_hp == 0) {             
                        $(".pesan-no_hp").css('display','block');
                    }
                    if (username == 0) {             
                        $(".pesan-username").css('display','block');
                    }
                    if (password == 0) {               
                        $(".pesan-password").css('display','block');
                    }
                    if (status == "pilih") {               
                        $(".pesan-status").css('display','block');
                    }
                    return false;
                }
        } else {
            url = '<?php echo site_url('User/ajax_ubah_user') ;?>';

            var nama_pemilik = $('#txtNamaPemilik').val().length;         
            var alamat = $('#txtAlamat').val().length;                    
            var no_hp = $('#txtNoHP').val().length;           
            var username = $('#txtUsername').val().length;           
            var kec = $('#txtKec').val();
            var agama = $('#txtAgama').val();
            var status = $('#txtStatus').val();

                if (nama_pemilik == 0 || alamat == 0 || kec == "pilih" || agama == "pilih" ||  no_hp == 0 || username == 0 || status == "pilih") {              
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
                    if (status == "pilih") {               
                        $(".pesan-status").css('display','block');
                    }
                    return false;
                }
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
                $('#modal_form').modal('hide');
                reload_table();
                if(save_method == 'add') {
                    toastr.success('Tambah User Berhasil!', 'Success', {timeOut: 5000})
                } else {
                    toastr.success('Ubah User Berhasil!', 'Success', {timeOut: 5000})
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / upader data');
            }
        });
    }

    function hapus_modal(id){
        $.ajax({
                url: "<?php echo site_url('User/get_username_for_delete/') ;?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    $("#text_hapus").empty();
                    $('#button_delete').attr('onclick', 'delete_user('+id+')');
                    $('#modal_delete_title').text('Apakah Anda Yakin?');
                    htmlString = "Anda Yakin Ingin Menghapus Data <b>"+data.username+"</b>?"
                    $("#text_hapus").append(htmlString);
                    $('#modal_delete').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }

    function delete_user(id){
        $.ajax({
                url: "<?php echo site_url('User/hapus_user/') ;?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    toastr.success('Hapus User Berhasil!', 'Success', {timeOut: 5000})
                    $('#modal_delete').modal('hide');
                    table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }

    function ubah_user(id){
        save_method = 'update';
        $('#username_result').html('');
        $('#edit_password').hide();
        $(".pesan-nama_pemilik").hide();
        $(".pesan-alamat").hide();
        $(".pesan-kecamatan").hide();
        $(".pesan-agama").hide();
        $(".pesan-jenis_kelamin").hide();
        $(".pesan-no_hp").hide();
        $(".pesan-username").hide();
        $(".pesan-password").hide();
        $(".pesan-foto").hide();
        $(".pesan-status").hide();

        //load data dari AJAX
        $.ajax({
            url: "<?php echo site_url('User/ubah_user/') ;?>"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="txtIdUser"]').val(data.id_user);
                $('[name="txtIdPemilik"]').val(data.id_pemilik);
                $('[name="txtUsername"]').val(data.username);
                $('[name="txtNamaPemilik"]').val(data.nama_pemilik);
                $('[name="txtAlamat"]').val(data.alamat);
                $('[name="txtKec"]').val(data.kd_kec);
                $('[name="txtStatus"]').val(data.status);
                $('[name="txtAgama"]').val(data.kd_agama);
                if (data.kd_jk == '2'){
                    $("#laki_laki").prop("checked", true);
                }
                else{
                    $("#perempuan").prop("checked", true);
                }
                if (data.level == "Superadmin") {
                    $('#status_user').hide();
                }
                else{
                    $('#status_user').show();
                }
                $('[name="txtNoHP"]').val(data.no_hp);

                $('#modal_form').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Get Data From AJAX');
            }
        });
    }

    function reload_table(){
        table.ajax.reload(null,false); //reload datatable ajax 
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

    function foto_modal(id_pemilik){
        // $('#modal_foto').modal('show');
        $.ajax({
                url: "<?php echo site_url('User/get_foto/') ;?>/"+id_pemilik,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    var fileInput = "<?php echo site_url('assets/upload/foto') ;?>/"+data.foto;
                    $('#foto').attr('src', '<?php echo site_url('assets/upload/foto') ;?>/'+data.foto);
                    $("#modal_foto").css("z-index", "1500");
                    $("#modal_foto").css("overflow-y", "scroll");
                    $('#modal_foto').modal('show');    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }

    function detail_user(id_pemilik){
        window.location.href = "<?php echo site_url('User/detail_user/'); ?>"+id_pemilik;
    }
</script>