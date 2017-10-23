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
}
    if(!empty($sql)) {
        ?>
        <div class="container">
            <h1 class="display-6">Amendments have been made successfully.</h1>
        </div>
        <?php
    }

    else { ?>
        <div class="container">
            <h1 class="display-6">Nope</h1>
        </div>
        <?php
    }
//        header('refresh:1,url=index.php');
    ?>


<?php include_once(getRoot('/template/footer.php')); ?>