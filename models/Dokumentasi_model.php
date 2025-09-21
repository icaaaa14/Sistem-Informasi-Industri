<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi_model extends CI_Model
{
    public function get_all()
    {
        return $this->db->get('dokumentasi')->result_array();
    }
 
    public function get_by_id($id) {
        $query = $this->db->get_where('dokumentasi', array('id' => $id));
        return $query->row_array(); 
    }
    
    public function insert($data)
    {
        return $this->db->insert('dokumentasi', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('dokumentasi', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('dokumentasi', array('id' => $id));
    }

    public function view($id) {
        $query = $this->db->get_where('dokumentasi', array('id' => $id));
        return $query->row_array();
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('dokumentasi', $data);
    }

    public function status($id) {
        $this->db->set('status', '1-status', FALSE); 
        $this->db->where('id', $id);
        return $this->db->update('dokumentasi');
    }

    public function reset_auto_increment() {
        $this->db->query("ALTER TABLE dokumentasi AUTO_INCREMENT = 1");
    }
    
    
}
?>
