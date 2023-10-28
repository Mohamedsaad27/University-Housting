<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Room.php';
$res = array();
if(isset($_POST)) {
    if(empty($_SESSION['errors'])) {
        $room = new Room();
        $room->setId($_POST['roomNumber']);
        $roomdata = $room->getRoom()->fetch_all(MYSQLI_ASSOC);
    }
}
else {
    
}
echo json_encode($roomdata);