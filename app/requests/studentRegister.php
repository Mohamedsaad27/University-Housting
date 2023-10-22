<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Student.php';
include_once '../models/Phone.php';
include_once '../services/Mail.php';
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
        $StringPattern= '/^[a-zA-Z]+$/';
        $FirstNameIsStringResult = $FirstNameValidation->RegExp($StringPattern);
        if (!empty($FirstNameIsStringResult)) {
            $_SESSION['registration']['first_name']['is_string'] = "Please Enter Valid Name ";
        }
    } else {
        $_SESSION['registration']['first_name']['required'] = $FirstNameRequiredResult;
    }


    //2-Validation On Lastname

    $LastNameValidation = new Validation('last_name', $_POST['last_name']);
    $LastNameRequiredResult = $LastNameValidation->Required();
    if (empty($LastNameRequiredResult)) {
        $StringPattern= '/^[a-zA-Z]+$/';
        $LastNameIsStringResult = $LastNameValidation->RegExp($StringPattern);
        if (!empty($LastNameIsStringResult)) {
            $_SESSION['registration']['last_name']['is_string'] = "Please Enter Valid Name ";
        }
    } else {
        $_SESSION['registration']['last_name']['required'] = $LastNameRequiredResult;
    }
    // 3-Validation  On Email
    $emailValidation = new Validation('email', $_POST['email']);
    $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
    $emailRequiredResult = $emailValidation->Required();
    if (empty($emailRequiredResult)) {
        $emailRegExResult = $emailValidation->RegExp($emailPattern);
        if (empty($emailRegExResult)) {
          $emailUniqueResult = $emailValidation->Unique('students');
          if(!empty($emailUniqueResult)){
              $_SESSION['registration']['email']['unique'] = $emailUniqueResult;
          }  
        }
    } else {
        $_SESSION['registration']['email']['required'] = $emailRequiredResult;
    }

    //4-Validation on phone
$phoneValidation = new Validation('phone', $_POST['phone']);
$phonePattern = '/^01[1-268]\d{8}$/';
$phoneRequiredResult = $phoneValidation->Required();
if (empty($phoneRequiredResult)) {
    $phoneRegexResult = $phoneValidation->RegExp($phonePattern);
    if (empty($phoneRegexResult)) {
        $phoneUniqueResult = $phoneValidation->Unique('phones');
        if (!empty($phoneUniqueResult)) {
            $_SESSION['registration']['phone']['unique'] = $phoneUniqueResult;
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
    // If no Errors
    if(empty($_SESSION['registration'])){
      $studentObject = new Student();
      $phoneObject = new Phone();
      $studentObject->setFirst_Name($_POST['first_name']);
      $studentObject->setLast_Name($_POST['last_name']);
      $studentObject->setEmail($_POST['email']);
      $studentObject->setGender($_POST['gender']);
      $studentObject->setPassword($_POST['password']);
      // Random Number For Code Verification
      $code = rand(10000, 99999);
      $studentObject->setCodeVerified($code);
      //  Random Number For StudentId
      $randomNumber = str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
      $studentObject->setStudentId($randomNumber);
      $phoneObject->setPhone($_POST['phone']);
       $insertStudent = $studentObject->create();
       if($insertStudent){
           //Send Verifcation Email
           $subject = "Verification Code";
           $body = "Congratulations You Have been Registered In SVU Housing Your StudentID IS .$randomNumber. 
                 <br>To verify Your Account Use This Code $code";
           $mail = new Mail($_POST['email'],$subject,$body);
           $mailResult= $mail->send();
           if($mailResult){
               $_SESSION['user-email'] = $_POST['email'];
               $_SESSION['Code-verification'] = $code;
               header("location:../../verifyCode.php?page=register");die;
           }else{
               $_SESSION['failed-email'] = "Please Try Again";
           }
       }else{
           $_SESSION['Failed'] = "Something Went Error";
       }
    }else{
//        print_r($_SESSION['registration']);
        header('location:../../Registration.php');
    }

}else{
    header('location:../Errors/404.php');
}