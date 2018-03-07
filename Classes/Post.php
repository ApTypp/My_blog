<?php
namespace Classes;


class Post extends Entity {

    public $posts;

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPosts(){
        $dbal = new DBAL();
        $this->posts = $dbal->selectAll($this)->fetchAll();
        ksort($this->posts);
        return $this->posts;
    }

}

?>