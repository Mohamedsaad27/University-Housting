<?php 
// include_once __DIR__ .'\database\Connection';
// include_once __DIR__ .'\database\Operations';
include_once '../database/Connection.php';
include_once '../database/Operations.php';
class Admin extends connection implements crud {
    private $id;
    private $first_name;
    private $last_name;
    private $grand_name;
    private $email;
    private $gender;
    private $phone;
    private $password;
    private $created_at;

    public function Create(){

    }
    public function Read(){
        
    }
    public function Update(){
        $query = "UPDATE admins SET First_Name = '$this->first_name',Last_name ='$this->last_name',Grand_Name  = '$this->grand_name',
        phone = '$this->phone' , Gender = '$this->gender'  WHERE Email = '$this->email' ";
        return $this->runDML($query);
    }
    public function Delete(){
        
    }
    public function getAdminByEmail(){
        $query = "SELECT * FROM admins WHERE email = '$this->email' ";
        return $this->runDQL($query);
    }

    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

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
    // create function to check if admin is exists or not 
    public function Login(){
        $query = "SELECT * FROM admins WHERE  `Email` = '$this->email' AND `Password` = '$this->password' ";
        return $this->runDQL($query);
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of grand_name
     */ 
    public function getGrand_name()
    {
        return $this->grand_name;
    }

    /**
     * Set the value of grand_name
     *
     * @return  self
     */ 
    public function setGrand_name($grand_name)
    {
        $this->grand_name = $grand_name;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

}