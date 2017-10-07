<?php
require_once(__DIR__.'/../classes/Database.php');
require_once(__DIR__.'/../classes/Posts.php');
function getRoot($toWhere){
    return __DIR__.'/..'.$toWhere;
}

function getDB()
{
    $serverAddress = '127.0.0.1';
    $userName = 'root';
    $DBPassword = 'secret';
    $dbName = 'artb';
    $port = 3306;

    $database = new Database($serverAddress, $userName, $DBPassword, $dbName,$port);
    return $database;
}

$db = getDB();

