<?php
namespace Classes;


class Post extends Entity {

    public $title;
    public $body;

    public function __construct()
    {
        parent::__construct();
    }

}

?>