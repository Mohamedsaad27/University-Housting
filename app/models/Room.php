<?php

include_once __DIR__ .'\..\database\Connection.php';
include_once __DIR__ .'\..\database\Operations.php';

class Room extends connection implements crud {
    private $id;
    private $NumberOfBeds;
    private $Price;
    private $Room_Id;
    private $AvailabilityStatus;
    private $FoodStatus;
    private $creted_at;
    
    public function Create(){
        $query = "INSERT INTO `rooms`(`Room_Id`, `NumberOfBeds`, `Price`, `AvailabilityStatus`, `FoodStatus`) 
        VALUES ('$this->Room_Id','$this->NumberOfBeds','$this->Price','$this->AvailabilityStatus','$this->FoodStatus')";
        return $this->runDML($query);
    }
    public function Read(){
        $query = "";
        return $this->runDQL($query);
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

    /**
     * Get the value of NumberOfBeds
     */ 
    public function getNumberOfBeds()
    {
        return $this->NumberOfBeds;
    }

    /**
     * Set the value of NumberOfBeds
     *
     * @return  self
     */ 
    public function setNumberOfBeds($NumberOfBeds)
    {
        $this->NumberOfBeds = $NumberOfBeds;

        return $this;
    }

    /**
     * Get the value of Price
     */ 
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * Set the value of Price
     *
     * @return  self
     */ 
    public function setPrice($Price)
    {
        $this->Price = $Price;

        return $this;
    }

    /**
     * Get the value of AvailabilityStatus
     */ 
    public function getAvailabilityStatus()
    {
        return $this->AvailabilityStatus;
    }

    /**
     * Set the value of AvailabilityStatus
     *
     * @return  self
     */ 
    public function setAvailabilityStatus($AvailabilityStatus)
    {
        $this->AvailabilityStatus = $AvailabilityStatus;

        return $this;
    }

    /**
     * Get the value of FoodStatus
     */ 
    public function getFoodStatus()
    {
        return $this->FoodStatus;
    }

    /**
     * Set the value of FoodStatus
     *
     * @return  self
     */ 
    public function setFoodStatus($FoodStatus)
    {
        $this->FoodStatus = $FoodStatus;

        return $this;
    }

    /**
     * Get the value of creted_at
     */ 
    public function getCreted_at()
    {
        return $this->creted_at;
    }

    /**
     * Set the value of creted_at
     *
     * @return  self
     */ 
    public function setCreted_at($creted_at)
    {
        $this->creted_at = $creted_at;

        return $this;
    }

    /**
     * Get the value of Room_Id
     */ 
    public function getRoom_Id()
    {
        return $this->Room_Id;
    }

    /**
     * Set the value of Room_Id
     *
     * @return  self
     */ 
    public function setRoom_Id($Room_Id)
    {
        $this->Room_Id = $Room_Id;

        return $this;
    }

    // get all room data 
    public function getRoomsData(){
        $query = "SELECT * FROM `rooms`";
        return $this->runDQL($query);
    }

    public function getOccupiedRooms() {
        $query = "SELECT * FROM `rooms` where `AvailabilityStatus` = 'Occupied'";
        return $this->runDQL($query);
    }

}
