<?php
class Home_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
      
       
        
    }
    public function gethome($id){
       
    $query1=$this->db->query('SELECT slider_id,image_name,link FROM sliders Where status=1');
   $query2=$this->db->query('SELECT sum(value),revenue_id FROM revenue Where user_id='.$id);
//    $str = $this->db->last_query();
//       var_dump($str);
//       exit;
   $query3=$this->db->query('SELECT business_scheduling_id,name,date,time,reminder FROM business_scheduling Where user_id='.$id);
 

   $result1 = $query1->result();
$result1=array('slider'=>$result1);
   $result2 = $query2->result();
   $result2=array('revenue'=>$result2);
   $result3= $query3->result();
   $result3=array('shcedule_work'=>$result3);
   $a=array();
   
  
    return array_merge($result1,$result2,$result3);
    }

}