<?php

include_once __DIR__ .'\..\database\Connection.php';
include_once __DIR__ .'\..\database\Operations.php';

class Booking extends connection implements crud {
    private $id;
    private $RoomId;
    private $StudentId;
    private $StartDate;
    private $EndDate;
    private $ApprovalStatus;
    private $AdminId;

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

    public function addBooking() {
        $query = "INSERT INTO `booking`(`RoomId`, `StudentId`, `StartDate`, `EndDate`, `ApprovalStatus`) VALUES
        ('$this->RoomId','$this->StudentId','$this->StartDate','$this->EndDate','Pending')";
        return $this->runDML($query);
    }

    /**
     * Set the value of RoomId
     *
     * @return  self
     */ 
    public function setRoomId($RoomId)
    {
        $this->RoomId = $RoomId;

        return $this;
    }

    /**
     * Get the value of RoomId
     */ 
    public function getRoomId()
    {
        return $this->RoomId;
    }

    /**
     * Get the value of StudentId
     */ 
    public function getStudentId()
    {
        return $this->StudentId;
    }

    /**
     * Set the value of StudentId
     *
     * @return  self
     */ 
    public function setStudentId($StudentId)
    {
        $this->StudentId = $StudentId;

        return $this;
    }

    /**
     * Get the value of StartDate
     */ 
    public function getStartDate()
    {
        return $this->StartDate;
    }

    /**
     * Set the value of StartDate
     *
     * @return  self
     */ 
    public function setStartDate($StartDate)
    {
        $this->StartDate = $StartDate;

        return $this;
    }

    /**
     * Get the value of EndDate
     */ 
    public function getEndDate()
    {
        return $this->EndDate;
    }

    /**
     * Set the value of EndDate
     *
     * @return  self
     */ 
    public function setEndDate($EndDate)
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    /**
     * Get the value of ApprovalStatus
     */ 
    public function getApprovalStatus()
    {
        return $this->ApprovalStatus;
    }

    /**
     * Set the value of ApprovalStatus
     *
     * @return  self
     */ 
    public function setApprovalStatus($ApprovalStatus)
    {
        $this->ApprovalStatus = $ApprovalStatus;

        return $this;
    }

    /**
     * Get the value of AdminId
     */ 
    public function getAdminId()
    {
        return $this->AdminId;
    }

    /**
     * Set the value of AdminId
     *
     * @return  self
     */ 
    public function setAdminId($AdminId)
    {
        $this->AdminId = $AdminId;

        return $this;
    }
}