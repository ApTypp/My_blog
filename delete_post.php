<?php
include_once('config/env.php');
$post = new \Classes\Post();
$comment = new \Classes\Comment();
$dbal->deleteById($post,$_GET['id']);
$dbal->deleteBy($comment,array('post_id' => $_GET['id']));
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>