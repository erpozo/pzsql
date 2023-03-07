<?php
    include "./vendor/autoload.php";
    use pzsql\src\printer;
    use pzsql\src\functions;
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
            //include "./headinfo.php";
        ?>
    </head>

    <body>
        <form action="./home.php" method="post">
            <input type="submit" name="logout" value="Salir">
        </form>

        
        <form action="./home.php" method="get">
            <?php
                databaseInput();
            ?>
        </form>

        <?php
            if (isset(($_POST['logout']))) {
                sqlogout();
                header("Location: ./index.php");
            }
            if (isset(($_GET['database']))) {
                header("Location: ./database.php");
            }
            databaseLinks();
            //echo dataToHtml(getDatabaseList(),"h1");


        ?>
    </body>
</html>