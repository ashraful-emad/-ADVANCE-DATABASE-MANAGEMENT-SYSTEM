<?php

include 'config.php';

session_start();
session_unset();
session_destroy();
setcookie('uname',$email,time()-60*60*24,"/");
setcookie('pass',$pass,time()-60*60*24,"/");
header('location:index.php');

?>
