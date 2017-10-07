<?php
namespace Classes;

class Database {

    protected $dbc;

    protected function __construct($serverName,$userName,$DBPassword,$dbname,$port){
        try{
            $this->dbc = mysqli_connect($serverName, $userName, $DBPassword, $dbname,$port);
//            echo "DbDone";
        } catch (\Exception $e) {
//            echo "I FAILED";
            echo $e->getMessage();
        }
//        echo "DbAttemptDone ";
    }

    protected function buildSelectAll(Entity $object){
        return 'SELECT * FROM '.$object->tableName;
    }

    protected function runQuery($query){
        echo $query;
        return mysqli_query($this->dbc,$query);
    }

    public function escape_string($target){
      mysqli_real_escape_string($this->dbc,$target);
    }
//SELECT * FROM posts WHERE id = '1'SELECT * FROM posts WHERE id = '1'
//$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND status=:status');
//$stmt->execute(['email' => $email, 'status' => $status]);
    protected function buildSelectBy(Entity $object,array $parameters){
        $sql = $this->buildSelectAll($object);
        $i = 0;
        foreach($parameters as $key=>$value){
            if($i === 0){
                $sql .= ' WHERE ';
            } else {
                $sql .= ' AND ';
            }
            $sql .= $key." = '$value'";
        }
        echo $sql;
        return $sql;
    }
    
    public function __destruct() {
        mysqli_close($this->dbc)
        OR die("There was a problem disconnecting from the database.");
    }

}
?>
