<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormDaftar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('daftar_model');
        $this->load->library('upload');
    }

    public function index() {
        $data['perusahaan'] = $this->daftar_model->get_perusahaan();
        $this->load->view('formdaftar', $data);
    }
    
    public function simpan() {
        $upload_path = realpath(FCPATH . 'uploads/') . '/';
        $config['upload_path']   = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048; 

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            $error = $this->upload->display_errors();
            echo "Upload error: " . $error; 
            exit; 
        } else {
            $upload_data = $this->upload->data();
            $gambar = $upload_data['file_name']; 

            $data = array(
                'id_perusahaan'    => $this->input->post('id_perusahaan'),
                'nama_perusahaan'  => $this->input->post('nama_perusahaan'),
                'alamat'           => $this->input->post('alamat'),
                'deskripsi'        => $this->input->post('deskripsi'),
                'gambar'           => $gambar 
            );

            $this->form_model->insert_perusahaan($data);

            redirect('Daftar');
        }
    }
}
?>