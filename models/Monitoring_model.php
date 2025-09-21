<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring_model extends CI_Model {

    public function getRisikoData() {
        $this->db->select('Uraian_Risiko_Proyek as jenis_risiko, COUNT(Nama_Perusahaan) as jumlah_perusahaan');
        $this->db->from('data_industri');
        $this->db->group_by('Uraian_Risiko_Proyek');

        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return []; 
        }
    }

    public function getPerusahaanByRisiko($jenis_risiko) {
        $this->db->select('Nib, Nama_Perusahaan, Uraian_Status_Penanaman_Modal, Uraian_Jenis_Perusahaan, Uraian_Risiko_Proyek, nama_proyek, Uraian_Skala_Usaha, Alamat_Usaha, kecamatan_usaha, kelurahan_usaha, Kbli, Judul_Kbli, Nama_User, Nomor_Identitas_User, Email,Nomor_Telp');
        $this->db->from('data_industri');
        $this->db->where('Uraian_Risiko_Proyek', $jenis_risiko);
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return []; 
        }
    }
}
