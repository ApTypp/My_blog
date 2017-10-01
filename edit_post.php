<?php include('config/setup.php');?>

<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo 'Posts | '.$site_title; ?></title>

    <?php include('config/css.php') ?>
    <?php include('config/js.php') ?>
</head>

<body>
<?php include(D_TEMPLATE.'/navigation.php') //Navigation Bar?>

<div class="container">

    <?php
    //$query = "SELECT * FROM posts";
    //$result = mysqli_query($dbc,$query);
    $id = correct_id($_GET['id']);
    $result = data_post_id($dbc,$id);
    $post = mysqli_fetch_assoc($result);
    ?>

    <form action="edit.php?id=<?php echo $id ?>" method="post">
        <!-- Title -->
        <div class="form-group">
            <label for="title">Title for post</label>
            <textarea class="form-control" id="title" rows="1" name="title"><?php echo htmlspecialchars( $post['title']);?></textarea>
        </div>
        <!-- Main post text -->
        <div class="form-group">
            <label for="post">Main text</label>
            <textarea class="form-control" id="post" rows="3" name="post"><?php echo htmlspecialchars( $post['post']);?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a class="btn btn-secondary" href="index.php">Cancel</a>
    </form>
</div>

<?php include(D_TEMPLATE.'/footer.php') //Footer?>
</body>
</html>