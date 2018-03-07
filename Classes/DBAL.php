<?php
namespace Classes;

class DBAL extends Database{

    public function __construct(){
        parent::__construct();
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
        return $this->buildDeleteBy($object,array('id' => $id));
    }

    public function deleteBy(Entity $object, array $parameters){
        return $this->buildDeleteBy($object,$parameters);
    }

    public function save(Entity $object, array $parameters)
    {
        if ($parameters['id'] == NULL) {
            return $this->buildInsert($object, $parameters);
        }
            return $this->buildEditById($object, $parameters['id'], $parameters);
    }

    public function isFieldUnique ($object, array $parameters) {
        $stmt = $this->selectBy($object,$parameters);
        if ($stmt->fetch()){
            return false;
        }
        return true;
    }

    public function HandleError($error){
        $this->error_message = $error;
    }

}

?>