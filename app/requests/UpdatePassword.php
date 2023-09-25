<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Admin.php';
$res = array();
if(isset($_POST)) {

    $oldpasswordValidation = new Validation('oldPassword', $_POST['oldPassword']);
    $oldpasswordRequiredResult = $oldpasswordValidation->Required();
    if (empty($oldpasswordRequiredResult)) {
        $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
        $oldpasswordRegExResult = $oldpasswordValidation->RegExp($passwordPattern);
        if (!empty($oldpasswordRegExResult)) {
            $_SESSION['UpdatePassworderrors']['oldPassword']['regex'] = $oldpasswordRegExResult;
        }
    } else {
        $_SESSION['UpdatePassworderrors']['oldPassword']['required'] = $oldpasswordRequiredResult;
    }

    $newpasswordValidation = new Validation('NewPassword', $_POST['NewPassword']);
    $newpasswordRequiredResult = $newpasswordValidation->Required();
    if (empty($newpasswordRequiredResult)) {
        $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
        $newpasswordRegExResult = $newpasswordValidation->RegExp($passwordPattern);
        if (!empty($newpasswordRegExResult)) {
            $_SESSION['UpdatePassworderrors']['NewPassword']['regex'] = $newpasswordRegExResult;
        }
    } else {
        $_SESSION['UpdatePassworderrors']['NewPassword']['required'] = $newpasswordRequiredResult;
    }

    $confirmpasswordValidation = new Validation('NewPasswordConfirm', $_POST['NewPasswordConfirm']);
    $confirmpasswordRequiredResult = $confirmpasswordValidation->Required();
    if (empty($confirmpasswordRequiredResult)) {
        $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
        $confirmpasswordRegExResult = $confirmpasswordValidation->RegExp($passwordPattern);
        if (!empty($confirmpasswordRegExResult)) {
            $_SESSION['UpdatePassworderrors']['NewPasswordConfirm']['regex'] = $confirmpasswordRegExResult;
        }
    } else {
        $_SESSION['UpdatePassworderrors']['NewPasswordConfirm']['required'] = $confirmpasswordRequiredResult;
    }

    if(empty($_SESSION['UpdatePassworderrors'])) {
        
        if($_SESSION['admin']->Password == $_POST['oldPassword']) {
            if($_POST['NewPassword'] == $_POST['NewPasswordConfirm']) {
                $adminObj = new Admin();
                $adminObj->setEmail($_SESSION['admin']->Email);
                $adminObj->setPassword($_POST['NewPassword']);
                $result = $adminObj->UpdatePassword();
                if($result)
                    $res = array("res" => "success");
                else
                    $res = array("res" => "invalid");
            }
            else {
                $_SESSION['UpdatePassworderrors']['NewPasswordConfirm']['equal'] = "New Password not equal the conform Password";
                $res = array("res" => "invalid");
            }
            echo json_encode($res);
        }
        else {
            $_SESSION['UpdatePassworderrors']['total']['notequal'] = "The Old Password not Correct";
            $res = array("res" => "invalid");
            echo json_encode($res);
        }
    }
}
else {
    $res = array("res" => "invalidd");
    echo json_encode($res);
}