<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>

    <?php
    $post = new \Classes\Post();
$result = $dbal->selectBy($post,array('id' => $_GET['id']));
$result = $result->fetch();
if ($result['author'] == $username) {
    $parameters = array(
        'title' => $_POST['title'],
        'body' => $_POST['post'],
        'date_modified' => $date);
    $sql = $dbal->save($post, $_GET['id'], $parameters);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else { ?>
        <div class="container">
            <h1 class="display-6">Nope</h1>
        </div>
        <?php }
        include_once(getRoot('/template/footer.php')); ?>