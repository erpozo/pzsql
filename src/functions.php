<?php

include "./vendor/autoload.php";

use pzsql\src\class\BD;

function sql(){
    return $connect = new BD($_SESSION["user"], $_SESSION["password"]);
}

function  getDatabaseList(){
    $baseDataList = sql()->Select('SHOW DATABASES;');
    $list = [];
    foreach($baseDataList as $database){
        $list[] = $database['Database'];
    }
    return $list;
}

function listTables(string $database){
    $connect = new BD($_SESSION["user"], $_SESSION["password"], $database);
    return $connect->Select('SHOW TABLES;');
}

function sqlogin($user, $password){
    $connect = new BD($user, $password);
    $_SESSION["user"]=$user;
    $_SESSION["password"]=$password;
}

function sqlogout(){
    echo "logout";
    $_SESSION["user"]="";
    $_SESSION["password"]="";
    header("Location: ./index.php");
}

function createDatabase($databaseName){

}