<!-- BOOTSTRAP NAV BAR  -->
<?php include_once('config/env.php');
$current_page = basename($_SERVER['PHP_SELF']);
session_start();
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
                <div class="col-auto">
                    <input name="search" class="form-control" type="text" placeholder="Search">
                </div>
            </form>
            <?php if (empty($_SESSION['username'])){ ?>
            <form class="form-inline my-2 my-md-0" action="login.php" method="post" style="margin: 5%">
                <input name="name" class="form-control" type="text" maxlength="20" placeholder="Username" style="width: 25%">
                <input name="pass" class="form-control" type="password" maxlength="50" placeholder="Password" style="width: 25%">
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-primary">Login</button>
                </div>
                <div class="col-auto">
                    <a href="sign_up.php" class="btn btn-outline-secondary">Sign up</a>
                </div>
            </form>
            <?php } else { ?>

            <form class="form-inline my-2 my-md-0" action="login.php" method="post" style="margin: 5%">
                <p class="text-info">Logged in as: <?php echo $_SESSION['username']; ?></p>
                <div class="col-auto">
                    <a href="logout.php" class="btn btn-outline-secondary">Logout</a>
                </div>
            </form>

            <?php } ?>
        </div>
    </div>

</nav>


<br />