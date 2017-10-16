<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>

<div class="container">
<?php
$queryy = 'SELECT p.title, p.body, c.author, c.comments_body
FROM posts AS p
JOIN comments AS c ON p.id = c.post_id
WHERE p.body LIKE ? OR p.title LIKE ? OR c.author LIKE ? OR c.comments_body LIKE ?';
$stmt = $dbal->prepare($queryy);
$stmt->execute(['%'.$_POST['search'].'%','%'.$_POST['search'].'%','%'.$_POST['search'].'%','%'.$_POST['search'].'%']);
$i = 1;
while ($resultt = $stmt->fetch()){
    echo 'Result #'.$i.': <br />';
    echo 'Post title : '.htmlspecialchars($resultt['title']).'<br />';
    echo 'Post body: '.htmlspecialchars( $resultt['body']).'<br />';
    echo 'Comment author: '.htmlspecialchars( $resultt['author']).'<br />';
    echo 'Comment: '.htmlspecialchars( $resultt['comments_body']).'<br />';
    echo '<br />';
    $i++;
}
?>
</div>

<?php include_once(getRoot('/template/footer.php')); ?>


