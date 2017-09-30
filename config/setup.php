<?php
// Setup file

//Database connection
$dbc = mysqli_connect('localhost', 'dev', 'thepassword1', 'blog') OR die('Could not connect because: '.mysqli_connect_error());


//Constants
DEFINE('D_TEMPLATE','template');

//Functions
include('functions/data.php');

// Site Title
$site_title = 'Twittler';

//Page setup


?>