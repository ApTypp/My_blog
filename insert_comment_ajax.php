<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header
$post = new \Classes\Post();
$result = $dbal->selectById($post,$_GET['id']);
if (!empty($result->fetch())){
$comment = new \Classes\Comment();
$validate = new \Classes\Validator();
$parameters = array(
    'post_id'=>$_GET['id'],
    'author'=>$username,
    'comments_body'=>$_GET['body'],
    'date_created'=>$date);
if ($validate->isValid(array('comment' => $_GET['body']),array('comment' => 'max_len,200|min_len,1'))){
$sql = $dbal->save($comment, $parameters);
} else {
    header('HTTP/1.1 500 '.substr($validate->errorMessage,0,-6));
}} else { header('HTTP/1.1 500 Do not try to change id, man');}
include_once(getRoot('/template/footer.php')); ?>