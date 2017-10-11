<?php
require_once(__DIR__.'/../Classes/Database.php');
require_once(__DIR__.'/../Classes/Entity.php');
require_once(__DIR__.'/../Classes/Post.php');
require_once(__DIR__ . '/../Classes/DBAL.php');

// Site Title
$site_title = 'qwe';

//Date and time
date_default_timezone_set('Europe/Riga');
$date = date('Y-m-d H:i:s', time());

function getRoot($toWhere){
    return __DIR__.'/..'.$toWhere;
}

function getDBAL()
{
    $serverAddress = 'localhost';
    $userName = 'dev';
    $DBPassword = '';
    $dbName = 'blog';
    $port = 3306;

    $dbal = new \Classes\DBAL($serverAddress, $userName, $DBPassword, $dbName,$port);
    return $dbal;
}
$dbal = getDBAL();

