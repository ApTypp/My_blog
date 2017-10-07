<?php
namespace Classes;


class Post extends Entity {
//    public $tableName = 'Post';
    public $title;
    public $body;

    public function __construct()
    {
        parent::__construct();
    }



}


?>