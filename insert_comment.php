<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header

echo $_POST['body'];
echo $_POST['post_id'];

$parameters = array(
    'post_id'=>$_POST['post_id'],
    'author'=>'anonymous',   // Accounts is not ready yet
    'body'=>$_POST['body'],
    'date_created'=>$date);
$sql = $dbal->save($comment, '', $parameters);
header('Location: ' . $_SERVER['HTTP_REFERER']);
include_once(getRoot('/template/footer.php')); ?>