<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Targets extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        check_login_user();
    }
    public function target_list(){
        $data = array();
        $data['page_title'] = 'Targets';

        $data['main_content'] = $this->load->view('targets/targetPage', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

}
