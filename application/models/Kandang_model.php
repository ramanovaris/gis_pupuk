<?php
class Kandang_model extends CI_Model{
 
      var $table = 'kandang';
      var $column_order = array('alamat', 'nama_kec', 'jumlah_pupuk', 'harga_pupuk', 'lintang', 'bujur'); //field yang ada di table unit
      var $column_search = array('alamat', 'nama_kec', 'jumlah_pupuk', 'harga_pupuk', 'lintang', 'bujur'); //field yang diizin untuk pencarian 
      var $column_order_admin = array('nama_pemilik', 'alamat', 'nama_kec', 'jumlah_pupuk', 'harga_pupuk', 'lintang', 'bujur'); //field yang ada di table unit
      var $column_search_admin = array('nama_pemilik', 'alamat', 'nama_kec', 'jumlah_pupuk', 'harga_pupuk', 'lintang', 'bujur'); //field yang diizin untuk pencarian 
      var $order = array('kd_kandang' => 'asc'); // default order
    
      private function _get_datatables_query(){
          
          if ($this->session->userdata('level') == 'user') {
            $id_pemilik = $this->session->userdata('id_pemilik');
            $this->db->from($this->table);
            $this->db->where('kandang.id_pemilik', $id_pemilik);
          }
          else{
            $this->db->from($this->table);
          }
          
   
          $i = 0;

          if ($this->session->userdata('level') == 'user') {
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
          }
          else{
            foreach ($this->column_search_admin as $item) // looping awal
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
     
                    if(count($this->column_search_admin) - 1 == $i) 
                        $this->db->group_end(); 
                }
                $i++;
            }
          }
           
          if(isset($_POST['order'])) 
          {
              if ($this->session->userdata('level') == 'user') {
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
              }
              else{
                $this->db->order_by($this->column_order_admin[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
              }
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
          $this->db->join ( 'kecamatan AS b', 'b.kd_kec = kandang.kd_kec');
          $this->db->join ( 'pemilik AS c', 'c.id_pemilik = kandang.id_pemilik');
          $query = $this->db->get();
          return $query->result();
      }
   
      function count_filtered()
      {
          $id_pemilik = $this->session->userdata('id_pemilik');
          $this->_get_datatables_query();
          $this->db->join ( 'kecamatan AS b', 'b.kd_kec = kandang.kd_kec');
          $this->db->join ( 'pemilik AS c', 'c.id_pemilik = kandang.id_pemilik');
          $this->db->where(' kandang.id_pemilik', $id_pemilik);
          $query = $this->db->get();
          return $query->num_rows();
      }
   
      public function count_all()
      {
          $id_pemilik = $this->session->userdata('id_pemilik');
          $this->db->from($this->table);
          $this->db->where(' kandang.id_pemilik', $id_pemilik);
          return $this->db->count_all_results();
      }

      function count_filtered_admin()
      {
          $this->_get_datatables_query();
          $this->db->join ( 'kecamatan AS b', 'b.kd_kec = kandang.kd_kec');
          $this->db->join ( 'pemilik AS c', 'c.id_pemilik = kandang.id_pemilik');
          $query = $this->db->get();
          return $query->num_rows();
      }
   
      public function count_all_admin()
      {
          $this->db->from($this->table);
          return $this->db->count_all_results();
      }

      public function get_kecamatan()
      {
          $query = $this->db->get('kecamatan');
          return $query->result();
      }

      public function tambah_kandang_db($data)
      {
          $this->db->insert('kandang', $data);   
          return $this->db->insert_id();
      }

      public function delete_kandang($id)
      {
          $this->db->where('kd_kandang', $id);
        $this->db->delete('kandang');
      }

      public function get_kandang_by_kd_kandang($id_user){
        $sql = "SELECT * FROM kandang JOIN kecamatan ON kecamatan.kd_kec=kandang.kd_kec WHERE kd_kandang = ".$id_user."";
        $query = $this->db->query($sql);

        return $query->row();
      }

      public function ubah_kandang($where, $data){
          $this->db->update($this->table, $data, $where);
          return $this->db->affected_rows();
      }

      public function get_foto_kandang_by_id_pemilik($kd_kandang){
        $this->db->select('foto_kandang');
        $this->db->from('kandang');
        $this->db->where('kd_kandang', $kd_kandang);
        $query = $this->db->get();

        return $query->row();
      }
}