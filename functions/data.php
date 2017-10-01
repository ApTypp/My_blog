<?php
function data_post($dbc) {

    $query = "SELECT * FROM posts";
    $result = mysqli_query($dbc,$query);

    return $result;
}

function data_post_id($dbc,$id) {

    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($dbc,$query);

    return $result;
}

?>