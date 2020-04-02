<?php

error_reporting(E_ALL & ~E_NOTICE);
function __autoload($className) {
    $className = str_replace('_', '/', $className);
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

function getDBAL(){
    $dbal = new \Classes\DBAL();
    return $dbal;
}
$dbal = getDBAL();

?>