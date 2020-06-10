<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    try {
        $conexion = new PDO("mysql:host=localhost; dbname=cursophp", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        $sql = "select pro_imagen from tblproveedor where id_proveedor=3";
        $resultado = $conexion->prepare($sql);
        $resultado->execute(array());
        while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)) { ?>
            <img src="/img/uploads/<?php echo $filas['pro_imagen']; ?>" alt="Imagen" width="10%">
    <?php
            $resultado->closeCursor();
        }
    } catch (Exception $e) {
        echo "Error en el Envio. " . $e;
    } finally {
        //VACIAR LA MEMORIA USADA POR LA SENTENCIA SQL
        $conexion = NULL;
    }
    ?>
</body>

</html>