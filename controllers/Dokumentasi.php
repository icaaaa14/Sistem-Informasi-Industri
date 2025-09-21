<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dokumentasi_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('url');
    }

    public function index() {
        $data['dokumentasi'] = $this->Dokumentasi_model->get_all();
        $data['pageTitle'] = 'Dokumentasi';

        $this->load->view('header', $data);
        $this->load->view('dokumentasi/index', $data);
    }

    public function add() {
        $this->form_validation->set_rules('filename', 'Filename', 'callback_handle_upload');
        
        if ($this->form_validation->run() === FALSE) {
            $data['pageTitle'] = 'Tambah Dokumentasi';
            $this->load->view('header', $data);
            $this->load->view('dokumentasi/add', $data);
        } else {
            $upload_data = $this->upload->data();
            log_message('debug', 'File yang diupload: '.print_r($upload_data, TRUE));
            $file_path = $upload_data['file_name'];

            $data = array(
                'filename' => $file_path
            );
            $this->Dokumentasi_model->insert($data);
            $this->session->set_flashdata('success', 'Dokumentasi added successfully!');
            redirect('dokumentasi');
        }
    }

    public function handle_upload() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|gif|jpeg|mp4|avi|mov';
        $config['max_size'] = 50480; // 20MB dalam kilobyte
        $config['overwrite'] = FALSE;
    
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }
    
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('filename')) {
            $upload_error = $this->upload->display_errors();
            log_message('error', 'Upload failed: ' . $upload_error);

            if (strpos($upload_error, 'exceeds the maximum size') !== false) {
                $this->session->set_flashdata('error', 'File yang Anda unggah melebihi batas ukuran yang diperbolehkan.');
            } else if (strpos($upload_error, 'filetype') !== false) {
                $this->session->set_flashdata('error', 'Format file tidak sesuai.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah file, coba lagi.');
            }

            $this->session->set_flashdata('uploaded_file', $_FILES['filename']);
            redirect('Dokumentasi/add');
        } else {
            $upload_data = $this->upload->data();
            log_message('debug', 'Upload berhasil: ' . print_r($upload_data, true));

            $data = array(
                'filename' => $upload_data['file_name'],
                'status' => 'uploaded'
            );

            $this->db->insert('dokumentasi', $data);

            $this->session->set_flashdata('success', 'File berhasil diunggah.');
            redirect('Dokumentasi');
        }
    } 

    public function delete($id) {
        $dokumentasi = $this->Dokumentasi_model->get_by_id($id);
    
        if (empty($dokumentasi)) {
            show_404();
        } else {
            $file_path = './uploads/' . $dokumentasi['filename'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $this->Dokumentasi_model->delete($id);

            // Reset Auto Increment ID setelah penghapusan
            $this->Dokumentasi_model->reset_auto_increment();
    
            $this->session->set_flashdata('success', 'Dokumentasi deleted successfully');
            redirect('dokumentasi');
        }
    }

    public function view($id) {
        $data['dokumentasi'] = $this->Dokumentasi_model->get_by_id($id);
        
        if (empty($data['dokumentasi'])) {
            show_404();
        }
        
        $data['pageTitle'] = 'View Dokumentasi';
        $this->load->view('dokumentasi/view', $data);
    }

    public function edit($id) {
        $data['dokumentasi'] = $this->Dokumentasi_model->get_by_id($id);
        
        if (empty($data['dokumentasi'])) {
            show_404();
        }
        
        $data['pageTitle'] = 'Edit Dokumentasi';
        $this->load->view('header', $data);
        $this->load->view('dokumentasi/edit', $data);
    }
    
    public function update($id) {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('filename', 'Filename', 'callback_handle_upload');
        
        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            $upload_data = $this->upload->data();
            log_message('debug', 'File yang diupload: '.print_r($upload_data, TRUE));
            $file_path = $upload_data['file_name'];
    
            $data = array(
                'id' => $this->input->post('id'),
                'filename' => $file_path
            );
    
            $this->Dokumentasi_model->update($id, $data);
    
            $this->session->set_flashdata('success', 'Dokumentasi updated successfully!');
            redirect('dokumentasi');
        }
    }

    public function publish($id) {
        $this->Dokumentasi_model->status($id);
        $this->session->set_flashdata('success', 'Status updated successfully!');
        redirect('dokumentasi');
    }
}
