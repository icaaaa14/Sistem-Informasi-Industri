<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisiMisi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('visimisi_model');
        $this->load->library('upload');
    }

    public function index() {
        $data['gambar_visi_misi'] = $this->visimisi_model->getGambar();
        $data['pageTitle'] = 'Visi Misi';
        $this->load->view('header', $data);
        $this->load->view('visimisi', $data);
    }

    public function ganti_gambar() {
        $data['gambar_visi_misi'] = $this->visimisi_model->getGambar();
        $data['pageTitle'] = 'Visi Misi';
        $this->load->view('header', $data);
        $this->load->view('edit_visimisi', $data);
    }

    public function upload_gambar() {
        $data['pageTitle'] = 'Visi Misi';
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; 
        $config['file_name'] = 'visi_misi_' . time(); 

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $fileData = $this->upload->data();
            $gambar = $fileData['file_name'];
            log_message('info', 'File uploaded: ' . $gambar);

            if ($this->visimisi_model->updateGambar($gambar)) {
                $this->session->set_flashdata('success', 'Gambar berhasil diupload.');
                redirect('VisiMisi');
            } else {
                log_message('error', 'Gagal menyimpan data ke database.');
                $data['error'] = 'Gagal menyimpan data ke database.';
            }
        } else {
            $data['error'] = $this->upload->display_errors();
            log_message('error', 'Upload error: ' . $data['error']);
        }

        $data['gambar_visi_misi'] = $this->visimisi_model->getGambar();
        $this->load->view('header', $data);
        $this->load->view('edit_visimisi', $data);
    }
}
