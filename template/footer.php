<!-- Adding a post, modal frame -->

<div class="modal fade addPostModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container" style="margin: 2%; width: 96%">
                <form action="insert" method="post" id="addPostForm">
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
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br />
<footer class="blog-footer">
    <p>Made by me</p>
    <a href="#">Back to top</a>
</footer>

</body>

</html>