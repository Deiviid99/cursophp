<?php
require_once("model/conectar.php");
//LLAMO AL METODO DE CONECTAR
$conexion = Conectar::Conexion();
$tamano_pagina = 25;
//VALIDAR SI VIAJA POR URL EL NUMERO DE LA PAGINA 
if (isset($_GET["pagina"])) {
    if ($_GET["pagina"] == 1) {
        header("location:proveedores.php");
    } else {
        $pagina = $_GET["pagina"];
    }
} else {
    $pagina = 1;
}
$empezar_desde = ($pagina - 1) * $tamano_pagina;
$sql_total = "select * from tblproveedor where pro_estado='A'";
$resultado = $conexion->prepare($sql_total);
$resultado->execute(array());
//OBTENEMOS EL NUMERO DE FILAS
$num_fila = $resultado->rowCount();
$total_pagina = ceil($num_fila / $tamano_pagina);
