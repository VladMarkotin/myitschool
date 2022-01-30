<?php

/*
 * Булев
Целые числа
Числа с плавающей точкой
Строки
Числовые строки
Массивы
Итерируемые ип iterable может использоваться как тип параметра для указания, что функция принимает набор значений,
 но ей не важна форма этого набора, пока он будет использоваться с foreach
Объекты
Перечисления
Ресурс
NULL
Функции обратного вызова (callback-функции)

---------------------------------------
Преобразование типов
(int), (integer) - приведение к int
(bool), (boolean) - приведение к bool
(float), (double), (real) - приведение к float
(string) - приведение к string
(array) - приведение к array
(object) - приведение к object
(unset) - приведение к NULL
*/

//var_dump((bool) "");
//var_dump((bool) "0");

//var_dump((bool) 1);
//var_dump((bool) -2);
//var_dump((bool) "foo");
//var_dump((bool) 2.3e5);
//var_dump((bool) array(12));
//var_dump((bool) array());
//var_dump((bool) "false");


//Манипуляции с типами
$foo = "1";  // $foo - это строка (ASCII-код 49)
$foo *= 2;   // $foo теперь целое число (2)
$foo = $foo * 1.3;  // $foo теперь число с плавающей точкой (2.6)
$foo = 5 * "10 Little Piggies"; // $foo - это целое число (50)
$foo = 5 * "10 Small Pigs";     // $foo - это целое число (50)

$a = 123;
$b = 'string';
$c = 3.14;

echo 'Значение переменной: $a';
echo "Значение переменной: $a";



//--------- Операторы ------------------
//Математические + - * / ++ -- %
//Логические && || == === !=
$sum = 5 + 5;
$sum += 10;

$minus = 168 - 17;
$minus -= 151;

$a = 5; $b = 8; $c = 10;
$result = $a + $b * $c;

$arr = [1,2,3,4,5];
echo "<br>";
for($i = count($arr)-1; $i >= 0; $i--  ){
	echo $arr[$i];
}

for($i = 0; $i < count($arr) / 2; $i++){
	
	$j = count($arr) - $i - 1;
	$t = $arr[$i];
	$arr[$i] = $arr[$j];
	$arr[$j] = $t;
}
print_r($arr);
echo "<bR/>";
$str = "hello";
for($i = 0; $i < strlen($str) / 2; $i++){
	
	$j = strlen($str) - $i - 1;
	$t = $str[$i];
	$str[$i] = $str[$j];
	$str[$j] = $t;
}
var_dump($str);

/*для собеса полиморфизм (позднее статическое связывание)*/
class A {
	public function aF(){
		//self::dF();
		$this->dF();
	}
	
	protected function dF()
	{
		echo "Hello from A::dF()";
	}
}

class B extends A{
	
	protected function dF()
	{
		echo "Hello from B::dF()";
	}
}

$b = new B;
echo "<br/>Polymorf: ";
$b->aF();