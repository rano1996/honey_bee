<?php

require(APPPATH.'/libraries/REST_Controller.php');
require('check_header.php');
class Langswitcher extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
      
       
        
    }
    public function change_lang() {

        $lang = $this->uri->segment(3);
        
        $_SESSION['lang'] = $lang;
        // var_dump($_SESSION['lang']);
        // exit;
        redirect($_SERVER['HTTP_REFERER']);

      }
}