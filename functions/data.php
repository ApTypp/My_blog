<?php

function data_post($dbc, $id) {

    $query = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($dbc, $query);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

?>