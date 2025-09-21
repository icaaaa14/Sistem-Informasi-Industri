<?php
class Berita_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_berita(){
        $query = $this->db->get('berita');
        return $query->result_array();
    }

    public function insert_berita($data){
        $this->db->insert('berita', $data);
    }

    public function get_berita_by_nama_perusahaan($nama_perusahaan) {
        $this->db->where('Nama_Perusahaan', $nama_perusahaan);
        $query = $this->db->get('berita');
        return $query->row_array();
    }

    public function delete_berita($id){
        // Hapus data dari tabel berita berdasarkan id
        $this->db->where('id', $id);
        $this->db->delete('berita');
    }

    public function save($data) {
        return $this->db->insert('berita', $data);
    }
    public function get_berita_by_id($id){
        $this->db->where('id', $id); 
        $query = $this->db->get('berita');
        return $query->row_array();
    }
       
    public function update_berita($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('berita', $data);
    }
    
    public function get_berita($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('berita');
        return $query->row_array(); 
    }
}

