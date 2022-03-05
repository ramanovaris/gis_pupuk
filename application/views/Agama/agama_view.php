                        <div class="header">
                            <h2>
                                DATA AGAMA
                            </h2>
                        </div>
                        <div class="body">
                         <button type="button" class="btn btn-success waves-effect m-r-20 navbar-right" data-toggle="modal" onclick="tambah_agama()">Tambah Data Agama</button>
                         <br>
                         <br>
                            <div class="table-responsive">
                                <table id="table_id" class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama Agama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

<!-- Modal Tambah Agama & Ubah Agama -->
<div id="modal_form" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Agama</h4>
      </div>
      <div class="modal-body form">
            <form id="form" action="#" class="form-horizontal">
                <input type="hidden" value="" name="txtKdAgama">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="txtNamaAgama">Nama Agama</label>
                    <div class="col-md-9">
                        <div class="form-line">
                            <input type="text" name="txtNamaAgama" id="txtNamaAgama" placeholder="Masukkan Nama Agama" class="form-control">
                        </div>
                        <span class="pesan pesan-nama_agama">Silahkan Isi Kolom Nama Agama</span>
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
                "url": "<?php echo site_url('Agama/get_data_agama')?>",
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

    $(document).ready(function(){
        $("#txtNamaAgama").keyup(function () {
            $(".pesan-nama_agama").hide();
        });
    });

    function tambah_agama() {
        save_method = 'add';
        $('#form')[0].reset();
        $(".pesan-nama_agama").hide();
        $('#modal_form').modal('show');
    }

    function simpan() {
        var url;

        if(save_method == 'add') {
            url = '<?php echo site_url('Agama/tambah_agama') ;?>';

            var agama = $('#txtNamaAgama').val().length;         

                if (agama == 0 ) {              
                    if (agama == 0) {              
                        $(".pesan-nama_agama").css('display','block');
                    }
                    return false;
                }
        } else {
            url = '<?php echo site_url('Agama/ajax_ubah_agama') ;?>';

            var agama = $('#txtNamaAgama').val().length;         

                if (agama == 0 ) {              
                    if (agama == 0) {              
                        $(".pesan-nama_agama").css('display','block');
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
                    toastr.success('Tambah Agama Berhasil!', 'Success', {timeOut: 5000})
                } else {
                    toastr.success('Ubah Agama Berhasil!', 'Success', {timeOut: 5000})
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

    function hapus_modal(kd_agama){
        $.ajax({
                url: "<?php echo site_url('Agama/get_nama_agama_for_delete/') ;?>"+kd_agama,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    $("#text_hapus").empty();
                    $('#button_delete').attr('onclick', 'hapus_agama('+kd_agama+')');
                    $('#modal_delete_title').text('Apakah Anda Yakin?');
                    htmlString = "Anda Yakin Ingin Menghapus Data <b>"+data.nama_agama+"</b>?"
                    $("#text_hapus").append(htmlString);
                    $('#modal_delete').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }

    function hapus_agama(kd_agama){
        $.ajax({
                url: "<?php echo site_url('Agama/hapus_agama/') ;?>"+kd_agama,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    toastr.success('Hapus Agama Berhasil!', 'Success', {timeOut: 5000})
                    $('#modal_delete').modal('hide');
                    table.ajax.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error Deleting Data');
                }
        });
    }

    function ubah_agama(kd_agama){
        save_method = 'update';
        $(".pesan-nama_agama").hide();

        //load data dari AJAX
        $.ajax({
            url: "<?php echo site_url('Agama/ubah_agama/') ;?>"+kd_agama,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="txtKdAgama"]').val(data.kd_agama);
                $('[name="txtNamaAgama"]').val(data.nama_agama);
                
                $('#modal_form').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error Get Data From AJAX');
            }
        });
    }
</script>