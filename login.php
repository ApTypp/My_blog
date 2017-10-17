<?php include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header

$user = new \Classes\Users();
$parameters = array(
    'username'=>$_POST['name'],
    'password'=>$_POST['pass']);
if ($dbal->login($user,$parameters)){
    echo 'LOGGED IN';

} else {
    echo 'NOPE';
    echo $dbal->error_message;
}


?>

<?php include_once(getRoot('/template/footer.php')); ?>
