<?php

namespace Classes;

class Vote extends Post {

    public $tableName = 'vote';

    public function __construct()
    {
        parent::__construct();
    }
}