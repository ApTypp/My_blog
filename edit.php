<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); // Header ?>

    <?php


    // Delete the row
    $db->deleteRow($_GET['id']);

    // Add new values
    $sql = $db->insertRowId($_GET['id'],$_POST['title'],$_POST['post']);

    if($sql){
        ?>
        <div class="container">
            <h1 class="display-6">Amendments have been made successfully.</h1>
        </div>
    <?php }
    header('refresh:122.5,url=index.php')
    ?>

<?php include($_SERVER['DOCUMENT_ROOT'].D_TEMPLATE.'footer.php') //Footer ?>