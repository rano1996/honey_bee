<?php
class Project_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
      
       
        
    }
    public function getproject($id){
            
        $query1=$this->db->query('SELECT project_name,a.create_date,sum(b.value) expeneses,b.project_id FROM projects a  LEFT JOIN expenses b ON b.project_id=a.project_id where a.user_id='.$id.' group by b.project_id');
        $query2=$this->db->query('SELECT project_name,a.create_date,sum(c.value) revenu,c.project_id  FROM projects a  LEFT JOIN revenue c ON c.project_id=a.project_id where a.user_id='.$id.' group by c.project_id');
        $query3=$this->db->query('SELECT project_name,a.create_date FROM projects a   Where a.user_id='.$id);
  //       $this->db->select('project_name,a.create_date,sum(b.value) expeneses,sum(c.value) revenue,b.project_id,c.project_id');
  
  //       $this->db->from('projects a');
        
  //       $this->db->join('expenses b', 'b.project_id=a.project_id', 'left');
  //       $this->db->group_by('b.project_id'); 
  //       $this->db->join('revenue c', 'c.project_id=a.project_id', 'left');
  //       $this->db->group_by('c.project_id'); 
  //       $this->db->where('a.user_id', $id);
        
  //       $query = $this->db->get();
  //       $str = $this->db->last_query();
  // var_dump($str);
  // exit;
$result1 = $query1->result();
$result1=array('expenses'=>$result1);
   $result2 = $query2->result();
   $result2=array('revenue'=>$result2); 
   $result3 = $query3->result();
   $result3=array('project'=>$result3);
        if($result1 > 0 || $result2>0 || $result3>0){
  
         return array_merge($result1,$result2,$result3);
  
        }else{
  
          return 0;
  
        }
  
    }
    public function add_project_expenses($data){
  
        $this->db->select('total');
      
        $this->db->from('total_revenue a');
        $this->db->where('a.user_id', $data['user_id']);
        $query = $this->db->get();
        $result = $query->result();
        $result=json_decode(json_encode($result), true);
        
        if($query->num_rows() == 1){
          $total=$result[0]['total']-$data['value'];
          $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
          $this->db->where('user_id', $data['user_id']);
          if($this->db->update('total_revenue', $total_expenses)){
          
          
         
        
            if($this->db->insert('expenses', $data)){
          
          
         
        
              return true;
         
           }
         
           else{
         
              return false;
         
           }
        }
      }
        else{
          $total=-$data['value'];
          $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
          if($this->db->insert('total_revenue', $total_expenses)){
          
          
         
        
            if($this->db->insert('expenses', $data)){
          
          
         
        
              return true;
         
           }
         
           else{
         
              return false;
         
           }
        }
       
       
      
      }
        }
        public function add_project_revenue($data){
  
          $this->db->select('total');
        
          $this->db->from('total_revenue a');
          $this->db->where('a.user_id', $data['user_id']);
          $query = $this->db->get();
          $result = $query->result();
          $result=json_decode(json_encode($result), true);
          
          if($query->num_rows() == 1){
            $total=$result[0]['total']+$data['value'];
            $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
            $this->db->where('user_id', $data['user_id']);
            if($this->db->update('total_revenue', $total_expenses)){
            
            
           
          
              if($this->db->insert('revenue', $data)){
            
            
           
          
                return true;
           
             }
           
             else{
           
                return false;
           
             }
          }
        }
          else{
            $total=$data['value'];
            $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
            if($this->db->insert('total_revenue', $total_expenses)){
            
            
           
          
              if($this->db->insert('revenue', $data)){
            
            
           
          
                return true;
           
             }
           
             else{
           
                return false;
           
             }
          }
         
         
        
        }
          }
          public function add_project($data){
                  $expenses=$data['expenses'];
                  $revenue=$data['revenue'];
                  unset($data['expenses']);
                  unset($data['revenue']);
            if($this->db->insert('projects', $data)){
              
              
          
              $project_id=$this->db->insert_id();
              $data_expenses=array('project_id'=>$project_id,'value'=>$expenses,'user_id'=>$data['user_id']);
                if($this->db->insert('expenses', $data_expenses)){
                  $data_revenue=array('project_id'=>$project_id,'value'=>$revenue,'user_id'=>$data['user_id']);
                  if($this->db->insert('revenue', $data_revenue)){
                  return true;
              }
              
            
               
          
            }
            return true;
          }
            else{
          
               return false;
          
            }
          
          }
          public function getprojectreport($id,$project_id){
            
        $query1=$this->db->query('SELECT project_name,a.create_date,b.value expeneses FROM projects a  LEFT JOIN expenses b ON b.project_id=a.project_id where a.user_id='.$id.' and b.project_id='.$project_id);
        $query2=$this->db->query('SELECT project_name,a.create_date,sum(c.value) revenu  FROM projects a  LEFT JOIN revenue c ON c.project_id=a.project_id where a.user_id='.$id.' and c.project_id='.$project_id);
      
  
$result1 = $query1->result();
$result1=array('expenses'=>$result1);
   $result2 = $query2->result();
   $result2=array('revenue'=>$result2); 
   
        if($result1 > 0 || $result2>0 ){
  
         return array_merge($result1,$result2);
  
        }else{
  
          return 0;
  
        }
  
    }
}