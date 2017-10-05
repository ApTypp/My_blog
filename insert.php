<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); // Header

    $result = $db->insertRow($_POST['title'],$_POST['post'], $date);
    if($result){
        ?>
        <div class="container">
            <h1 class="display-6"><?php echo "Records inserted successfully.";?></h1>
        </div>
    <?php } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
    }
    header('refresh:11,url=index.php');

    get_footer(); //Footer ?>