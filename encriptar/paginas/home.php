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
    //COMPRUEBA SI LA CONEXION ESTA ABIERTA   
    if (!isset($_SESSION["user"])) {
        header("location:../login.php");
    }
    ?>
    <h1>Esto es solo para usuarios</h1>
    <h4>Bienvenido User: <?php echo $_SESSION["user"]; ?></h4>
    <p>Estas en el sistema de setechma</p>
    <a href="../sesion/cerrar.php">Cerrar Sesion</a>
    <li><a href="pagina1.php">Pagina 1</a></li>
    <li><a href="pagina2.php">Pagina 2</a></li>
    <li><a href="pagina3.php">Pagina 3</a></li>
    <li><a href="pagina4.php">Pagina 4</a></li>
    <li><a href="pagina5.php">Pagina 5</a></li>
</body>

</html>