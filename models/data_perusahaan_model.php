<?php
class Data_Perusahaan_Model extends CI_Model {
    public $Nib;
    public $Nama_Perusahaan;
    public $Tanggal_Terbit_Oss;
    public $Uraian_Status_Penanaman_Modal;
    public $Uraian_Jenis_Perusahaan;
    public $Uraian_Risiko_Proyek;
    public $nama_proyek;
    public $Uraian_Skala_Usaha;
    public $Alamat_Usaha;
    public $kecamatan_usaha;
    public $kelurahan_usaha;
    public $Kbli;
    public $Judul_Kbli;
    public $Nama_User;
    public $Nomor_Identitas_User;
    public $Email;
    public $Nomor_Telp;
    public $Jumlah_Investasi;
    public $foto;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_perusahaan($limit, $offset, $search = '', $filters = []) {
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('nama_perusahaan', $search);
            $this->db->or_like('nama_user', $search);
            $this->db->or_like('kecamatan_usaha', $search);
            $this->db->or_like('kelurahan_usaha', $search);
            $this->db->group_end();
        }

        if (!empty($filters['jenis_perusahaan'])) {
            $this->db->where('uraian_jenis_perusahaan', $filters['jenis_perusahaan']);
        }
        if (!empty($filters['kecamatan_usaha'])) {
            $this->db->where('kecamatan_usaha', $filters['kecamatan_usaha']);
        }
        if (!empty($filters['risiko_proyek'])) {
            $this->db->where('uraian_risiko_proyek', $filters['risiko_proyek']);
        }
    
        $this->db->limit($limit, $offset);
        $query = $this->db->get('data_industri');
        return $query->result();
    }

    public function get_kecamatan_usaha() {
        $this->db->distinct();  
        $this->db->select('kecamatan_usaha'); 
        $query = $this->db->get('data_industri'); 
        return $query->result_array(); 
    }

    public function get_count($search = '', $filters = []) {
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('nama_perusahaan', $search);
            $this->db->or_like('nama_user', $search);
            $this->db->or_like('alamat_usaha', $search);
            $this->db->or_like('kelurahan_usaha', $search);
            $this->db->group_end();
        }

        if (!empty($filters['jenis_perusahaan'])) {
            $this->db->where('uraian_jenis_perusahaan', $filters['jenis_perusahaan']);
        }
        if (!empty($filters['kecamatan_usaha'])) {
            $this->db->where('kecamatan_usaha', $filters['kecamatan_usaha']);
        }
        if (!empty($filters['risiko_proyek'])) {
            $this->db->where('uraian_risiko_proyek', $filters['risiko_proyek']);
        }

        return $this->db->count_all_results('data_industri');
    }

    public function simpan_perusahaan($data) {
        if ($this->db->insert('data_industri', $data)) {
            log_message('debug', 'Data berhasil disimpan: ' . json_encode($data));
            return true;
        } else {
            log_message('debug', 'Gagal menyimpan data: ' . $this->db->last_query());
            return false;
        }        
    }    

    public function edit_perusahaan($id, $data) {
        if (!empty($id)) {
            $this->db->where('Id', $id);
            $this->db->update('data_industri', $data);
            return $this->db->affected_rows() > 0;
        }
        return false; 
    }

    public function update_perusahaan($id, $data) {
        if (!empty($id)) {
            $this->db->where('id', $id);  
            $this->db->update('data_industri', $data);
            return $this->db->affected_rows() > 0;
        }
        return false;
    }
    
    public function get_perusahaan_by_id($id) {
        $this->db->where('Id', $id);
        $query = $this->db->get('data_industri');
        return $query->row();
    }      

    public function delete($id) {
        $this->db->where('Id', $id); 
        return $this->db->delete('data_industri'); // Nama tabel
    }            
    
    // Memperbarui nomor urut
    private function update_no_urut() {
        $this->db->query('SET @counter := 0');
        $this->db->query('
            UPDATE data_industri
            SET id = (@counter := @counter + 1)
            WHERE nib IS NOT NULL
            ORDER BY id
        ');
    }
}
