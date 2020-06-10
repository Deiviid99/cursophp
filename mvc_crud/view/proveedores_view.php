<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Proveedores</title>
</head>

<body>
    <?php
    //LLAMAR A LA PAGINACION
    require("model/paginacion_proveedores.php");
    ?>
    <h1>Lista de Proveedores</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr>
                <td>Id</td>
                <td>Codigo del Provedoor</td>
                <td>Nombre</td>
                <td>Ruc</td>
                <td>Tipo</td>
                <td>Fecha</td>
                <td>Autorizacion</td>
                <td>Numero de Factura</td>
                <td>Total</td>
            </tr>
            <?php
            //RECORREMOS EL ARRAY
            foreach ($listaproveedores as $pro) :
            ?>
                <tr>
                    <td><?php echo $pro["id_proveedor"]; ?></td>
                    <td><?php echo $pro["pro_codigo"]; ?></td>
                    <td><?php echo $pro["pro_nombre"]; ?></td>
                    <td><?php echo $pro["pro_ruc"]; ?></td>
                    <td><?php echo $pro["pro_tipo"]; ?></td>
                    <td><?php echo $pro["pro_fecha"]; ?></td>
                    <td><?php echo $pro["pro_autorizacion"]; ?></td>
                    <td><?php echo $pro["pro_numerofactura"]; ?></td>
                    <td><?php echo $pro["pro_total"]; ?></td>
                    <td><a href="modelo/modificar.php?id=<?php echo $pro["id_proveedor"]; ?>"><input type="button" name="btnActualizar" id="btnActualizar" value="Modificar"></a></td>
                    <td><a href="modelo/eliminar.php?id=<?php echo $pro["id_proveedor"]; ?>"><input type="button" name="btnBorrar" id="btnBorrar" value="Eliminar"></a></td>
                </tr>
            <?php
            endforeach;
            ?>
            <tr>
                <td></td>
                <td><input type="text" name="txtCodigo" id="txtCodigo"></td>
                <td><input type="text" name="txtNombre" id="txtNombre"></td>
                <td><input type="text" name="txtRuc" id="txtRuc"></td>
                <td><input type="text" name="txtTipo" id="txtTipo"></td>
                <td><input type="date" name="txtFecha" id="txtFecha"></td>
                <td><input type="text" name="txtAutorizacion" id="txtAutorizacion"></td>
                <td><input type="text" name="txtNumerofactura" id="txtNumerofactura"></td>
                <td><input type="text" name="txtTotal" id="txtTotal"></td>
                <td><input type="submit" name="btnAgregar" id="btnAgregar" value="Agregar"></td>
            </tr>
        </table>
    </form>
    <?php
    //---------------------------------MOSTRAR LA PAGINACION------------------------
    for ($i = 1; $i <= $total_pagina; $i++) {
    ?>
        <a href="?pagina=<?php echo $i ?>"><?php echo $i ?></a>
    <?php
    }
    //-------------------------------------------------------------------------------
    ?>
</body>

</html>