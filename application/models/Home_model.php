<?php
class Home_model extends CI_Model{

    public function get_kandang(){
        $this->db->from('kandang');
        $this->db->join('pemilik AS a', 'a.id_pemilik = kandang.id_pemilik');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_kandang_by_kd_kandang($kd_kandang){
        $this->db->from('kandang');
        $this->db->join('pemilik AS a', 'a.id_pemilik = kandang.id_pemilik');
        $this->db->join('kecamatan AS b', 'b.kd_kec = kandang.kd_kec');
        $this->db->join('jenis_kelamin AS c', 'c.kd_jk = a.kd_jk');
        $this->db->join('agama AS d', 'd.kd_agama = a.kd_agama');
        $this->db->where('kd_kandang', $kd_kandang);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_all(){
        $this->db->from('kandang');
        return $this->db->count_all_results();
    }

    //ambil data kandang dari database
    function get_kandang_list($limit, $start){
        $this->db->from('kandang');
        $this->db->limit($limit, $start);
        $this->db->join('pemilik AS a', 'a.id_pemilik = kandang.id_pemilik');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_kandang_keyword($keyword){
            $this->db->select('*');
            $this->db->from('kandang');
            $this->db->join('pemilik AS a', 'a.id_pemilik = kandang.id_pemilik');
            $this->db->like('nama_pemilik',$keyword);
            return $this->db->get()->result_array();
    }
}