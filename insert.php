<?php include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header
$post = new \Classes\Post();
$validate = new \Classes\Validator();
$parameters = array(
    'title'=>$_POST['title'],
    'body'=>$_POST['post'],
    'author'=>$username,
    'date_created'=>$date);
if ($validate->isValid(array('title'=>$_POST['title'], 'post' => $_POST['post']),array('title' => 'max_len,200|min_len,1', 'post' => 'max_len,1000|min_len,1'))){
$sql = $dbal->save($post, '', $parameters);
header('Location: index'); } else {
    echo '<div class="container">'.$validate->errorMessage.'</div>';
}

include_once(getRoot('/template/footer.php')); ?>