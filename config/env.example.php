<?php
echo "Env included";
require_once(__DIR__.'/../Classes/Database.php');
require_once(__DIR__.'/../Classes/Entity.php');
require_once(__DIR__.'/../Classes/Post.php');
require_once(__DIR__.'/../Classes/ORM.php');

// Site Title
$site_title = 'qwe';

//Date and time
date_default_timezone_set('Europe/Riga');
$date = date('H:i, d.m.y', time());

function getRoot($toWhere){
    return __DIR__.'/..'.$toWhere;
}

function getORM()
{
    $serverAddress = '3213213.0.0.1';
    $userName = '123';
    $DBPassword = '123213';
    $dbName = 'a1231rtb';
    $port = 3306;

    $orm = new \Classes\ORM($serverAddress, $userName, $DBPassword, $dbName,$port);
    return $orm;
}
echo "Pre create DB";
$orm = getORM();

