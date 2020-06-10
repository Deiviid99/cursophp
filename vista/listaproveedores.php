<?php
include("../modelo/proveedores.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>
    <form action="" method="GET">
        <label>Ingrese el texto a buscar</label>
        <input type="text" name="txtBuscar" id="txtBuscar">
        <input type="submit" name="btnBuscar" id="btnBuscar" value="Buscar">
    </form>
    <?php
    //VERIFICAR SI SE DIO CLICK EN EL BOTON
    if (isset($_GET["btnBuscar"])) {
        //OBTENER EL RESULTADO DE LA FUNCION
        $resultado = buscarProveedores();
        //RECORRER LO QUE TRAE EL RESULTADO QUE ES VARIAS FILAS CADA UNA ES UN ARRAY ASOCIATIVO
        while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            echo "<table><tr><td>";
            echo $fila["id_proveedor"] . "</td><td>";
            echo $fila["pro_codigo"] . "</td><td>";
            echo $fila["pro_nombre"] . "</td><td>";
            echo $fila["pro_ruc"] . "</td><td>";
            echo $fila["pro_tipo"] . "</td><td>";
            echo $fila["pro_fecha"] . "</td><td>";
            echo $fila["pro_autorizacion"] . "</td><td>";
            echo $fila["pro_numerofactura"] . "</td><td>";
            echo $fila["pro_basecero"] . "</td><td>";
            echo $fila["pro_basedoce"] . "</td><td>";
            echo $fila["pro_iva"] . "</td><td>";
            echo $fila["pro_total"] . "</td><td>";
            echo $fila["pro_imagen"] . "</td><td>";
            echo $fila["pro_estado"] . "</td><td></tr></table>";
            echo "<br>";
            echo "<br>";
        }
    } else {
        //OBTENER EL RESULTADO DE LA FUNCION
        $resultado = obtenerProveedores();
        //RECORRER LO QUE TRAE EL RESULTADO QUE ES VARIAS FILAS CADA UNA ES UN ARRAY ASOCIATIVO
        while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            echo "<table><tr><td>";
            echo $fila["id_proveedor"] . "</td><td>";
            echo $fila["pro_codigo"] . "</td><td>";
            echo $fila["pro_nombre"] . "</td><td>";
            echo $fila["pro_ruc"] . "</td><td>";
            echo $fila["pro_tipo"] . "</td><td>";
            echo $fila["pro_fecha"] . "</td><td>";
            echo $fila["pro_autorizacion"] . "</td><td>";
            echo $fila["pro_numerofactura"] . "</td><td>";
            echo $fila["pro_basecero"] . "</td><td>";
            echo $fila["pro_basedoce"] . "</td><td>";
            echo $fila["pro_iva"] . "</td><td>";
            echo $fila["pro_total"] . "</td><td>";
            echo $fila["pro_imagen"] . "</td><td>";
            echo $fila["pro_estado"] . "</td><td></tr></table>";
            echo "<br>";
            echo "<br>";
        }
    }

    ?>
</body>

</html>