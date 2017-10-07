<?php
echo 123;
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>



<div class="container">
    <?php
    $post = new \Classes\Post();
    echo $post->tableName;
    $result = $orm->selectById($post,1);
    while ($post = mysqli_fetch_assoc($result)) {
        ?>

        <div class="jumbotron jumbotron-fluid" style="overflow-x:hidden">
            <div class="btn-group d-flex align-items-end flex-column" style="right: 10px; top: -45px;">
                <button class="btn btn-secondary btn-sm dropdown-toggle p-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ...
                </button>
                <div class="dropdown-menu ">
                    <a class="dropdown-item" href="read_post.php?id=<?php echo $post['id'] ?>">Read</a>
                    <a class="dropdown-item" href="edit_post.php?id=<?php echo $post['id'] ?>">Edit</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="delete_post.php?id=<?php echo $post['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>
                <div class="container">
                    <h1 class="display-6"><?php echo htmlspecialchars( $post['title']);?> </h1>
                    <p class="lead"><?php echo htmlspecialchars( $post['body']);?> </p>
                </div>
            <div class="modal-footer"><?php echo $post['add_date'] ?></div>
        </div>
    <?php } ?>

</div>

<?php include_once(getRoot('/template/footer.php')); ?>