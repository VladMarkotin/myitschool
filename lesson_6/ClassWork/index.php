<?php

class A
{
    public function printItem($string)
    {
        echo 'Foo: ' . $string;
    }

    public function printPHP()
    {
        echo 'PHP просто супер.';
    }
}

class B extends A
{
    public function printItem($string)
    {
        echo 'B: ' . $string;
    }
}


class Person
{
    public $name;
    protected $age;
    private $phone;

    public function __construct()
    {
        $this->name = "Lulumba";
        $this->age  = 25;
    }

    public function printItem()
    {
        echo "<br/> $this->name <br/>";
    }
}

class Tom extends Person
{
    public function __construct()
    {
        $this->name = "Ahmed";
        $this->age  = 40;
    }
}

$a = new A();
$b = new B();
//$a->printItem('baz'); //
//$b->printPHP();       //
//$b->printItem('baz'); //
//$b->printPHP();       //

//$user = new Tom();
//$user->printItem();