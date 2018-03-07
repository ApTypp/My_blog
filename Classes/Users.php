<?php
namespace Classes;


Class Users extends Entity {

//
//    public $post_id;
//    public $body;
//    public $author = 'Unknown';
    public function __construct()
    {   $this->tableName='users';
        parent::__construct();
    }

    public static function getSalt($bytes = 11){
        $bytes = random_bytes($bytes);
        return bin2hex($bytes);
    }

    public function createUser ($object, array $parameters) {
        $dbal = new DBAL();

        // Checks for unique username
        if (!$dbal->isFieldUnique($object, array('username'=>$parameters['username']))){
            $dbal->HandleError('Account with this username already exist');
            return false;
        }
        // Hash the password
        $salt = Users::getSalt();
        $parameters['password'] = crypt($parameters['password'],'$2y$07$'.$salt);
        // Saves to database
        try {
            $dbal->save($object, $parameters);
        } catch (\PDOException $e) {
            echo 'Smth else wrong: ', $e->getMessage(), "\n";
            return false;
        }
        return true;
    }


    public function CheckLoginDB($object, array $parameters){
        $dbal = new DBAL();

        $result = $dbal->selectBy($object,['username' => $parameters['username']]);
        if ($acc = $result->fetch()){
            if (hash_equals($acc['password'], crypt($parameters['password'], $acc['password']))) {
                //Starts season
                session_unset();
                session_destroy();
                session_start();

                $_SESSION['username'] = $acc['username'];
                return true;
            }
        }
        return false;
    }

    public function login($object, array $parameters){
        $dbal = new DBAL();

        //Checks username and pass in DB
        if (!$this->CheckLoginDB($object, $parameters)){
            $dbal->HandleError('Error logging in. The username or password does not match');
            return false;
        }
        return true;

    }


}
?>