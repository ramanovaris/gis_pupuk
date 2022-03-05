<?php
class Maps_model extends CI_Model{
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
}