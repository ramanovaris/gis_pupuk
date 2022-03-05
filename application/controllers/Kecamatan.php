<?php
class Kecamatan extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('Kecamatan_model');
  }

  public function index(){
    if($this->session->userdata('level')=='Superadmin'){
      $this->load->view('templates/header');
      $this->load->view('Kecamatan/kecamatan_view');
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  function get_data_kecamatan(){
          $list = $this->Kecamatan_model->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $no++;
              $row = array();
              $row[] = $field->nama_kec;
              $row[] = $field->lat;
              $row[] = $field->lng;
              $row[] = "<a href='javascript:void(0);' class='btn btn-warning btn-xs' onclick='ubah_kecamatan(".$field->kd_kec.")' title='Ubah Kecamatan' data-toggle='tooltip' data-placement='bottom'><i class='glyphicon glyphicon-pencil'></i></a>  <a href='javascript:void(0);' class='btn btn-danger btn-xs' onclick='hapus_modal(".$field->kd_kec.")' title='Hapus Kecamatan' data-toggle='tooltip' data-placement='bottom'><i class='glyphicon glyphicon-trash'></i></a>";
              $data[] = $row;
          }
   
          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Kecamatan_model->count_all(),
              "recordsFiltered" => $this->Kecamatan_model->count_filtered(),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
  }

  public function tambah_kecamatan(){
      $data = array(
        'nama_kec' => $this->input->post('txtNamaKecamatan'), 
        'lat' => $this->input->post('txtLintang'), 
        'lng' => $this->input->post('txtBujur'), 
      );

      $insert = $this->Kecamatan_model->tambah_kecamatan_db($data);
      echo json_encode(array("status" => true));
  }

  public function get_nama_kecamatan_for_delete($kd_kec){
        $data = $this->Kecamatan_model->get_nama_kecamatan_for_delete($kd_kec);
        echo json_encode($data);
  }

  public function hapus_kecamatan($kd_kec){
      $this->Kecamatan_model->hapus_kecamatan_db($kd_kec);
      echo json_encode(array("status" => true));
  }

  public function ubah_kecamatan($kd_kec){
      $data = $this->Kecamatan_model->get_kecamatan_by_kd_kec($kd_kec);
      echo json_encode($data);
  }

  public function ajax_ubah_kecamatan(){
      $data = array(
        'nama_kec' => $this->input->post('txtNamaKecamatan'), 
        'lat' => $this->input->post('txtLintang'),
        'lng' => $this->input->post('txtBujur'),
      );

      $this->Kecamatan_model->ubah_kecamatan_db(array('kd_kec' => $this->input->post('txtKdKec')), $data);
      echo json_encode(array("status" => TRUE));
  }
}