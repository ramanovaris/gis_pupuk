<?php
class Login extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('Login_model');
  }

  public function index(){
    $this->load->view('Login/login_view');
  }

  public function masuk(){
     $username = $this->input->post('txtUsername');
     $password = $this->input->post('txtPassword');
     
     $data = array(
      'username' => $username,
      'password' => md5($password)
     );

     // Validasi Username dan Password
     $cek = $this->Login_model->cek_login($data);

     // Validasi Level
     $cek_level = $this->Login_model->cek_level($username);

     // GET Nama pemilik
     $nama_pemilik =  $this->Login_model->get_nama_pemilik($username);
     
     if($cek['status'] == 'terdaftar'){
 
      $data_session = array(
        'nama' => $nama_pemilik['nama_pemilik'],
        'id_pemilik' => $nama_pemilik['id_pemilik'],
        'id_user' => $cek_level['id_user'],
        'foto' => $nama_pemilik['foto'],
        'username' => $username,
        'level' => $cek_level['level'],
        'status' => "login"
        );

      $this->session->set_userdata($data_session);
      
        if ($cek_level['level'] == 'user') {
            redirect(base_url("Kandang"));
        }
        else{
          redirect(base_url("User"));
        }
      }
      elseif ($cek['status'] == 'belum terdaftar') {
        $this->session->set_flashdata('blm_konfirmasi', 'Silahkan Tunggu Konfirmasi Admin');
        redirect(base_url("Login"));
      }
      else{
        $this->session->set_flashdata('login_gagal', 'Username atau Password Anda Salah !');
        redirect(base_url("Login"));
      }
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect(base_url('Login'));
  }
}