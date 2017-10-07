<?php
include_once('../config/env.php');
include_once (getRoot('config/setup.php')); ?>

<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo 'Posts lol| '.$site_title; ?></title>

    <?php include(getRoot('/config/css.php')); ?>
    <?php include(getRoot('/config/js.php')); ?>
</head>


<?php include(getRoot('/template/navigation.php')); //Navigation Bar?>
<body>