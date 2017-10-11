<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); // Header ?>

<div class="container">

    <?php
    $post = new \Classes\Post();
    $result = $dbal->selectBy($post,array('id' => $_GET['id']));
    $post = mysqli_fetch_assoc($result);
    ?>

    <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="post">
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
        <a class="btn btn-secondary" href="index.php">Cancel</a>
    </form>
</div>


<?php include_once(getRoot('/template/footer.php')); ?>