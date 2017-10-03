<?php
// Setup file

//Database connection
$dbc = mysqli_connect('localhost', 'dev', 'thepassword1', 'blog') OR die('Could not connect because: '.mysqli_connect_error());
include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/classes/database.php');

//Constants
DEFINE('D_TEMPLATE','/series/dynamic/my_blog/template/');
DEFINE('D_CONFIG','/series/dynamic/my_blog/config/');

//Functions
include($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/functions/data.php');
include($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/functions/correct_id.php');

// Site Title
$site_title = 'Twittler';

//Page setup



?>