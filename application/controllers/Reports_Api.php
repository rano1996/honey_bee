<?php

// require(APPPATH.'/libraries/REST_Controller.php');
require_once APPPATH . '/core/BD_Controller.php';
require('check_header.php');
class Reports_Api extends BD_Controller{

    public function __construct()
    {
        parent::__construct();
      $this->auth();
       
        
    }
    function ReportsExpenses_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
            
            $id  = $this->get('user_id');
            $start_date  = $this->get('start_date');
            
            if(!$id){
                if($language=='ar'){
                    $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل المستخدم');
                $this->response($result, 400);
    
                exit;
            }
            else{
                $result=array('code'=>'-1','msg'=>'please insert field user');
                $this->response($result, 400);
                exit;
            }
        }
        if(!$start_date){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل تاريخ البداية');
            $this->response($result, 400);

            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'please insert field start date');
            $this->response($result, 400);
            exit;
        }
    }
  
        $this->load->model('reports_model');
        
      $expenses=array();
        $result_expenses = $this->reports_model->getexpenses($id,$start_date,$end_date);
        // var_dump($result_expenses);
        $lastDateOfThisMonth =strtotime($start_date.'last day of this month') ;

$lastDay = date('d/m/Y', $lastDateOfThisMonth);
var_dump($lastDay);
        exit;
       $i=0;
    
        if($result_expenses){
             foreach($result_expenses as $data){
                
                 $expenses[$i]['expenses_id']=$data['expenses_id'];
               
                
                    $expenses[$i]['value']=$data['value'];
                
                    $expenses[$i]['notes']=$data['notes'];
                    $expenses[$i]['date']=$data['date'];
                    $expenses[$i]['repetition']=$data['repetition'];
                   
                
                 $i++;
             }
             $result=array('code'=>'1','data'=>$expenses);
            $this->response($result, 200); 
    
        } 
    
        else{
            $result=array('code'=>'-1','data'=>'No data found');
            $this->response($result, 404);
    
        }
    }
    }
}