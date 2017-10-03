<?php
class Database {

    public $dbc;
    public $serverName = 'localhost';
    public $userName = 'dev';
    public $pass = 'thepassword1';
    public $dbName = 'blog';
    public $tableName = 'posts';
    public $sqlQuery;
    public $result;

    public function __construct(){
        $this->dbc = mysqli_connect($this->serverName, $this->userName, $this->pass, $this->dbName) OR die("There was a problem connecting to the database.");
    }

    public function selectAll()  {
        $this -> sqlQuery = 'SELECT * FROM '.$this -> tableName;
        $this -> result = mysqli_query($this->dbc,$this -> sqlQuery);
        return $this -> result;
    }

    public function __destruct() {
        mysqli_close($this->dbc)
        OR die("There was a problem disconnecting from the database.");
    }

}

?>
