<?php include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header

$user = new \Classes\Users();
$parameters = array(
    'username'=>$_POST['name'],
    'password'=>$_POST['pass']);
if ($dbal->login($user,$parameters)){ ?>
    <div class="container">
    <?php echo 'LOGGED IN';?>
    </div>
<?php } else {
//    echo 'NOPE';
    echo $dbal->error_message;
}


?>

<?php include_once(getRoot('/template/footer.php')); ?>
