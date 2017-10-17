<?php
include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>
    <div class="container">
        <form action="sign_up_insert.php" method="post">
            <div class="form-group">
                <label for="Username">Username</label>
                <input class="form-control" maxlength="20" id="Username" placeholder="Enter username" name="username" style="width: 20%">
            </div>
            <div class="form-group">
                <label for="InputPassword1">Password</label>
                <input type="password"  maxlength="50" class="form-control" id="InputPassword1" placeholder="Password" name="pass" style="width: 20%">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php include_once(getRoot('/template/footer.php')); ?>