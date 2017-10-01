<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/config/setup.php'); ?>

<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo 'Posts | '.$site_title; ?></title>

    <?php include('config/css.php') ?>
    <?php include('config/js.php') ?>
</head>


    <?php include(D_TEMPLATE.'/navigation.php') //Navigation Bar?>
<body>
    <div class="container">

        <?php
        $result = data_post($dbc);

        while ($post = mysqli_fetch_assoc($result)) {
            ?>

            <div class="jumbotron jumbotron-fluid" style="overflow-x:hidden">
                <div class="btn-group d-flex align-items-end flex-column" style="right: 10px; top: -45px;">
                    <button class="btn btn-secondary btn-sm dropdown-toggle p-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ...
                    </button>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" href="read_post.php?id=<?php echo $post['id'] ?>">Read</a>
                        <a class="dropdown-item" href="edit_post.php?id=<?php echo $post['id'] ?>">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="delete_post.php?id=<?php echo $post['id'] ?>">Delete</a>
                    </div>
                </div>
                    <div class="container">
                        <h1 class="display-6"><?php echo htmlspecialchars( $post['title']);?> </h1>
                        <p class="lead"><?php echo htmlspecialchars( $post['post']);?> </p>
                    </div>
            </div>
        <?php } ?>

    </div>

    <?php include(D_TEMPLATE.'/footer.php') //Footer?>

</body>

</html>