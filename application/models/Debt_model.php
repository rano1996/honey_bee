<?php
class Debt_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
      
       
        
    }
    public function getdebt($id,$type){
            

      $this->db->select('loan_id,person_name, description, 	value,from_date,to_date,bank_name,loan_period,benefits,value_installment,date,a.type,category_name_en,category_name_ar');

      $this->db->from('debt a');
      $this->db->join('category_debt b', 'b.category_id=a.category_id', '');
      if(isset($type) && !empty($type)){
        $this->db->where('a.type', $type);
      }
     
      
      $this->db->where('user_id', $id);
      $query = $this->db->get();

      if($query->num_rows() > 0){

       return $query->result_array();

      }else{

        return 0;

      }

  }
  public function getsumdebt($id){
            

    $query1=$this->db->query('SELECT sum(value) lends,category_id  FROM debt  where user_id='.$id.' and type_debt="lends" group by category_id');
    $query2=$this->db->query('SELECT sum(value) borrows,category_id  FROM debt  where user_id='.$id.' and type_debt="borrows" group by category_id');
    $result1 = $query1->result();
$result1=array('lends'=>$result1);
   $result2 = $query2->result();
   $result2=array('borrows'=>$result2); 
   if($result1 > 0 || $result2>0 ){
  
    return array_merge($result1,$result2);

   }else{

     return 0;

   }
}
  public function getdebtcategory(){
            

    $this->db->select('category_id, category_name');

    $this->db->from('category_debt');
  
    $query = $this->db->get();

    if($query->num_rows() > 0){

     return $query->result_array();

    }else{

      return 0;

    }

}
public function add_debt($data){
  $category_id=$data['category_id'];
  if($category_id==2){
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
            
            
           
          
              if($this->db->insert('debt', $data)){
            
            
           
          
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
          
          
         
        
            if($this->db->insert('debt', $data)){
          
          
         
        
              return true;
         
           }
         
           else{
         
              return false;
         
           }
        }
       
       
      
      }
      }
      else{
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
            
            
           
          
              if($this->db->insert('debt', $data)){
                $expenses_data=array('value'=>$data['value'],'user_id'=>$data['user_id'],'date'=>date('Y-m-d'));
                if($this->db->insert('expenses', $expenses_data)){
                  return true;
                }
            
           
          
               
           
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
          
          
         
        
            if($this->db->insert('debt', $data)){
          
              $expenses_data=array('value'=>$data['value'],'user_id'=>$data['user_id'],'date'=>date('Y-m-d'));
              if($this->db->insert('expenses', $expenses_data)){
                return true;
              }
         
        
         
         
           }
         
           else{
         
              return false;
         
           }
        }
       
       
      
      }
      }


} 
public function add_loan($data){

$insallement=$data['value_installment'];
unset($data['value_installment']);
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
            
            
           
              if($this->db->insert('debt', $data)){
                if(isset($insallement) && strlen($insallement)!=0){
                  $loan_id=$this->db->insert_id();
                  $this->db->select('total');
        
          $this->db->from('total_revenue a');
          $this->db->where('a.user_id', $data['user_id']);
          $query = $this->db->get();
          $result = $query->result();
          $result=json_decode(json_encode($result), true);
          
          if($query->num_rows() == 1){
            $total=$result[0]['total']-$insallement;
            $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
            $this->db->where('user_id', $data['user_id']);
            if($this->db->update('total_revenue', $total_expenses)){
                  $data_loan=array('Premium'=>$insallement,'loan_id'=>$loan_id,'user_id'=>$data['user_id']);
                  if($this->db->insert('value_debt', $data_loan)){
                    $expenses_data=array('value'=>$insallement,'user_id'=>$data['user_id'],'date'=>date('Y-m-d'));
                          if($this->db->insert('expenses', $expenses_data)){
                            return true;
                          }
                   
                  }
                  else{
           
                    return false;
               
                 }
                }
             
            
            }
          }
           return true;
             
          }
          return true;
        }
      }
        else{
          $total=$data['value'];
          $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
          if($this->db->insert('total_revenue', $total_expenses)){
          
          
         
            if($this->db->insert('debt', $data)){
              if(isset($insallement) && strlen($insallement)!=0){
                $loan_id=$this->db->insert_id();
                $data_loan=array('Premium'=>$insallement,'loan_id'=>$loan_id,'user_id'=>$data['user_id']);
                $this->db->select('total');
        
                $this->db->from('total_revenue a');
                $this->db->where('a.user_id', $data['user_id']);
                $query = $this->db->get();
                $result = $query->result();
                $result=json_decode(json_encode($result), true);
                
                if($query->num_rows() == 1){
                  $total=$result[0]['total']-$insallement;
                  $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
                  $this->db->where('user_id', $data['user_id']);
                  if($this->db->update('total_revenue', $total_expenses)){
                        $data_loan=array('Premium'=>$insallement,'loan_id'=>$loan_id,'user_id'=>$data['user_id']);
                        if($this->db->insert('value_debt', $data_loan)){
                          $expenses_data=array('value'=>$insallement,'user_id'=>$data['user_id'],'date'=>date('Y-m-d'));
                          if($this->db->insert('expenses', $expenses_data)){
                            return true;
                          }
                         
                        }
                        else{
                 
                          return false;
                     
                       }
                      }
                   
                  
                  }
              }
            return true;
          
          }
         
           else{
         
              return false;
         
           }
        }
       
       
      
      }
  
  
  
  } 
  public function add_insallement($data){
    $this->db->select('total');
        
    $this->db->from('total_revenue a');
    $this->db->where('a.user_id', $data['user_id']);
    $query = $this->db->get();
    $result = $query->result();
    $result=json_decode(json_encode($result), true);
    
    if($query->num_rows() == 1){
      $total=$result[0]['total']-$data['premium'];
      $total_expenses=array('total'=>$total,'user_id'=>$data['user_id']);
      $this->db->where('user_id', $data['user_id']);
      if($this->db->update('total_revenue', $total_expenses)){
           
            if($this->db->insert('value_debt', $data)){
                $expenses_data=array('value'=>$data['premium'],'user_id'=>$data['user_id'],'date'=>date('Y-m-d'));
              if($this->db->insert('expenses', $expenses_data)){
                return true;
              }
              
            }
            else{
     
              return false;
         
           }
           return true;
          }
       
      
      }
      else{
        return false;
      }
  }
 
}