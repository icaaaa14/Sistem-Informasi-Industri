<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_perusahaan() {
        $query = $this->db->get('perusahaan');
        return $query->result();
    }

    public function insert_perusahaan($data) {
        return $this->db->insert('perusahaan', $data); 
    }
    
}
?>