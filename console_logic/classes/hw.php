<?php

/*Получаю список проектов*/
$projects = [];
$currentDir = '.';
$hw = scandir($currentDir.'/HW');
echo <<<EOL
<div>Домашка
<ul style="list-style:none";>

EOL;
if(is_array($hw)){
	foreach($hw as $v){
		if(is_dir("HW/".$v) && ($v !== '.') && ($v !== '..') && ($v !== '')){
		   echo "<li><a href='HW/".$v."' >".$v."</a><li/>";
		}
	}
}   
echo "</ul><hr></div>";