<?php
class Reports_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
      
       
        
    }
    public function getexpenses($id,$start_date){   

        $this->db->select('expenses_id, value, notes,date,repetition,reminder');
      
        $this->db->from('expenses');
      
        $this->db->where('user_id', $id);
      
        $query = $this->db->get();
        $str = $this->db->last_query();
        // var_dump($str);
        // exit;
        if($query->num_rows() > 0){
      
         return $query->result_array();
      
        }else{
      
          return 0;
      
        }
      
      }
    }