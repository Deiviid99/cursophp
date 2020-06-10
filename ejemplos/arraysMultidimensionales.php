<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Multidimensionales</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>
    <?php
    $alimentos = array("Fruta"=>array("Tropical"=>"Kiwi",
                                      "Citrica"=>"Limon",
                                      "Otros"=>"Manzana"),
                       "Leche"=>array("Animal"=>"Vaca",                                    
                                      "Vegetal"=>"Coco"),
                       "Carne"=>array("Vacuno"=>"Lomo",
                                      "Porcino"=>"Pata"));

   // echo $alimentos["Leche"]["Vegetal"];
    foreach ($alimentos as $fruta => $alm) {
        echo "$fruta: <br>";
        //LISTAR LO QUE ESTA DENTRO DE UN ARRAR MULTIDIMENSIONAL DE TIPO ASOCIATIVO
        while (list($dato,$valor)=each($alm)) {
            echo "$dato-$valor <br>";
        }
        echo "<br>";
    } 
    //VER LO DEL ARRAY
    echo var_dump($alimentos);
    ?>
</body>

</html>