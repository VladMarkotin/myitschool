<?php

if($_POST){
  $data = [];
  $data["time"] = date("Y-m-d h:i");
  $data["name"] = $_POST['name'];
  $data['comment'] = $_POST['comment'];

  array_filter($data, function ($el){
     if(strlen($el) < 3){
         die("Error! Try again");
     }
  });

  writeToFile($data);
}

function writeToFile(array $data)
{
    $filename = 'storage/file.txt';
    $handler = fopen($filename, "a");
    foreach ($data as $k => $v){
        fwrite($handler, $k.": $v\n");
    }
    fwrite($handler,"----------------\n");
    fclose($handler);
    header("Location: /");

    return 1;
}