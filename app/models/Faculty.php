<?php

include_once __DIR__ .'\..\database\Connection.php';
include_once __DIR__ .'\..\database\Operations.php';

class Faculty extends connection implements crud {
    private $id;
    private $Name;

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

    /**
     * Get the value of Name
     */ 
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */ 
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    public function getAllFaculties(){
        $query = "SELECT * FROM `faculties`";
        return $this->runDQL($query);
    }
}