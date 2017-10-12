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
        $stmt = $this->query($this->buildSelectAll($object));
        return $stmt; //->fetch(\PDO::FETCH_ASSOC);
    }

    public function selectBy(Entity $object,array $parameters)  {
        return $this->buildSelectBy($object,$parameters);
    }

    public function deleteById(Entity $object, $id)  {
        $stmt = $this->prepare($this->buildDeleteById($object));
        $stmt->execute([$id]);
        return $stmt;
    }

    public function save(Entity $object, $id, array $parameters)
    {
        if ($id == NULL) {
//            echo 'id = 0, it works';
            return $this->buildInsert($object, $parameters);
        }
            return $this->buildEditById($object, $id , $parameters);
    }

}


?>