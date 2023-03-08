<?php
    include "./vendor/autoload.php";
    use pzsql\src\printer;
    use pzsql\src\functions;
    session_start();
    $database = $_SESSION["database"];
    $database = $_GET["database"];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
            include "./headinfo.php";
        ?>
    </head>

    <body>
        

        <p><a href="javascript:mostrar();">Añadir Tabla</a></p>
        <div id="flotante" style="display:none;">
            <div id="close"><a href="javascript:cerrar();">Cancelar</a></div>
            <form action="./database.php" method="post">
                
                <label for="tableName">Nombre de la tabla:</label><br>
                <input type="text" name="tableName"><br>

                <input type="submit" name="createTable" value="Añadir">
            </form>
        </div>

        <?php
            echo "<h1>$database</h1>";
            echo printTables($database);
        ?>
        <form action="./home.php" method="post">
            <input type="submit" name="logout" value="Salir">
        </form>
        
        <?php
            
            if (isset(($_POST['createTable']))) {
                createTable($database,$_POST['tableName']);
            }

        ?>
    </body>
</html>