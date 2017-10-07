<?php
namespace Classes;

abstract class Entity {
    public $tableName;

    public $id;
    public $date_created;
    public $date_modified;

    protected function __construct()
    {
        if($this->tableName === null){
//            echo $this->tableName;
            $this->tableName = strtolower((new \ReflectionClass($this))->getShortName()).'s';
        }
    }
}


?>