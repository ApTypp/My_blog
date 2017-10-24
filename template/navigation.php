<!-- BOOTSTRAP NAV BAR  -->
<?php include_once('config/env.php');
$current_page = basename($_SERVER['PHP_SELF']);
session_start();
if (isset ($_SESSION['username'])){
    $username = $_SESSION['username'];
} else {
    $username = 'anonymous';
}
?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a href="index"> <img src="images/blog-logo.png" alt="My Blog" style="width: 60%"> </a>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == "index.php"){ echo "active"; }?>" href="index">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($current_page == "add_a_post.php"){ echo "active"; }?>" href="add_a_post">Add a post</a>
                </li>
            </ul>
            <?php if (empty($_SESSION['username'])){ ?>
            <form class="form-inline my-2 my-md-0" action="login" method="post" style="margin: 5%">
                <input name="name" class="form-control" type="text" maxlength="20" placeholder="Username" style="width: 25%">
                <input name="pass" class="form-control" type="password" maxlength="50" placeholder="Password" style="width: 25%">
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-primary"><i class="fa fa-user-circle" aria-hidden="true"></i> Login</button>
                </div>
                <div class="col-auto">
                    <a href="sign_up" class="btn btn-outline-secondary"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign up</a>
                </div>
            </form>
            <?php } else { ?>

            <form class="form-inline my-2 my-md-0" action="login" method="post" style="margin: 5%">
                <p class="text-info"><i class="fa fa-user-circle" aria-hidden="true"></i> Logged in as: <?php echo $_SESSION['username']; ?></p>
                <div class="col-auto">
                    <a href="logout" class="btn btn-outline-secondary"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                </div>
            </form>

            <?php } ?>
        </div>
    </div>
    <form class="form-inline my-2 my-md-0" action="search" method="post">
        <div class="col-auto">
            <input name="search" class="form-control" type="text" placeholder="Search">
        </div>
    </form>
</nav>


<br />