<?php

require_once 'HW/hw.php';

//Задача. Увеличить каждый элемент массива в 2 раза
//Задача. Найти минимум массива
//Задача Развернуть массив не создавая второй массив
function reverseArray2($arr){
    $len = count($arr);
    for($i = 0; $i < $len; $i++){
        if($i < $len - $i - 1) {
            $buf = $arr[$len - $i - 1];
            $arr[$len - $i - 1] = $arr[$i];
            $arr[$i] = $buf;
        }
    }

    return $arr;
}
print_r(reverseArray2([9,8,7,6,5,4,3,2,1]));
echo "<br/>";
/*Синтаксис операции */
/*
    foreach (iterable_expression as $value)
    statement
    foreach (iterable_expression as $key => $value)
    statement
*/

/*конец*/
 /* 1 */

$arr = array(1, 2, 3, 4);
foreach ($arr as $value) {
    $value = $value * 2;
}
//var_dump($arr);
// Как сейчас будет выглядеть массив $arr ?
unset($value);

/* Распаковка вложенного массива*/
$array = [
    [1, 3],
    [2, 4],
    [11, 12]
];

foreach ($array as list($a, $b)) {
    // $a содержит первый элемент вложенного массива,
    // а $b содержит второй элемент.
    echo "A: $a; B: $b\n";
}
echo "<br/>";
echo "Current: ".$mode = current($arr)."<br/>"; // $mode = 'foot';
echo "Next:". $mode = next($arr);
echo "<br/>";

$iterator = new ArrayIterator([1, 2, 3]);
foreach ($iterator as $key => $val) {
    echo $key ."=>". $val."--";
}

echo "<br/>";
/*while(next($arr) != end($arr)){
    echo current($arr). "<br/>";
    next($arr);
}*/

$fruits = array(
    "apple"  => "yummy",
    "orange" => "ah ya, nice",
    "grape"  => "wow, I love it!",
    "plum"   => "nah, not me"
);
$obj = new ArrayObject( $fruits );
$it = $obj->getIterator();

// How many items are we iterating over?

echo "Iterating over: " . $obj->count() . " values <br/>";

// Iterate over the values in the ArrayObject:
while( $it->valid() )
{
    echo $it->key() . "=" . $it->current() . "\n";
    $it->next();
}

                                         /*  JSON   */
$json_arr = array(
    '1' => 'Значение 1',
    '2' => 'Значение 2',
    '3' => 'Значение 3',
    '4' => 'Значение 4',
    '5' => 'Значение 5'
);

$json = json_encode($json_arr); //JSON_UNESCAPED_UNICODE
echo "<br/>".$json;

/*
    {
      "fio" : "Иванов Сергей",
      "adress" : {
      "city" : "Москва",
      "street" : "Пятницкая",
      "flat" : "35"
  }
}
 */
echo "<br/>";
$arrForJson = array(
    'fio' => 'Иванов Сергей',
    'age' => '32',
    'vk_url' => 'https://vk.com/id11111'
);
echo json_encode($arrForJson, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);