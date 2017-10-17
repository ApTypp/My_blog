<?php
namespace Classes;


class Comment extends Entity {

    public $post_id;
    public $body;
    public $author = 'Unknown';

    public function __construct()
    {
        $this->tableName='comments';
        parent::__construct();
    }

}

?>