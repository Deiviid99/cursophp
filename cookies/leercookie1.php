<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_COOKIE["prueba"])) {
        //MOSTRAR LOS DATOS ALMACENADOS DE UNA COOKIE
        echo $_COOKIE["prueba"];
    } else {
        echo "La cookie no se ha creado.";
    }
    ?>
</body>

</html>