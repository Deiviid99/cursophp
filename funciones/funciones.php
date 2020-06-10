<?php

function obtenerDatos()
{
    echo "Este es el mensaje de la funcion <br>";
}

function darNombre()
{
    global $nombre;
    $nombre = "El nombre es: " . $nombre;
}

function incrementaVariable()
{
    static $contador = 0;
    $contador++;
    echo $contador . "<br>";
}

function calcularOperacion($num1, $num2, $opcion)
{
    $resultado = 0;
    if ($opcion == "Suma") {
        $resultado = $num1 + $num2;
        echo "<p>El resultado es: " . $resultado . "</p>";
    } elseif ($opcion == "Resta") {
        $resultado = $num1 - $num2;
        echo "<p>El resultado es: " . $resultado . "</p>";
    } elseif ($opcion == "Multiplicacion") {
        $resultado = $num1 * $num2;
        echo "<p>El resultado es: " . $resultado . "</p>";
    } elseif ($opcion == "Division") {
        if ($num2 == 0 || $num2 == "") {
            echo "<p>No se puede divir para CERO.</p>";
        } else {
            $resultado = $num1 / $num2;
            echo "<p>El resultado es: " . $resultado . "</p>";
        }
    } else {
        if ($num2 == 0 || $num2 == "") {
            echo "<p>No se puede divir para CERO.</p>";
        } else {
            $resultado = $num1 % $num2;
            echo "<p>El resultado es: " . $resultado . "</p>";
        }
    }
}

function incrementaParametro($valor){
    $valor++;
    return $valor;
}

function incrementaReferencia(&$valor){
    $valor++;
    return $valor;
}

?>