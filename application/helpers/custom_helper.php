<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 	
	//-- check logged user
	if (!function_exists('check_login_user')) {
	    function check_login_user() {
	        $ci = get_instance();
	        if ($ci->session->userdata('is_login') != TRUE) {
	            $ci->session->sess_destroy();
	            redirect(base_url('auth'));
	        }
	    }
	}

	if(!function_exists('check_power')){
	    function check_power($type){        
	        $ci = get_instance();
	        
	        $ci->load->model('common_model');
	        $option = $ci->common_model->check_power($type);        
	        
	        return $option;
	    }
    } 

	//-- current date time function
	if(!function_exists('current_datetime')){
	    function current_datetime(){        
	        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
	        $date_time = $dt->format('Y-m-d H:i:s');      
	        return $date_time;
	    }
	}

	//-- show current date & time with custom format
	if(!function_exists('my_date_show_time')){
	    function my_date_show_time($date){       
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y h:i A");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	//-- show current date with custom format
	if(!function_exists('my_date_show')){
	    function my_date_show($date){       
	        
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

if(!function_exists('_post_api')){
    function _post_api(Array $fields=null, $function,$method) {
        try {
            $url=base_url().$function;
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
            // var_dump($result);
            // exit;
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
}
  