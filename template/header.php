<?php
include_once('../My_blog/config/env.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo 'Posts lol| '.$site_title; ?></title>

    <?php include(getRoot('/config/css.php')); ?>
    <?php include(getRoot('/config/js.php')); ?>
</head>


<?php include(getRoot('/template/navigation.php')); //Navigation Bar?>
<body>