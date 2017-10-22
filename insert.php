<?php include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header
$post = new \Classes\Post();
$parameters = array(
    'title'=>$_POST['title'],
    'body'=>$_POST['post'],
    'author'=>$username,
    'date_created'=>$date);
$sql = $dbal->save($post, '', $parameters);
header('Location: index.php');

include_once(getRoot('/template/footer.php')); ?>