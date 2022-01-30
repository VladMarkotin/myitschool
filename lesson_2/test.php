<?php
$arr = [1, 2, 3, 4, 5, 6, 7, 8];
$min = $arr[0];
for ($i = 0; $i < count($arr); $i++){
        if($min > $arr){
            $min = $arr;
        }

    echo $min;
}


