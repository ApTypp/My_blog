<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); //Header ?>

    <form action="insert" method="post">
        <div class="container">
            <h4>What are you thinking about?</h4>
            <!-- Title -->
            <div class="form-group">
                 <textarea class="form-control" id="title" rows="1" name="title" placeholder="Title"></textarea>
            </div>
            <!-- Main post text -->
            <div class="form-group">
                <textarea class="form-control" id="post" rows="3" name="post" placeholder="Main text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create a post</button>
            <button type="reset" class="btn btn-secondary">Clear</button>
        </div>
    </form>

<?php include_once(getRoot('/template/footer.php')); ?>