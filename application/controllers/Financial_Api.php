<?php

require(APPPATH.'/libraries/REST_Controller.php');
require('check_header.php');
class Financial_Api extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
      
       
        
    }
    
    function expenses_category_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            exit;
        }
        else{
        $this->load->model('financial_categories_model');
        
      $category=array();
        $result_category = $this->financial_categories_model->getallcategoryexpenses();
       $i=0;

        if($result_category){
             foreach($result_category as $data){
                
                 $category[$i]['category_id']=$data['category_id'];
                 $category[$i]['icon']=$data['icon'];
                 $category[$i]['color']=$data['color'];
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

            $this->response("No record found", 404);

        }
    }
}
function expenses_category_byid_get(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
        
        $id  = $this->get('id');
        
        if(!$id){

            $this->response("ID not found", 400);

            exit;
        }
    $this->load->model('financial_categories_model');
    
  $category=array();
    $result_category = $this->financial_categories_model->getsubcategoryexpenses($id);
    
   $i=0;

    if($result_category){
         foreach($result_category as $data){
            
             $category[$i]['sub_category_id']=$data['sub_category_id'];
           
             if($language=='ar'){
                $category[$i]['sub_category_name']=$data['sub_category_name_ar'];
             }
             else{
                $category[$i]['sub_category_name']=$data['sub_category_name_en'];
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
function revenues_category_get(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
    $this->load->model('financial_categories_model');
    
  $category=array();
    $result_category = $this->financial_categories_model->getallcategoryrevenue();
   $i=0;

    if($result_category){
         foreach($result_category as $data){
            
             $category[$i]['category_id']=$data['category_id'];
             $category[$i]['icon']=$data['icon'];
             $category[$i]['color']=$data['color'];
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

        $this->response("No record found", 404);

    }
}
}
function revenue_category_byid_get(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
        
        $id  = $this->get('id');
        
        if(!$id){

            $this->response("ID not found", 400);

            exit;
        }
    $this->load->model('financial_categories_model');
    
  $category=array();
    $result_category = $this->financial_categories_model->getsubcategoryrevenu($id);
    
   $i=0;

    if($result_category){
         foreach($result_category as $data){
            
             $category[$i]['sub_category_id']=$data['sub_category_id'];
           
             if($language=='ar'){
                $category[$i]['sub_category_name']=$data['sub_category_name_ar'];
             }
             else{
                $category[$i]['sub_category_name']=$data['sub_category_name_en'];
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
function expenses_get(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
        
        $id  = $this->get('user_id');
        
        if(!$id){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'المستخدم غيرموجود');
            $this->response(result, 400);

            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'user not found');
            $this->response(result, 400);
            exit;
        }
    }
    $this->load->model('financial_categories_model');
    
  $expenses=array();
    $result_expenses = $this->financial_categories_model->getallexpenses($id);
    
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
function revenues_get(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
        
        $id  = $this->get('user_id');
        
        if(!$id){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'المستخدم غيرموجود');
            $this->response(result, 400);

            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'user not found');
            $this->response(result, 400);
            exit;
        }
    }
    $this->load->model('financial_categories_model');
    
  $expenses=array();
    $result_expenses = $this->financial_categories_model->getallrevenues($id);
    
   $i=0;

    if($result_expenses){
         foreach($result_expenses as $data){
            
             $expenses[$i]['revenue_id']=$data['revenue_id'];
           
            
                $expenses[$i]['value']=$data['value'];
            
                $expenses[$i]['note']=$data['note'];
                $expenses[$i]['date']=$data['date'];
                $expenses[$i]['repetition']=$data['repetition'];
               
                if($language=='ar'){
                    $expenses[$i]['category_name']=$data['category_name_ar'];
                }
                else{
                    $expenses[$i]['category_name']=$data['category_name_en'];
                }
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
function expenses_category_user_get(){
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
            $this->response(result, 400);

            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'please insert field user');
            $this->response($result, 400);
            exit;
        }
    }
    $this->load->model('financial_categories_model');
    
  $category=array();
    $result_category = $this->financial_categories_model->getallcategoryexpensesuser($id);
   $i=0;

    if($result_category){
         foreach($result_category as $data){
            
             $category[$i]['category_id']=$data['category_id'];
             $category[$i]['icon']=$data['icon'];
             $category[$i]['color']=$data['color'];
           
                $category[$i]['category_name']=$data['category_name'];
             
        
         $result=array('code'=>'1','data'=>$category);
        $this->response($result, 200); 

    } 
    }
    else{
        $result=array('code'=>'-1','data'=>'No data found');
        $this->response($result, 404);
       

    }
}
}
function revenues_category_user_get(){
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
            $this->response(result, 400);

            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'please insert field user');
            $this->response($result, 400);
            exit;
        }
    }
    $this->load->model('financial_categories_model');
    
  $category=array();
    $result_category = $this->financial_categories_model->getallcategoryrevenueuser($id);
   $i=0;

    if($result_category){
         foreach($result_category as $data){
            
             $category[$i]['category_id']=$data['category_id'];
             $category[$i]['icon']=$data['icon'];
             $category[$i]['color']=$data['color'];
           
                $category[$i]['category_name']=$data['category_name'];
             
        
         $result=array('code'=>'1','data'=>$category);
        $this->response($result, 200); 

    } 
    }
    else{
        $result=array('code'=>'-1','data'=>'No data found');
        $this->response($result, 404);
       

    }
}
}
function expenses_sub_category_user_get(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
        
        $user_id  = $this->get('user_id');
        
        if(!$user_id){
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
    $category_id  = $this->get('category_id');
        
        if(!$category_id){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الصنف');
            $this->response(result, 400);

            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'please insert field category');
            $this->response($result, 400);
            exit;
        }
    }
    $this->load->model('financial_categories_model');
    
  $category=array();
    $result_category = $this->financial_categories_model->getsubcategoryexpensesuser($user_id,$category_id);
    
   $i=0;

    if($result_category){
         foreach($result_category as $data){
            
             $category[$i]['sub_category_id']=$data['sub_category_id'];
           
            
                $category[$i]['sub_category_name']=$data['sub_category_name'];
             
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
function revenues_sub_category_user_get(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
        
        $user_id  = $this->get('user_id');
        
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
    $category_id  = $this->get('category_id');
        
        if(!$category_id){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الصنف');
            $this->response($result, 400);

            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'please insert field category');
            $this->response($result, 400);
            exit;
        }
    }
    $this->load->model('financial_categories_model');
    
  $category=array();
    $result_category = $this->financial_categories_model->getsubcategoryrevenueuser($user_id,$category_id);
    
   $i=0;

    if($result_category){
         foreach($result_category as $data){
            
             $category[$i]['sub_category_id']=$data['sub_category_id'];
           
            
                $category[$i]['sub_category_name']=$data['sub_category_name'];
             
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
public function index_post()
{
    echo "POST_request";
}
public function addCategoryexpenses_post(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
    $name      = $this->post('name');

    $currency     = $this->post('currency');

    $icon    = $this->post('icon');

    $color  = $this->post('color');

    $user_id  = $this->post('user_id');
    $sub_category  = $this->post('sub_category_name');
  
        
    if(!$user_id){
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
if(!$name){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الصنف');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field category');
    $this->response($result, 400);
    exit;
}
}
if(!$currency){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل العملة');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field currency');
    $this->response($result, 400);
    exit;
}
}


   if(empty($color)){
       $color='bg-sccuess';
   }
   if(empty($color)){
    $icon=' ';
}
$this->load->model('financial_categories_model');
       $result = $this->financial_categories_model->add(array("category_name"=>$name, "currency"=>$currency, "type"=>'expenses', "icon"=>$icon, "color"=>$color,'user_id'=>$user_id),array('sub_category_name'=>$sub_category,'category_id'=>'','user_id'=>$user_id));

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
public function addCategoryrevenue_post(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
    $name      = $this->post('name');

    $currency     = $this->post('currency');

    $icon    = $this->post('icon');

    $color  = $this->post('color');

    $user_id  = $this->post('user_id');
    $sub_category  = $this->post('sub_category_name');
  
        
    if(!$user_id){
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
if(!$name){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الصنف');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field category');
    $this->response($result, 400);
    exit;
}
}
if(!$currency){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل العملة');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field currency');
    $this->response($result, 400);
    exit;
}
}


   if(empty($color)){
       $color='bg-sccuess';
   }
   if(empty($color)){
    $icon=' ';
}
$this->load->model('financial_categories_model');
       $result = $this->financial_categories_model->add(array("category_name"=>$name, "currency"=>$currency, "type"=>'revenu', "icon"=>$icon, "color"=>$color,'user_id'=>$user_id),array('sub_category_name'=>$sub_category,'category_id'=>'','user_id'=>$user_id));

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
public function addexpenses_post(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
    $value      = $this->post('amount');

    $note     = $this->post('note');

    $date    = $this->post('date');

    $repetition  = $this->post('repetition');
    $reminder=$this->post('reminder');
    $user_id  = $this->post('user_id');
    $category_id  = $this->post('category_id');
  
        
    if(!$user_id){
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
if(!$category_id){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الصنف');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field category');
    $this->response($result, 400);
    exit;
}
}
if(!$value){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل القيمة');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field amount');
    $this->response($result, 400);
    exit;
}
}

