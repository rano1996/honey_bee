<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Debts extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        check_login_user();
    }
    public function debts_list(){
        $data = array();
        $data['page_title'] = 'Debts';

        $data['main_content'] = $this->load->view('debts/debtsPage', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

}

