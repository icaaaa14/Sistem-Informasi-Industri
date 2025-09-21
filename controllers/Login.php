<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('url');
        $this->load->helper('form'); 
        $this->load->library('session');
    }

    public function index() { 
        if($this->session->userdata('user_data')) {
            redirect('home');
        }

        $data['error'] = '';

        if($this->input->post('login')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->login_model->check_login($email, $password);
            if($user) {
                $session_data = array(
                    'email' => $email
                );
                $this->session->set_userdata($session_data);
                redirect('dashboard');
            } else {
                $data['error'] = "Login gagal. Silahkan coba lagi.";
            }
        }

        // Memuat view
        $this->load->view('login', $data);
    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        redirect('login');
    }
}
