<?php
function createArray()
{
    $testArr = [];
    for ($i = 0; $i < 10000000; $i++) {
        $testArr[sha1($i)] = $i;
    }

    return $testArr;
}

function find($el, $arr)
{
    for ($i = 0; $i < count($arr); $i++){
        if($arr[$i] == $el){
            return true;
        }
    }

    return false;
}

function findQuickly($el, $arr)
{
    if(isset($arr[sha1($el)])){
        return true;
    }

    return false;
}

$arr = createArray();
echo "Время, потраченное на поиск элемента:<br/>";
echo "User`s algorithm:";
$timeStart = microtime(true);
var_dump(find(10000001, $arr));
$timeEnd = microtime(true);
echo "<br/>";

echo $timeEnd - $timeStart;
echo "<br/>Hash algorithm: ";

$timeStart2 = microtime(true);
var_dump(findQuickly(10000001, $arr));
$timeEnd2 = microtime(true);
echo "<br/>";
echo $timeEnd2 - $timeStart2;

echo "<br/>PHP in_array function: ";
$timeStart3 = microtime(true);
var_dump(findQuickly(10000001, $arr));
$timeEnd3 = microtime(true);
echo $timeEnd3 - $timeStart3;