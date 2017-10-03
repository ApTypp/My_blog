<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); // Header ?>

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

<?php include($_SERVER['DOCUMENT_ROOT'].D_TEMPLATE.'footer.php') //Footer ?>