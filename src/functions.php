<?php

include "./vendor/autoload.php";

use pzsql\src\class\BD;

/**
 * Genera una conexión SQL usando los datos guardados en SESSION
 *
 * @return BD
 */
function sql():BD{
    return $connect = new BD($_SESSION["user"], $_SESSION["password"]);
}

/**
 * Devuelve todas las bases de datos alojadas en el servidor SQL
 *
 * @return array
 */
function  getDatabaseList():array{
    $baseDataList = sql()->Select('SHOW DATABASES;');
    $list = [];
    foreach($baseDataList as $database){
        $list[] = $database['Database'];
    }
    return $list;
}

/**
 * Lista las tablas de una base de datos dada
 *
 * @param string Base de datos de la cual
 * @return array
 */
function listTablesFrom(string $database):array{
    $tables = sql()->Select('SHOW TABLES FROM '.$database.';');

    $nonArray = [];
    foreach($tables as $table){
        $nonArray[] = $table["Tables_in_$database"];
    }
    return $nonArray;
}

/**
 * Undocumented function
 *
 * @param string $user
 * @param string $password
 * @return void
 */
function sqlogin(string $user, string $password):void{
    $connect = new BD($user, $password);
    $_SESSION["user"]=$user;
    $_SESSION["password"]=$password;
}

/**
 * Elimina los datos de usuario y te devuelve a la pagina de logeo
 *
 * @return void
 */
function sqlogout():void{
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