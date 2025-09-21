<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Daftar_model');
    }

    public function index() {
        $config = array();
        $config['base_url'] = site_url('daftar/index');
        $config['total_rows'] = $this->Daftar_model->get_count();
        $config['per_page'] = 25;
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3, 0);
        $page = (is_numeric($page) && $page >= 0) ? (int)$page : 0;
        $offset = $page;

        $data['start_number'] = $offset + 1;

        $data['data_industri'] = $this->Daftar_model->get_perusahaan($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();

        $id = $this->input->get('Id');
        if ($id) {
            $data['informasi_perusahaan'] = $this->Daftar_model->get_info_perusahaan($id);
        }

        $this->load->view('daftar', $data);
    }

    public function search(){
        $search = $this->input->get('query');
 
        $config = array();
        $config['base_url'] = site_url('daftar/search');
        $config['total_rows'] = $this->Daftar_model->get_count($search); 
        $config['per_page'] = 25;
        $config['uri_segment'] = 3;
        $config['num_links'] = 5;

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3, 0);
        $page = (is_numeric($page) && $page >= 0) ? (int)$page : 0;
        $offset = $page;

        $data['start_number'] = $offset + 1;

        $data['data_industri'] = $this->Daftar_model->get_perusahaan($config['per_page'], $offset, $search);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('daftar', $data);
    }

    public function get_industri_info() {
        $id = $this->input->get('Id');
        $detail = $this->Daftar_model->get_info_perusahaan($id);
        
        if ($detail) {
            $output = '<div class="company-post">';
            $output .= '<h3>' . $detail->Nama_Perusahaan . '</h3>';
            
            if (!empty($detail->foto)) {
                $output .= '<img src="' . base_url('uploads/' . $detail->foto) . '" alt="Foto ' . $detail->Nama_Perusahaan . '">';
            }
    
            $fields = array(
                'NIB' => 'Nib',
                'Status Penanaman Modal' => 'Uraian_Status_Penanaman_Modal',
                'Jenis Perusahaan' => 'Uraian_Jenis_Perusahaan',
                'Risiko Proyek' => 'Uraian_Risiko_Proyek',
                'Nama Proyek' => 'nama_proyek',
                'Skala Usaha' => 'Uraian_Skala_Usaha',
                'Alamat Usaha' => 'Alamat_Usaha',
                'Kecamatan' => 'kecamatan_usaha',
                'Kelurahan' => 'kelurahan_usaha',
                'KBLI' => 'Kbli',
                'Judul KBLI' => 'Judul_Kbli',
                'Nama Pemilik' => 'Nama_User',
                'Email' => 'Email',
                'Nomor Telepon' => 'Nomor_Telp'
            );
    
            foreach ($fields as $label => $field) {
                if (!empty($detail->$field)) {
                    $output .= '<p><strong>' . $label . ':</strong> ' . $detail->$field . '</p>';
                }
            }
    
            if (!empty($detail->latitude) && !empty($detail->longitude)) {
                $lat = $detail->latitude;
                $lng = $detail->longitude;
                $output .= '<div id="map" style="width:100%;height:400px;">
                                <iframe
                                    width="100%"
                                    height="400"
                                    style="border:0"
                                    loading="lazy"
                                    allowfullscreen
                                    src="https://www.google.com/maps/embed/v1/place?key=API_KEY&q=' . $lat . ',' . $lng . '">
                                </iframe>
                            </div>';
            } else {
                $alamat = $detail->Alamat_Usaha;
                $encoded_alamat = urlencode($alamat);
                $output .= '<div id="map" style="width:100%;height:400px;">
                                <iframe
                                    width="100%"
                                    height="400"
                                    style="border:0"
                                    loading="lazy"
                                    allowfullscreen
                                    src="https://www.google.com/maps?q=' . $encoded_alamat . '&output=embed">
                                </iframe>
                            </div>';
            }
    
            $output .= '</div>';
        } else {
            $output = '<div class="company-post"><p>Data tidak ditemukan untuk ID: ' . $id . '</p></div>';
        }
        
        echo $output;
    } 
}
