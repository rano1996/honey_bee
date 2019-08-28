<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        { $data = array();
        //         $data['page_title'] = 'upload form';
        //         $this->load->view('admin/index', $data);
                
        //       $data['main_content'] = $this->load->view('admin/home', $data, TRUE);
                $this->load->view('upload_form', array('error' => ' ' ));
              
               
                // exit;
        }

        public function do_upload()
        { 
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                }
                
        }
        
}
?>