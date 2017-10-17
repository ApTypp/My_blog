<?php
include_once('config/env.php');
$comment = new \Classes\Comment();
$dbal->deleteById($comment,$_GET['id']);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>