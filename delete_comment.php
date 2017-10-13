<?php
include_once('config/env.php');
$dbal->deleteById($comment,$_GET['id']);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>