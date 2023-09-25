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
    //Validation On grand name

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
    $phonePattern = '/^01[1-268]\d{8}$/';
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
        #update User Data
//        var_dump($_POST);die;
        $admin = new Admin();
        $admin->setEmail($_SESSION['admin']->Email);
        $adminByEmail = $admin->getAdminByEmail();
        $adminObject = $adminByEmail->fetch_object();
        $admin->setFirst_name($_POST['first_name']);
        $admin->setLast_name($_POST['last_name']);
        $admin->setGrand_name($_POST['grand_name']);
        $admin->setGender($_POST['gender']);
        $admin->setPhone($_POST['phone']);
        $result = $admin->update();
        $_SESSION['admin']->First_Name = $_POST['first_name'];
        $_SESSION['admin']->Last_name = $_POST['last_name'];
        $_SESSION['admin']->Grand_Name = $_POST['grand_name'];
        $_SESSION['admin']->Gender = $_POST['gender'];
        $_SESSION['admin']->Phone = $_POST['phone'];
        if($result){
            $_SESSION['update-success'] =  "<div class='alert alert-success'> Updated Successfully </div>";
        }else{
            $_SESSION['update-failed'] =  "<div class='alert alert-danger'> Something Went Wrong</div>";

        }
        header("Location:../../Admin-html/profile-admin.php");
    }else{
        #redirect To Profile-Admin Page and Display Errors
        header("Location:../../Admin-html/profile-admin.php");

    }
} else {
    header("Location:../Errors/404.php");
}
