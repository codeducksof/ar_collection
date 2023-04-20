<?php
    
    setcookie("PHPSESSID","",time()-3600);
    session_set_cookie_params(0);
    session_start();
    session_destroy();
    header('Content-Type: text/html; charset=utf-8');
    header("location: index.php");
    exit();

?>