<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function check_login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('data_admin');
        return $query->row_array();
    }
} 