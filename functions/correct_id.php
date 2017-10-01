<?php
// Function returns id as a number without characters and not empty
function correct_id($id) {
    $id = preg_replace('~[^0-9]+~','',$id);
    if($id == NULL) { $id = 1; }
    return $id;
}
?>