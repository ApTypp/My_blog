<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); // Header ?>

<div class="container">

    <?php
    $post = new \Classes\Post();
    $id=preg_replace('~[^0-9]+~','',$_GET['id']);
    $result = $dbal->selectBy($post,array('id' => $id));
    $post = $result->fetch();
    ?>

    <form action="edit?id=<?php echo $id ?>" method="post">
        <!-- Title -->
        <div class="form-group">
            <label for="title">Title for post</label>
            <textarea class="form-control" id="title" rows="1" name="title"><?php echo htmlspecialchars( $post['title']);?></textarea>
        </div>
        <!-- Main post text -->
        <div class="form-group">
            <label for="post">Main text</label>
            <textarea class="form-control" id="post" rows="3" name="post"><?php echo htmlspecialchars( $post['body']);?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
        <a class="btn btn-secondary" href="index">Cancel</a>
    </form>
</div>


<?php include_once(getRoot('/template/footer.php')); ?>