<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>

    <?php
    $post = new \Classes\Post();
    $parameters = array(
    'title'=>$_POST['title'],
    'body'=>$_POST['post'],
    'date_modified'=>$date);
    $sql = $dbal->save($post, $_GET['id'], $parameters);

    if($sql) {
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
        header('refresh:1,url=index.php');
    ?>


<?php include_once(getRoot('/template/footer.php')); ?>