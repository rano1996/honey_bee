<?php
session_start();

// header('Cache-control: private'); // IE 6 FIX
$languages=isset($_POST['lang1']) && !empty($_POST['lang1']) ? $_POST['lang1']:'';
// var_dump($languages);
// exit;
$_SESSION['lang'] = $languages;
var_dump($_SESSION['lang']);
exit;
// $_SESSION['lang']='';



// if($languages)
// {
// $lang = $languages;

// // register the session and set the cookie
// $_SESSION['lang'] = $lang;

// setcookie("lang", $lang, time() + (3600 * 24 * 30));
// }
// else if(isset($_SESSION['lang']))
// {
// $lang = $_SESSION['lang'];
// }
// // else if(isset($_COOKIE['lang']))
// // {
// // $lang = $_COOKIE['lang'];
// // }
// else
// {
// $lang = 'en';
// }

// switch ($lang) {
//   case 'en':
//   $lang_file = 'lang.en.php';
//   break;

//   case 'ar':
//   $lang_file = 'lang.ar.php';
//   break;
//   default:
//   $lang_file = 'lang.en.php';

// }


// include 'languages/'.$lang_file;
// var_dump($_SESSION['lang'])
?>