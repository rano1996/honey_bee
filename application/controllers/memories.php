<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Memories extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        check_login_user();
    }
    public function memories_list(){
        $data = array();
        $data['page_title'] = 'Memories';

        $data['main_content'] = $this->load->view('memories/memoriesPage', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

}
