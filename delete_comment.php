<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php'));
$comment = new \Classes\Comment();
$result = $dbal->selectBy($comment,array('id' => $_GET['id']));
$result = $result->fetch();
if ($result['author'] == $username) {
$dbal->deleteById($comment,$_GET['id']); }
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>