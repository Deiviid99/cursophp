<?php
include("../funciones/funciones.php");

if (isset($_POST["btnAceptar"])) {
    $numeroUno = $_POST["txtNumeroUno"];
    $numeroDos = $_POST["txtNumeroDos"];
    $operacion = $_POST["cmbOperacion"];
    calcularOperacion($numeroUno,$numeroDos,$operacion);
}

?>