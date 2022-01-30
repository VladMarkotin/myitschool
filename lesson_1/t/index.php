<?php
/* 1 */
$a = 123;
$b = 'string';
$c = 0;

//echo "Значение переменной: $a <br/>";
/*2*/
$a = 123;
//echo 'Значение переменной: $a <br/>';

/*3*/
$x = 1;
//echo $x + '2';

/*4*/
$string = '123';
$numeric = (int) $string;
echo "<br/>";
//var_dump($numeric);
/*5*/
//$c = $a + $b;
//var_dump($c);
/* 6 */
//var_dump($b + $a);
/* 7 */
//var_dump(true + false);

/* 8 */
//var_dump($x + true);
/*9*/
$str1 = "a";
$str2 = "b";
//var_dump($str1 + $str2);

/* 10 */
$arr = [1];
$arr2 = [2,3];
//var_dump($arr + 5);

/*11*/
//var_dump($arr + $arr2);

/*12*/
//var_dump(2 + null);
/* 13 */
$file = fopen("test.txt", 'w');
//var_dump($file + 1);


/*14*/
$a = array("a" => "apple", "b" => "banana");
$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

$c = $a + $b; // Объединение $a и $b
//echo "Объединение \$a и \$b: \n";
//var_dump($c);

$c = $b + $a; // Объединение $b и $a
//echo "Объединение \$b и \$a: \n";
//var_dump($c);

$a += $b; // Объединение $a += $b, это $a и $b
//echo "Объединение \$a += \$b: \n";
//var_dump($a);

/* Новые операторы */
//Что будет выведено?
//echo 1 <=> 1 ."<br>"; //
//echo 1 <=> 2 . "<br>"; //
//echo 2 <=> 1 . "<br>"; //

