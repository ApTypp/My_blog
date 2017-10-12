<?php include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header
$post = new \Classes\Post();
$parameters = array(
    'title'=>$_POST['title'],
    'body'=>$_POST['post'],
    'date_created'=>$date);
$sql = $dbal->save($post, '', $parameters);
if($sql){
    ?>
    <div class="container">
        <h1 class="display-6"><?php echo "Records inserted successfully.";?></h1>
    </div>
<?php } else{
    echo "NOPE";
}
//header('refresh:1,url=index.php');

include_once(getRoot('/template/footer.php')); ?>