<?php include_once('config/env.php');
include_once (getRoot('/template/header.php')); // Header ?>
    <div class="container">
        <?php

        $parameters = array(
            'username'=>$_POST['username'],
            'password'=>$_POST['pass'],
            'date_created'=>$date);
        $rules = array();
        $validate = new \Classes\Validator();
        if (!$validate->isValid($parameters,$rules)){
            echo $validate->errorMessage;
        } else {
            $user = new \Classes\Users();
            if ($dbal->createUser($user, $parameters)){
                echo '--- USER CREATED ---';
            } else {
                echo $dbal->error_message;
            }} ?>
    </div>

<?php include_once(getRoot('/template/footer.php')); ?>