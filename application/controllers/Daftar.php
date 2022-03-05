<?php
class Daftar extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('Daftar_model');
    date_default_timezone_set('Asia/singapore');
    $this->now = date("Y-m-d H:i:s");
  }

  public function index(){
    $data['kecamatan'] = $this->Daftar_model->get_kecamatan();
    $data['agama'] = $this->Daftar_model->get_agama();
    $this->load->view('Daftar/daftar_view', $data);
  }

  public function tambah_user(){
      $date_now = date("Y-m-d H:i:s");

      $data2 = array(
        'nama_pemilik' => $this->input->post('txtNamaPemilik'), 
        'alamat' => $this->input->post('txtAlamat'), 
        'kd_kec' => $this->input->post('txtKec'), 
        'kd_agama' => $this->input->post('txtAgama'),
        'kd_jk' => $this->input->post('rd_jk'),
        'no_hp' => $this->input->post('txtNoHP'),
        'foto' => 'no_pic.jpg'
      );

      $tbl_pemilik = $this->Daftar_model->tambah_pemilik_db($data2);

      $password = $this->input->post('txtKataSandi');
      $pw_encrypted = md5($password);

      $data = array(
        'username' => $this->input->post('txtNamaPengguna'), 
        'password' => $pw_encrypted, 
        'tgl_daftar' => $date_now, 
        'id_pemilik' => $tbl_pemilik,
        'status' => 'belum terdaftar'
      );

      $tbl_user = $this->Daftar_model->tambah_user_db($data);

      if (!empty($tbl_pemilik) || !empty($tbl_user)) {
        $this->session->set_flashdata('daftar_berhasil', 'Terimakasih Telah Mendaftar, Silahkan Tunggu Konfirmasi Dari ADMIN');
        redirect('Login');
      }
  }

  public function cekUsername(){
    if($this->Daftar_model->get_username($_POST['username'])){
        echo 'taken';
    }else {
        echo 'not_taken';
    }
  }

}