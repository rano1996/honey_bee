<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Check_Header extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
    }
public function check_headers(){
    $token = $this->input->get_request_header('lang');
    if(!isset($token)){
        $this->response("Please insert lanaguage");
        
    }
}

}