<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require_once APPPATH . '/libraries/REST_Controller.php';
require_once APPPATH . '/libraries/JWT.php';
require_once APPPATH . '/libraries/BeforeValidException.php';
require_once APPPATH . '/libraries/ExpiredException.php';
require_once APPPATH . '/libraries/SignatureInvalidException.php';
use \Firebase\JWT\JWT;

class BD_Controller extends REST_Controller
{
	private $user_credential;
    public function auth()
    {
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        //JWT Auth middleware
        $headers = $this->input->get_request_header('Authorization');
        // var_dump($headers);
        if(isset($headers)){
        $kunci = $this->config->item('thekey'); //secret key for encode and decode
        $token= "token";
       	if (!empty($headers)) {
        	if (preg_match('/Bearer\s(\S+)/', $headers , $matches)) {
            $token = $matches[1];
        	}
        }
        $this->load->model('login_model');
        $select=$this->login_model->validate_token($token);
       
       
        if($select){
            $update_date=$select->update_date;
            date_default_timezone_set('Asia/Damascus');
            $now = date('Y-m-d H:i:s',time());
            // var_dump($now);
            // exit;
            if(strtotime($now) < strtotime($update_date))

            { 
       date_default_timezone_set('Asia/Damascus');
       $update_date=date('Y-m-d');
           
             $update_date=strtotime('+7 days');
             $update_date=date('Y-m-d H:i:s',$update_date);

                
                 $data=array('update_date'=>$update_date);
                 $result=$this->login_model->update($token,$data);
                 if($result===0){
                    $result=array('code'=>'-1','msg'=>"failed to update date");
                    $this->response($result, 404);
                 }
                 else{
                    try {
                        $decoded = JWT::decode($token, $kunci, array('HS256'));
                        $this->user_data = $decoded;
                     } catch (Exception $e) {
                         $invalid = ['status' => $e->getMessage()]; //Respon if credential invalid
                         $this->response($invalid, 401);//401
                     }
                 }
            }
            else{
                $result=array('code'=>'-10','msg'=>"token expire");
                 $this->response($result, 404);
            }
       
    }


    else{
        $result=array('code'=>'-1','data'=>'No token found');
        $this->response($result, 404);
       

    }

    }
    else{
        $result=array('code'=>'-2','data'=>'Please insert Authorization headers');
        $this->response($result, 404);
    }
}
    
}