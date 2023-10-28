<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Booking.php';
include_once '../models/Student.php';
$res = array();
if(isset($_POST)) {
    $student = new Student();
    $student->setEmail($_SESSION['user']->Email);
    $studentData = $student->getStudentByEmail()->fetch_object();
    $Booking = new Booking();
    $Booking->setRoomId($_POST['roomNumber']);
    $Booking->setStudentId($studentData->ID);
    $Booking->setStartDate(date('Y-m-d', strtotime($_POST['startDate'])));
    $endDate = new DateTime(date('Y-m-d', strtotime($_POST['startDate'])));
    $endDate->add(new DateInterval('P' . $_POST['duration'] . 'M'));
    $Booking->setEndDate($endDate->format('Y-m-d'));

    if($Booking->addBooking())
        $res = array("res" => "success");
    else
        $res = array("res" => "invalid");
}
else {
    $res = array("res" => "invalidd");
}
echo json_encode($res);