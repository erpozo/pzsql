<?php
    include "./vendor/autoload.php";
    use pzsql\src\printer;
    use pzsql\src\functions;
    session_start();
    $database = $_GET["database"];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
            //include "./headinfo.php";
        ?>
    </head>

    <body>
        
        <?php
            echo "<h1>$database</h1>";
            echo listTables($database);
        ?>
        <form action="./home.php" method="post">
            <input type="submit" name="logout" value="Salir">
        </form>
        
        <?php


        ?>
    </body>
</html>