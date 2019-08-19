<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Expenses extends CI_Controller {

    public function __construct(){
        parent::__construct();
        check_login_user(); 
    }
    public function index(){
        $data = array();
        $data['page_title'] = 'Expenses';
        $data['main_content'] = $this->load->view('admin/home', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function expenses_category(){
        $data = array();
        $data['page_title'] = 'expenses category';
//        $data['result']= $this->_post_api($data, 'http://honey-bee.life/Financial_Api/expenses_category','GET');
        $data['result']=_post_api($data, 'Financial_Api/expenses_category','GET');


        $data['main_content'] = $this->load->view('expenses/expenses_category', $data, TRUE);
       
        $this->load->view('admin/index', $data);
    }

    public function expenses_sub_category(){
        $data = array();
        
        $data['page_title'] = 'expenses sub category';
        $id=$this->uri->segment(3);
//        $data['result']= $this->_post_api($data, 'http://honey-bee.life//Financial_Api/expenses_category_byid?id='.$id,'GET');
        $data['result']= _post_api($data, 'Financial_Api/expenses_category_byid?id='.$id,'GET');
//        $data['category']= $this->_post_api($data, 'http://honey-bee.life//Financial_Api/expenses_category','GET');
        $data['category']= _post_api($data, 'Financial_Api/expenses_category','GET');
        $data['main_content'] = $this->load->view('expenses/expenses_sub_category', $data, TRUE);
       

        $this->load->view('admin/index', $data);
        
    }
    public function expenses_list(){
        $data = array();
        $data['page_title'] = 'expenses list';
        $data['main_content'] = $this->load->view('expenses/expenses_list', $data, TRUE);
       
        $this->load->view('admin/index', $data);
    }
    public function add_expenses(){
        // var_dump($_POST);
        // exit;
        $data = array(
            'amount' => $this->input->post('amount'),
    'notes' => $this->input->post('note'),
    'date' => $this->input->post('date'),
    'repetition' => $this->input->post('repeatedly'),
    'category_id' => $this->input->post('category'),
    'reminder' => $this->input->post('reminder'),
    //  'user_id'=>$this->session->userdata('id')
     'user_id'=>1
        );
//       $result=$this->_post_api($data, 'http://honey-bee.life//Financial_Api/addexpenses','POST');
       $result=_post_api($data, 'Financial_Api/addexpenses','POST');
       if($result['code']=='1'){
        redirect(base_url() . 'expenses/expenses_list', 'refresh');
       }
      ;
    }
    

}
