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
        $query = "SELECT * FROM posts";
        $result = mysqli_query($dbc,$query);

        while ($post = mysqli_fetch_assoc($result)) {
            ?>

            <div class="jumbotron jumbotron-fluid">
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