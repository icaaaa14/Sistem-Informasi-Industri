<?php
class Dashboard_model extends CI_Model {

    public function get_jumlah_perusahaan() {
        $this->db->from('data_industri');
        return $this->db->count_all_results();
    }
    public function getJumlahKecamatan() {
        $this->db->distinct();
        $this->db->select('kecamatan_usaha');
        $this->db->from('data_industri');
        return $this->db->count_all_results(); 
    }
    
    public function getJumlahKelurahan() {
        $this->db->distinct();
        $this->db->select('kelurahan_usaha');
        $this->db->from('data_industri');
        return $this->db->count_all_results(); 
    }
    public function getJumlahJenisIndustri() {
        $this->db->distinct();
        $this->db->select('Uraian_Jenis_Perusahaan');
        $this->db->from('data_industri');
        return $this->db->count_all_results(); 
    }
    
    
    public function getGrafikData() {
        $this->db->select('Uraian_Risiko_Proyek as skala_risiko, COUNT(Nama_Perusahaan) as jumlah_perusahaan');
        $this->db->from('data_industri');
        $this->db->group_by('Uraian_Risiko_Proyek');
        
        $query = $this->db->get();
        
        $labels = [];
        $data = [];
        
        foreach ($query->result() as $row) {
            $labels[] = $row->skala_risiko; 
            $data[] = (int) $row->jumlah_perusahaan; 
        }
        
        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
    

    public function get_pie_data() {
        $this->db->select('COUNT(*) as jumlah, Uraian_Skala_Usaha');
        $this->db->group_by('Uraian_Skala_Usaha');
        $query = $this->db->get('data_industri');
        $data = $query->result_array();

        $filtered_data = array_filter($data, function($item) {
            return !empty($item['Uraian_Skala_Usaha']);
        });

        $labels = array_column($filtered_data, 'Uraian_Skala_Usaha');
        $values = array_column($filtered_data, 'jumlah');

        return [
            'labels' => $labels,
            'data' => $values
        ];
    }
}
?>
