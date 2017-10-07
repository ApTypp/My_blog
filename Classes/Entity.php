<?php
namespace Classes;

class Entity {
    public $tableName;

    public $id;
    public $date_created;
    public $date_modified;

    protected function __construct()
    {
        if($this->tableName === null){
            $this->tableName = strtolower(get_class($this)).'s';
        }
    }
}


?>