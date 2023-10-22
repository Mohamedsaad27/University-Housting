<?php 

class connection{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'housingdb';
    private $connection;
    
    public function __construct() {
        $this->connection =  new mysqli($this->servername, $this->username, $this->password, $this->database);
    }
    // To run DML queries => create,update,delete,insert
    public function runDML(string $query) : bool
    {
        $result = $this->connection->query($query);
        if($result){
            return true;
        }
        return false;
    }

    // To run DQL queries => SELECT
    public function runDQL($query){
        $result = $this->connection->query($query);
        if($result->num_rows > 0){
            return $result;
        }else{
            return [];
        }
    }
}