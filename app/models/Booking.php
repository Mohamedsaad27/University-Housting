<?php

include_once __DIR__ .'\..\database\Connection.php';
include_once __DIR__ .'\..\database\Operations.php';

class Booking extends connection implements crud {
    private $id;

    public function Create(){
    }
    public function Read(){   
    }
    public function Update(){
    }
    public function Delete(){ 
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getAllBookings() {
        $query = "SELECT `booking`.`ID` , `students`.`Student_Id` , `students`.`Name` , `rooms`.`Room_Id` , `rooms`.`NumberOfBeds` , `booking`.`StartDate` , `phones`.`Phone` 
        FROM `booking` INNER JOIN `students` ON `students`.`ID` = `booking`.`StudentId` INNER JOIN `rooms` ON `rooms`.`ID` = `booking`.`RoomId`
        INNER JOIN `phones` ON `phones`.`StudentId` = `booking`.`StudentId`";
        return $this->runDQL($query);
    }
}