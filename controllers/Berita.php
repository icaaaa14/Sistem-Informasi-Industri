<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    // Menampilkan semua data berita
    public function index(){
        $data['berita'] = $this->Berita_model->get_all_berita();
        $data['pageTitle'] = 'Data Berita';
        $this->load->view('header', $data);
        $this->load->view('berita', $data);
    }
    

    // Tambah data berita baru
    public function tambah(){
    $data['pageTitle'] = 'Tambah Berita';
    
    // Load library untuk upload
    $this->load->library('upload');
    $this->load->view('header', $data);

    // Validasi form input
    $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
    $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
    $this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha', 'required');
    $this->form_validation->set_rules('uraian_skala_usaha', 'Uraian Skala Usaha', 'required');
    $this->form_validation->set_rules('jumlah_investasi', 'Jumlah Investasi', 'required');

    if ($this->form_validation->run() === FALSE) {
        $this->load->view('tambah_berita', $data);
    } else {
        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './uploads/'; 
            $config['allowed_types'] = 'jpg|jpeg|png'; 
            $config['max_size'] = 2048; 
            $config['file_name'] = time().'_'.$_FILES['foto']['name']; 
            
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $uploadData = $this->upload->data();
                $foto = $uploadData['file_name'];
            } else {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('tambah_berita', $data);
                return;
            }
        } else {
            $foto = null;
        }

        $insertData = [
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'nama_user' => $this->input->post('nama_user'),
            'alamat_usaha' => $this->input->post('alamat_usaha'),
            'uraian_skala_usaha' => $this->input->post('uraian_skala_usaha'),
            'jumlah_investasi' => $this->input->post('jumlah_investasi'),
            'foto' => $foto
        ];

        $this->Berita_model->insert_berita($insertData);

        redirect('berita');
    }
}
    

    public function edit($id){
        $data['berita'] = $this->Berita_model->get_berita_by_id($id);
    
        if (!$data['berita']) {
            show_404();
        }
    
        $data['pageTitle'] = 'Edit Berita';
        $this->load->view('header', $data);
        $this->load->view('edit_berita', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('nama_user', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat_usaha', 'Alamat Usaha', 'required');
        $this->form_validation->set_rules('uraian_skala_usaha', 'Uraian Skala Usaha', 'required');
        $this->form_validation->set_rules('jumlah_investasi', 'Jumlah Investasi', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['pageTitle'] = 'Edit Berita';
            $data['berita'] = $this->Berita_model->get_berita_by_id($id);
            $this->load->view('edit_berita', $data);
        } else {
            if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './uploads/'; 
                $config['allowed_types'] = 'jpg|jpeg|png'; 
                $config['max_size'] = 2048; 
                $config['file_name'] = time().'_'.$_FILES['foto']['name']; 
    
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('foto')) {
                    $uploadData = $this->upload->data();
                    $foto = $uploadData['file_name'];
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $data['pageTitle'] = 'Edit Berita';
                    $data['berita'] = $this->Berita_model->get_berita_by_id($id);
                    $this->load->view('edit_berita', $data);
                    return;
                }
            } else {
                $foto = $this->input->post('foto_existing');
            }
    
            $updateData = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'nama_user' => $this->input->post('nama_user'),
                'alamat_usaha' => $this->input->post('alamat_usaha'),
                'uraian_skala_usaha' => $this->input->post('uraian_skala_usaha'),
                'jumlah_investasi' => $this->input->post('jumlah_investasi'),
                'foto' => $foto
            ];
    
            $this->Berita_model->update_berita($id, $updateData);
    
            redirect('berita');
        }
    }
       
    public function hapus() {
        $id = $this->input->post('id');
    
        if (empty($id)) {
            show_404();
        }
    
        $this->load->model('Berita_model');
        $this->Berita_model->delete_berita($id);
    
        redirect('berita');
    }
    
    private function _uploadImage() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = uniqid();
        $config['overwrite'] = true;
        $config['max_size'] = 2048; // 2MB
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
    
        return "default.png";
    }    
}
?>
