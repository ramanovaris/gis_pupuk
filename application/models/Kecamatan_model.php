<?php
class Kecamatan_model extends CI_Model{
 
      var $table = 'kecamatan';
      var $column_order = array('nama_kec', 'lat', 'lng'); //field yang ada di table unit
      var $column_search = array('nama_kec', 'lat', 'lng'); //field yang diizin untuk pencarian 
      var $order = array('nama_kec' => 'asc'); // default order
    
      private function _get_datatables_query(){
          $this->db->from($this->table);
   
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
          $query = $this->db->get();
          return $query->result();
      }
   
      function count_filtered()
      {
          $this->_get_datatables_query();
          $query = $this->db->get();
          return $query->num_rows();
      }
   
      public function count_all()
      {
          $this->db->from($this->table);
          return $this->db->count_all_results();
      }

      public function tambah_kecamatan_db($data)
      {
        $this->db->insert('kecamatan', $data);   
        return $this->db->insert_id();
      }

      public function get_nama_kecamatan_for_delete($kd_kec){
        $this->db->select('nama_kec');
        $this->db->from('kecamatan');
        $this->db->where('kd_kec', $kd_kec);
        $query = $this->db->get();

        return $query->row_array();
      }

      public function hapus_kecamatan_db($kd_kec){
        $this->db->where('kd_kec', $kd_kec);
        $this->db->delete('kecamatan');
      }

      public function get_kecamatan_by_kd_kec($kd_kec){
        $this->db->from($this->table);
        $this->db->where('kd_kec', $kd_kec);
        $query = $this->db->get();

        return $query->row();
      }
      
      public function ubah_kecamatan_db($where, $data){
          $this->db->update($this->table, $data, $where);
          return $this->db->affected_rows();
      }
}