<?php

include_once __DIR__ . '\Connection.php';
class Validation extends connection
{
    private $name;
    private $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
    #Check if Value Of input is empty or not
    public function Required()
    {
        return (empty($this->value)) ? "$this->name Is Required" : "";
    }
    #Check if Value Of input is Unique or not
    public function Unique($table)
    {
        $query = "SELECT * FROM `$table` WHERE `$this->name` = '$this->value' ";
        $connection = new connection;
        $result = $connection->runDQL($query);
        return (empty($result)) ? "" : "This $this->name Is Already Exists";
    }
    public function RegExp($pattern)
    {
        return (preg_match($pattern, $this->value)) ? "" : "$this->name Is Invalid";
    }
    //    create method to check password confirmed
    public function confirmed($valueConfirmation): string
    {
        return ($this->value == $valueConfirmation) ? "" : "$this->name Not Confirmed";
    }
    //create method to check the input is string or not
    public function IsString(): string
    {
        return (is_string($this->value)) ? "" : "Please Enter String Value";
    }
}
