<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Admin.php';
// var_dump($_POST);
if ($_POST) {  
    //Validation On Firstname
    $FirstNameValidation = new Validation('first_name', $_POST['first_name']);
    $FirstNameRequiredResult = $FirstNameValidation->Required();
    if (empty($FirstNameRequiredResult)) {
        $StringPattern= '/^[a-zA-Z0-9\s]+$/';
        $FirstNameIsStringResult = $FirstNameValidation->RegExp($StringPattern);
        if (!empty($FirstNameIsStringResult)) {
            $_SESSION['update-errors']['first_name']['is_string'] = $FirstNameIsStringResult;
        }
    } else {
        $_SESSION['update-errors']['first_name']['required'] = $FirstNameRequiredResult;
    }


    //Validation On Lastname

    $LastNameValidation = new Validation('last_name', $_POST['last_name']);
    $LastNameRequiredResult = $LastNameValidation->Required();
    if (empty($LastNameRequiredResult)) {
        $StringPattern= '/^[a-zA-Z0-9\s]+$/';
        $LastNameIsStringResult = $LastNameValidation->RegExp($StringPattern);
        if (!empty($LastNameIsStringResult)) {
            $_SESSION['update-errors']['last_name']['is_string'] = $LastNameIsStringResult;
        }
    } else {
        $_SESSION['update-errors']['last_name']['required'] = $LastNameRequiredResult;
    }
    //Validation On grandtname

    $GrandNameValidation = new Validation('grand_name', $_POST['grand_name']);
    $GrandNameRequiredResult = $GrandNameValidation->Required();
    if (empty($GrandNameRequiredResult)) {
        $GrandNameIsStringResult = $GrandNameValidation->IsString();
        if (!empty($GrandNameIsStringResult)) {
            $_SESSION['update-errors']['grand_name']['is_string'] = $GrandNameIsStringResult;
        }
    } else {
        $_SESSION['update-errors']['grand_name']['required'] = $GrandNameRequiredResult;
    }
    //Validation on phone 
    $phoneValidation = new Validation('phone', $_POST['phone']);
    $phoneRequiredResult = $phoneValidation->Required();
    $phonePattern = "/^01[0-2,5,9]{1}[0-9]{8}$/";
    if (empty($phoneRequiredResult)) {
        $phoneRegexResult = $phoneValidation->RegExp($phonePattern);
        if (empty($phoneRegexResult)) {
            $phoneUniqueResult = $phoneValidation->Unique('Admins');
            if (empty($phoneUniqueResult)) {
                $_SESSION['update-errors']['phone']['regex'] = $phoneRegexResult;
            }
        }
    } else {
        $_SESSION['update-errors']['phone']['required'] = $phoneRequiredResult;
    }

    // end of validation

    if(empty($_SESSION['update-errors'])){
        // $_SESSION['newAdminData']=$_POST;
        // $adminObj = new Admin();
        if($adminObj->Update()) {
            $res = array("res" => "success");
        }else {
            $res = array("res" => "qsuccess");
        }
    }else{  
        $res = array("res" => "invalid");
    }
} else {
    $res = array("res" => "invalidd");
}

echo json_encode($res);