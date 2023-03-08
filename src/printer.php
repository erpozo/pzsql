<?php

include "./vendor/autoload.php";

use pzsql\src\function;

function listDatabaseH1(){
    foreach( getDatabaseList() as $database){
        echo "<h1>".$database."</h1>";
    }
}

function navDatabase(){
}

function databaseInput(){
    foreach( getDatabaseList() as $database){
        echo "<input type='submit' name='database' value='$database'>";
    }
}

function databaseLinks(){
    foreach( getDatabaseList() as $database){
        echo "<a href='database.php?database=$database'>$database</a><br>";
    }
}

function databaseButtons(){
    foreach( getDatabaseList() as $database){
        echo "<a href='database.php?database=$database'>$database</a><br>";
    }
}

function databaseTableButtons(){
    foreach( getDatabaseList() as $database){
        echo "<a href='database.php?database=$database'>$database</a><br>";
    }
}

function serverData(){
    echo "<h2>Versión de PHP: ".phpversion()."</h2>";
    echo "<h2>Servidor HTTP: ".apache_get_version()."</h2>";
}

function dataToHtml(array|null $array, string $tag){
    $text = "";
    foreach ($array as $data){
        $text .= "<$tag>$data</$tag>";
    }
    return $text;
}

function printTables(string $database){;
    return dataToHtml(listTablesFrom($database), "h2");
}
?>