<?php
include("../clases/ventas.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>
    <?php
    $gam = "Todoterreno";
    $tapiz = "Beige";
    /*APLICACION DE DESCUENTO ESTATICO PARA TODOS LOS OBJETOS O INSTANCIAS*/
    //Ventas::$ayuda=1000;
    Ventas::Descuento();
    $ventaCliente = new Ventas($gam);
    $ventaCliente->Climatizador();
    $ventaCliente->NavegacionGPS();
    $ventaCliente->Tapiceria($tapiz);
    echo "El valor a cancelar es: " . $ventaCliente->getTotal() . " dólares.";
    ?>

</body>

</html>