<?php
include "function.php";
$results=array();
$action=$_GET['action'];
if(isset($action) && ($action=='get_expenses_category')){
    $category_id=isset($_GET['category_id']) && !empty($_GET['category_id']) ? $_GET['category_id'] : '';
    $result=getrestapi('','Financial_Api/expenses_category_byid?id='.$category_id,'GET');
    if($result['code']==1){
        $results=$result;
    }
    // var_dump($result);
    // exit;

}
header('Content-Type: application/json');
echo json_encode($results);