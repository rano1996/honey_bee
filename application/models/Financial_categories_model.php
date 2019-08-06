<?php
 class Financial_categories_model extends CI_Model {
       
    public function __construct(){
        
      $this->load->database();
      
    }
    public function getallcategoryexpenses(){   

      $this->db->select('category_id, category_name_en, category_name_ar,icon,color');

      $this->db->from('financial_categories');

      $this->db->where('type', 'expenses');
      $this->db->where('user_id', 0);
      $query = $this->db->get();

      if($query->num_rows() > 0){

       return $query->result_array();

      }else{

        return 0;

      }

  }
  public function getsubcategoryexpenses($id){   

    $this->db->select('sub_category_id, sub_category_name_en, sub_category_name_ar,type');

    $this->db->from('financial_sub_category a');
    $this->db->join('financial_categories b', 'b.category_id=a.category_id', 'left');
    $this->db->where('a.category_id', $id);
    $this->db->where('b.type', 'expenses');

    $query = $this->db->get();

    if($query->num_rows() > 0){

     return $query->result_array();

    }else{

      return 0;

    }

}
public function getallcategoryrevenue(){   

  $this->db->select('category_id, category_name_en, category_name_ar,icon,color');

  $this->db->from('financial_categories');

  $this->db->where('type', 'revenu');
  $this->db->where('user_id', 0);
  $query = $this->db->get();

  if($query->num_rows() > 0){

   return $query->result_array();

  }else{

    return 0;

  }

}
public function getsubcategoryrevenu($id){   

  $this->db->select('sub_category_id, sub_category_name_en, sub_category_name_ar,type');

  $this->db->from('financial_sub_category a');
  $this->db->join('financial_categories b', 'b.category_id=a.category_id', '');
  $this->db->where('a.category_id', $id);
  $this->db->where('b.type', 'revenu');

  $query = $this->db->get();

  if($query->num_rows() > 0){

   return $query->result_array();

  }else{

    return 0;

  }

}
public function getallexpenses($id){   

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
public function getallrevenues($id){   

  $this->db->select('revenue_id, value, note,date,repetition,category_name_en,category_name_ar');

  $this->db->from('revenue a');
  $this->db->join('financial_categories b', 'b.category_id=a.category_id', '');
  $this->db->where('a.user_id', $id);

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
public function getallcategoryexpensesuser($id){   

  $this->db->select('category_id, category_name, category_name,icon,color');

  $this->db->from('financial_categories');

  $this->db->where('type', 'expenses');
  $this->db->where('user_id', $id);
  $query = $this->db->get();

  if($query->num_rows() > 0){

   return $query->result_array();

  }else{

    return 0;

  }

}
public function getallcategoryrevenueuser($id){   

  $this->db->select('category_id, category_name, category_name,icon,color');

  $this->db->from('financial_categories');

  $this->db->where('type', 'revenu');
  $this->db->where('user_id', $id);
  $query = $this->db->get();

  if($query->num_rows() > 0){

   return $query->result_array();

  }else{

    return 0;

  }

}
public function getsubcategoryexpensesuser($user_id,$category_id){   

  $this->db->select('sub_category_id, sub_category_name,type');

  $this->db->from('financial_sub_category a');
  $this->db->join('financial_categories b', 'b.category_id=a.category_id', 'left');
  $this->db->where('a.category_id', $category_id);
  $this->db->where('b.type', 'expenses');
  $this->db->where('b.user_id', $user_id);
  $query = $this->db->get();

  if($query->num_rows() > 0){

   return $query->result_array();

  }else{

    return 0;

  }

}
public function getsubcategoryrevenueuser($user_id,$category_id){   

  $this->db->select('sub_category_id, sub_category_name,type');

  $this->db->from('financial_sub_category a');
  $this->db->join('financial_categories b', 'b.category_id=a.category_id', 'left');
  $this->db->where('a.category_id', $category_id);
  $this->db->where('b.type', 'revenu');
  $this->db->where('b.user_id', $user_id);
  $query = $this->db->get();

  if($query->num_rows() > 0){

   return $query->result_array();

  }else{

    return 0;

  }

}
public function add($data,$data_sub=null){

  if($this->db->insert('financial_categories', $data)){
    
    
    if(isset($data_sub['sub_category_name'])){
      $data_sub['category_id']=$this->db->insert_id();
      if($this->db->insert('financial_sub_category', $data_sub)){
        return true;
    }
    
  
     return true;

  }
}
  else{

     return false;

  }

}
public function add_expenses($data){

  if($this->db->insert('expenses', $data)){
    
    
   
  
     return true;

  }

  else{

     return false;

  }

}
public function add_revenue($data){

  if($this->db->insert('revenue', $data)){
    
    
   
  
     return true;

  }

  else{

     return false;

  }

}
}
 