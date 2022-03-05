                        <div class="header">
                            <h2>
                                Kandang Detail
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php foreach ($kandang as $row):?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group" style="font-size: 40px">
                                        Kandang <b><?php echo $row['nama_pemilik']; ?></b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <b>Rp. <?php echo $row['harga_pupuk']; ?> / Karung</b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Jumlah Pupuk: &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['jumlah_pupuk']; ?> Karung</b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Alamat Kandang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['alamat_kandang']; ?></b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Kecamatan Kandang &nbsp;: <b><?php echo $row['nama_kec']; ?></b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Terkahir Diubah  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: <b><?php echo $row['terakhir_diubah']; ?></b>
                                    </div>
                                    <div class="form-group">
                                       <button type="button" class="btn btn-success waves-effect m-r-20 navbar-left" onclick="Map_detail()">Lihat di Maps</button>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <img src="<?php echo base_url('assets/upload/kandang/'.$row['foto_kandang']);?>" width="100%" height="100%" border="5">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <div class="header">
                            <h2>
                                Data Diri Pemilik Kandang
                            </h2>
                        </div>
                        <div class="row clearfix">
                                <?php foreach ($kandang as $row):?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group" style="font-size: 20px">
                                        Nama Pemilik Kandang&nbsp; : <b><?php echo $row['nama_pemilik']; ?></b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <b><?php echo $row['jk']; ?></b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Alamat: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['alamat']; ?> Karung</b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Kecamatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['nama_kec']; ?></b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        Agama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $row['nama_agama']; ?></b>
                                    </div>
                                    <div class="form-group" style="font-size: 20px">
                                        No. HP  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;: <b><?php echo $row['no_hp']; ?></b>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <img src="<?php echo base_url('assets/upload/foto/'.$row['foto']);?>" width="100%" height="100%" border="5">
                                    </div>
                                </div>
                            </div>                
                        </div>

<script type="text/javascript">
    function Map_detail() {
            kd_kandang = <?php echo $this->uri->segment(3); ?>;
            window.location.href = "<?php echo base_url('Maps/detail_maps/')?>"+kd_kandang;
    }
</script>