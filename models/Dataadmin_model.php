<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataadmin_model extends CI_Model {

    private $table = 'data_admin'; 

    public function __construct() {
        $this->load->database();
    }

    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_by_email($email) {
        $query = $this->db->get_where($this->table, array('email' => $email));
        return $query->row_array();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($email, $data) {
        $this->db->where('email', $email);
        return $this->db->update($this->table, $data);
    }    

    public function delete($email) {
        $this->db->where('email', $email);
        return $this->db->delete($this->table);
    }
}
?>
