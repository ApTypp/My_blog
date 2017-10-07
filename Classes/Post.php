<?php
namespace Classes;


class Post extends Entity {
    public $tableName;
    public $title;
    public $body;

    public function __construct()
    {
        parent::__construct();
    }

}


?>