<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_perusahaan() {
        $query = $this->db->get('perusahaan');
        return $query->result();
    }
}
?>
