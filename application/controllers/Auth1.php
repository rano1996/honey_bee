<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// *************************************************************************
// *                                                                       *
// * Optimum LinkupComputers                              *
// * Copyright (c) Optimum LinkupComputers. All Rights Reserved                     *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: info@optimumlinkupsoftware.com                                 *
// * Website: https://optimumlinkup.com.ng								   *
// * 		  https://optimumlinkupsoftware.com							   *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// *                                                                       *
// *************************************************************************

//LOCATION : application - controller - Auth.php

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        // $this->load->model('login_model');
        // $this->load->library('REST_Controller', array('server' => 'localhost/codeigniterTemplate'));
    }


    public function index(){
        $data = array();
        $data['page'] = 'Auth';
        $this->load->view('admin/login', $data);
    }



 /****************Function login**********************************
     * @type            : Function
     * @function name   : log
     * @description     : Authenticatte when uset try lo login. 
     *                    if autheticated redirected to logged in user dashboard.
     *                    Also set some session date for logged in user.   
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    
    public function log(){

$params = array(
    'email' => $this->input->post('user_name'),
    'password' => $this->input->post('password'),
    
    );
    $result = _post_api($params, 'api/login','POST');
    
   
        if($result['code']==1){ 
           
            
            //-- if valid
            
                $data = array();
               
                    $data = array(
                        'id' => $result['data']['id'],
                        'name' => $result['data']['first_name'],
                        'email' =>$result['data']['email'],
                        'is_login' => TRUE
                    );
                   
                    $this->session->set_userdata($data);
                    if(!isset($this->session->userdata['lang'])){
                        $this->session->set_userdata(array('lang'=>'en'));
                    }
                    $url = base_url('admin/dashboard');
                
				redirect(base_url() . 'admin/dashboard', 'refresh');
           
            
        }else{
            redirect(base_url() . 'auth', 'refresh');
        }
    }

 /*     * ***************Function logout**********************************
     * @type            : Function
     * @function name   : logout
     * @description     : Log Out the logged in user and redirected to Login page  
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
    
    function logout(){
        $this->session->sess_destroy();
        $data = array();
        $data['page'] = 'logout';
        $this->load->view('admin/login', $data);
    }
    
   



}