<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_perusahaan() {
        $this->db->order_by('jumlah_investasi', 'DESC'); 
        $this->db->limit(5); 
        $query = $this->db->get('data_industri'); 
        return $query->result();
    }    

    public function get_dokumentasi() {
        $this->db->where('status', 'publish'); 
        $query = $this->db->get('dokumentasi');
        $results = $query->result_array();
    
        foreach ($results as &$item) {
            $extension = pathinfo($item['filename'], PATHINFO_EXTENSION);
            $item['tipe'] = in_array($extension, ['jpg', 'jpeg', 'png']) ? 'foto' : ($extension === 'mp4' ? 'video' : 'unknown');
        }
    
        return $results;
    }
    

    public function getVisiMisi() {
        $query = $this->db->get('visi_misi'); 
        return $query->row_array(); 
    }
}
