<?php

// require(APPPATH.'/libraries/REST_Controller.php');
require_once APPPATH . '/core/BD_Controller.php';
require('check_header.php');
class Debt_Api extends BD_Controller{

    public function __construct()
    {
        parent::__construct();
      $this->auth();
       
        
    }
    function Debt_get(){
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
        $this->load->model('debt_model');
        $debt=array();
    $result_debt = $this->debt_model->getdebt($id,$type);
    $result_sum_debt=$this->debt_model->getsumdebt($id);
    $result_sum_debt=json_decode(json_encode($result_sum_debt), true);
    $total_lends=array();
    $total_borrows=array();
    if(isset($result_sum_debt['borrows']) && !empty($result_sum_debt['borrows'])){
        foreach($result_sum_debt['borrows'] as $data){
            $total_borrows=$data['borrows'];
        }
    }
    else{
        $total_borrows=0;
    }
   
    if(isset($result_sum_debt['lends']) && !empty($result_sum_debt['lends'])){
        foreach($result_sum_debt['lends'] as $data){
            $total_lends=$data['lends'];
        }
    }
    else{
        $total_lends=0;
    }
   
    $i=0;
$j=0;
$a=0;
$b=0;
    if($result_debt){
         foreach($result_debt as $data){
             if(!$type){
                if($data['type']==1){
                    $debt['lends_and_borrow'][$a]['person_name']=$data['person_name'];
             $debt['lends_and_borrow'][$a]['description']=$data['description'];
             $debt['lends_and_borrow'][$a]['amount']=$data['value'];
           
                $debt['lends_and_borrow'][$a]['from']=$data['from_date'];
                $debt['lends_and_borrow'][$a]['to']=$data['to_date'];
                $a++;
                }
                elseif($data['type']==2){
                    $debt['loans'][$b]['bank_name']=$data['bank_name'];
                    $debt['loans'][$b]['debt_period']=$data['loan_period'];
                    $debt['loans'][$b]['amount']=$data['value'];
                  
                       $debt['loans'][$b]['benefits']=$data['benefits'];
                       $debt['loans'][$b]['value_installment']=$data['value_installment'];
                       $debt['loans'][$b]['date']=$data['date'];
                       $b++;

                }
               
             }
             else{
            if($data['type']==1){
             $debt[$i]['person_name']=$data['person_name'];
             $debt[$i]['description']=$data['description'];
             $debt[$i]['amount']=$data['value'];
           
                $debt[$i]['from']=$data['from_date'];
                $debt[$i]['to']=$data['to_date'];
                if($language=='ar'){
                    $debt[$i]['category_name']=$data['category_name_ar'];
                 }
                 else{
                    $debt[$i]['category_name']=$data['category_name_en'];
                 }
            
            }
            else{
                $debt[$i]['bank_name']=$data['bank_name'];
                $debt[$i]['debt_period']=$data['loan_period'];
                $debt[$i]['amount']=$data['value'];
              
                   $debt[$i]['benefits']=$data['benefits'];
                   $debt[$i]['value_installment']=$data['value_installment'];
                   $debt[$i]['date']=$data['date'];
            }
             }
            $i++;
            $j++;
    } 
    $result=array('code'=>'1','data'=>$debt,'total_borrows'=>$total_borrows,'total_lends'=>$total_lends);
    $this->response($result, 200); 
    }
    else{
        $result=array('code'=>'-1','data'=>'No data found');
        $this->response($result, 404);
       

    }
    
    }
    }
    function debt_category_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            exit;
        }
        else{
        $this->load->model('debt_model');
        
      $category=array();
        $result_category = $this->debt_model->getdebtcategory();
       $i=0;

        if($result_category){
             foreach($result_category as $data){
                
                 $category[$i]['category_id']=$data['category_id'];
               
                    $category[$i]['category_name']=$data['category_name'];
                
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
public function AddDebt_post(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
    $person_name      = $this->post('person_name');

   

    $description   = $this->post('description');

    $value  = $this->post('value');
   
    $from_date  = $this->post('from_date');
    $to_date  = $this->post('to_date');

    $category_id  = $this->post('category_id');
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
if(!$category_id){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل االتصنيف');
    $this->response($result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field category');
    $this->response($result, 400);
    exit;
}
}


if(!$person_name){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل اسم الاسم');
    $this->response($result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field name');
    $this->response($result, 400);
    exit;
}
}
if(!$value){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل اسم القيمة');
    $this->response($result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field project value');
    $this->response($result, 400);
    exit;
}
}
if(!$from_date){
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
if(!$to_date){
    if($language=='ar'){
        $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل تاريخ النهاية');
    $this->response($result, 400);

    exit;
}
else{
    $result=array('code'=>'-1','msg'=>'please insert field end date');
    $this->response($result, 400);
    exit;
}
}


 
        $this->load->model('debt_model');
       
        $type='';
        $type_debt='';
        if($category_id==2 || $category_id==3){
          $type=1;
       
        if($category_id==2){
                $type_debt='lends';
        }
        elseif($category_id==3){
          $type_debt='borrows';
        }
       $result = $this->debt_model->add_debt(array("person_name"=>$person_name,'description'=>$description,'value'=>$value,'from_date'=>$from_date,'to_date'=>$to_date,'category_id'=>$category_id,'type'=>$type,'type_debt'=>$type_debt,'user_id'=>$user_id));
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
public function AddLoan_post(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
   

    $value  = $this->post('value');
   
  
    $bank_name  = $this->post('bank_name');
    $loan_period  = $this->post('loan_period');
    $benefits  = $this->post('benefits');
    $value_installment  = $this->post('value_installment');
    $date  = $this->post('date');
   
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



    if(!$bank_name){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل اسم البنك');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field bank name');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$value){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل اسم القيمة');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field project value');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$loan_period){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل المدة ');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field period loan');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$benefits){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل  الفوائد');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field benefits');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$date){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل  التاريخ');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field  date');
        $this->response($result, 400);
        exit;
    }
    }


 
        $this->load->model('debt_model');
       
       
      
       $result = $this->debt_model->add_loan(array('value'=>$value,'bank_name'=>$bank_name,'loan_period'=>$loan_period,'benefits'=>$benefits,'value_installment'=>$value_installment,'date'=>$date,'category_id'=>1,'type'=>2,'user_id'=>$user_id));
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
public function AddLoanAmount_post(){
    $language = $this->input->get_request_header('lang');
    if(!isset($language)){
        $this->response("Please insert lanaguage");
        
    }
    else{
   

    $loan_id  = $this->post('loan_id');
   
  
    $premium  = $this->post('amount');
    
   
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



    
    if(!$premium){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل اسم القيمة');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field project value');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$loan_id){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل القرض ');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field  loan');
        $this->response($result, 400);
        exit;
    }
    }
    


 
        $this->load->model('debt_model');
       
       
      
       $result = $this->debt_model->add_insallement(array('premium'=>$premium,'loan_id'=>$loan_id,'user_id'=>$user_id));
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