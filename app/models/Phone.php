<?php 

include_once __DIR__.'\..\database\Connection.php';
include_once __DIR__.'\..\database\Operations.php';

class Phone extends connection implements crud{
    private $id;
    private $StudentId;
    private $phone;
    private $type;

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

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}