<?php

session_start();
if(empty($_SESSION['user'])){
    header('location:user-login.php');die;
}
?>