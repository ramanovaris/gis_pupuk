<?php
class User extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('detail_user_model');
    // $this->load->library('encrypt'); 
    date_default_timezone_set('Asia/singapore');
    $this->now = date("Y-m-d H:i:s");
  }

  public function index(){
    if($this->session->userdata('level')=='Superadmin'){
      $data['kecamatan'] = $this->user_model->get_kecamatan();
      $data['agama'] = $this->user_model->get_agama();
      $data['jk'] = $this->user_model->get_jk();
      $this->load->view('templates/header');
      $this->load->view('User/user_view', $data);
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  public function detail_user(){
    if($this->session->userdata('level')=='Superadmin'){
      $data['kecamatan'] = $this->user_model->get_kecamatan();
      $data['agama'] = $this->user_model->get_agama();
      $data['jk'] = $this->user_model->get_jk();
      $data['id_user'] = $this->uri->segment(3);
      $id_user = $data['id_user'];
      $data['user_detail'] = $this->detail_user_model->get_detail_user_by_id_user($id_user);
      $this->load->view('templates/header');
      $this->load->view('User/detail_user_view', $data);
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  function get_data_user(){
          $list = $this->user_model->get_datatables();
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $no++;
              $row = array();
              $row[] = $field->nama_pemilik;
              // $row[] = $field->alamat;
              // $row[] = $field->nama_kec;
              // $row[] = $field->nama_agama;
              // $row[] = $field->jk;
              // $row[] = $field->no_hp;
              $row[] = '<a href="javascript:void(0);" onclick="foto_modal('.$field->id_pemilik.')"><img src="'.base_url('assets/upload/foto/'.$field->foto).'" class="img-responsive" style="width: 50px;" /></a>';
              // $row[] = $field->username;
              $row[] = $field->tgl_daftar;
              $row[] = $field->status;
              if ($field->level == 'Superadmin'){
                $row[] = "<a href='javascript:void(0);' class='btn btn-warning btn-xs' onclick='ubah_user(".$field->id_user.")' title='Ubah User' data-toggle='tooltip' data-placement='bottom'>Ubah</a>";
              }
              else{
                $row[] = "<a href='javascript:void(0);' class='btn btn-info btn-xs' onclick='detail_user(".$field->id_user.")' title='Detail User' data-toggle='tooltip' data-placement='bottom'>Detail</a>  <a href='javascript:void(0);' class='btn btn-warning btn-xs' onclick='ubah_user(".$field->id_user.")' title='Ubah User' data-toggle='tooltip' data-placement='bottom'>Ubah</a>  <a href='javascript:void(0);' class='btn btn-danger btn-xs' onclick='hapus_modal(".$field->id_user.")' title='Hapus User' data-toggle='tooltip' data-placement='bottom'>Hapus</a>";
              }
              $data[] = $row;
          }
   
          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->user_model->count_all(),
              "recordsFiltered" => $this->user_model->count_filtered(),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
  }

  function get_data_detail_user($id_user){
          $id_pemilik = $this->detail_user_model->get_id_pemilik_by_id_user($id_user);
          $list = $this->detail_user_model->get_datatables($id_pemilik);
          $data = array();
          $no = $_POST['start'];
          foreach ($list as $field) {
              $no++;
              $row = array();
              // $row[] = $field->nama_pemilik;
              $row[] = $field->alamat_kandang;
              $row[] = $field->nama_kec;
              $row[] = $field->jumlah_pupuk;
              $row[] = $field->harga_pupuk;
              $row[] = $field->lintang;
              $row[] = $field->bujur;
               $row[] = '<a href="javascript:void(0);" onclick="lihat_foto('.$field->kd_kandang.')"><img src="'.base_url('assets/upload/kandang/'.$field->foto_kandang).'" class="img-responsive" style="width: 50px;" /></a>';
              $row[] = $field->terakhir_diubah;
              $row[] = "<a href='javascript:void(0);' class='btn btn-warning btn-xs' onclick='ubah_kandang(".$field->kd_kandang.")' title='Ubah Kandang' data-toggle='tooltip' data-placement='bottom'>Ubah</a>  <a href='javascript:void(0);' class='btn btn-danger btn-xs' onclick='hapus_modal(".$field->kd_kandang.")' title='Hapus Kandang' data-toggle='tooltip' data-placement='bottom'>Hapus</a>";
              $data[] = $row;
          }
   
          $output = array(
              "draw" => $_POST['draw'],
              "recordsTotal" => $this->detail_user_model->count_all($id_pemilik),
              "recordsFiltered" => $this->detail_user_model->count_filtered($id_pemilik),
              "data" => $data,
          );
          //output dalam format JSON
          echo json_encode($output);
  }

  public function tambah_user(){
      $date_now = date("Y-m-d H:i:s");

      $data2 = array(
        'nama_pemilik' => $this->input->post('txtNamaPemilik'), 
        'alamat' => $this->input->post('txtAlamat'), 
        'kd_kec' => $this->input->post('txtKec'), 
        'kd_agama' => $this->input->post('txtAgama'),
        'kd_jk' => $this->input->post('rd_jk'),
        'no_hp' => $this->input->post('txtNoHP')
      );

      if(!empty($_FILES['txtFotoProfile']['name'])){
        $upload = $this->_do_upload_add();
        $data2['foto'] = $upload;
      }else{
        $data2['foto'] = 'no_pic.jpg';
      }

      $password = $this->input->post('txtPassword');
      $pw_encrypted = md5($password);

      $tbl_pemilik = $this->user_model->tambah_pemilik_db($data2);

      $data = array(
        'username' => $this->input->post('txtUsername'), 
        'password' => $pw_encrypted, 
        'tgl_daftar' => $date_now, 
        'id_pemilik' => $tbl_pemilik,
        'status' => $this->input->post('txtStatus')
      );

      $tbl_user = $this->user_model->tambah_user_db($data);
      echo json_encode(array("status" => true));
  }

  public function get_username_for_delete($id_user){
        $data = $this->user_model->get_username_for_delete($id_user);
        echo json_encode($data);
  }

  public function hapus_user($id){
      //Get id_pemilik
      $id_pemilik = $this->user_model->get_id_pemilik_for_delete($id);

      //hapus user
      $this->user_model->delete_user($id);

      //hapus pemilik
      $this->user_model->delete_pemilik($id_pemilik);

      echo json_encode(array("status" => true));
  }

  public function ubah_user($id_user){
      $data = $this->user_model->get_user_by_id_user($id_user);
      // $data = md5($data->password);
      echo json_encode($data);
  }

  public function ajax_ubah_user(){
      $data = array(
        'username' => $this->input->post('txtUsername'), 
        'status' => $this->input->post('txtStatus')
      );

      $this->user_model->ubah_user(array('id_user' => $this->input->post('txtIdUser')), $data);

      $data2 = array(
        'nama_pemilik' => $this->input->post('txtNamaPemilik'), 
        'no_hp' => $this->input->post('txtNoHP'), 
        'kd_kec' => $this->input->post('txtKec'), 
        'kd_agama' => $this->input->post('txtAgama'), 
        'kd_jk' => $this->input->post('rd_jk'),
        'alamat' => $this->input->post('txtAlamat')
      );

      if(!empty($_FILES['txtFotoProfile']['name'])){
        $upload = $this->_do_upload_add();
        $data2['foto'] = $upload;
      }

      $this->user_model->ubah_pemilik(array('id_pemilik' => $this->input->post('txtIdPemilik')), $data2);

      echo json_encode(array("status" => TRUE));
  }

  public function get_kecamatan(){
      $data = $this->user_model->select_kecematan();
      echo json_encode($data);
  }
  
  private function _do_upload_add(){
    $config['upload_path']          = 'assets/upload/foto/';
    $config['allowed_types']        = 'jpg|png|jpeg';
    // $config['max_size']             = 10000; //set max size allowed in Kilobyte
    // $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
    // $date = date("d:m:Y_H:i:s");
    $date = date("dmY_His");
    $username = $this->session->userdata('username');

    $config['file_name']            = $date; //just milisecond timestamp fot unique name
    $config['file_name']            = $username."_".$date; //just milisecond timestamp fot unique name
   
    $this->load->library('upload', $config);
   
    if(!$this->upload->do_upload('txtFotoProfile')) //upload and validate
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

  public function cekUsername(){
    if($this->user_model->get_username($_POST['username'])){
        echo 'taken';
    }else {
        echo 'not_taken';
    }
  }

  public function get_foto($id_pemilik){
    $data = $this->user_model->get_foto_id_user($id_pemilik);
    echo json_encode($data);
  }

  public function tambah_kandang($id_user){
    $date_now = date("Y-m-d H:i:s");

    $id_pemilik = $this->detail_user_model->get_id_pemilik($id_user);

    $data2 = array(
        'alamat_kandang' => $this->input->post('txtAlamat'), 
        'kd_kec' => $this->input->post('txtKecamatan'), 
        'jumlah_pupuk' => $this->input->post('txtJumlahPupuk'),
        'harga_pupuk' => $this->input->post('txtHargaPupuk'),
        'lintang' => $this->input->post('txtLintang'),
        'bujur' => $this->input->post('txtBujur'),
        'terakhir_diubah' => $date_now,
        'id_pemilik' => $id_pemilik
    );

    if(!empty($_FILES['txtFotoKandang']['name'])){
        $upload = $this->_do_upload_add_lagi();
        $data2['foto_kandang'] = $upload;
      }else{
        $data2['foto_kandang'] = 'no_pic_kandang.png';
      }

    $this->detail_user_model->tambah_kandang_db($data2);
    echo json_encode(array("status" => true));
  }

  public function get_foto_kandang($kd_kandang){
    $data = $this->detail_user_model->get_foto_kandag_by_kd_kandang($kd_kandang);
    echo json_encode($data);
  }
}