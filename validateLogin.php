<?php
//error_reporting(E_ERROR | E_PARSE);
//error_reporting(0);
session_start();
//header('Content-Type: text/html; charset=utf-8');
include('config.php');

function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
} 

//var_dump( $_SESSION['worklist']);
if (!empty($_SESSION['expire'])) {

    $now = time(); // Checking the time now when home page starts.
    if ($now > $_SESSION['expire']) {

        session_unset();
        session_destroy();
        header("location: index.php?err=02");
        exit();
    } else {
        $_SESSION['expire'] = $_SESSION['expire'] + (30 * 60);
    }
} else {

    header("location: index.php?err=03");
    exit();
}
?>