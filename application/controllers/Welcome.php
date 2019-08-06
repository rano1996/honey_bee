<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
    public function index() {
        echo 'Test';
        // $this->load->view('admin/welcome_message');
    }
    public function welcome_message() {
        echo 'Test';
        echo "Fddfdfd";
        $this->load->view('admin/welcome_message');
    }
}