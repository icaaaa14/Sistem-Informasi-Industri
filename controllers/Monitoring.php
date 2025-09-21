<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Monitoring_model');
    }

    public function index() {
        $data['risikoList'] = $this->Monitoring_model->getRisikoData();
    
        if (empty($data['risikoList'])) {
            $data['risikoList'] = [];
        }

        $this->load->view('monitoring', $data);
    } 
    

    public function perusahaan($encoded_risiko) {
        $jenis_risiko = urldecode($encoded_risiko);
        $data['perusahaan'] = $this->Monitoring_model->getPerusahaanByRisiko($jenis_risiko);
        $data['jenis_risiko'] = $jenis_risiko;
        $this->load->view('data_perusahaan', $data);
    }

    public function getPerusahaanByRisikoAjax() {
        $jenis_risiko = $this->input->post('jenis_risiko'); 
        $data_perusahaan = $this->Monitoring_model->getPerusahaanByRisiko($jenis_risiko); 
        echo json_encode($data_perusahaan);
    }
}
