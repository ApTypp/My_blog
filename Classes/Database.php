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

    protected function buildDeleteById(Entity $object,$id){
        return 'DELETE FROM '.$object->tableName.' WHERE id = '.$id;
    }

    protected function buildEditById(Entity $object, $id, array $parameters){
        $sql = "UPDATE $object->tableName SET ";

        foreach ($parameters as $key=>$value){
            $sql .= $key." = '$value', ";
        }
        $sql = rtrim($sql,", ");
        $sql .= ' WHERE id = '.$id;
        echo $sql;
        return $sql;
    }

    protected function buildInsert(Entity $object, array $parameters){
        $sql = "INSERT INTO $object->tableName (";
        //INSERT INTO posts (title, post, add_date) VALUES ('$post_title','$post', '$date')
        foreach ($parameters as $key=>$value){
            $sql .= $key.",";
        }
        $sql = rtrim($sql,",");
        $sql .= ') VALUES (';
        foreach ($parameters as $key=>$value){
            $sql .= "'$value',";
        }
        $sql = rtrim($sql,",");
        $sql .= ')';
        echo $sql;
        return $sql;
    }
//            SET title = '$post_title', post = '$post', date_created = '$date_modified'
//            WHERE id = '$id'";
//        "UPDATE posts
//        SET title = '$post_title', post = '$post', add_date = '$date'
//        WHERE id = '$this->id'";

    protected function runQuery($query){
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

}
?>
