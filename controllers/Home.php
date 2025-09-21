<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->model('Dokumentasi_model'); 
    }

    public function index() {
        $data['visi_misi'] = $this->Home_model->getVisiMisi();   
        $data['perusahaan'] = $this->Home_model->get_perusahaan();
        $data['dokumentasi'] = $this->Home_model->get_dokumentasi(); 
        $data['pageTitle'] = 'Dokumentasi';
        $this->load->view('home', $data);
    }

    public function daftar() {
        $this->load->view('formdaftar');
    }
}
?>

