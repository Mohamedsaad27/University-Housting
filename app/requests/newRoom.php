<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Room.php';
$res = array();
if(isset($_POST)) {

    /*


    validation hena ya abo sa3d ;)


    */


    if(empty($_SESSION['errors'])) {
        $room = new Room();
        $room->setRoom_Id($_POST['roomNumber']);
        $room->setNumberOfBeds($_POST['numberOfBeds']);
        $room->setPrice($_POST['Price']);
        $room->setAvailabilityStatus($_POST['AvailabilityStatus']);
        $room->setFoodStatus($_POST['FoodStatus']);
        if($room->Create())
            $res = array("res" => "success");
        else
            $res = array("res" => "invalid");
    }
}
else {
    $res = array("res" => "invalidd");
}
echo json_encode($res);