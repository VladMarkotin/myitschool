<?php
//1
function Ex1()
{
    $ch = curl_init('https://example.com');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $html = curl_exec($ch);
    curl_close($ch);

    return $html;
}
//echo Ex1();
//echo file_get_contents('https://example.com');
//2
function Ex2()
{
    $ch = curl_init("http://megashop.local/");
    $fp = fopen("example.txt", "w");

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_exec($ch);
    if (curl_error($ch)) {
        fwrite($fp, curl_error($ch));
    }
    curl_close($ch);
    fclose($fp);
}
//Ex2();













//Наследование


//3

function Ex3()
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://megashop.local/");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "postvar1=value1&postvar2=value2&postvar3=value3");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);

    curl_close($ch);

// Further processing ...
    if ($server_output) {
        var_dump($server_output);
    } else {
        echo "Error!";
    }
}

Ex3();




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