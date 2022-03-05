<?php
class Kandang extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('kandang_model');
    date_default_timezone_set('Asia/singapore');
    $this->now = date("Y-m-d H:i:s");
  }

  public function index(){
    if($this->session->userdata('level')=='Superadmin' || $this->session->userdata('level')=='user'){
      $data['kecamatan'] = $this->kandang_model->get_kecamatan();
      $this->load->view('templates/header');
      $this->load->view('Kandang/kandang_view', $data);
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  function get_data_kandang(){
          $list = $this->kandang_model->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $no++;
              $row = array();
              
              if ($this->session->userdata('level') == 'Superadmin') {
                $row[] = $field->nama_pemilik;
              }
              
              $row[] = $field->alamat_kandang;
              $row[] = $field->nama_kec;
              $row[] = $field->jumlah_pupuk;
              $row[] = $field->harga_pupuk;
              $row[] = $field->lintang;
              $row[] = $field->bujur;
              $row[] = '<a href="javascript:void(0);" onclick="foto_modal('.$field->kd_kandang.')"><img src="'.base_url('assets/upload/kandang/'.$field->foto_kandang).'" class="img-responsive" style="width: 50px;" /></a>';
              $row[] = $field->terakhir_diubah;
              $row[] = "<a href='javascript:void(0);' class='btn btn-warning btn-xs' onclick='ubah_kandang(".$field->kd_kandang.")' title='Ubah Kandang' data-toggle='tooltip' data-placement='bottom'>Ubah</a>  <a href='javascript:void(0);' class='btn btn-danger btn-xs' onclick='hapus_modal(".$field->kd_kandang.")' title='Hapus Kandang' data-toggle='tooltip' data-placement='bottom'>Hapus</a>";
              $data[] = $row;
          }
          
          if ($this->session->userdata('level') == 'Superadmin') {
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->kandang_model->count_all_admin(),
                "recordsFiltered" => $this->kandang_model->count_filtered_admin(),
                "data" => $data,
            );
          }
          else{
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->kandang_model->count_all(),
                "recordsFiltered" => $this->kandang_model->count_filtered(),
                "data" => $data,
            );
          }
          //output dalam format JSON
          echo json_encode($output);
      }

  public function tambah_kandang(){
    $date_now = date("Y-m-d H:i:s");

    $data2 = array(
        'alamat_kandang' => $this->input->post('txtAlamat'), 
        'kd_kec' => $this->input->post('txtKecamatan'), 
        'jumlah_pupuk' => $this->input->post('txtJumlahPupuk'),
        'harga_pupuk' => $this->input->post('txtHargaPupuk'),
        'lintang' => $this->input->post('txtLintang'),
        'bujur' => $this->input->post('txtBujur'),
        'terakhir_diubah' => $date_now,
        'id_pemilik' => $this->session->userdata('id_pemilik')
    );

    if(!empty($_FILES['txtFotoKandang']['name'])){
        $upload = $this->_do_upload_add_lagi();
        $data2['foto_kandang'] = $upload;
      }else{
        $data2['foto_kandang'] = 'no_pic_kandang.png';
      }

    $this->kandang_model->tambah_kandang_db($data2);
    echo json_encode(array("status" => true));
  }

  public function hapus_kandang($id){
      //hapus user
      $this->kandang_model->delete_kandang($id);

      echo json_encode(array("status" => true));
  }

  public function ubah_kandang($id_user){
      $data = $this->kandang_model->get_kandang_by_kd_kandang($id_user);
      
      echo json_encode($data);
  }

  private function _do_upload_add_lagi(){
    $config['upload_path']          = 'assets/upload/kandang/';
    $config['allowed_types']        = 'jpg|png|jpeg';
    // $config['max_size']             = 10000; //set max size allowed in Kilobyte
    // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
    // $date = date("d:m:Y_H:i:s");
    $date = date("dmY_His");
    $username = $this->session->userdata('username');

    $config['file_name']            = $date; //just milisecond timestamp fot unique name
    $config['file_name']            = $username."_".$date; //just milisecond timestamp fot unique name
   
    $this->load->library('upload', $config);
   
    if(!$this->upload->do_upload('txtFotoKandang')) //upload and validate
    {
        $data['inputerror'][] = 'file';
        $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
        $data['status'] = FALSE;
        echo json_encode($data);
        alert('error');
        exit();
    }
    else{
      $data = array('upload_data' => $this->upload->data());
    }
    return $this->upload->data('file_name');
  }

  public function ajax_ubah_kandang(){
      $date_now = date("Y-m-d H:i:s");

      $data = array(
        'alamat_kandang' => $this->input->post('txtAlamat'), 
        'kd_kec' => $this->input->post('txtKecamatan'), 
        'jumlah_pupuk' => $this->input->post('txtJumlahPupuk'), 
        'harga_pupuk' => $this->input->post('txtHargaPupuk'), 
        'lintang' => $this->input->post('txtLintang'), 
        'terakhir_diubah' => $date_now,
        'bujur' => $this->input->post('txtBujur'), 
      );

      if(!empty($_FILES['txtFotoKandang']['name'])){
        $upload = $this->_do_upload_add_lagi();
        $data['foto_kandang'] = $upload;
      }

      $this->kandang_model->ubah_kandang(array('kd_kandang' => $this->input->post('txtKdKandang')), $data);

      echo json_encode(array("status" => TRUE));
  }

  public function get_foto_kandang_by_id_pemilik($kd_kandang){
    $data = $this->kandang_model->get_foto_kandang_by_id_pemilik($kd_kandang);
    echo json_encode($data);
  }
}