if(!$date){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل التاريخ');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field date');
    $this->response($result, 400);
    exit;
}
}
 
$this->load->model('financial_categories_model');
       $result = $this->financial_categories_model->add_expenses(array("value"=>$value, "notes"=>$note, "date"=>$date, "repetition"=>$repetition, "reminder"=>$reminder,'category_id'=>$category_id,'user_id'=>$user_id));
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
public function addrevenue_post(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
    $value      = $this->post('amount');

    $note     = $this->post('note');

    $date    = $this->post('date');

    $repetition  = $this->post('repetition');
   
    $user_id  = $this->post('user_id');
    $category_id  = $this->post('category_id');
  
        
    if(!$user_id){
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
if(!$category_id){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الصنف');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field category');
    $this->response($result, 400);
    exit;
}
}
if(!$value){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل القيمة');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field amount');
    $this->response($result, 400);
    exit;
}
}

if(!$date){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل التاريخ');
    $this->response(result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field date');
    $this->response($result, 400);
    exit;
}
}
 
$this->load->model('financial_categories_model');
       $result = $this->financial_categories_model->add_revenue(array("value"=>$value, "note"=>$note, "date"=>$date, "repetition"=>$repetition,'category_id'=>$category_id,'user_id'=>$user_id));
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
}