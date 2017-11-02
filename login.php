<?php include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>
<div class="container">

<?php $user = new \Classes\Users();
$parameters = array(
    'username'=>$_POST['name'],
    'password'=>$_POST['pass']);
if ($dbal->login($user,$parameters)){
echo 'LOGGED IN';
?>
</div>
<script type="text/javascript">
    refresh('.navbar-collapse');
</script>
<?php
} else {
    echo $dbal->error_message;
}


include_once(getRoot('/template/footer.php')); ?>
