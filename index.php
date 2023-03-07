<?php
    include "./vendor/autoload.php";
    session_start();
    $_SESSION["user"]="";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
            //include "./headinfo.php";
        ?>
    </head>

    <body>
        <form action="./index.php" method="post">

            <label for="user">Usuario:</label><br>
            <input type="text" name="user"><br>

            <label for="password">PassWord:</label><br>
            <input type="password" name="password"><br>

            <input type="submit" name="loginsql" value="Submit">
        </form>

    <?php

        if (isset(($_POST['loginsql']))) {
            try {
                sqlogin($_POST['user'], $_POST['password']);
            }
            catch (Exception $error) {
                echo "<h2>Usuario o contraseña incorrectos</h2>";
            }
        }
        if($_SESSION["user"]!=""){
            header("Location: ./home.php");
        }

    ?>

    </body>
</html>