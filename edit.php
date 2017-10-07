<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); // Header ?>

    <?php

    $sql = $db->save($_POST['title'],$_POST['post'],$date,$_GET['id']);

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


<?php get_footer(); ?>