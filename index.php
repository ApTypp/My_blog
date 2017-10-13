<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>



    <div class="container">
        <?php
        $posts = new \Classes\Post();
        $result = $dbal->selectAll($posts);
        while ($post = $result->fetch()) {
            ?>

            <div class="jumbotron jumbotron-fluid" style="overflow-x:hidden">
                <div class="btn-group d-flex align-items-end flex-column" style="right: 10px; top: -45px;">
                    <button class="btn btn-secondary btn-sm dropdown-toggle p-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ...
                    </button>
                    <div class="dropdown-menu ">
                        <a class="dropdown-item" href="read_post.php?id=<?php echo $post['id'] ?>">Open</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#Modal<?php echo $post['id'];?>">Read</a>
                        <a class="dropdown-item" href="edit_post.php?id=<?php echo $post['id'] ?>">Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="delete_post.php?id=<?php echo $post['id'] ?>"> <!-- onclick="return confirm('Are you sure?')" -->Delete</a>
                    </div>
                </div>
                <div class="container">
                    <h1 class="display-6" style="text-align: center"><?php echo htmlspecialchars( $post['title']);?> </h1>
                    <p class="lead" style="text-align: center"><?php echo htmlspecialchars( $post['body']);?> </p>
                </div>
                <div class="modal-footer"><?php
                    if ($post['date_modified'] == NULL){
                        echo $post['date_created'];
                    }
                    else {
                        echo 'Modified: '.$post['date_modified'];
                    } ?>
                </div>
                <div class="form-group" style="margin-left: 5%; margin-right: 5%">
                    <textarea class="form-control" id="comment" rows="1" name="title" placeholder="Comment"></textarea>
                </div>
                <div class="modal-footer">
                    <form action="insert_comment.php" method="post">
                        <button type="submit" class="btn btn-primary">Comment</button>
                    </form>

                </div>
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
        <?php } ?>
    </div>

<?php include_once(getRoot('/template/footer.php')); ?>