<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>

<?php
$posts = new \Classes\Post();
$comment = new \Classes\Comment();

$result = $dbal->selectAll($posts);
$posts = $result->fetchAll();

if (!empty($_SESSION['username'])) {
// information about user
    $user_class = new \Classes\Users();
    $result = $dbal->selectBy($user_class, ['username' => $_SESSION['username']]);
    $user = $result->fetch();
}

$vote_class = new \Classes\Vote();


krsort($posts); ?>
    <div id="posts">
<?php
foreach ($posts as $key => $post) {
    if (!empty($_SESSION['username'])) {
        $result = $dbal->selectBy($vote_class, ['post_id' => $post['id'], 'user_id' => $user['id']]);
        $vote = $result->fetch();
    }
    ?>
    <div class="vote float-left text-center">
        <button id="btn-upvote-<?php echo $post['id'];?>" data-selected="<?php if (!empty($_SESSION['username'])) {if ($vote['status'] == 1) { echo 1; } else {echo 0;}} ?>" data-id="<?php echo $post['id'];?>" type="button" class="btn btn-light btn-upvote <?php if (!empty($_SESSION['username'])) { if ($vote['status'] == 1) { echo 'text-success'; } }?>" <?php if (empty($_SESSION['username'])) { echo 'disabled'; } ?>><i class="fa fa-arrow-circle-up fa-2x" aria-hidden="true"></i></button>
        <div><h3 id="votecount<?php echo $post['id'];?>"><?php echo $post['votecount'] ?></h3></div>
        <button id="btn-downvote-<?php echo $post['id'];?>" data-selected="<?php if (!empty($_SESSION['username'])) {if ($vote['status'] == -1) { echo 1; } else {echo 0;}} ?>" data-id="<?php echo $post['id'];?>" type="button" class="btn btn-light btn-downvote <?php if (!empty($_SESSION['username'])) { if ($vote['status'] == -1) { echo 'text-danger'; } }?>" <?php if (empty($_SESSION['username'])) { echo 'disabled'; } ?>><i class="fa fa-arrow-circle-down fa-2x" aria-hidden="true"></i></button>
    </div>
    <div class="container">
        <div class="jumbotron jumbotron-fluid post" style="overflow-x:hidden">
            <div class="btn-group d-flex align-items-end flex-column" style="right: 10px; top: -45px;">
                <button class="btn btn-secondary btn-sm dropdown-toggle p-2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ...
                </button>
                <div class="dropdown-menu ">
                    <a class="dropdown-item" href="read_post?id=<?php echo $post['id'] ?>">Open</a>
                    <a class="dropdown-item" href = "#" data-toggle="modal" data-target="#ModalRead<?php echo $post['id'];?>">Read</a>
                    <?php if ($username == $post['author']){ ?>
                        <a class="dropdown-item" href="edit_post?id=<?php echo $post['id'] ?>">Edit</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target=".editPostModal<?php echo $post['id'];?>">Edit (modal)</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="delete_post?id=<?php echo $post['id'] ?>"> <!-- onclick="return confirm('Are you sure?')" -->Delete</a>
                        <a class="dropdown-item btn-delpost" data-id="<?php echo $post['id'] ?>" href="#">Delete with AJAX</a>
                    <?php } ?>
                </div>
            </div>
            <h1 class="display-6 text-center"><?php echo htmlspecialchars( $post['title']);?> </h1>
            <?php if (!(strlen($post['body']) > 1000)) { ?>
                <p class="lead text-center"><?php echo htmlspecialchars( $post['body']);?> </p>
            <?php } else {?>
                <p class="lead text-center"><?php echo htmlspecialchars( substr($post['body'], 0, 1000)).' ...';?><a href = "#" data-toggle="modal" data-target="#ModalRead<?php echo $post['id'];?>"> Read more</a> </p>
            <?php } ?>
            <div class="modal-footer">
                <i class="fas fa-user"> <?php echo $post['author']; ?></i> <br />
                <i class="fas fa-calendar-alt text-secondary">
                    <?php
                    if ($post['date_modified'] == NULL){
                        echo $post['date_created'];
                    }
                    else {
                        echo 'Modified: '.$post['date_modified'];
                    } ?></i>
            </div>
            <div id="commentsDiv<?php echo $post['id'] ?>">
                <?php
                $result_comments = $dbal->selectAll($comment);
                while ($comments = $result_comments->fetch()){
                    if ($comments['post_id'] === $post['id']){ ?>
                        <hr>

                        <span style="margin-left: 5%"><i class="fas fa-user"><?php echo htmlspecialchars( ' '.$comments['author']); ?></i></span>
                        <span class="float-right" style="margin-right: 5%"><i class="fas fa-calendar-alt text-secondary"><?php echo ' '.$comments['date_created']; ?></i></span>
                        <p style="margin-left: 5%; margin-right: 5%"><?php echo htmlspecialchars( $comments['comments_body']); ?></p>
                        <?php if ($username == $comments['author']){ ?>
                            <div class="modal-footer">
                                <a class="btn btn-secondary btn-sm" href="delete_comment?id=<?php echo $comments['id'] ?>">Delete</a>
                                <a data-commentid="<?php echo $comments['id'] ?>" data-postid="<?php echo $post['id'] ?>" class="btn btn-dark btn-sm btn-deleteComment" href="#">Delete with AJAX</a>
                            </div>
                        <?php }

                    }
                }

                ?>
                <form action="insert_comment" method="post">
                    <div class="form-group" style="margin-left: 5%; margin-right: 5%">
                        <textarea class="form-control" id="comment<?php echo $post['id'] ?>" rows="1" name="body" placeholder="Comment"></textarea>
                        <textarea name="post_id" hidden><?php echo $post['id'] ?></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Add comment</button>
                        <a data-id="<?php echo $post['id'] ?>" type="button" href="#" class="btn btn-info btn-sm btn-comment">Add comment with AJAX</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Modal (read post) -->
    <div class="modal fade" id="ModalRead<?php echo $post['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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

    <!--            Modal (edit post)-->
    <div class="modal fade editPostModal<?php echo $post['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container" style="margin: 2%; width: 96%">
                    <form action="edit?id=<?php echo $post['id'] ?>" method="post">
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
                        <div class="text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php } ?>
<?php include_once(getRoot('/template/footer.php')); ?>