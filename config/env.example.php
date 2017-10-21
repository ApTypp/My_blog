<?php

function __autoload($className) {
    $className = str_replace('..', '', $className);
    require_once("$className.php");
}

// Site Title
$site_title = 'Blog';

//Date and time
date_default_timezone_set('Europe/Riga');
$date = date('Y-m-d H:i:s', time());

function getRoot($toWhere){
    return __DIR__.'/..'.$toWhere;
}

function getDBAL()
{
    $serverAddress = 'localhost';
    $userName = '';
    $DBPassword = '';
    $dbName = '';
    $port = 3306;

    $dbal = new \Classes\DBAL($serverAddress, $userName, $DBPassword, $dbName,$port);
    return $dbal;
}
$dbal = getDBAL();

?>