                        <div class="header">
                            <h2>
                                DATA DETAIL USER
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php foreach ($user_detail as $row):?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <h4>Nama Pemilik &nbsp;&nbsp;: <?php echo $row['nama_pemilik']; ?></h4>
                                    </div>
                                    <div class="form-group">
                                        <h4>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['alamat']; ?></b></h4>
                                    </div>
                                    <div class="form-group">
                                        <h4>Kecamatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['nama_kec']; ?></b></h4>
                                    </div>
                                    <div class="form-group">
                                        <h4>Agama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['nama_agama']; ?></b></h4>
                                    </div>
                                    <div class="form-group">
                                        <h4>Jenis Kelamin &nbsp;: <b><?php echo $row['jk']; ?></b></h4>
                                    </div>
                                    <div class="form-group">
                                        <h4>No. Hp  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['no_hp']; ?></b></h4>
                                    </div>
                                    <div class="form-group">
                                        <h4>Username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b><?php echo $row['username']; ?></b></h4>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <img src="<?php echo base_url('assets/upload/foto/'.$row['foto']);?>" width="100%" height="100%" border="5">
                                    </div>
                                </div>
                            </div>
                         <button type="button" class="btn btn-success waves-effect m-r-20 navbar-left" data-toggle="modal" onclick="tambah_kandang()">Tambah Kandang User</button>
                         <br>
                         <br>
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Jumlah Pupuk</th>
                                            <th>Harga Pupuk</th>
                                            <th>Lintang</th>
                                            <th>Bujur</th>
                                            <th>Foto Kandang</th>
                                            <th>Terakhir Ubah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

