<?php

// require(APPPATH.'/libraries/REST_Controller.php');
require_once APPPATH . '/core/BD_Controller.php';
require('check_header.php');
class Project_Api extends BD_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->auth();
       
        
    }
    public function hello_get()
    {
        $tokenData = 'Hello World!';
        
        // Create a token
        $token = AUTHORIZATION::generateToken($tokenData);
        // Set HTTP status code
        $status = parent::HTTP_OK;
        // Prepare the response
        $response = ['status' => $status, 'token' => $token];
        // REST_Controller provide this method to send responses
        $this->response($response, $status);
    }
    function Project_get(){
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
        $this->load->model('project_model');
        $project=array();
    $result_project = $this->project_model->getproject($id);
    $result=json_decode(json_encode($result_project), true);
//   var_dump($result);
//   exit;
    $i=0;

    if($result){
         foreach($result['project'] as $key=>$data){
          
        
        $project[$i]['project_name']=$data['project_name'];
        // if($result['expenses']){
        //      $project[$i]['expenses']=$result['expenses'][$i]['expeneses'];
        // }
        //      if($result['revenue']){
        //      $project[$i]['revenue']=$result['revenue'][$i]['revenu'];
           
        //      }
             
            
            
            $i++;
    } 
    if($result['expenses']){
$x=0;
    foreach($result['expenses'] as $key=>$data){
        
        $project[$x]['expenses']=$data['expeneses'];
       
            $x++;
    } 
}
if($result['revenue']){
    $a=0;
    foreach($result['revenue'] as $key=>$data){
        $project[$a]['revenue']=$data['revenu'];
        $a++;
    }

}
    $result=array('code'=>'1','data'=>$project);
    $this->response($result, 200); 
    }
    else{
        $result=array('code'=>'-1','data'=>'No data found');
        $this->response($result, 404);
       

    }
    
    }
    }
    public function AddProjectExpenses_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
        $value      = $this->post('amount');
    
       
    
        $date    = $this->post('date');
    
        $repetition  = $this->post('repetition');
        $reminder=$this->post('reminder');
        $user_id  = $this->post('user_id');
        $project_id  = $this->post('project_id');
      
            
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
    if(!$project_id){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل المشروع');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field project');
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
    
  
     
    $this->load->model('project_model');
           $result = $this->project_model->add_project_expenses(array("value"=>$value,'project_id'=>$project_id,'user_id'=>$user_id));
           if($result === 0){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'حصل خطأ الرجاء المحاولة لاحقا');
            $this->response($result, 4);
        
            
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
    public function AddProjectRevenue_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
        $value      = $this->post('amount');
    
       
    
        $date    = $this->post('date');
    
        $repetition  = $this->post('repetition');
        $reminder=$this->post('reminder');
        $user_id  = $this->post('user_id');
        $project_id  = $this->post('project_id');
      
            
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
    if(!$project_id){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل المشروع');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field project');
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
    
  
     
    $this->load->model('project_model');
           $result = $this->project_model->add_project_revenue(array("value"=>$value,'project_id'=>$project_id,'user_id'=>$user_id));
           if($result === 0){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'حصل خطأ الرجاء المحاولة لاحقا');
            $this->response($result, 4);
        
            
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
    public function AddProject_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
        $project_name      = $this->post('project_name');
    
       
    
        $expenses   = $this->post('expenses');
    
        $revenue  = $this->post('revenue');
       
        $project_id  = $this->post('project_id');
      
            $user_id= $this->post('user_id');
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
    if(!$project_name){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل اسم المشروع');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field project name');
        $this->response($result, 400);
        exit;
    }
    }
   
    
  
     
    $this->load->model('project_model');
    if(!isset($expenses) && strlen($expenses)==0){
        $expenses=0;
    }
    if(!isset($revenue) && strlen($revenue)==0){
        $revenue=0;
    }
           $result = $this->project_model->add_project(array("project_name"=>$project_name,'expenses'=>$expenses,'revenue'=>$revenue,'user_id'=>$user_id));
           if($result === 0){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'حصل خطأ الرجاء المحاولة لاحقا');
            $this->response($result, 4);
        
            
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
    function ProjectReport_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            exit;
        }
        else{
            $id  = $this->get('user_id');
           $project_id=$this->get('project_id');
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
        if(!$project_id){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل التعرفة');
            $this->response($result, 400);

            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'please insert field project id');
            $this->response($result, 400);
            exit;
        }
    }
        $this->load->model('project_model');
        $project=array();
    $result_project = $this->project_model->getprojectreport($id,$project_id);
    $result=json_decode(json_encode($result_project), true);
  
    $i=0;

    if($result){
       
    if($result['expenses']){
          $x=0;
    foreach($result['expenses'] as $key=>$data){
        
        $project['expenses'][$x]['amount']=$data['expeneses'];
        $project['expenses'][$x]['date']=$data['create_date'];
            $x++;
    } 
}
if($result['revenue']){
    $a=0;
    foreach($result['revenue'] as $key=>$data){
        $project['revenue'][$a]['revenue']=$data['revenu'];
        $project['revenue'][$a]['date']=$data['create_date'];
        $a++;
    }

}
    $result=array('code'=>'1','data'=>$project);
    $this->response($result, 200); 
    }
    else{
        $result=array('code'=>'-1','data'=>'No data found');
        $this->response($result, 404);
       

    }
    
    }
    }
  
 private function verify_request()
{
    // Get all the headers
    $headers = $this->input->request_headers();

    // Extract the token
    $token = $headers['Authorization'];

    // Use try-catch
    // JWT library throws exception if the token is not valid
    try {
        // Validate the token
        // Successfull validation will return the decoded user data else returns false
        $data = AUTHORIZATION::validateToken($token);
        var_dump($data);
        exit;
        if ($data === false) {
            $status = parent::HTTP_UNAUTHORIZED;
            $response = ['status' => $status, 'msg' => 'Unauthorized Access!'];
            $this->response($response, $status);

            exit();
        } else {
            return $data;
        }
    } catch (Exception $e) {
        // Token is invalid
        // Send the unathorized access message
        $status = parent::HTTP_UNAUTHORIZED;
        $response = ['status' => $status, 'msg' => 'Unauthorized Access! '];
        $this->response($response, $status);
    }
}
public function get_me_data_post()
{
    // Call the verification method and store the return value in the variable
    $data = $this->verify_request();
    // Send the return data as reponse
    $status = parent::HTTP_OK;
    $response = ['status' => $status, 'data' => $data];
    $this->response($response, $status);
}
}