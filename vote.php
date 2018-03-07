<?php include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header

// Getting variables
$votecount = $_GET['count'];
$uvselected = $_GET['uvselected'];
$dvselected = $_GET['dvselected'];
$postId = $_GET['id'];

$post = new \Classes\Post();

// information about user
$user_class = new \Classes\Users();
$result = $dbal->selectBy($user_class,['username' => $_SESSION['username']]);
$user = $result->fetch();

// Information adout post vote
$vote_class = new \Classes\Vote();
$result = $dbal->selectBy($vote_class,['post_id'=>$postId, 'user_id' => $user['id']]);
$vote = $result->fetch();

// Set status
$status = 0;
if ($uvselected == 1){
    $status = 1;
} elseif ($dvselected == 1){
    $status = -1;
}

// Check current status of users vote
if (empty($vote)){
    // Save vote and votecount
    $dbal->save($vote_class, ['user_id' => $user['id'], 'post_id' => $postId, 'status' => $status]);
} else {
    $dbal->save($vote_class, ['id'=> $vote['id'],'status' => $status]);
}
$dbal->save($post, ['id'=>$postId, 'votecount' => $votecount]);

include_once(getRoot('/template/footer.php')); ?>