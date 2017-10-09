<?php
namespace Classes;

class ORM extends Database{

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

}
?>
