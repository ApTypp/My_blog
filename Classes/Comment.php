<?php
namespace Classes;


class Comment extends Entity {

    public $post_id;
    public $body;
    public $author = 'Unknown';

    public function __construct()
    {
        $this->setTableName('comments');
        parent::__construct();
    }

    public function getPostComments($post){
        $dbal = new DBAL();
        return $dbal->selectBy($this,['post_id' => $post['id']])->fetchAll();
    }

}

?>