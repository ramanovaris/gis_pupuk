<?php
class Agama extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('Agama_model');
  }

  public function index(){
    if($this->session->userdata('level')=='Superadmin'){
      $this->load->view('templates/header');
      $this->load->view('Agama/agama_view');
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  function get_data_agama(){
          $list = $this->Agama_model->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $no++;
              $row = array();
              $row[] = $field->nama_agama;
              $row[] = "<a href='javascript:void(0);' class='btn btn-warning btn-xs' onclick='ubah_agama(".$field->kd_agama.")' title='Ubah Agama' data-toggle='tooltip' data-placement='bottom'><i class='glyphicon glyphicon-pencil'></i></a>  <a href='javascript:void(0);' class='btn btn-danger btn-xs' onclick='hapus_modal(".$field->kd_agama.")' title='Hapus Agama' data-toggle='tooltip' data-placement='bottom'><i class='glyphicon glyphicon-trash'></i></a>";
              $data[] = $row;
          }
   
          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Agama_model->count_all(),
              "recordsFiltered" => $this->Agama_model->count_filtered(),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
  }

  public function tambah_agama(){
      $data = array(
        'nama_agama' => $this->input->post('txtNamaAgama')
      );

      $insert = $this->Agama_model->tambah_agama_db($data);
      echo json_encode(array("status" => true));
  }

  public function get_nama_agama_for_delete($kd_agama){
        $data = $this->Agama_model->get_nama_agama_for_delete($kd_agama);
        echo json_encode($data);
  }

  public function hapus_agama($kd_agama){
      $this->Agama_model->hapus_agama_db($kd_agama);
      echo json_encode(array("status" => true));
  }

  public function ubah_agama($kd_agama){
      $data = $this->Agama_model->get_agama_by_kd_agama($kd_agama);
      echo json_encode($data);
  }

  public function ajax_ubah_agama(){
      $data = array(
        'nama_agama' => $this->input->post('txtNamaAgama')
      );

      $this->Agama_model->ubah_agama_db(array('kd_agama' => $this->input->post('txtKdAgama')), $data);
      echo json_encode(array("status" => TRUE));
  }
}