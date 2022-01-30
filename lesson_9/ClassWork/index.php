<?php
require_once '../../header/header.html';
class A1
{
    public function printItem($string)
    {
        echo 'A: ' . $string;
    }

    public function printPHP()
    {
        echo 'PHP просто супер.';
    }
}

class B1 extends A1
{
    public function printItem($string)
    {
        echo 'B: ' . $string;
    }
}
$a = new A1();
$b = new B1();

class Person
{
    public    $name;
    protected $age;
    protected static $hair;
    private   $phone;

    public function __construct()
    {
        $this->name = "Lulumba";
        $this->age  = 25;
        $this->phone = '12131415';
        self::$hair = "dark";
    }

    public function printItem()
    {
        echo "<br/> $this->name <br/>";
        echo "<br/>$this->phone";
        echo self::$hair;
    }

    public static function staticPrintEl()
    {
        echo "<br/>".__CLASS__;
    }

    public function usualCall()
    {
        $this->test();
    }
}

class Tom extends Person
{
    public function __construct()
    {
        $this->name = "Ahmed";
        $this->age = 40;
        //$this->phone = '9999999';
        self::$hair = "blonde";
    }

    public function usualCall2()
    {
        $this->usualCall();
    }

    protected function test()
    {
        echo "<br/>". __CLASS__;
    }
}

class A2 {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        self::who();
    }

    public function who2() {
        echo __CLASS__;
    }
}
/*Фишка  наследования*/
class B2 extends A2 {
    public static function who() {
        echo __CLASS__;
    }

    public function testB2(A2 $arg)
    {
        var_dump($arg);
    }
}

class B3 extends A2
{

}




//$a->printItem('baz'); //
//$b->printPHP();       //
//$b->printItem('baz'); //
//$b->printPHP();       //
$b2 = new B2();
$b3 = new B3();
$b2->testB2($b3);

//$user = new Tom();
//$user->printItem();
//$user->usualCall2();
//Tom::staticPrintEl();
echo "<br/>";
$b2->who2();
B2::test();

class C1
{
    private $a;
    private $b;

    public function __construct()
    {
        $this->a = 'testA';
        $this->b = 'testB';
    }

    public function getA()
    {}

    public function getB()
    {}


}

require_once '../../footer/footer.html';