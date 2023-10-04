<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Student.php';
if($_POST){
    //first_name => required , string
    //last_name => required , string
    //email => required , unique , regexp
    //phone => required , unique , regexp
    //password => required , regexp , =password_confirmation

    // 1-validation on firstName
    $FirstNameValidation = new Validation('first_name', $_POST['first_name']);
    $FirstNameRequiredResult = $FirstNameValidation->Required();
    if (empty($FirstNameRequiredResult)) {
        $StringPattern= '/^[a-zA-Z0-9\s]+$/';
        $FirstNameIsStringResult = $FirstNameValidation->RegExp($StringPattern);
        if (!empty($FirstNameIsStringResult)) {
            $_SESSION['registration']['first_name']['is_string'] = $FirstNameIsStringResult;
        }
    } else {
        $_SESSION['registration']['first_name']['required'] = $FirstNameRequiredResult;
    }


    //2-Validation On Lastname

    $LastNameValidation = new Validation('last_name', $_POST['last_name']);
    $LastNameRequiredResult = $LastNameValidation->Required();
    if (empty($LastNameRequiredResult)) {
        $StringPattern= '/^[a-zA-Z0-9\s]+$/';
        $LastNameIsStringResult = $LastNameValidation->RegExp($StringPattern);
        if (!empty($LastNameIsStringResult)) {
            $_SESSION['registration']['last_name']['is_string'] = $LastNameIsStringResult;
        }
    } else {
        $_SESSION['registration']['last_name']['required'] = $LastNameRequiredResult;
    }
    // 3-Validation  On Email
    $emailValidation = new Validation('email', $_POST['email']);
    $emailRequiredResult = $emailValidation->Required();
    if (empty($emailRequiredResult)) {
        $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
        $emailRegExResult = $emailValidation->RegExp($emailPattern);
        if (!empty($emailRegExResult)) {
            $_SESSION['registration']['email']['regex'] = $emailRegExResult;
        }
    } else {
        $_SESSION['registration']['email']['required'] = $emailRequiredResult;
    }

    //4-Validation on phone
    $phoneValidation = new Validation('phone', $_POST['phone']);
    $phoneRequiredResult = $phoneValidation->Required();
    $phonePattern = '/^01[1-268]\d{8}$/';
    if (empty($phoneRequiredResult)) {
        $phoneRegexResult = $phoneValidation->RegExp($phonePattern);
        if (empty($phoneRegexResult)) {
            $phoneUniqueResult = $phoneValidation->Unique('Admins');
            if (empty($phoneUniqueResult)) {
                $_SESSION['registration']['phone']['regex'] = $phoneRegexResult;
            }
        }
    } else {
        $_SESSION['registration']['phone']['required'] = $phoneRequiredResult;
    }
    // 5-Validation In Password
    $passwordValidation = new Validation('password', $_POST['password']);
    $passwordRequiredResult = $passwordValidation->Required();
    if (empty($passwordRequiredResult)) {
        $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
        $passwordRegExResult = $passwordValidation->RegExp($passwordPattern);
        if (!empty($passwordRegExResult)) {
            $_SESSION['registration']['password']['regex'] = $passwordRegExResult;
        }
    } else {
        $_SESSION['registration']['password']['required'] = $passwordRequiredResult;
    }
     // 6- Confirmation validation
    $confirmpasswordValidation = new Validation('confirm-password', $_POST['confirm-password']);
    $confirmpasswordRequiredResult = $confirmpasswordValidation->Required();
    if (empty($confirmpasswordRequiredResult)) {
        $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
        $confirmpasswordRegExResult = $confirmpasswordValidation->RegExp($passwordPattern);
        if (!empty($confirmpasswordRegExResult)) {
            $_SESSION['registration']['NewPasswordConfirm']['regex'] = $confirmpasswordRegExResult;
        }
    } else {
        $_SESSION['registration']['NewPasswordConfirm']['required'] = $confirmpasswordRequiredResult;
    }
     // End Of Validation

    if(empty($_SESSION['registration'])){
       echo "tmam";
    }else{
//        print_r($_SESSION['registration']);
        header('location:../../Registration.php');
    }

}else{
    header('location:../Errors/404.php');
}