<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller {
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
?>