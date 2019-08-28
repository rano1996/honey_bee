<?php

// require(APPPATH.'/libraries/REST_Controller.php');
require_once APPPATH . '/core/BD_Controller.php';
 
class Schedulework_Api extends BD_Controller{
    
    public function __construct()
    {
        parent::__construct();
        // var_dump("GSsgsg");
        // exit;
        $this->auth();
        $this->load->model('schedule_work_model');
        
    }
    function jjg_calculate_next_month($start_date = FALSE) {
        if ($start_date) {
          $now = $start_date; // Use supplied start date.
        } else {
          $now = time(); // Use current time.
        }
      
        // Get the current month (as integer).
        $current_month = date('n', $now);
      
        // If the we're in Dec (12), set current month to Jan (1), add 1 to year.
        if ($current_month == 12) {
          $next_month = 1;
          $plus_one_month = mktime(0, 0, 0, 1, date('d', $now), date('Y', $now) + 1);
        }
        // Otherwise, add a month to the next month and calculate the date.
        else {
          $next_month = $current_month + 1;
          $plus_one_month = mktime(0, 0, 0, date('m', $now) + 1, date('d', $now), date('Y', $now));
        }
      
        $i = 1;
        // Go back a day at a time until we get the last day next month.
        while (date('n', $plus_one_month) != $next_month) {
          $plus_one_month = mktime(0, 0, 0, date('m', $now) + 1, date('d', $now) - $i, date('Y', $now));
          $i++;
        }
      
        return $plus_one_month;
    }
    function ScheduleWork_get(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
            $id  = $this->get('user_id');
        $today=$this->get('today');
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
         
        $this->load->model('schedule_work_model');
        
      $slider=array();
      $revenue=array();
      $business_scheduling=array();
      $healthy=array();
      $sports=array();
      $food=array();
        $result = $this->schedule_work_model->getschedulework($id,$today);
    //   var_dump( json_decode(json_encode($result), true));
    //   exit;
        $result=json_decode(json_encode($result), true);
        
        $singleArray = array();
      $a=0;
      $b=0;
    // var_dump(implode(",", $result));
    
  foreach($result as $key=>$data){
       
    if(count($data)==1)
    {
     
        foreach ($data as $key2 => $data2) {
            if(isset($data2['today'])){
                if($data2['nowString']==$data2['today'] ){
                    var_dump($data2);
                    $singleArray[$a]['date'] = $data2['nowString'];
              $singleArray[$a]['id'] = $data2['id'];
               $singleArray[$a]['name'] = $data2['name'];
               $a++;
                }
              }else{
            if($data2['nowString']>=$data2['date'] ){
            $singleArray[$a]['date'] = $data2['nowString'];
              $singleArray[$a]['id'] = $data2['id'];
               $singleArray[$a]['name'] = $data2['name'];
               $a++;
        }
    }
    }
         
    }
    
    if(count($data)>=2){
      
         foreach($data as $key1=>$data1){
            if(isset($data1['today'])){
               
                if($data1['nowString']==$data1['today'] ){
                    $singleArray[$a]['date'] = $data1['nowString'];
              $singleArray[$a]['id'] = $data1['id'];
               $singleArray[$a]['name'] = $data1['name'];
               $a++;
                }
              }
              else{
            if($data1['nowString']>=$data1['date']){
             $singleArray[$a]['date'] = $data1['nowString'];
              $singleArray[$a]['id'] = $data1['id'];
               $singleArray[$a]['name'] = $data1['name'];
               $a++;
            }
    }
}
// exit;
  }
}
// exit;
    }
    $schedule_result=array('code'=>'1','data'=>$singleArray);
    $this->response($schedule_result, 200); 
    }
    public function AddEvent_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
            $event_name=$this->post('event_name');
        $date      = $this->post('date');
    
       $time=$this->post('time');
    
       $repetition  = $this->post('repetition');
    $reminder=$this->post('reminder');
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
 
    if(!$date){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل التاريخ');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field date');
        $this->response($result, 400);
        exit;
    }
    }
    
    if(!$event_name){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الاسم');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field event');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$time){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الوقت');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field time');
        $this->response($result, 400);
        exit;
    }
    }
     
    $this->load->model('schedule_work_model');
    if(!isset($reminder) && strlen($reminder)==0){
        $reminder=0;
    }
    $day=date('d',strtotime($date));
    $date_two_month=$date;
   
    $monthly1='';
    $monthly2=array();
    $date_three_month=$date;
   
    $monthly3='';
    $monthly4=array();
    $date_six_month=$date;
   
    $monthly5='';
    $monthly6=array();
    for($i=0;$i <6;$i=$i+1){
      
            $date_two_month=date('Y-m-d', strtotime("+2 months", strtotime($date_two_month))) ;
            $monthly1[]=date('Y-m-d', strtotime("+2 months", strtotime($date_two_month))) .',';
             
              array_push($monthly2,date('m',strtotime($date_two_month)))   ;
         
       
    }
    for($i=0;$i <4;$i=$i+1){
      
        $date_three_month=date('Y-m-d', strtotime("+3 months", strtotime($date_three_month))) ;
        $monthly1[]=date('Y-m-d', strtotime("+3 months", strtotime($date_three_month))) .',';
         
          array_push($monthly4,date('m',strtotime($date_three_month)))   ;
     
   
}
for($i=0;$i <2;$i=$i+1){
      
    $date_six_month=date('Y-m-d', strtotime("+6 months", strtotime($date_six_month))) ;
    $monthly5[]=date('Y-m-d', strtotime("+6 months", strtotime($date_six_month))) .',';
     
      array_push($monthly6,date('m',strtotime($date_six_month)))   ;
 

}
  $repate_two_month=implode(",",$monthly2);

    $repate_three_month=implode(",",$monthly4);
    $repate_six_month=implode(",",$monthly6);
    $repate='';
                if($repetition){
                    if($repetition=='every day')
                    {
                        $repate=array('repeat_interval'=>1,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every two day')
                    {
                        $repate=array('repeat_interval'=>2,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every week')
                    {
                        $repate=array('repeat_interval'=>7,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every two weeks')
                    {
                        $repate=array('repeat_interval'=>14,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every four weeks')
                    {
                        $repate=array('repeat_interval'=>28,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every month')
                    {
                        $repate=array('repeat_interval'=>NULL,'repeat_year'=>'*','repeat_month'=>'01,02,03,04,05,06,07,08,09,10,11,12','repeat_day'=>$day,'repeat_week'=>'*','repeat_weekday'=>'*','repeat_monthly'=>'*');
                    }
                    if($repetition=='every two months')
                    {
                        $repate=array('repeat_interval'=>NULL,'repeat_year'=>'*','repeat_month'=>$repate_two_month,'repeat_day'=>$day,'repeat_week'=>'*','repeat_weekday'=>'*','repeat_monthly'=>'*');
                    }
                    if($repetition=='every three months')
                    {
                        $repate=array('repeat_interval'=>NULL,'repeat_year'=>'*','repeat_month'=>$repate_three_month,'repeat_day'=>$day,'repeat_week'=>'*','repeat_weekday'=>'*','repeat_monthly'=>'*');
                    }
                    if($repetition=='every six month')
                    {
                        $repate=array('repeat_interval'=>NULL,'repeat_year'=>'*','repeat_month'=>$repate_six_month,'repeat_day'=>$day,'repeat_week'=>'*','repeat_weekday'=>'*','repeat_monthly'=>'*');
                    }
                    if($repetition=='every year')
                    {
                        $repate=array('repeat_interval'=>365,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                }
           $result = $this->schedule_work_model->add_schedulework(array("name"=>$event_name,'date'=>$date,'time'=>$time,'repetition'=>$repetition,'reminder'=>$reminder,'user_id'=>$user_id,'repate'=>$repate));
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
    public function UpdateEvent_post(){
        $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
        else{
            $event_name=$this->post('event_name');
        $date      = $this->post('date');
    
       $time=$this->post('time');
    
       $repetition  = $this->post('repetition');
    $reminder=$this->post('reminder');
        $user_id  = $this->post('user_id');
        $id  = $this->post('id');
       
      
            
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
    if(!$id){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل التعرفة');
        $this->response($result, 400);

        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field ID');
        $this->response($result, 400);
        exit;
    }
}
    if(!$date){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل التاريخ');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field date');
        $this->response($result, 400);
        exit;
    }
    }
    
    if(!$event_name){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الاسم');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field event');
        $this->response($result, 400);
        exit;
    }
    }
    if(!$time){
        if($language=='ar'){
            $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل الوقت');
        $this->response($result, 400);
    
        exit;
    }
    else{
        $result=array('code'=>'-1','msg'=>'please insert field time');
        $this->response($result, 400);
        exit;
    }
    }
     
    $this->load->model('schedule_work_model');
    if(!isset($reminder) && strlen($reminder)==0){
        $reminder=0;
    }
    $day=date('d',strtotime($date));
    $date_two_month=$date;
   
    $monthly1='';
    $monthly2=array();
    $date_three_month=$date;
   
    $monthly3='';
    $monthly4=array();
    $date_six_month=$date;
   
    $monthly5='';
    $monthly6=array();
    for($i=0;$i <6;$i=$i+1){
      
            $date_two_month=date('Y-m-d', strtotime("+2 months", strtotime($date_two_month))) ;
            $monthly1[]=date('Y-m-d', strtotime("+2 months", strtotime($date_two_month))) .',';
             
              array_push($monthly2,date('m',strtotime($date_two_month)))   ;
         
       
    }
    for($i=0;$i <4;$i=$i+1){
      
        $date_three_month=date('Y-m-d', strtotime("+3 months", strtotime($date_three_month))) ;
        $monthly1[]=date('Y-m-d', strtotime("+3 months", strtotime($date_three_month))) .',';
         
          array_push($monthly4,date('m',strtotime($date_three_month)))   ;
     
   
}
for($i=0;$i <2;$i=$i+1){
      
    $date_six_month=date('Y-m-d', strtotime("+6 months", strtotime($date_six_month))) ;
    $monthly5[]=date('Y-m-d', strtotime("+6 months", strtotime($date_six_month))) .',';
     
      array_push($monthly6,date('m',strtotime($date_six_month)))   ;
 

}
  $repate_two_month=implode(",",$monthly2);

    $repate_three_month=implode(",",$monthly4);
    $repate_six_month=implode(",",$monthly6);
    $repate='';
                if($repetition){
                    if($repetition=='every day')
                    {
                        $repate=array('repeat_interval'=>1,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every two day')
                    {
                        $repate=array('repeat_interval'=>2,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every week')
                    {
                        $repate=array('repeat_interval'=>7,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every two weeks')
                    {
                        $repate=array('repeat_interval'=>14,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every four weeks')
                    {
                        $repate=array('repeat_interval'=>28,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                    if($repetition=='every month')
                    {
                        $repate=array('repeat_interval'=>NULL,'repeat_year'=>'*','repeat_month'=>'01,02,03,04,05,06,07,08,09,10,11,12','repeat_day'=>$day,'repeat_week'=>'*','repeat_weekday'=>'*','repeat_monthly'=>'*');
                    }
                    if($repetition=='every two months')
                    {
                        $repate=array('repeat_interval'=>NULL,'repeat_year'=>'*','repeat_month'=>$repate_two_month,'repeat_day'=>$day,'repeat_week'=>'*','repeat_weekday'=>'*','repeat_monthly'=>'*');
                    }
                    if($repetition=='every three months')
                    {
                        $repate=array('repeat_interval'=>NULL,'repeat_year'=>'*','repeat_month'=>$repate_three_month,'repeat_day'=>$day,'repeat_week'=>'*','repeat_weekday'=>'*','repeat_monthly'=>'*');
                    }
                    if($repetition=='every six month')
                    {
                        $repate=array('repeat_interval'=>NULL,'repeat_year'=>'*','repeat_month'=>$repate_six_month,'repeat_day'=>$day,'repeat_week'=>'*','repeat_weekday'=>'*','repeat_monthly'=>'*');
                    }
                    if($repetition=='every year')
                    {
                        $repate=array('repeat_interval'=>365,'repeat_year'=>NULL,'repeat_month'=>NULL,'repeat_day'=>NULL,'repeat_week'=>NULL,'repeat_weekday'=>NULL,'repeat_monthly'=>Null);
                    }
                }
           $result = $this->schedule_work_model->update_schedulework(array("name"=>$event_name,'date'=>$date,'time'=>$time,'repetition'=>$repetition,'reminder'=>$reminder,'user_id'=>$user_id,'business_scheduling_id'=>$id,'repate'=>$repate));
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
    function DeleteEvent_delete()
    { $language = $this->input->get_request_header('lang');
        if(!isset($language)){
            $this->response("Please insert lanaguage");
            
        }
else{
        $id  = $this->delete('id');
        $user_id  = $this->delete('user_id');
        if(!$id){
            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'الرجاء إدخال حقل التعرفة');
            $this->response($result, 400);
    
            exit;
        }
        else{
            $result=array('code'=>'-1','msg'=>'please insert field ID');
            $this->response($result, 400);
            exit;
        }
    } 
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
             $this->load->model('schedule_work_model');
        if($this->schedule_work_model->delete_schedulework($id,$user_id))
        {

            if($language=='ar'){
                $result=array('code'=>'1','msg'=>'نجاح');
            $this->response($result, 200);
        
            
        }
        else{
            $result=array('code'=>'1','msg'=>'success');
            $this->response($result, 200);
            
        }  

        } 
        else
        {

            if($language=='ar'){
                $result=array('code'=>'-1','msg'=>'حصل خطأ الرجاء المحاولة لاحقا');
            $this->response($result, 4);
        
            
        }
        else{
            $result=array('code'=>'-1','msg'=>'Error received please try later');
            $this->response($result, 404);
            
        }

        }

    }
}
}