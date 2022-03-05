<?php
class User_model extends CI_Model{
 
      var $table_user = 'user';
      // var $table_pemilik = 'pemilik';
      var $column_order = array('nama_pemilik', 'foto', 'tgl_daftar', 'status'); //field yang ada di table unit
      var $column_search = array('nama_pemilik', 'foto', 'tgl_daftar', 'status'); //field yang diizin untuk pencarian 
      var $order = array('nama_pemilik' => 'asc'); // default order
    
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

      function get_datatables()
      {
          $this->_get_datatables_query();
          if($_POST['length'] != -1)
          $this->db->limit($_POST['length'], $_POST['start']);
          $this->db->join ( 'pemilik AS a', 'a.id_pemilik = user.id_pemilik');
          $this->db->join ( 'kecamatan AS b', 'b.kd_kec = a.kd_kec');
          $this->db->join ( 'agama AS c', 'c.kd_agama = a.kd_agama');
          $this->db->join ( 'jenis_kelamin AS d', 'd.kd_jk = a.kd_jk');
          $query = $this->db->get();
          return $query->result();
      }
   
      function count_filtered()
      {
          $this->_get_datatables_query();
           $this->db->join ( 'pemilik AS a', 'a.id_pemilik = user.id_pemilik');
          $this->db->join ( 'kecamatan AS b', 'b.kd_kec = a.kd_kec');
          $this->db->join ( 'agama AS c', 'c.kd_agama = a.kd_agama');
          $this->db->join ( 'jenis_kelamin AS d', 'd.kd_jk = a.kd_jk');
          $query = $this->db->get();
          return $query->num_rows();
      }
   
      public function count_all()
      {
          $this->db->from($this->table_user);
          return $this->db->count_all_results();
      }

      public function tambah_user_db($data)
      {
        $this->db->insert('user', $data);   
        return $this->db->insert_id();
      }

      public function tambah_pemilik_db($data2)
      {
        $this->db->insert('pemilik', $data2);   
        return $this->db->insert_id();
      }

      public function get_username_for_delete($id_user){
        $this->db->select('username');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();

        return $query->row_array();
      }

      public function get_id_pemilik_for_delete($id_user){
        $this->db->select('id_pemilik');
        $this->db->from('user');
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();

        return $query->row()->id_pemilik;
      }

      public function delete_user($id){
        $this->db->where('id_user', $id);
        $this->db->delete('user');
      }

      public function delete_pemilik($id_pemilik){
        $this->db->where('id_pemilik', $id_pemilik);
        $this->db->delete('pemilik');
      }

      public function get_user_by_id_user($id_user){
        $sql = "SELECT * FROM user INNER JOIN pemilik ON pemilik.id_pemilik=user.id_pemilik WHERE id_user = ".$id_user."";
        $query = $this->db->query($sql);

        return $query->row();
      }
      
      public function ubah_user($where, $data){
          $this->db->update($this->table_user, $data, $where);
          return $this->db->affected_rows();
      }

      public function ubah_pemilik($where, $data2){
          $this->db->update('pemilik', $data2, $where);
          return $this->db->affected_rows();
      }

      public function select_kecematan(){
        $this->db->from('kecamatan');
        $query = $this->db->get();

        return $query->result();
      }

      public function get_kecamatan(){
        $query = $this->db->get('kecamatan');
        return $query->result();
      }

      public function get_agama(){
        $query = $this->db->get('agama');
        return $query->result();
      }
      
      public function get_jk(){
        $query = $this->db->get('jenis_kelamin');
        return $query->result();
      }

      public function get_username($username){
        $this->db->where('username' , $username);
        $query = $this->db->get('user');

        if($query->num_rows()>0){
          return true;
        } else {
          return false;
        }
      }

      public function get_foto_id_user($id_pemilik)
      {
        $this->db->select('foto');
        $this->db->from('pemilik');
        $this->db->where('id_pemilik', $id_pemilik);
        $query = $this->db->get();

        return $query->row();
      }
}