<?php

require(APPPATH.'/libraries/REST_Controller.php');
 
class Home_Api extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
        // var_dump("GSsgsg");
        // exit;
        $this->load->model('home_model');
        
    }
    function home_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
            $id  = $this->get('user_id');
        
            if(!$id){
                if($language=='ar'){
                    $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل المستخدم');
                $this->response(result, 400);
    
                exit;
            }
            else{
                $result=array('code'=>'-1','msg'=>'please insert field user');
                $this->response($result, 400);
                exit;
            }
        }
         
        $this->load->model('home_model');
        
      $slider=array();
      $revenue=array();
      $business_scheduling=array();
        $result = $this->home_model->gethome($id);
    //   var_dump( json_decode(json_encode($result), true));
    //   exit;
        $result=json_decode(json_encode($result), true);
        // var_dump($result);
        // exit;

       $i=0;
    
       $j=0;
       $k=0;
        if($result){
             foreach($result['slider'] as $data){
                
                 $slider['sliders'][$i]['slider_id']=$data['slider_id'];
                 $slider['sliders'][$i]['image']=$data['image_name'];
                 $slider['sliders'][$i]['link']=$data['link'];
                
                
                    $i++;
                 }
                 foreach($result['revenue'] as $data){
                
                   
                    $revenue['revenues'][$j]['revenue']=$data['sum(value)'];
                  
                   
                   
                       $j++;
                    }
             
             foreach($result['shcedule_work'] as $data){
                
                   
                $business_scheduling['shcedule_work'][$k]['scheduling_id']=$data['business_scheduling_id'];
                $business_scheduling['shcedule_work'][$k]['name']=$data['name'];
                $business_scheduling['shcedule_work'][$k]['date']=$data['date'];
                $business_scheduling['shcedule_work'][$k]['time']=$data['time'];
                $business_scheduling['shcedule_work'][$k]['reminder']=$data['reminder'];
               
               
                   $k++;
                }
         }
             $a=array_merge($slider,$revenue,$business_scheduling);
             $result=array('code'=>'1','data'=>$a);
            $this->response($result, 200); 
    
        
}
    }
}
