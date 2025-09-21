<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Perusahaan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('data_perusahaan_model'); 
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'pagination', 'upload']);
    }

    public function index() {
        $query = $this->input->get('query', TRUE);
        $filter_kecamatan = $this->input->get('kecamatan_usaha', TRUE); // Menangkap nilai dari dropdown
        $limit = 25; 
        $offset = $this->uri->segment(3, 0);
    
        $data['kecamatan_list'] = $this->data_perusahaan_model->get_kecamatan_usaha();
    
        $data['perusahaan'] = $this->data_perusahaan_model->get_perusahaan($limit, $offset, $query, ['kecamatan_usaha' => $filter_kecamatan]); 
        $total_rows = $this->data_perusahaan_model->get_count($query, ['kecamatan_usaha' => $filter_kecamatan]);
    
        $config = [
            'base_url' => site_url('Data_Perusahaan/index'),
            'total_rows' => $total_rows,
            'per_page' => $limit,
            'reuse_query_string' => TRUE
        ];
        $this->pagination->initialize($config);
    
        $data['pagination'] = $this->pagination->create_links();
        $data['Id'] = $offset + 1; 
        $data['total_data'] = $total_rows;
        $data['filter_kecamatan'] = $filter_kecamatan; 
    
        $this->load->view('data_perusahaan', $data);
    }             
    
    public function tambah() {
        $data['pageTitle'] = 'Tambah Data Industri';
        $this->load->view('header', $data);
        $this->load->view('tambah_perusahaan', $data);
    }

    public function simpan() {
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['pageTitle'] = 'Tambah Data Industri';
            $this->load->view('header', $data);
            $this->load->view('tambah_perusahaan', $data);
        } else {
            $data = array(
                'nib' => $this->input->post('nib'),
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'uraian_status_penanaman_modal' => $this->input->post('uraian_status_penanaman_modal'),
                'uraian_jenis_perusahaan' => $this->input->post('uraian_jenis_perusahaan'),
                'uraian_risiko_proyek' => $this->input->post('uraian_risiko_proyek'),
                'nama_proyek' => $this->input->post('nama_proyek'),
                'uraian_skala_usaha' => $this->input->post('uraian_skala_usaha'),
                'alamat_usaha' => $this->input->post('alamat_usaha'),
                'kecamatan_usaha' => $this->input->post('kecamatan_usaha'),
                'kelurahan_usaha' => $this->input->post('kelurahan_usaha'),
                'kbli' => $this->input->post('kbli'),
                'judul_kbli' => $this->input->post('judul_kbli'),
                'nama_user' => $this->input->post('nama_user'),
                'nomor_identitas_user' => $this->input->post('nomor_identitas_user'),
                'email' => $this->input->post('email'),
                'nomor_telp' => $this->input->post('nomor_telp'),
                'jumlah_investasi' => $this->input->post('jumlah_investasi')
            );

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048;
                $config['file_name'] = 'foto_' . time();

                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $data['foto'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('Data_Perusahaan/tambah');
                    return;
                }
            }

            if ($this->data_perusahaan_model->simpan_perusahaan($data)) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan');
                redirect('Data_Perusahaan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data');
                redirect('Data_Perusahaan');
            }
        }
    }
    
    public function edit($id) {
        $data['perusahaan'] = $this->data_perusahaan_model->get_perusahaan_by_id($id);
        
        if (empty($data['perusahaan'])) {
            show_404(); 
        }

        $data['pageTitle'] = 'Edit Data Industri';
        $this->load->view('Header', $data);
        $this->load->view('edit_perusahaan', $data);
    }

    public function update($id) {
        $this->load->library('upload');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['perusahaan'] = $this->data_perusahaan_model->get_perusahaan_by_id($id);
            $data['pageTitle'] = 'Edit Data Industri';
            $this->load->view('header', $data);
            $this->load->view('edit_perusahaan', $data);
        } else {
            $data = array(
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'uraian_status_penanaman_modal' => $this->input->post('uraian_status_penanaman_modal'),
                'uraian_jenis_perusahaan' => $this->input->post('uraian_jenis_perusahaan'),
                'uraian_risiko_proyek' => $this->input->post('uraian_risiko_proyek'),
                'nama_proyek' => $this->input->post('nama_proyek'),
                'uraian_skala_usaha' => $this->input->post('uraian_skala_usaha'),
                'alamat_usaha' => $this->input->post('alamat_usaha'),
                'kecamatan_usaha' => $this->input->post('kecamatan_usaha'),
                'kelurahan_usaha' => $this->input->post('kelurahan_usaha'),
                'kbli' => $this->input->post('kbli'),
                'judul_kbli' => $this->input->post('judul_kbli'),
                'nama_user' => $this->input->post('nama_user'),
                'nomor_identitas_user' => $this->input->post('nomor_identitas_user'),
                'email' => $this->input->post('email'),
                'nomor_telp' => $this->input->post('nomor_telp'),
                'jumlah_investasi' => $this->input->post('jumlah_investasi')
            );
    
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = FCPATH . 'uploads/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = 2048; 
    
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('foto')) {
                    $upload_data = $this->upload->data();
                    $data['foto'] = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('Data_Perusahaan/edit/' . $id);
                    return;
                }
            }
    
            $update_result = $this->data_perusahaan_model->update_perusahaan($id, $data);
            if ($update_result) {
                $this->session->set_flashdata('success', 'Data berhasil diperbarui');
                redirect('Data_Perusahaan');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data');
                redirect('Data_Perusahaan/edit/' . $id);
            }
        }
    }

    public function hapus_data($id) {
        if (empty($id)) {
            echo json_encode(['status' => 'error', 'message' => 'ID tidak ditemukan.']);
            return;
        }
        
        if ($this->data_perusahaan_model->delete($id)) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data.']);
        }
    }        
}      

