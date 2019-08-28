<?php
class Memories_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
      
       
        
    }


    public function getmemeory($id){
            

        $this->db->select('autobiography_id, text,image_name');
  
        $this->db->from('autobiography a');
  
        $this->db->where('a.user_id', $id);
        $this->db->where('a.type', 'autobiography');
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
    public function add_memory($data){
  
       
        
       
        if($this->db->insert('autobiography', $data)){
        
      
            return true;
       
         }
       
         else{
       
            return false;
       
         }
      }
}