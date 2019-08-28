<?php

// require(APPPATH.'/libraries/REST_Controller.php');
require_once APPPATH . '/core/BD_Controller.php';
require('check_header.php');
class Target_Api extends BD_Controller{

    public function __construct()
    {
        parent::__construct();
      $this->auth();
       
        
    }
    function Target_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            exit;
        }
        else{
            $id  = $this->get('user_id');
            $type  = $this->get('type');
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
        $this->load->model('target_model');
        $target=array();
    $result_target = $this->target_model->gettarget($id,$type);
    
    $i=0;

    if($result_target){
         foreach($result_target as $data){
          
             $target[$i]['target_name']=$data['goal_name'];
             $target[$i]['total']=$data['value_saved'];
             $target[$i]['remain']=$data['value_saved']-$data['remain'];
             $target[$i]['prencrtage']=$data['remain']/$data['value_saved']*100 .'%';
                if($data['status']==1){
                    $target[$i]['status']='done';
                }
            
            
        
            $i++;
    } 
    $result=array('code'=>'1','data'=>$target);
    $this->response($result, 200); 
    }
    else{
        $result=array('code'=>'-1','data'=>'No data found');
        $this->response($result, 404);
       

    }
    
    }
    }
    public function AddTargetMoney_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
        $value      = $this->post('amount');
    
       
    
      
        $user_id  = $this->post('user_id');
        $target_id  = $this->post('target_id');
      
            
        if(!$user_id){
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
    if(!$target_id){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الهدف');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field target');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$value){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل القيمة');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field amount');
        $this->response($result, 400);
        exit;
    }
    }
    
  
     
    $this->load->model('target_model');
           $result = $this->target_model->add_target_money(array("reached_value"=>$value,'target_id'=>$target_id,'user_id'=>$user_id));
           if($result === 0){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'حصل خطأ الرجاء المحاولة لاحقا');
            $this->response($result, 404);
        
            
        }
        else{
            $result=array('code'=>'-1','msg'=>'Error received please try later');
            $this->response($result, 404);
            
        }
           
    
           }else{
    
            if($language=='ar'){
                $result=array('code'=>'1','msg'=>'نجاح');
            $this->response($result, 200);
        
            
        }
        else{
            $result=array('code'=>'1','msg'=>'success');
            $this->response($result, 200);
            
        }  
          
           }
    
       
    }
    
    }
    public function UpdateTargetStatus_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
        $status      = $this->post('status');
    
       
    
      
        $user_id  = $this->post('user_id');
        $target_id  = $this->post('target_id');
      
            
        if(!$user_id){
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
    if(!$target_id){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الهدف');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field target');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$status){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الحالة');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field status');
        $this->response($result, 400);
        exit;
    }
    }
    
  
     
    $this->load->model('target_model');
           $result = $this->target_model->update_target_status(array("status"=>$status,'target_id'=>$target_id,'user_id'=>$user_id));
           if($result === 0){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'حصل خطأ الرجاء المحاولة لاحقا');
            $this->response($result, 404);
        
            
        }
        else{
            $result=array('code'=>'-1','msg'=>'Error received please try later');
            $this->response($result, 404);
            
        }
           
    
           }else{
    
            if($language=='ar'){
                $result=array('code'=>'1','msg'=>'نجاح');
            $this->response($result, 200);
        
            
        }
        else{
            $result=array('code'=>'1','msg'=>'success');
            $this->response($result, 200);
            
        }  
          
           }
    
       
    }
    
    }
    public function AddTarget_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
            $target_name=$this->post('target_name');
        $total_value      = $this->post('total_amount');
    
       $save_value=$this->post('save_value');
    
      
        $user_id  = $this->post('user_id');
       
      
            
        if(!$user_id){
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
 
    if(!$total_value){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل القيمة');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field amount');
        $this->response($result, 400);
        exit;
    }
    }
    
    if(!$target_name){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الهدف');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field target');
        $this->response($result, 400);
        exit;
    }
    }
     
    $this->load->model('target_model');
    if(!isset($save_value) && empty($save_value)){
        $save_value=0;
    }
           $result = $this->target_model->add_target(array("reached_value"=>$save_value,'goal_name'=>$target_name,'value_saved'=>$total_value,'user_id'=>$user_id));
           if($result === 0){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'حصل خطأ الرجاء المحاولة لاحقا');
            $this->response($result, 404);
        
            
        }
        else{
            $result=array('code'=>'-1','msg'=>'Error received please try later');
            $this->response($result, 404);
            
        }
           
    
           }else{
    
            if($language=='ar'){
                $result=array('code'=>'1','msg'=>'نجاح');
            $this->response($result, 200);
        
            
        }
        else{
            $result=array('code'=>'1','msg'=>'success');
            $this->response($result, 200);
            
        }  
          
           }
    
       
    }
    
    }
    function TargetCategory_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            exit;
        }
        else{
        $this->load->model('target_model');
        
      $category=array();
        $result_category = $this->target_model->getallcategorytarget();
        
       $i=0;

        if($result_category){
             foreach($result_category as $data){
                
                 $category[$i]['category_id']=$data['category_id'];
                
                 if($language=='ar'){
                    $category[$i]['category_name']=$data['category_name_ar'];
                 }
                 else{
                    $category[$i]['category_name']=$data['category_name_en'];
                 }
                 $i++;
             }
             $result=array('code'=>'1','data'=>$category);
            $this->response($result, 200); 

        } 

        else{

            $result=array('code'=>'-1','data'=>'No data found');
            $this->response($result, 404);

        }
    }
}
}