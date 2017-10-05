<?php include ($_SERVER['DOCUMENT_ROOT'] . '/series/dynamic/my_blog/template/header.php'); //Header ?>

<form action="insert.php" method="post">
    <div class="container">
        <h4>What are you thinking about?</h4>
        <!-- Title -->
        <div class="form-group">
            <label for="title">Title for post</label>
            <textarea class="form-control" id="title" rows="1" name="title"></textarea>
        </div>
        <!-- Main post text -->
        <div class="form-group">
            <label for="post">Main text</label>
            <textarea class="form-control" id="post" rows="3" name="post"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create a post</button>
        <button type="reset" class="btn btn-secondary">Clear</button>
    </div>
</form>

<?php get_footer(); //Footer ?>