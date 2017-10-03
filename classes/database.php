<?php
class database {

    public $dbc, $serverName, $userName, $pass, $dbName, $tableName, $sqlQuery, $result;

    public function __construct(){
        $this -> serverName = 'localhost';
        $this -> userName = 'dev';
        $this -> pass = 'thepassword1';
        $this -> dbName = 'blog';
        $this -> tableName = 'posts';
        $this -> dbc = mysqli_connect($this->serverName, $this->userName, $this->pass, $this->dbName) OR die("There was a problem connecting to the database.");
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
