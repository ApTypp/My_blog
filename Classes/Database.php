<?php
namespace Classes;

class Database extends \PDO {

    public function __construct($serverName,$userName,$DBPassword,$dbname,$port){
        $dsn='mysql:dbname='.$dbname.';host='.$serverName;
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        parent::__construct($dsn,$userName,$DBPassword,$opt);
    }

    protected function buildSelectAll(Entity $object){
        return 'SELECT * FROM '.$object->tableName;
    }

    protected function buildDeleteById($object){
        return 'DELETE FROM '.$object->tableName.' WHERE id = ?';
    }

    protected function buildEditById(Entity $object, $id, array $parameters){
        $sql = "UPDATE $object->tableName SET ";
        $values = array();
        foreach ($parameters as $key=>$value){
            $sql .= $key." = ?, ";
            array_push($values, $value);
        }
        $sql = rtrim($sql,", ");
        $sql .= ' WHERE id = ?';
        array_push($values, $id);
        $stmt = $this->prepare($sql);
        $stmt->execute($values);
        echo $sql.'<br />';
        var_dump($values);
        return $stmt;
    }

    protected function buildInsert(Entity $object, array $parameters){
        $sql = "INSERT INTO $object->tableName (";
        $values = array();
        //INSERT INTO posts (title, post, add_date) VALUES ('$post_title','$post', '$date')
        foreach ($parameters as $key=>$value){
            $sql .= $key.",";
            array_push($values, $value);
        }
        $sql = rtrim($sql,",");
        $sql .= ') VALUES (';
        foreach ($parameters as $key=>$value){
            $sql .= "?,";
        }
        $sql = rtrim($sql,",");
        $sql .= ')';
        $stmt = $this->prepare($sql);
        $stmt->execute($values);
        echo $sql.'<br />';
        var_dump($values);
        return $stmt;
    }

    protected function runQuery($query){
        return mysqli_query($this->dbc,$query);
    }

    public function escape_string($target){
        mysqli_real_escape_string($this->dbc,$target);
    }

    protected function buildSelectBy(Entity $object,array $parameters){
        $sql = $this->buildSelectAll($object);
        $i = 0;
        $values = array();
        foreach($parameters as $key=>$value){
            if($i === 0){
                $sql .= ' WHERE ';
                $sql .= $key." = ?";
            } else {
                $sql .= ' AND ';
                $sql .= $key." = ?";
            }
            $i++;
            array_push($values, $value);
        }
        $stmt = $this->prepare($sql);
        $stmt->execute($values);
        echo $sql.'<br />';
        var_dump($values);
        return $stmt;
    }

}
?>
