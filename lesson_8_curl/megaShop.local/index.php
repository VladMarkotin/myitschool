<?php

$file = fopen("storage/example.txt", 'r');
$content = fread($file, filesize("storage/example.txt"));

$contentArray = explode("---", $content);
//var_dump($contentArray);
echo "Mega Shop <br/>";
foreach ($contentArray as $k => $v){
    echo $v."<br/>";
}
if($_POST){
    echo "Response from megaShop!";
}