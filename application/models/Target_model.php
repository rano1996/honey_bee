<?php
class Target_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
      
       
        
    }
    public function gettarget($id){
            

        $this->db->select('goal_name, value_saved,sum(reached_value) remain,target_id,status');
  
        $this->db->from('targets a');
        $this->db->join('targets_value b', 'b.target_id=a.financial_goals_id', '');
        $this->db->group_by('target_id');
        $this->db->where('a.user_id', $id);
        $query = $this->db->get();
        // $str = $this->db->last_query();
        // var_dump($str);
        // exit;
        if($query->num_rows() > 0){
  
         return $query->result_array();
  
        }else{
  
          return 0;
  
        }
  
    }
    public function add_target_money($data){
  
       
        
       
          if($this->db->insert('targets_value', $data)){
          
        
              return true;
         
           }
         
           else{
         
              return false;
         
           }
        }
        public function update_target_status($data){
  
       
        
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('financial_goals_id', $data['target_id']);
            unset($data['user_id']);
            unset($data['target_id']);
            if($this->db->update('targets', $data)){
            
          
                return true;
           
             }
           
             else{
           
                return false;
           
             }
          }
        
          public function add_target($data){
  
       
        $reached_value=$data['reached_value'];
       unset($data['reached_value']);
            if($this->db->insert('targets', $data)){
                $target_id=$this->db->insert_id();
                $target_value=array('target_id'=>$target_id,'reached_value'=>$reached_value,'user_id'=>$data['user_id']);
                if($this->db->insert('targets_value', $target_value)){
          
                return true;
           
             }
            }
             else{
           
                return false;
           
             }
          }
          public function getallcategorytarget(){   

            $this->db->select('category_id, category_name_en, category_name_ar');
      
            $this->db->from('target_category');
            $query = $this->db->get();
      
            if($query->num_rows() > 0){
      
             return $query->result_array();
      
            }else{
      
              return 0;
      
            }
      
        }
}