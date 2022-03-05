<?php
class Jenis_kelamin extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('Jenis_kelamin_model');
  }

  public function index(){
    if($this->session->userdata('level')=='Superadmin'){
      $this->load->view('templates/header');
      $this->load->view('Jenis_kelamin/jenis_kelamin_view');
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  function get_data_jenis_kelamin(){
          $list = $this->Jenis_kelamin_model->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $no++;
              $row = array();
              $row[] = $field->jk;
              $row[] = "<a href='javascript:void(0);' class='btn-warning btn-xs' onclick='ubah_jenis_kelamin(".$field->kd_jk.")' title='Ubah Jenis Kelamin' data-toggle='tooltip' data-placement='bottom'><i class='glyphicon glyphicon-pencil'></i></a>  <a href='javascript:void(0);' class='btn-danger btn-xs' onclick='hapus_modal(".$field->kd_jk.")' title='Hapus Jenis Kelamin' data-toggle='tooltip' data-placement='bottom'><i class='glyphicon glyphicon-trash'></i></a>";
              $data[] = $row;
          }
   
          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->Jenis_kelamin_model->count_all(),
              "recordsFiltered" => $this->Jenis_kelamin_model->count_filtered(),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
  }

  public function tambah_jenis_kelamin(){
      $data = array(
        'jk' => $this->input->post('txtJenisKelamin')
      );

      $insert = $this->Jenis_kelamin_model->tambah_jenis_kelamin_db($data);
      echo json_encode(array("status" => true));
  }

  public function get_nama_jk_for_delete($kd_jk){
        $data = $this->Jenis_kelamin_model->get_nama_jk_for_delete($kd_jk);
        echo json_encode($data);
  }

  public function hapus_jenis_kelamin($kd_jk){
      $this->Jenis_kelamin_model->hapus_jenis_kelamin_db($kd_jk);
      echo json_encode(array("status" => true));
  }

  public function ubah_jenis_kelamin($kd_jk){
      $data = $this->Jenis_kelamin_model->get_jk_by_kd_jk($kd_jk);
      echo json_encode($data);
  }

  public function ajax_ubah_jenis_kelamin(){
      $data = array(
        'jk' => $this->input->post('txtJenisKelamin')
      );

      $this->Jenis_kelamin_model->ubah_jenis_kelamin_db(array('kd_jk' => $this->input->post('txtKdJenisKelamin')), $data);
      echo json_encode(array("status" => TRUE));
  }
}