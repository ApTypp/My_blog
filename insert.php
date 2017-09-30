<?php include('config/setup.php');?>

<!DOCTYPE HTML>
<html>
<head>

    <?php include('config/css.php') ?>
    <?php include('config/js.php') ?>

    <!-- BOOTSTRAP NAV BAR -->
    <?php include(D_TEMPLATE.'/navigation.php') //Navigation Bar?>

    <?php $sql = "INSERT INTO posts (title, post) VALUES ('$_POST[title]','$_POST[post]')";
    if(mysqli_query($dbc, $sql)){
        ?>
        <div class="container">
            <h1 class="display-6"><?php echo "Records inserted successfully.";?></h1>

        </div>
    <?php } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
    }
    header('refresh:1.5,url=index.php')
    ?>

</head>
</html>
