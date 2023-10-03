<?php

include_once __DIR__. '\..\database\Connection.php';
include_once __DIR__ .'\..\database\Operations.php';

class Student extends connection implements crud{
    private $id;
    private $Name;
    private $Email;
    private $Gender	;
    private $DateOfBirth;
    private $Password;
    private $FacultyId;
    private $Level	;
    private $Grade;
    private $created_at;
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

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Gender
     */ 
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * Set the value of Gender
     *
     * @return  self
     */ 
    public function setGender($Gender)
    {
        $this->Gender = $Gender;

        return $this;
    }

    /**
     * Get the value of DateOfBirth
     */ 
    public function getDateOfBirth()
    {
        return $this->DateOfBirth;
    }

    /**
     * Set the value of DateOfBirth
     *
     * @return  self
     */ 
    public function setDateOfBirth($DateOfBirth)
    {
        $this->DateOfBirth = $DateOfBirth;

        return $this;
    }

    /**
     * Get the value of Password
     */ 
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set the value of Password
     *
     * @return  self
     */ 
    public function setPassword($Password)
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * Get the value of FacultyId
     */ 
    public function getFacultyId()
    {
        return $this->FacultyId;
    }

    /**
     * Set the value of FacultyId
     *
     * @return  self
     */ 
    public function setFacultyId($FacultyId)
    {
        $this->FacultyId = $FacultyId;

        return $this;
    }

    /**
     * Get the value of Level
     */ 
    public function getLevel()
    {
        return $this->Level;
    }

    /**
     * Set the value of Level
     *
     * @return  self
     */ 
    public function setLevel($Level)
    {
        $this->Level = $Level;

        return $this;
    }

    /**
     * Get the value of Grade
     */ 
    public function getGrade()
    {
        return $this->Grade;
    }

    /**
     * Set the value of Grade
     *
     * @return  self
     */ 
    public function setGrade($Grade)
    {
        $this->Grade = $Grade;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    // get all students data 
    public function getStudentsData(){
        $query = "SELECT
        students.*,
        phones.Phone
    FROM
        students
    LEFT JOIN phones ON students.ID = phones.StudentId";
    return $this->runDQL($query);
    }
}