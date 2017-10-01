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

            <div class="jumbotron jumbotron-fluid" style="overflow-x:hidden">
                <div class="btn-group d-flex align-items-end flex-column" style="right: 10px; top: -45px;" ">
                    <button class="btn btn-secondary btn-sm dropdown-toggle p-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ...
                    </button>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" href="#">Read</a>
                        <a class="dropdown-item" href="#">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Delete</a>
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