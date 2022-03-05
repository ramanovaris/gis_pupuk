<?php
class Daftar_model extends CI_Model{
 
      var $table_user = 'user';

      public function tambah_user_db($data)
      {
        $this->db->insert('user', $data);   
        return $this->db->insert_id();
      }

      public function tambah_pemilik_db($data)
      {
        $this->db->insert('pemilik', $data);   
        return $this->db->insert_id();
      }

      public function get_kecamatan(){
        $query = $this->db->get('kecamatan');
        return $query->result();
      }

      public function get_agama(){
        $query = $this->db->get('agama');
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

}