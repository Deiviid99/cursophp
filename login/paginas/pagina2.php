<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("location:../login.php");
    }
    ?>
    <a href="home.php">Regresar al menu principal</a>
    <h1>Esto es solo para usuarios</h1>
    <h4>Bienvenido User: <?php echo $_SESSION["user"]; ?></h4>
    <p>Estas en la pagina 2</p>
    <a href="../sesion/cerrar.php">Cerrar Sesion</a>
</body>

</html>