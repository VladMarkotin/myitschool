<?php
require_once 'db_file/SecretData.php';
require_once 'functions/functions.php';
require_once 'sessions/session.php';
$authData = $data;

function authorised($data, $authData){
    //dd($data);
    $response = [];
    foreach ($authData as $val){
        if(is_array($val)){
            foreach ($val as $k => $v){
                if($k == 'login'){
                    //echo "$v ? $data[login]<br/>";
                    if($v == $data['login']){
                        $response[] = 1;
                    }else{
                    
                        continue;
                    }
                }elseif($k == 'password'){
                        if($v == $data['password']){
                            $response[] = 1;
                        }else {
                            continue;
                        }
                }
                
            }
        }
    }
    //var_dump($response);
    //dd($response);
    if($response && (count($response) > 1)){
        return 1;
    }

    return 0;
}

function createSession($data)
{
    create($data);
    
}

if($_POST){
    $data["login"] = $_POST['login'];
    $data["password"] = $_POST["password"];
    if(authorised($data, $authData)){
        $_SESSION["login"] = $_POST['login'];
        $_SESSION["password"] = $_POST["password"];
        //var_dump$($data);
    }
    header("Location: /");

}