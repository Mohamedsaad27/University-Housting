<?php
session_start();
include_once '../database/Validation.php';
include_once '../models/Room.php';
if(isset($_POST)) {
    $room = new Room();
    $room->setId($_POST['roomNumber']);
    $roomdata = $room->getRoom()->fetch_all(MYSQLI_ASSOC);
}
else {
    
}
echo json_encode($roomdata);