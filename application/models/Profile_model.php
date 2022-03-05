<?php
class Profile_model extends CI_Model{
 
      var $table_user = 'user';

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