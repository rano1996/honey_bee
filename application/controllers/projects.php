<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Projects extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        check_login_user();
    }
    public function projects_list(){
        $data = array();
        $data['page_title'] = 'Projects';

        $data['main_content'] = $this->load->view('projects/projectsPage', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

}
