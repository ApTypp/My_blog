<?php

namespace Classes;

class Vote extends Entity {

    public function __construct()
    {
        $this->setTableName('vote');
        parent::__construct();
    }

    public function getCurrentVote($post){
        $dbal = new DBAL();
        $user = new Users();
        if (empty($user->getUser())){
            return null;
        }
        return $dbal->selectBy(new \Classes\Vote(), ['post_id' => $post['id'], 'user_id' => $user->getUserId()])->fetch();

    }


}