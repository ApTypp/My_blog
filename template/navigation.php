<!-- BOOTSTRAP NAV BAR  -->
<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == "index.php"){ echo "active"; }?>" href="index.php">Posts <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == "add_a_post.php"){ echo "active"; }?>" href="add_a_post.php">Create a Post</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0" action="search.php" method="post">
                <input name="search" class="form-control" type="text" placeholder="Search">
            </form>
        </div>
    </div>

</nav>


<br />