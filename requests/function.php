<?php
function getrestapi( $fields=null, $function,$method) {
    try {
       $url='localhost/honey_bee/'.$function;
        $ch = curl_init();
        switch ($method){
            case "POST":
               curl_setopt($ch, CURLOPT_POST, 1);
               if ($fields)
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
               break;
            case "PUT":
               curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
               if ($fields)
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);			 					
               break;
            default:
               if ($fields)
                  $url = sprintf("%s?%s", $url, http_build_query($fields));
         }
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'lang: en',
            
         ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
    } catch (Exception $e) {
        return false;
    }
  
    curl_close($ch);
    if ($result){
    $result=json_decode($result,true);
        return $result;
    }
    else
        return false;
}