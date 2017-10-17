<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header

session_unset();
session_destroy();
echo 'LOGGED OUT';
//header('Location: index.php');
?>
<?php include_once(getRoot('/template/footer.php')); ?>