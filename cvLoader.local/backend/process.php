<?php

function upload()
{
    $uploaddir = $_SERVER['DOCUMENT_ROOT']."/storage/";
    $uploadfile = $uploaddir . basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
}

function process(array $data)
{
    //var_dump($data);
    upload();
}

if(isset($_POST)){
    $data = [];
    $data['name']    = $_POST['name'];
    $data['surname'] = $_POST['surname'];
    $data['file']    = $_POST['file'];

    process($data);
}