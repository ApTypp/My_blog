<?php
class Database {

    protected $dbc;
    public $serverName = 'localhost';
    public $userName = 'dev';
    public $pass = 'thepassword1';
    public $dbName = 'blog';
    public $tableName = 'posts';
    public $id = '1';
    public $sqlQuery;
    public $result;
    public $post;

    public function __construct(){
        $this->dbc = mysqli_connect($this->serverName, $this->userName, $this->pass, $this->dbName) OR die("There was a problem connecting to the database.");
    }

    public function correctId($page_id){ // Function returns id as a number without characters and not empty
        $page_id = preg_replace('~[^0-9]+~','',$page_id);
        if($page_id == NULL) { $page_id = 1; }
        return $page_id;
    }

    public function escape_string($target){
        $this->result = mysqli_real_escape_string($this->dbc,$target);
        return $this->result;
    }

    public function selectAll()  {
        $this->sqlQuery = 'SELECT * FROM '.$this -> tableName;
        $this->result = mysqli_query($this->dbc,$this -> sqlQuery);
        return $this -> result;
    }

    public function selectId($id)  {
        $id = $this->correctId($id);
        $this->sqlQuery = 'SELECT * FROM '.$this -> tableName.' WHERE id = '.$id;
        $this->result = mysqli_query($this->dbc,$this -> sqlQuery);
        $this->post=mysqli_fetch_assoc($this -> result);
        return $this -> post;
    }

    public function insertRow($post_title,$post,$date)  {
        $post_title = $this->escape_string($post_title);
        $post = $this->escape_string($post);
        $this->sqlQuery = "INSERT INTO posts (title, post, add_date) VALUES ('$post_title','$post', '$date')";
        $this->result = mysqli_query($this->dbc,$this -> sqlQuery);
        return $this->result;
    }

    /*  public function insertRowId($id,$post_title,$post)  {
        $post_title = $this->escape_string($post_title);
        $post = $this->escape_string($post);
        $id = $this->correctId($id);
        $this->sqlQuery = "INSERT INTO posts (id,title, post) VALUES ('$id','$post_title','$post')";
        $this->result = mysqli_query($this->dbc,$this -> sqlQuery);
        return $this->result;
     } */

    public function deleteRow($id)  {
        $id = $this->correctId($id);
        $this->sqlQuery = "DELETE FROM posts WHERE id = $id";
        $this->result = mysqli_query($this->dbc,$this -> sqlQuery);
        return $this->result;
    }

    public function editRow($id,$post_title,$post,$date)  {
        $post_title = $this->escape_string($post_title);
        $post = $this->escape_string($post);
        $this->id = $this->correctId($id);
        $this->sqlQuery = "UPDATE posts 
        SET title = '$post_title', post = '$post', add_date = '$date'
        WHERE id = '$this->id'";
        $this->result = mysqli_query($this->dbc,$this -> sqlQuery);
        return $this->result;
    }

    public function save($post_title,$post,$date,$id){
        if ($id == NULL) {
            $this->result = $this->insertRow($post_title,$post,$date);
        }
        else
        {
            $this->result = $this->editRow($id,$post_title,$post,$date);
        }
        return $this->result;
    }

    public function __destruct() {
        mysqli_close($this->dbc)
        OR die("There was a problem disconnecting from the database.");
    }

}
$db = new Database();
?>
