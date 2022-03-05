<?php
class Login_model extends CI_Model{

      public function cek_login($data)
      {
        $this->db->from('user');
        $this->db->where('username', $data['username']);
        $this->db->where('password',  $data['password']);
        $query = $this->db->get();

        return $query->row_array();
      }

      public function cek_level($username)
      {
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();

        return $query->row_array();
      }

      public function get_nama_pemilik($username)
      {
        $this->db->from('pemilik');
        $this->db->join('user', 'user.id_pemilik=pemilik.id_pemilik');
        $this->db->where('user.username', $username);
        $query = $this->db->get();

        return $query->row_array();
      }
}