<?php

// require(APPPATH.'/libraries/REST_Controller.php');
require_once APPPATH . '/core/BD_Controller.php';
require('check_header.php');
class Notes_Api extends BD_Controller{

    public function __construct()
    {
        parent::__construct();
      
       $this->auth();
        
    }
    function Notes_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            exit;
        }
        else{
            $id  = $this->get('user_id');
          
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
        $this->load->model('notes_model');
        $note=array();
    $result_note = $this->notes_model->getnote($id);
   
    $i=0;

    if($result_note){
         foreach($result_note as $data){
          
             $note[$i]['text']=$data['text'];
             $note[$i]['image']=$data['image_name'];
             $note[$i]['id']=$data['autobiography_id'];
           
              
            
            
        
            $i++;
    } 
    $result=array('code'=>'1','data'=>$note);
    $this->response($result, 200); 
    }
    else{
        $result=array('code'=>'-1','data'=>'No data found');
        $this->response($result, 404);
       

    }
    
    }
    }
    public function AddNote_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
        $text = $this->post('text');
        $image  = $this->post('image');
       $user_id=$this->post('user_id');
      
            
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
    if(!$text){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل النص');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field text');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$image){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الصورة');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field image');
        $this->response($result, 400);
        exit;
    }
    }
    
  
     
    $this->load->model('notes_model');
           $result = $this->notes_model->add_note(array("text"=>$text,'image_name'=>$image,'user_id'=>$user_id,'type'=>'notes'));
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
}