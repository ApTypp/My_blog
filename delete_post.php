<?php
include_once('config/env.php');
$post = new \Classes\Post();
$dbal->deleteById($post,$_GET['id']);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>