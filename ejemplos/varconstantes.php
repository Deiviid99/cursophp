<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables Constantes</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a>
    <?php
    define("NOMBRE", "David", true);
    echo "Su nombre es: " . NOMBRE;
    echo "La linea de esta instruccion es: " . __LINE__;

    ?>
</body>

</html>