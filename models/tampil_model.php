<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_perusahaan_by_id($id_perusahaan) {
        $this->db->where('id_perusahaan', $id_perusahaan);
        $query = $this->db->get('perusahaan');
        return $query->row();
    }
}
?>
