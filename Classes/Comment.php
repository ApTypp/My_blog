<?php
namespace Classes;


class Comment extends Entity {

    public $post_id;
    public $body;
    public $author = 'Unknown';

    public function __construct()
    {
        parent::__construct();
    }

}
$comment = new \Classes\Comment();
$comment->tableName = 'comments';
?>