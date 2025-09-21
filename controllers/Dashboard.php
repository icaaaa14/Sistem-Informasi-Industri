<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Dashboard_model'); 
    }

    public function index() {
        $data['pageTitle'] = 'Dashboard';
    
        $data['jumlah_perusahaan'] = $this->Dashboard_model->get_jumlah_perusahaan();
        $data['jumlah_kecamatan'] = $this->Dashboard_model->getJumlahKecamatan(); 
        $data['jumlah_kelurahan'] = $this->Dashboard_model->getJumlahKelurahan(); 
        $data['jumlah_industri_jenis'] = $this->Dashboard_model->getJumlahJenisIndustri(); 
        
        $grafik_data = $this->Dashboard_model->getGrafikData();
        $data['grafik_labels'] = $grafik_data['labels'];
        $data['grafik_data'] = $grafik_data['data'];

        $pie_data = $this->Dashboard_model->get_pie_data();
        $data['pie_labels'] = $pie_data['labels'];
        $data['pie_data'] = $pie_data['data'];

        error_log(print_r($data['pie_labels'], true));
        error_log(print_r($data['pie_data'], true));

        $this->load->view('header', $data);
        $this->load->view('dashboard', $data);
    }    
}
?>
