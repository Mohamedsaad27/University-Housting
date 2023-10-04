<?php

include_once __DIR__. '\..\database\Connection.php';
include_once __DIR__ .'\..\database\Operations.php';

class Student extends connection implements crud{
    private $id;
    private $StudentId;
    private $First_Name;
    private $Last_Name;
    private $Email;
    private $Gender	;
    private $Password;
    private $FacultyId;
    private $created_at;
    public function Create(){
    $query = "INSERT INTO `students`(
    `Student_Id`,
    `First_Name`,
    `Last_Name`,
    `Email`,
    `Gender`,
    `Password`,
)
VALUES(
    '$this->StudentId,'$this->First_Name','$this->Last_Name',
       '$this->Email','$this->Gender','$this->Password'
)";
    return $this->runDML($query);

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

    public function getAllStudents(){
        $query = "SELECT * FROM `students`";
        return $this->runDQL($query);
    }

    /**
     * Get the value of First_Name
     */ 
    public function getFirst_Name()
    {
        return $this->First_Name;
    }

    /**
     * Set the value of First_Name
     *
     * @return  self
     */ 
    public function setFirst_Name($First_Name)
    {
        $this->First_Name = $First_Name;

        return $this;
    }

    /**
     * Get the value of Last_Name
     */ 
    public function getLast_Name()
    {
        return $this->Last_Name;
    }

    /**
     * Set the value of Last_Name
     *
     * @return  self
     */ 
    public function setLast_Name($Last_Name)
    {
        $this->Last_Name = $Last_Name;

        return $this;
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
}