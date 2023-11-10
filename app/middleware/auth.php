<?php
// allow authenticated users and prevent guests
if(empty($_SESSION['admin'])){
    header('location:../admin-login.php');die;
}

