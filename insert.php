<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); // Header

    $post_title = mysqli_real_escape_string($dbc,$_POST['title']);
    $post = mysqli_real_escape_string($dbc,$_POST['post']);

    $sql = "INSERT INTO posts (title, post) VALUES ('$post_title','$post')";
    if(mysqli_query($dbc, $sql)){
        ?>
        <div class="container">
            <h1 class="display-6"><?php echo "Records inserted successfully.";?></h1>
        </div>
    <?php } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
    }
    header('refresh:1,url=index.php');

    include($_SERVER['DOCUMENT_ROOT'].D_TEMPLATE.'footer.php') //Footer ?>