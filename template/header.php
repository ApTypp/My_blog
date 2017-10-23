<?php
include_once('../My_blog/config/env.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title><?php echo 'Posts lol| '.$site_title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include(getRoot('/config/css.php')); ?>
    <?php include(getRoot('/config/js.php')); ?>
</head>


<?php include(getRoot('/template/navigation.php')); //Navigation Bar
?>
<body>