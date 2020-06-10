<?php
include("../clases/vehiculos.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>

    <?php
    //ESTADO INICIAL AL OBJETO O INSTANCIA
    $ferrari = new Coche();
    $truck = new Camion();
    $trailers =  new Trailer();
    //VARIABLES PARA PASAR POR PARAMETRO
    $color = "Azul";
    $placa = "KDL8-880";
    //LLAMADA A UN METODO O FUNCION
    $truck->arrancar();
    $ferrari->frenar();
    $ferrari->girar();
    $ferrari->estacionar();
    $ferrari->setColor($color);
    $ferrari->setPlaca($placa);
    $truck->setColor("Celeste");
    $truck->setPlaca("K88-88");
    $trailers->setColor("Blanco");
    $trailers->setPlaca("QUIS-842");
    //LLAMANDO A UN ATRIBUTO DE LA CLASE
    echo "El ferrari tiene un motor: " . $ferrari->motor, "<br>";
    echo "El trailer tiene un motor: " . $trailers->motor, "<br>";
    echo "El camion tiene un motor: " . $truck->motor, "<br>";
    /*LLAMANDO A UN ATRIBUTO PROTECTED PARA VER SU VALOR QUE CONTIENE Y ESTA HEREDADO A OTRA CLASE O PRIVATE PARA VER EL
    ATRIBUTO DE UNA DETERMINADA CLASE*/
    echo "El ferrari tiene una velocidad de: " . $ferrari->getVelocidad() . " km/h <br>";
    echo "El camion tiene una velocidad de: " . $truck->getVelocidad() . " km/h";


    ?>
</body>

</html>