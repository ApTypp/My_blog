<?php
namespace Classes;

class DBAL extends Database{

    public function __construct($serverName,$userName,$DBPassword,$dbname,$port){
        parent::__construct($serverName,$userName,$DBPassword,$dbname,$port);
    }

    public function selectById(Entity $object,$id)  {
        return $this->selectBy($object,['id'=>$id]);
    }

    public function selectAll(Entity $object)  {
        return $this->runQuery($this->buildSelectAll($object));
    }

    public function selectBy(Entity $object,array $parameters)  {
        return $this->runQuery($this->buildSelectBy($object,$parameters));
    }

    public function deleteById(Entity $object, $id)  {

        return $this->runQuery($this->buildDeleteById($object,$id));
    }

//    public function editById($id,$post_title,$post,$date)
//    {
//        $this->sqlQuery = "UPDATE posts
//            SET title = '$post_title', post = '$post', add_date = '$date'
//            WHERE id = '$this->id'";
//        $this->result = mysqli_query($this->dbc, $this->sqlQuery);
//        return $this->result;
//    }

    public function save(Entity $object, $id, array $parameters)
    {
        if ($id == NULL) {
            echo 'id = 0, it works';
            return $this->runQuery($this->buildInsert($object, $parameters));
        }
            return $this->runQuery($this->buildEditById($object, $id , $parameters));
    }

}


?>