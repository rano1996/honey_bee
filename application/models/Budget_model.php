<?php
class Budget_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
      
       
        
    }
    public function getbudget($id){
            

        $this->db->select('budget_date, total_value, 	rest_value,paid_value,a.create_date,category_name_en,category_name_ar,sub_category_name_en,sub_category_name_ar');
  
        $this->db->from('budgets a');
        $this->db->join('financial_categories b', 'b.category_id=a.category_id', '');
        $this->db->join('financial_sub_category c', 'c.sub_category_id=a.sub_category_id', 'left');
        
        $this->db->where('a.user_id', $id);
        $query = $this->db->get();
  
        if($query->num_rows() > 0){
  
         return $query->result_array();
  
        }else{
  
          return 0;
  
        }
  
    }
    public function add_budget($data){
  
      if($this->db->insert('budgets', $data)){
    
        return true;
   
     }
   
     else{
   
        return false;
   
     }
  
  }
  public function edit_budget($data){
    $this->db->select('total');

  $this->db->from('total_revenue a');
  $this->db->where('a.user_id', $data['user_id']);
  $query = $this->db->get();
  $result = $query->result();
  $result=json_decode(json_encode($result), true);
  
  if($query->num_rows() == 1){
    $total=$result[0]['total']-$data['paid_value'];
    $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
    $this->db->where('user_id', $data['user_id']);
    if($this->db->update('total_revenue', $total_expenses)){
    
    
      $this->db->where('budget_id', $data['id']);
      unset($data['id']);
  
      if($this->db->update('budgets', $data)){
    
    
   
  
        return true;
   
     }
   
     else{
   
        return false;
   
     }
  }
}
  else{
    $total=-$data['total_value'];
    $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
    if($this->db->insert('total_revenue', $total_expenses)){
    
    
   
  
      if($this->db->update('budgets', $data)){
    
    
   
  
        return true;
   
     }
   
     else{
   
        return false;
   
     }
  }
 
 

}
    $this->db->where('budget_id', $data['id']);
    unset($data['id']);
    if($this->db->update('budgets', $data)){
  
      return true;
 
   }
 
   else{
 
      return false;
 
   }

}
public function delete_budget($id,$user_id){

  $this->db->where('budget_id', $id);
  $this->db->where('user_id', $user_id);
  if($this->db->delete('budgets')){

     return true;

   }else{

     return false;

   }

}
}