<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header
$post = new \Classes\Post();
$result = $dbal->selectById($post,$_POST['post_id']);
if (!empty($result->fetch())){
$comment = new \Classes\Comment();
$validate = new \Classes\Validator();
$parameters = array(
    'post_id'=>$_POST['post_id'],
    'author'=>$username,
    'comments_body'=>$_POST['body'],
    'date_created'=>$date);
if ($validate->isValid(array('comment' => $_POST['body']),array('comment' => 'max_len,200|min_len,1'))){
$sql = $dbal->save($comment, '', $parameters);
header('Location: ' . $_SERVER['HTTP_REFERER']); }
else {
    echo '<div class="container">'.$validate->errorMessage.'</div>';
}} else { echo 'Do not try to change id, man';}
include_once(getRoot('/template/footer.php')); ?>