<!-- Modal Tambah Kandang & Ubah Kandang -->
<div id="modal_form" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Kandang</h4>
      </div>
      <div class="modal-body form">
            <form id="form" action="#" class="form-horizontal">
                <input type="hidden" value="" name="txtKdKandang">
                <div id="gmap_basic_example" class="gmap"></div>
                <br>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtAlamat">Alamat Kandang</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtAlamat" id="txtAlamat" placeholder="Masukkan Alamat" class="form-control">                            
                        </div>
                        <span class="pesan pesan-alamat">Silahkan Isi Kolom Alamat</span>
                    </div>
                    <br>
                    <label class="col-md-3 control-label" for="txtKecamatan">Kecamatan</label>
                    <div class="col-md-9">
                        <select  name="txtKecamatan" id="txtKecamatan" class="form-control">
                                <option value="pilih">Pilih Kecamatan</option>
                                <?php foreach ($kecamatan as $row ): ?>
                                    <option value="<?php echo $row->kd_kec;?>"><?php echo $row->nama_kec;?></option>
                                <?php endforeach;?>
                        </select>
                        <span class="pesan pesan-kecamatan">Harap Pilih Kecamatan</span>
                    </div>
                    <br>
                    <label class="col-md-3 control-label" for="txtJumlahPupuk">Jumlah Pupuk</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtJumlahPupuk" id="txtJumlahPupuk" placeholder="Masukkan Jumlah Pupuk" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="8">
                        </div>
                        <span class="pesan pesan-jumlah_pupuk">Silahkan Isi Kolom Jumlah Pupuk</span>
                    </div>
                    <br>
                    <label class="col-md-3 control-label" for="txtHargaPupuk">Harga Pupuk Per Karung</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtHargaPupuk" id="txtHargaPupuk" placeholder="Masukkan Harga Pupuk" class="form-control" onkeypress="return hanyaAngka(event)" maxlength="6">
                        </div>
                        <span class="pesan pesan-harga_pupuk">Silahkan Isi Kolom Harga Pupuk</span>
                    </div>
                    <label class="col-md-3 control-label" for="txtLintang">Lintang</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtLintang" id="txtLintang" placeholder="Masukkan Lintang" class="form-control">
                        </div>
                        <span class="pesan pesan-lintang">Silahkan Isi Kolom Lintang</span>
                    </div>
                    <label class="col-md-3 control-label" for="txtBujur">Bujur</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtBujur" id="txtBujur" placeholder="Masukkan Bujur" class="form-control">
                        </div>
                        <span class="pesan pesan-bujur">Silahkan Isi Kolom Bujur</span>
                    </div>
                    <label class="col-md-3 control-label" for="txtFotoKandang">Foto Kandang</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="file" name="txtFotoKandang" id="txtFotoKandang" class="form-control" size="20" onchange="return validasiFile()"/>
                        </div>
                        <span class="pesan pesan-foto">Unggah Foto Gagal: Tipe file yang anda unggah tidak diizinkan. Silahkan unggah foto dengan tipe file: .jpg, .png atau .jpeg</span>
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
        <h4 class="modal-title">Foto Kandang</h4>
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
                "url": "<?php echo site_url('User/get_data_detail_user/'.$id_user)?>",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                "targets": [1,4], 
                "orderable": false, 
            },
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
        $('#txtJenisKandang').change(function(){
            $(".pesan-jenis_kandang").hide();
        });
        $("#txtAlamat").keyup(function () {
            $(".pesan-alamat").hide();
        });
        $('#txtKecamatan').change(function(){
            $(".pesan-kecamatan").hide();
        });
        $("#txtJumlahPupuk").keyup(function () {
            $(".pesan-jumlah_pupuk").hide();
        });
        $("#txtHargaPupuk").keyup(function () {
            $(".pesan-harga_pupuk").hide();
        });
        $("#txtLintang").keyup(function () {
            $(".pesan-lintang").hide();
        });
        $("#txtBujur").keyup(function () {
            $(".pesan-bujur").hide();
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

    function updateMarkerPosition(latLng) {
        document.getElementById('txtLintang').value = [latLng.lat()];
        document.getElementById('txtBujur').value = [latLng.lng()];
    }

    function tambah_kandang() {
        save_method = 'add';
        $('#form')[0].reset();
        $(".pesan-alamat").hide();
        $(".pesan-kecamatan").hide();
        $(".pesan-jumlah_pupuk").hide();
        $(".pesan-harga_pupuk").hide();
        $(".pesan-lintang").hide();
        $(".pesan-bujur").hide();
        $(".pesan-foto").hide();
        $('#modal_form').modal('show');

        navigator.geolocation.getCurrentPosition(function(position) {
                        var pos = {
                            enableHighAccuracy: true,
                            timeout: 5000,
                            maximumAge: 0,
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        map.setCenter(pos);
                        marker1.setPosition(pos);
        });
        var myOptions = {
          zoom: 12,
            scaleControl: true,
          center:  new google.maps.LatLng(-7.791446,110.366909),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        
        var map = new google.maps.Map(document.getElementById("gmap_basic_example"),
            myOptions);

        var marker1 = new google.maps.Marker({
        title : 'lokasi',
        map : map,
        draggable : true
        });
        
        //updateMarkerPosition(latLng);

        google.maps.event.addListener(marker1, 'drag', function() {
            updateMarkerPosition(marker1.getPosition());
        });
    }

    function simpan() {
        var id_user = <?php echo $id_user;?>;

        var url;

        if(save_method == 'add') {
            url = '<?php echo site_url('User/tambah_kandang/') ;?>'+id_user;

            var alamat = $('#txtAlamat').val().length;                    
            var kecamatan = $('#txtKecamatan').val();           
            var jumlah_pupuk = $('#txtJumlahPupuk').val().length;           
            var harga_pupuk = $('#txtHargaPupuk').val().length; 
            var lintang = $('#txtLintang').val();
            var bujur = $('#txtBujur').val();

                if (alamat == 0 || kecamatan == 'pilih' || jumlah_pupuk == 0 || harga_pupuk == 0 || lintang == 0 || bujur == 0) {              
                    if (alamat == 0) {                
                        $(".pesan-alamat").css('display','block');
                    }
                    if (kecamatan == 'pilih') {                
                        $(".pesan-kecamatan").css('display','block');
                    }
                    if (jumlah_pupuk == 0) {              
                        $(".pesan-jumlah_pupuk").css('display','block');
                    }
                    if (harga_pupuk == 0) {               
                        $(".pesan-harga_pupuk").css('display','block');
                    }
                    if (lintang == 0) {             
                        $(".pesan-lintang").css('display','block');
                    }
                    if (bujur == 0) {             
                        $(".pesan-bujur").css('display','block');
                    }
                    return false;
                }
        } else {
            url = '<?php echo site_url('Kandang/ajax_ubah_kandang') ;?>';

            var alamat = $('#txtAlamat').val().length;                    
            var kecamatan = $('#txtKecamatan').val();           
            var jumlah_pupuk = $('#txtJumlahPupuk').val().length;           
            var harga_pupuk = $('#txtHargaPupuk').val().length; 
            var lintang = $('#txtLintang').val();
            var bujur = $('#txtBujur').val();

                if (alamat == 0 || kecamatan == 'pilih' || jumlah_pupuk == 0 || harga_pupuk == 0 || lintang == 0 || bujur == 0) {              
                    if (alamat == 0) {                
                        $(".pesan-alamat").css('display','block');
                    }
                    if (kecamatan == 'pilih') {                
                        $(".pesan-kecamatan").css('display','block');
                    }
                    if (jumlah_pupuk == 0) {              
                        $(".pesan-jumlah_pupuk").css('display','block');
                    }
                    if (harga_pupuk == 0) {               
                        $(".pesan-harga_pupuk").css('display','block');
                    }
                    if (lintang == 0) {             
                        $(".pesan-lintang").css('display','block');
                    }
                    if (bujur == 0) {             
                        $(".pesan-bujur").css('display','block');
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
                    toastr.success('Tambah Kandang Berhasil!', 'Success', {timeOut: 5000})
                } else {
                    toastr.success('Ubah Kandang Berhasil!', 'Success', {timeOut: 5000})
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / upader data');
            }
        });
    }

    function reload_table(){
        table.ajax.reload(null,false); //reload datatable ajax 
    }

    function validasiFile(){
        var inputFile = document.getElementById('txtFotoKandang');
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

    function ubah_kandang(id){
        save_method = 'update';
        $(".pesan-jenis_kandang").hide();
        $(".pesan-alamat").hide();
        $(".pesan-kecamatan").hide();
        $(".pesan-jumlah_pupuk").hide();
        $(".pesan-harga_pupuk").hide();
        $(".pesan-lintang").hide();
        $(".pesan-bujur").hide();
        $(".pesan-foto").hide();

        //load data dari AJAX
        $.ajax({
            url: "<?php echo site_url('Kandang/ubah_kandang/') ;?>"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="txtKdKandang"]').val(data.kd_kandang);
                $('[name="txtJenisKandang"]').val(data.kd_jenis_kandang);
                $('[name="txtAlamat"]').val(data.alamat_kandang);
                $('[name="txtKecamatan"]').val(data.kd_kec);
                $('[name="txtJumlahPupuk"]').val(data.jumlah_pupuk);
                $('[name="txtHargaPupuk"]').val(data.harga_pupuk);
                $('[name="txtLintang"]').val(data.lintang);
                $('[name="txtBujur"]').val(data.bujur);
                $('#modal_form').modal('show');

                var myOptions = {
                    zoom: 12,
                    scaleControl: true,
                    center:  new google.maps.LatLng(data.lintang, data.bujur),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                
                var map = new google.maps.Map(document.getElementById("gmap_basic_example"),
                    myOptions);

                var marker1 = new google.maps.Marker({
                    position : new google.maps.LatLng(data.lintang, data.bujur),
                    title : 'lokasi',
                    map : map,
                    draggable : true
                });
                
                //updateMarkerPosition(latLng);

                google.maps.event.addListener(marker1, 'drag', function() {
                    updateMarkerPosition(marker1.getPosition());
                });
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Get Data From AJAX');
            }
        });
    }

    function hapus_modal(id){
        $('#button_delete').attr('onclick', 'delete_kandang('+id+')');
        $('#modal_delete_title').text('Apakah Anda Yakin?');
        $("#text_hapus").text("Anda Yakin Ingin Menghapus Data?");
        $('#modal_delete').modal('show');
    }

    function delete_kandang(id){
        $.ajax({
                url: "<?php echo site_url('Kandang/hapus_kandang/') ;?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    toastr.success('Hapus Kandang Berhasil!', 'Success', {timeOut: 5000})
                    $('#modal_delete').modal('hide');
                    table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }

     function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }

    function lihat_foto(kd_kandang){
        $.ajax({
                url: "<?php echo site_url('User/get_foto_kandang/') ;?>"+kd_kandang,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    var fileInput = "<?php echo site_url('assets/upload/kandang') ;?>/"+data.foto_kandang;
                    $('#foto').attr('src', '<?php echo site_url('assets/upload/kandang') ;?>/'+data.foto_kandang);
                    $("#modal_foto").css("z-index", "1500");
                    $("#modal_foto").css("overflow-y", "scroll");
                    $('#modal_foto').modal('show');    
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdd5HZzwPBwQMUfD28ODjb74lgCJDt1_o">
</script>