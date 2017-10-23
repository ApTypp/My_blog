<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php'));
$post = new \Classes\Post();
$comment = new \Classes\Comment();
$result = $dbal->selectBy($post,array('id' => $_GET['id']));
$result = $result->fetch();
if ($result['author'] == $username){
$dbal->deleteById($post,$_GET['id']);
$dbal->deleteBy($comment,array('post_id' => $_GET['id']));
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>