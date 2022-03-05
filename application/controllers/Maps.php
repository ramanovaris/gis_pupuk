<?php
class Maps extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('Maps_model');
  }

  public function index(){
    if($this->session->userdata('level')=='Superadmin' || $this->session->userdata('level')=='user'){
      $this->load->view('templates/header');
      $this->load->view('Maps/lihat_maps_view');
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  public function detail_kandang(){
    if($this->session->userdata('level')=='Superadmin' || $this->session->userdata('level')=='user'){
      $kd_kandang = $this->uri->segment(3);
      $data['kandang'] = $this->Maps_model->get_kandang_by_kd_kandang($kd_kandang);
      $this->load->view('templates/header');
      $this->load->view('Maps/detail_kandang_view', $data);
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  public function detail_maps(){
    if($this->session->userdata('level')=='Superadmin' || $this->session->userdata('level')=='user'){
      $kd_kandang = $this->uri->segment(3);
      $data['kandang'] = $this->Maps_model->get_kandang_by_kd_kandang($kd_kandang);
      $this->load->view('templates/header');
      $this->load->view('Maps/detail_maps_view', $data);
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }
}