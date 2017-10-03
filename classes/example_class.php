<?php

class MyClass
{
    public $prop1 = "I'm a class property!";

    public function __construct()
    {
        echo 'The class "', __CLASS__, '" was initiated!<br />';
    }

    public function __destruct()
    {
        echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }

    public function __toString()
    {
        echo "Using the toString method: ";
        return $this->getProperty();
    }

    public function setProperty($newval)
    {
        $this->prop1 = $newval;
    }

    protected function getProperty()
    {
        return $this->prop1 . "<br />";
    }
}

class MyOtherClass extends MyClass
{
    public function __construct()
    {
        parent::__construct(); // Call the parent class's constructor (оставляет нетронутым предыдущий констракт)
        echo "A new constructor in " . __CLASS__ . ".<br />";
    }

    public function newMethod()
    {
        echo "From a new method in " . __CLASS__ . ".<br />";
    }

    public function callProtected()
    {
        return $this->prop1 . "<br />";
    }
}

$newobj = new MyOtherClass();
echo $newobj->newMethod();
echo $newobj->callProtected();

/*
echo '<br /> old: <br />';

// Create a new object
$obj = new MyClass();
$obj2 = new MyClass();

// Get the value of $prop1
echo 'object1 = ' . $obj->getProperty();

$obj->setProperty('New property');
echo 'object1 = ' . $obj->getProperty();
echo 'object2 = ' . $obj2->getProperty();

unset($obj);

echo $obj2;
// Output a message at the end of the file
echo "End of file.<br />";
*/
/**
 * @author sdasd
 *
 */
?>