<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_count($search = null) {
        if ($search) {
            $this->db->like('Nama_Perusahaan', $search);
        }
        return $this->db->count_all_results('data_industri');
    }

    public function get_perusahaan($limit, $offset, $search = null) {
        if ($search) {
            $this->db->like('Nama_Perusahaan', $search);
        }
        $this->db->limit($limit, $offset);
        return $this->db->get('data_industri')->result();
    }

    public function get_info_perusahaan($id) {
        $this->db->where('Id', $id);
        return $this->db->get('data_industri')->row();
    }    
}
