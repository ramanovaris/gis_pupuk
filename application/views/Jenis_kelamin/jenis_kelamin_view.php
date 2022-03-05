                        <div class="header">
                            <h2>
                                DATA JENIS KELAMIN
                            </h2>
                        </div>
                        <div class="body">
                         <button type="button" class="btn btn-success waves-effect m-r-20 navbar-right" data-toggle="modal" onclick="tambah_jenis_kelamin()">Tambah Data Jenis Kelamin</button>
                         <br>
                         <br>
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Jenis Kelamin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

<!-- Modal Tambah Jenis Kelamin & Ubah Jenis Kelamin -->
<div id="modal_form" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Jenis Kelamin</h4>
      </div>
      <div class="modal-body form">
            <form id="form" action="#" class="form-horizontal">
                <input type="hidden" value="" name="txtKdJenisKelamin">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtJenisKelamin">Nama Jenis Kelamin</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtJenisKelamin" id="txtJenisKelamin" placeholder="Masukkan Nama Jenis Kelamin" class="form-control">
                        </div>
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
                "url": "<?php echo site_url('Jenis_kelamin/get_data_jenis_kelamin')?>",
                "type": "POST"
            },
 
             
            "columnDefs": [
            { 
                // "targets": [ 1, 2], 
                "orderable": false, 
            },
            // { width: '600px', targets: 0},
            // { width: '140px', targets: 1},
            ],
 
        });
        $('#table_id').on('draw.dt', function () {
                    $('[data-toggle="tooltip"]').tooltip();
        });
        $('[data-toggle="tooltip"]').tooltip();
    });

    var save_method;
    var table;

    function tambah_jenis_kelamin() {
        save_method = 'add';
        // $('#form')[0].reset();
        $('#modal_form').modal('show');
    }

    function simpan() {
        var url;

        if(save_method == 'add') {
            url = '<?php echo site_url('Jenis_kelamin/tambah_jenis_kelamin') ;?>';
        } else {
            url = '<?php echo site_url('Jenis_kelamin/ajax_ubah_jenis_kelamin') ;?>';
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
                    toastr.success('Tambah Jenis Kelamin Berhasil!', 'Success', {timeOut: 5000})
                } else {
                    toastr.success('Ubah Jenis Kelamin Berhasil!', 'Success', {timeOut: 5000})
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

    function hapus_modal(kd_jk){
        $.ajax({
                url: "<?php echo site_url('Jenis_kelamin/get_nama_jk_for_delete/') ;?>"+kd_jk,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    $("#text_hapus").empty();
                    $('#button_delete').attr('onclick', 'hapus_jenis_kelamin('+kd_jk+')');
                    $('#modal_delete_title').text('Apakah Anda Yakin?');
                    htmlString = "Anda Yakin Ingin Menghapus Data <b>"+data.jk+"</b>?"
                    $("#text_hapus").append(htmlString);
                    $('#modal_delete').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }

    function hapus_jenis_kelamin(kd_jk){
        $.ajax({
                url: "<?php echo site_url('Jenis_kelamin/hapus_jenis_kelamin/') ;?>"+kd_jk,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    toastr.success('Hapus Jenis Kelamin Berhasil!', 'Success', {timeOut: 5000})
                    $('#modal_delete').modal('hide');
                    table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }

    function ubah_jenis_kelamin(kd_jk){
        save_method = 'update';

        //load data dari AJAX
        $.ajax({
            url: "<?php echo site_url('Jenis_kelamin/ubah_jenis_kelamin/') ;?>"+kd_jk,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="txtKdJenisKelamin"]').val(data.kd_jk);
                $('[name="txtJenisKelamin"]').val(data.jk);
                
                $('#modal_form').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Get Data From AJAX');
            }
        });
    }
</script>