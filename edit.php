<?php include('config/setup.php');?>

<!DOCTYPE HTML>
<html>
<head>

    <?php include('config/css.php') ?>
    <?php include('config/js.php') ?>

    <!-- BOOTSTRAP NAV BAR -->
    <?php include(D_TEMPLATE.'/navigation.php') //Navigation Bar?>

    <?php
    $post_title = mysqli_real_escape_string($dbc,$_POST['title']);
    $post = mysqli_real_escape_string($dbc,$_POST['post']);

    // Delete the row
    $id = correct_id($_GET['id']);
    $del = "DELETE FROM posts WHERE id = $id";
    mysqli_query($dbc, $del);

    // Add new values
    $post_title = mysqli_real_escape_string($dbc,$_POST['title']);
    $post = mysqli_real_escape_string($dbc,$_POST['post']);
    $sql = "INSERT INTO posts (id, title, post) VALUES ('$id','$post_title','$post')";
    if(mysqli_query($dbc, $sql)){
        ?>
        <div class="container">
            <h1 class="display-6"><?php echo "Amendments have been made successfully.";?></h1>
        </div>
    <?php } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
    }
    header('refresh:122.5,url=index.php')
    ?>

</head>
</html>
