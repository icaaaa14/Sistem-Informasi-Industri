<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TampilPerusahaan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tampil_model');
    }

    public function profil($id_perusahaan) {
        $data['perusahaan'] = $this->tampil_model->get_perusahaan_by_id($id_perusahaan);
        if (empty($data['perusahaan'])) {
            show_error('Perusahaan tidak ditemukan');
        }
        $this->load->view('tampilperusahaan', $data);
    }
}
?>
