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

function listTablesFrom(string $database){
    $tables = sql()->Select('SHOW TABLES FROM '.$database.';');
    $nonArray = [];
    foreach($tables as $table){
        $nonArray[] = $table["Tables_in_$database"];
    }
    return $nonArray;
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

function createTable($databaseName, $tableName){
    sql()->Select('CREATE TABLE '.$database.'.'.$tableName.'('.$tableName.'_id int NOT NULL AUTO_INCREMENT);');
}
?>