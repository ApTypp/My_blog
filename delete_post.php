<?php
    include('config/setup.php');
    $id = correct_id ($_GET['id']);
    $del = "DELETE FROM posts WHERE id = $id";
    mysqli_query($dbc, $del);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>