<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Admin.php';
if ($_POST) {

    // Validation  On Email 

    $emailValidation = new Validation('email', $_POST['email']);
    $emailRequiredResult = $emailValidation->Required();
    if (empty($emailRequiredResult)) {
        $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
        $emailRegExResult = $emailValidation->RegExp($emailPattern);
        if (!empty($emailRegExResult)) {
            $_SESSION['errors']['email']['regex'] = $emailRegExResult;
        }
    } else {
        $_SESSION['errors']['email']['required'] = $emailRequiredResult;
    }
    // Validation In Password
    $passwordValidation = new Validation('password', $_POST['password']);
    $passwordRequiredResult = $passwordValidation->Required();
    if (empty($passwordRequiredResult)) {
        $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
        $passwordRegExResult = $passwordValidation->RegExp($passwordPattern);
        if (!empty($passwordRegExResult)) {
            $_SESSION['errors']['password']['regex'] = $passwordRegExResult;
        }
    } else {
        $_SESSION['errors']['password']['required'] = $passwordRequiredResult;
    }
    if (empty($_SESSION['errors'])) {
        $adminobject = new Admin();
        $adminobject->setEmail($_POST['email']);
        $adminobject->setPassword($_POST['password']);
        $result = $adminobject->Login();
        if($result) {
            $user = $result->fetch_object();
            if(isset($_POST['remember_me'])){
                setcookie('remember_me',$_POST['email'],time()+ + (24*60*60) * 30, '/');
            }
            $_SESSION['admin'] = $user;    
            header("location:../../admin-html/index-admin.php");
        } else{
            $_SESSION['errors']['dberror'] = "Attempt Failed";
            header("location:../../admin-login.php");
        }
    } else {
        header("location:../../admin-login.php");
    }
} else {
    header("location:../errors/404.php");
}
