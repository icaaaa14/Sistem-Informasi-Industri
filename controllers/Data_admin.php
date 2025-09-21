<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dataadmin_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('upload'); // Load library upload
    }

    public function index() {
        $data['data_admin'] = $this->Dataadmin_model->get_all();
        $data['pageTitle'] = 'Administrator';
        $this->load->view('header', $data);
        $this->load->view('data_admin/index', $data);
    }

    public function add() {
        // Validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[data_admin.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['pageTitle'] = 'Tambah Data Admin';
            $this->load->view('header', $data);
            $this->load->view('data_admin/add', $data);
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
            $config['max_size'] = 2048;
            $config['file_name'] = time() . '_' . $_FILES['sertifikat']['name'];
    
            $this->upload->initialize($config); 
    
            if (!empty($_FILES['sertifikat']['name'])) {
                if ($this->upload->do_upload('sertifikat')) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $data['pageTitle'] = 'Tambah Data Admin';
                    $this->load->view('data_admin/add', $data);
                    return;
                }
            } else {
                $file_name = '';
            }
    
            $data = array(
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'sertifikat' => $file_name, 
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            );
    
            $this->Dataadmin_model->insert($data);
            $this->session->set_flashdata('success', 'Admin berhasil ditambah!');
            redirect('data_admin');
        }
    }      

    public function delete($email) {
        if ($this->Dataadmin_model->get_by_email($email)) {
            $this->Dataadmin_model->delete($email);
            $this->session->set_flashdata('success', 'Admin berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Admin tidak ditemukan!');
        }
        redirect('data_admin');
    }

    public function view($email) {
        $data['admin'] = $this->Dataadmin_model->get_by_email($email);

        if (empty($data['admin'])) {
            show_404();
        }

        $data['pageTitle'] = 'View Data Admin';
        $this->load->view('data_admin/view', $data);
    }

    public function edit($email) {
        $data['admin'] = $this->Dataadmin_model->get_by_email($email);

        if (empty($data['admin'])) {
            show_404();
        }

        $data['pageTitle'] = 'Edit Data Admin';
        $this->load->view('header', $data);
        $this->load->view('data_admin/edit', $data);
    }

    public function update($email) {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            // muncul pesan error jika validasi gagal
            $this->edit($email);
        } else {
            // Konfigurasi upload file
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'gif|jpg|png|pdf';
            $config['max_size'] = 2048;
            $config['file_name'] = time() . '_' . $_FILES['sertifikat']['name'];
    
            $this->upload->initialize($config); 
    
            if (!empty($_FILES['sertifikat']['name'])) {
                if ($this->upload->do_upload('sertifikat')) {
                    $upload_data = $this->upload->data();
                    $file_name = $upload_data['file_name'];
                } else {
                    // upload gagal
                    $data['error'] = $this->upload->display_errors();
                    $this->edit($email);
                    return;
                }
            } else {
                $file_name = $this->input->post('existing_upload');
            }
    
            $data = array(
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
                'no_telp' => $this->input->post('no_telp'),
                'sertifikat' => $file_name,
                'password' => $this->input->post('password') ? password_hash($this->input->post('password'), PASSWORD_DEFAULT) : $this->Dataadmin_model->get_by_email($email)['password']
            );
    
            if ($this->Dataadmin_model->update($email, $data)) {
                $this->session->set_flashdata('success', 'Data Admin telah diupdate!');
                redirect('data_admin'); 
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengupdate data!');
                $this->edit($email);
            }
        }
    }    
}