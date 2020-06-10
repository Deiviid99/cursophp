<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays</title>
</head>

<body>
<a href="../index.php">Ir al menu principal</a><br>
    <?php

    /*DECLARACION DE ARRAY INDEXADO*/
    $semana = array("Lunes", "Martes", "Miercoles");

    //echo $semana[2];

    //RECORRER UN ARRAY INDEXADO
    for ($i = 0; $i < count($semana); $i++) {
        echo $semana[$i] . "<br>";
    }

    /*DECLARACION DE ARRAY ASOCIATIVO*/
    $datos = array("Nombre" => "David", "Apellido" => "Heredia", "Edad" => 20);
    //AGREGAR DATOS A UN ARRAY ASOCIATIVO
    $datos["Pais"] = "Ecuador";

    //echo $datos["Nombre"];

    //RECORRER UN ARRAY ASOCIATIVO CON FOREACH
    foreach ($datos as $dat => $valor) {
        echo "A $dat le corresponde $valor <br>";
    }

    //COMPROBAR SI ES UN ARRAY
    if (is_array($datos)) {
        echo "Es un array";
    } else {
        echo "No es un array";
    }


    ?>
</body>

</html>