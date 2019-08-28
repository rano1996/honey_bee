<?php
 class Schedule_work_model extends CI_Model {
       
    public function __construct(){
        
      $this->load->database();
      
    }
    public function getschedulework($id,$today=null){   

       
  $pushToFirst = 0;
$j=0;
for($i = $pushToFirst; $i < $pushToFirst+365; $i++)
{
   $now =  strtotime("+".$i." day");

   $now1=new DateTime("01-07-2019"."+".$i." day");
   $date2=date('Y-m-d');
   $now_month=new DateTime($date2);
     
      $a=array();
   
   $year=$now1->format('Y');
   $year1=date('Y',$now);
 
   $month = $now1->format('m');

   $monthly_date=$now_month->modify('+1 month');
 
   $day = $now1->format('d');
   $nowString = $year . "-" . $month . "-" . $day;
   $monthstring=$monthly_date->format('Y-m-d');
   // var_dump($monthstring);
   // exit;
   $week = (int) (($now1->format('d') - 1) / 7) + 1;

   $weekday = $now1->format('N');
// var_dump($week);
// var_dump($weekday);
//         exit;
    
  

  $event_end_date=strtotime('2019-09-30');
// var_dump($monthstring);

   $query3 = $this->db->query("SELECT EV.*
           FROM `business_scheduling` EV
           LEFT JOIN `events_meta` EM1 ON EM1.`business_scheduling_id` = EV.`business_scheduling_id`
          WHERE user=$id AND  DATEDIFF( '$nowString', repeat_start ) % repeat_interval = 0 
           OR (
               (repeat_year = $year OR repeat_year = '*' )
               AND
               ( repeat_month LIKE '%$month%'  OR repeat_month = '*' )
               AND
               (repeat_day = $day OR repeat_day = '*' )
               AND
               (repeat_week LIKE '%$week%' OR repeat_week = '*' )
               AND
               (repeat_weekday LIKE '%$weekday%' OR repeat_weekday = '*' )
              
              
               
           AND repeat_start <='$nowString'
           
             
               
          ) or date='$nowString' and user=$id");

// $str = $this->db->last_query();
// var_dump($str);
// exit;
  

  
 
           
           foreach($query3->result() as $datum){
             if(isset($today) && !empty($today)){
               $a[$j]['today']=$today;
             }
            $a[$j]['nowString']=$nowString ;
            $a[$j]['name']= $datum->name ;
            $a[$j]['id']= $datum->business_scheduling_id ;
              $a[$j]['date']= $datum->date ;
              $a[$j]['time']= $datum->time ;
            //   $a[$i]['reminder']= $datum->reminder ;
        $j++;
           }
           $result3[]=$a;
        
} 
return $result3;
    }

    public function add_schedulework($data){
  
       
        
       $repetition=$data['repate'];
            unset($data['repate']);
        if($this->db->insert('business_scheduling', $data)){
        
            if(isset($repetition) && !empty($repetition)){
                $bussenis_id=$this->db->insert_id();
                $repate=array('business_scheduling_id'=>$bussenis_id,'repeat_interval'=> $repetition['repeat_interval'],'repeat_year'=>$repetition['repeat_year'],'repeat_month'=>$repetition['repeat_month'],'repeat_day'=>$repetition['repeat_day'],'repeat_week'=>$repetition['repeat_week'],'repeat_weekday'=>$repetition['repeat_weekday'],'repeat_monthly'=>$repetition['repeat_monthly'],'repeat_start'=>$data['date']);
               
                if($this->db->insert('events_meta', $repate)){
                    return true;

            }
            else{
                return false;
            }
        }
        else{
            return true;
        }
    }
         else{
       
            return false;
       
         }
      }
      public function update_schedulework($data){
  
       
        
        $repetition=$data['repate'];
             unset($data['repate']);
             $business_scheduling_id=$data['business_scheduling_id'];
             $this->db->where('user_id', $data['user_id']);
            $this->db->where('business_scheduling_id', $data['business_scheduling_id']);
            unset($data['user_id']);
            unset($data['business_scheduling_id']);
         if($this->db->update('business_scheduling', $data)){
         
             if(isset($repetition) && !empty($repetition)){
                
                 $repate=array('business_scheduling_id'=>$business_scheduling_id,'repeat_interval'=> $repetition['repeat_interval'],'repeat_year'=>$repetition['repeat_year'],'repeat_month'=>$repetition['repeat_month'],'repeat_day'=>$repetition['repeat_day'],'repeat_week'=>$repetition['repeat_week'],'repeat_weekday'=>$repetition['repeat_weekday'],'repeat_monthly'=>$repetition['repeat_monthly'],'repeat_start'=>$data['date']);
                 $this->db->where('business_scheduling_id', $business_scheduling_id);
                 if($this->db->update('events_meta', $repate)){
                     return true;

 
             }
             else{
                 return false;
             }
            }
             
             else{
                
                $this->db->select('business_scheduling_id');
  
                $this->db->from('events_meta');
            
                $this->db->where('business_scheduling_id', $business_scheduling_id);
                $query = $this->db->get();
                // $str = $this->db->last_query();
                // var_dump($str);
                // exit;
                if($query->num_rows() > 0){
          
                    $this->db->where('business_scheduling_id', $business_scheduling_id);
                 
                    if($this->db->delete('events_meta')){
                        return true;
          
                }
                else{
                 return false;
             }
         }
         return false;
        }
       
    
         return true;
     }
          else{
        
             return false;
        
          }
       }
       public function delete_schedulework($id,$user_id){

        $this->db->where('business_scheduling_id', $id);
        $this->db->where('user_id', $user_id);
        if($this->db->delete('business_scheduling')){
      
           return true;
      
         }else{
      
           return false;
      
         }
      
      }
}