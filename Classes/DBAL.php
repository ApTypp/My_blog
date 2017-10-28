<?php
namespace Classes;

class DBAL extends Database{

    public function __construct($serverName,$userName,$DBPassword,$dbname,$port){
        parent::__construct($serverName,$userName,$DBPassword,$dbname,$port);
    }

    public function selectById(Entity $object,$id)  {
        return $this->selectBy($object,['id'=>$id]);
    }

    public function selectAll(Entity $object)  {
        $stmt = $this->query($this->buildSelectAll($object));
        return $stmt; //->fetch(\PDO::FETCH_ASSOC);
    }

    public function selectBy(Entity $object,array $parameters)  {
        return $this->buildSelectBy($object,$parameters);
    }

    public function deleteById(Entity $object, $id)  {
        return $this->buildDeleteBy($object,array('id' => $id));
    }

    public function deleteBy(Entity $object, array $parameters){
        return $this->buildDeleteBy($object,$parameters);
    }

    public function save(Entity $object, $id, array $parameters)
    {
        if ($id == NULL) {
//            echo 'id = 0, it works';
            return $this->buildInsert($object, $parameters);
        }
            return $this->buildEditById($object, $id , $parameters);
    }

    public function isFieldUnique ($object, array $parameters) {
        $stmt = $this->selectBy($object,$parameters);
        if ($stmt->fetch()){
            return false;
        }
        return true;
    }

    public function createUser ($object, array $parameters) {
        // Checks for unique username
        if (!$this->isFieldUnique($object, array('username'=>$parameters['username']))){
            $this->HandleError('Account with this username already exist');
            return false;
        }
        // Hash the password
        $salt = Users::getSalt();
        $parameters['password'] = crypt($parameters['password'],$salt);
        // Saves to database
        try {
             $this->save($object, '', $parameters);
        } catch (\PDOException $e) {
            echo 'Smth else wrong: ', $e->getMessage(), "\n";
            return false;
        }
        return true;
    }


    public function CheckLoginDB($object, array $parameters){
        $result = $this->selectBy($object,['username' => $parameters['username']]);
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

        //Checks username and pass in DB
        if (!$this->CheckLoginDB($object, $parameters)){
            $this->HandleError('Error logging in. The username or password does not match');
            return false;
        }
//        echo $_SESSION['username'];
        return true;

    }

}

?>