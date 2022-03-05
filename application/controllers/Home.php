<?php
class Home extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('Home_model');
    //load libary pagination
    $this->load->library('pagination');
  }

  public function index(){
    $this->load->view('Home/Home_view');
  }

  public function marketplace(){
    //konfigurasi pagination
    $config['base_url'] = site_url('Home/marketplace'); //site url
    // $config['base_url'] = 'http://localhost/gis_pupuk';
    $config['total_rows'] = $this->db->count_all('kandang'); //total row
    $config['per_page'] = 5;  //show record per halaman
    $config["uri_segment"] = 3;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);

    // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_kandang_list yang ada pada mmodel Home_model. 
        $data['data'] = $this->Home_model->get_kandang_list($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();

  	 //   $data['kandang'] = $this->Home_model->get_kandang();
    // $data['all'] = $this->Home_model->count_all();
    $this->load->view('Home/Marketplace_view', $data);
  }

  public function maps(){
    $this->load->view('Home/Maps_view');
  }  

  public function maps_detail(){
  	$kd_kandang = $this->uri->segment(3);
  	$data['kandang'] = $this->Home_model->get_kandang_by_kd_kandang($kd_kandang);
    $this->load->view('Home/Maps_detail_view', $data);
  }  

  public function product_detail(){
  	$kd_kandang = $this->uri->segment(3);
  	$data['kandang'] = $this->Home_model->get_kandang_by_kd_kandang($kd_kandang);
    $this->load->view('Home/Product_detail_view', $data);
  }  

  public function search(){
      $keyword = $this->input->post('keyword');
      $data['kandang']=$this->Home_model->get_kandang_keyword($keyword);
      $this->load->view('Home/Marketplace_search_view',$data);
  }
}