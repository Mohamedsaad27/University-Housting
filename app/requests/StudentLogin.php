<?php 
session_start();
include_once '../database/Validation.php';
include_once '../models/Student.php';
if(isset($_POST['login'])){
    //VALIDATION
    // Validation In Email
 
    $emailValidation = new Validation('email',$_POST['email']);
    $emailRequiredResult = $emailValidation->Required();
    if(empty($emailRequiredResult)){
        $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
        $emailRegExResult = $emailValidation->RegExp($emailPattern);
        if(!empty($emailRegExResult)){
        $_SESSION['errors']['email']['regex'] = $emailRegExResult;    
        }
    }else{
        $_SESSION['errors']['email']['required'] = $emailRequiredResult;
    }
    // Validation In Password
    $passwordValidation = new Validation('password',$_POST['password']);
    $passwordRequiredResult = $passwordValidation->Required();
    if(empty($passwordRequiredResult)){
        $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
        $passwordRegExResult = $passwordValidation->RegExp($passwordPattern);
        if(!empty($passwordRegExResult)){
        $_SESSION['errors']['password']['regex'] = $passwordRegExResult;    
        }
    }else{
        $_SESSION['errors']['password']['required'] = $passwordRequiredResult;
    }

    if (empty($_SESSION['errors'])) {
        $userobject = new Student;
        $userobject->setEmail($_POST['email']);
        $userobject->setPassword($_POST['password']);
        // Attempt to log in
        $result = $userobject->login();
    
        if ($result) {
            $user = $result->fetch_object();
                if ($user->status == 'Verified') {
                $_SESSION['user'] = $user;
                header('Location: ../../Room-details.php');
                die;
            } else {
                $_SESSION['errors']['email']['notverified'] = "Your Are Account Is Not Verifed";
            }
        } else {
            $_SESSION['errors']['email']['wrong'] = "Failed Attempt";
        }
    } else {
        header('location:../../user-login.php');
        die;
    }

}
header('location:../../user-login.php');
