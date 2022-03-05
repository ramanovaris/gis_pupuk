<?php
class Profile extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('profile_model');
  }

  public function index(){
    if($this->session->userdata('level')=='Superadmin' || $this->session->userdata('level')=='user'){
      $data['kecamatan'] = $this->profile_model->get_kecamatan();
      $data['agama'] = $this->profile_model->get_agama();
      $data['jk'] = $this->profile_model->get_jk();
      $this->load->view('templates/header');
      $this->load->view('Profile/profile_view', $data);
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  public function ubah_user($id_user){
      $data = $this->user_model->get_user_by_id_user($id_user);
      echo json_encode($data);
  }

  public function ajax_ubah_user(){
      $data = array(
        'username' => $this->input->post('txtUsername'), 
      );

      $password = $this->input->post('txtPassword');
      $pw_encrypted = md5($password);
      if(!empty($password)){
        $data['password'] = $pw_encrypted;
      }

      $this->profile_model->ubah_user(array('id_user' => $this->input->post('txtIdUser')), $data);

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

      $this->profile_model->ubah_pemilik(array('id_pemilik' => $this->input->post('txtIdPemilik')), $data2);

      echo json_encode(array("status" => TRUE));
  }

  public function get_kecamatan(){
      $data = $this->user_model->select_kecematan();
      echo json_encode($data);
  }
  
  private function _do_upload_add(){
    $config['upload_path']          = 'assets/upload/foto/';
    $config['allowed_types']        = 'jpg|png';
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

  public function cekUsername(){
    if($this->user_model->get_username($_POST['username'])){
        echo 'taken';
    }else {
        echo 'not_taken';
    }
  }
}