<?php
    /*Функции*/

// function foo($arg_1, $arg_2, /* ..., */ $arg_n)
//{
//    echo "Пример функции.\n";
 //   return $retval;
//}
//2
$makefoo = true;

//bar();

if ($makefoo) {
    function foo()
    {
        echo "Я не существую до тех пор, пока выполнение программы меня не достигнет.\n";
    }
}

/* Теперь мы благополучно можем вызывать foo(),
   поскольку $makefoo была интерпретирована как true */

if ($makefoo) foo();

function bar()
{
    echo "Я существую сразу с начала старта программы.\n";
}

//Можно ли делать вот так?
function foo2()
{
    function bar2()
    {
        echo "Я не существую пока не будет вызвана foo().\n";
    }
}
foo2();
bar2();
/* Рекурсия */
function recursion($a)
{
    if ($a < 20) {
        echo "$a\n";
        recursion($a + 1);
    }
}
recursion(15);

/*Факториал сделать с ними эту задачу*/
function factorial($arg)
{
    if($arg == 0){
        return 1;
    }

    return $arg * factorial($arg - 1);
}
/*Число из последовательности фиббоначи*/
function fibo($arg)
{
    if ($arg == 1){
        return $arg;
    }
    if($arg < 3){ //потому что 1 и 2 элементы - единицы
        return 1;
    }

    return fibo($arg - 1) + fibo($arg - 2);
}
echo "Factorial of 5 = ". factorial(5);
echo "<br/>";
echo "Fibo numbers:". fibo(3);

/*Четность*/
$extra = "Extra";
/*Анонимные функции + callback*/
$even = function ($arr) use($extra){
    $result = [];
    foreach($arr as $v){
        if($v % 2 == 0){
            $result[] = $v;
        }
    }

    $extra = $extra . "!";
    $result[] = $extra;

    return $result;
};

function printEvenNumbers($arr, $even) //use ($extra)
{
    print_r($even($arr));
    //echo $extra;//только дляанонимной функции
}
printEvenNumbers([1, 2, 3, 4, 5], $even);
echo $extra;
/* статические переменные*/
function funct(){
    static $int1 = 0;          // верно
    static $int2 = 1+2;        // неверно  (поскольку это выражение)
    //static $int = sqrt(121);  // неверно  (поскольку это тоже выражение)

    $int1++;
    echo $int1;
}
//-------------------------------------
$validateString = function ($arg){
    if(strlen($arg) > 0){
        return true;
    }

    return false;
};

$validateEmail = function ($arg){
    $result = filter_var($arg, FILTER_VALIDATE_EMAIL);
    $result = ($result) ? true : false;

    return $result;
};

function Validate($arg, array $checkers)
{
    $result = [];
    foreach ($checkers as $k => $f){
        $result[$k] = $f($arg);
    }

    return $result;
}
echo "<br/>";
$result = Validate(
    "bobexample.com",
         ['email' => $validateEmail, 'string' => $validateString]
);
var_dump($result);
echo "--------------------<br/>";
function odd($var)
{
    // является ли переданное число нечётным
    return ($var % 2 !== 0) ? true: false;
}

function even($var)
{
    // является ли переданное число чётным
    return ($var % 2 == 0) ? true: false;
}

$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$array2 = [6, 7, 8, 9, 10, 11, 12];

echo "Нечётные:\n";
print_r(array_filter($array1, "odd"));
echo "Чётные:\n";
print_r(array_filter($array2, "even"));