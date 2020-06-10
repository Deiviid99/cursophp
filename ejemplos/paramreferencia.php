<?php
include("../funciones/funciones.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parametro por referencia</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>
    <?php
    $numeroParametro = 11;
    $numeroReferencia = 12;
    echo incrementaParametro($numeroParametro) . " = Funcion parametro<br>";
    echo $numeroParametro . "<br>";
    echo incrementaReferencia($numeroReferencia) . "= Funcion referencia<br>";
    echo $numeroReferencia;
    ?>
</body>

</html>