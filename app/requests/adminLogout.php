<?php 

session_start();
unset($_SESSION['admin']);
if(isset($_COOKIE['remember_me'])){
    setcookie('remember_me','',time()-100,'/');
}

header('location:../../admin-login.php');

?>