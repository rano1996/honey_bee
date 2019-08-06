<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Revenues extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user(); 
    }
    public function index(){
        $data = array();
        $data['page_title'] = 'Revenue';
        $data['main_content'] = $this->load->view('admin/home', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function revenue_category(){
        $data = array();
        $data['page_title'] = 'revenue category';
        $data['result']= $this->_post_api($data, 'http://localhost/codeigniterTemplate/Financial_Categories_Api/revenues','GET');
       

        $data['main_content'] = $this->load->view('admin/revenues/revenue_category', $data, TRUE);
       
        $this->load->view('admin/index', $data);
    }
    private function _post_api(Array $fields=null, $url,$method) {
        try {

            $ch = curl_init();
            switch ($method){
                case "POST":
                   curl_setopt($ch, CURLOPT_POST, 1);
                   if ($fields)
                      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                   break;
                case "PUT":
                   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
                   if ($fields)
                      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);			 					
                   break;
                default:
                   if ($fields)
                      $url = sprintf("%s?%s", $url, http_build_query($fields));
             }
          
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'lang: en',
                
             ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            $result = curl_exec($ch);
        } catch (Exception $e) {
            return false;
        }
      
        curl_close($ch);
        if ($result){
        $result=json_decode($result,true);
            return $result;
        }
        else
            return false;
    }
    public function revenue_sub_category(){
        $data = array();
        $data['page_title'] = 'revenue sub category';
        $data['main_content'] = $this->load->view('admin/revenues/revenue_sub_category', $data, TRUE);
       
        $this->load->view('admin/index', $data);
    }
    public function revenue_list(){
        $data = array();
        $data['page_title'] = 'revenue list';
        $data['main_content'] = $this->load->view('admin/revenues/revenue_list', $data, TRUE);
       
        $this->load->view('admin/index', $data);
    }

}
