<?php
class Detail_user_model extends CI_Model{
 
      var $table_user = 'kandang';
      // var $table_pemilik = 'pemilik';
      var $column_order = array('alamat', 'nama_kec', 'jumlah_pupuk', 'harga_pupuk', 'lintang', 'bujur'); //field yang ada di table unit
      var $column_search = array('alamat', 'nama_kec', 'jumlah_pupuk', 'harga_pupuk', 'lintang', 'bujur'); //field yang diizin untuk pencarian 
      var $order = array('kd_kandang' => 'asc'); // default order
    
      private function _get_datatables_query(){
          $this->db->from($this->table_user);
          
          $i = 0;
       
          foreach ($this->column_search as $item) // looping awal
          {
              if($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
              {
                   
                  if($i===0) // looping awal
                  {
                      $this->db->group_start(); 
                      $this->db->like($item, $_POST['search']['value']);
                  }
                  else
                  {
                      $this->db->or_like($item, $_POST['search']['value']);
                  }
   
                  if(count($this->column_search) - 1 == $i) 
                      $this->db->group_end(); 
              }
              $i++;
          }
           
          if(isset($_POST['order'])) 
          {
              $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } 
          else if(isset($this->order))
          {
              $order = $this->order;
              $this->db->order_by(key($order), $order[key($order)]);
          }
      }

      function get_datatables($id_pemilik)
      {
          $this->_get_datatables_query($id_pemilik);
          if($_POST['length'] != -1)
          $this->db->limit($_POST['length'], $_POST['start']);
          $this->db->join ( 'pemilik AS a', 'a.id_pemilik = kandang.id_pemilik');
          $this->db->join ( 'kecamatan AS b', 'b.kd_kec = kandang.kd_kec');
          $this->db->where ( 'kandang.id_pemilik', $id_pemilik);
          $query = $this->db->get();
          return $query->result();
      }
   
      function count_filtered($id_pemilik)
      {
          $this->_get_datatables_query();
           $this->db->join ( 'pemilik AS a', 'a.id_pemilik = kandang.id_pemilik');
          $this->db->join ( 'kecamatan AS b', 'b.kd_kec = kandang.kd_kec');
          $this->db->where('kandang.id_pemilik', $id_pemilik);
          $query = $this->db->get();
          return $query->num_rows();
      }
   
      public function count_all($id_pemilik)
      {
          $this->db->from($this->table_user);
          $this->db->where('kandang.id_pemilik', $id_pemilik);
          return $this->db->count_all_results();
      }

      public function get_id_pemilik($id_user){
        $this->db->select('id_pemilik');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();

        return $query->row()->id_pemilik;
      }

      public function tambah_kandang_db($data2)
      {
          $this->db->insert('kandang', $data2);   
          return $this->db->insert_id();
      }

      public function get_detail_user_by_id_user($id_user){
        $this->db->from('user');
        $this->db->join ( 'pemilik AS a', 'a.id_pemilik = user.id_pemilik');
        $this->db->join ( 'kecamatan AS b', 'b.kd_kec = a.kd_kec');
        $this->db->join ( 'agama AS c', 'c.kd_agama = a.kd_agama');
        $this->db->join ( 'jenis_kelamin AS d', 'd.kd_jk = a.kd_jk');
        $this->db->where ( 'user.id_user', $id_user);
        $query = $this->db->get();

        return $query->result_array();
      }

      public function get_id_pemilik_by_id_user($id_user){
        $this->db->select ('id_pemilik');
        $this->db->from ('user');
        $this->db->where ( 'id_user', $id_user);
        $query = $this->db->get();

        return $query->row()->id_pemilik;
      }
      
      public function get_foto_kandag_by_kd_kandang($kd_kandang)
      {
        $this->db->select('foto_kandang');
        $this->db->from('kandang');
        $this->db->where('kd_kandang', $kd_kandang);
        $query = $this->db->get();

        return $query->row();
      }
}