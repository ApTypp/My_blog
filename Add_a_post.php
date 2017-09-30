<?php include('config/setup.php');?>

<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo  'Add a Post | '.$site_title; ?></title>

    <?php include('config/css.php') ?>
    <?php include('config/js.php') ?>
</head>

<body>

<!-- BOOTSTRAP NAV BAR -->
<?php include(D_TEMPLATE.'/navigation.php') //Navigation Bar?>

<form action="insert.php" method="post">
    <div class="container">
        <h4>What are you thinking about?</h4>
        <!-- Title -->
        <div class="form-group">
            <label for="title">Title for post</label>
            <textarea class="form-control" id="title" rows="1" name="title"></textarea>
        </div>
        <!-- Main post text -->
        <div class="form-group">
            <label for="post">Main text</label>
            <textarea class="form-control" id="post" rows="3" name="post"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" onclick="<?php echo $_POST['title'] ?>">Create a post</button>
        <button type="reset" class="btn btn-secondary">Clear</button>
    </div>
</form>




<?php include(D_TEMPLATE.'/footer.php') //Footer?>

</body>



</html>