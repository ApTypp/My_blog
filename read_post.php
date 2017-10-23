<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); // Header ?>

    <div class="container">

        <?php
        //$post = $db->selectId($_GET['id']);
        $posts = new \Classes\Post();
        $comment = new \Classes\Comment();
        $result = $dbal->SelectBy($posts,array('id' => $_GET['id']));
        $post = $result->fetch();
            ?>

    <div class="jumbotron jumbotron-fluid" style="overflow-x:hidden">
        <div class="btn-group d-flex align-items-end flex-column" style="right: 10px; top: -45px;">
            <button class="btn btn-secondary btn-sm dropdown-toggle p-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ...
            </button>
            <div class="dropdown-menu ">
                <a class="dropdown-item" href="read_post.php?id=<?php echo $post['id'] ?>">Open</a>
                <a class="dropdown-item" href = "#" data-toggle="modal" data-target="#Modal<?php echo $post['id'];?>">Read</a>
                <?php if ($username == $post['author']){ ?>
                    <a class="dropdown-item" href="edit_post.php?id=<?php echo $post['id'] ?>">Edit</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="delete_post.php?id=<?php echo $post['id'] ?>"> <!-- onclick="return confirm('Are you sure?')" -->Delete</a>
                <?php } ?>
            </div>
        </div>
        <div class="container">
            <h1 class="display-6 text-center"><?php echo htmlspecialchars( $post['title']);?> </h1>
            <p class="lead text-center"><?php echo htmlspecialchars( $post['body']);?> </p>
        </div>
        <div class="modal-footer">
            Author: <?php echo $post['author']; ?> <br />
            <?php
            if ($post['date_modified'] == NULL){
                echo $post['date_created'];
            }
            else {
                echo 'Modified: '.$post['date_modified'];
            } ?>
        </div>
        <?php
        $result_comments = $dbal->selectAll($comment);
        while ($comments = $result_comments->fetch()){
            if ($comments['post_id'] === $post['id']){ ?>
                <hr>

                <a style="margin-left: 5%"><strong><?php echo htmlspecialchars( $comments['author']); ?></strong></a>
                <a class="float-right" style="margin-right: 5%"><?php echo $comments['date_created']; ?></a>
                <p style="margin-left: 5%; margin-right: 5%"><?php echo htmlspecialchars( $comments['comments_body']); ?></p>
                <?php if ($username == $comments['author']){ ?>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="delete_comment.php?id=<?php echo $comments['id'] ?>">Delete</a>
                    </div>
                <?php }

            }
        }

        ?>
        <form action="insert_comment.php" method="post">
            <div class="form-group" style="margin-left: 5%; margin-right: 5%">
                <textarea class="form-control" id="comment" rows="1" name="body" placeholder="Comment"></textarea>
                <textarea name="post_id" hidden><?php echo $post['id'] ?></textarea>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add comment</button>
            </div>
        </form>

    </div>
    <!-- Modal (read post) -->
    <div class="modal fade" id="Modal<?php echo $post['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo htmlspecialchars($post['title']);?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo htmlspecialchars($post['body']);?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php include_once(getRoot('/template/footer.php')); ?>