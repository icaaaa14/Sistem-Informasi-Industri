<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visimisi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getGambar() {
        $this->db->select('gambar');
        $query = $this->db->get('visi_misi');
        return $query->row_array(); 
    }
    

    public function updateGambar($file_name) {
        $data = array('gambar' => $file_name);
        $this->db->where('id', 1); 
        if ($this->db->update('visi_misi', $data)) {
            log_message('info', 'Gambar berhasil diperbarui di database: ' . $file_name);
            return true;
        } else {
            log_message('error', 'Gagal memperbarui gambar di database: ' . $this->db->last_query());
            return false;
        }
    }
}
