<?php
session_start();

//remove all session variables
session_destroy();

//destory 
session_destroy();
header('location:login.php');
?>