<?php
    include('config/setup.php');
    $db->deleteRow($_GET['id']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>