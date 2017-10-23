<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header

$comment = new \Classes\Comment();
$validate = new \Classes\Validator();
$parameters = array(
    'post_id'=>$_POST['post_id'],
    'author'=>$username,
    'comments_body'=>$_POST['body'],
    'date_created'=>$date);
if ($validate->isValid(array('comment' => $_POST['body']),array('comment' => 'required|max_len,200|min_len,1'))){
$sql = $dbal->save($comment, '', $parameters);
header('Location: ' . $_SERVER['HTTP_REFERER']); }
else {
    echo $validate->errorMessage;
}
include_once(getRoot('/template/footer.php')); ?>