<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>

<body>
    <?php
    require("model/paginacion_usuarios.php");
    ?>
    <h1>Lista de Usuarios</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Edad</td>
                <td>Fecha de Nacimiento</td>
            </tr>
            <?php
            //RECORREMOS EL ARRAY
            foreach ($listausuarios as $usu) :
            ?>
                <tr>
                    <td><?php echo $usu["id_usuario"]; ?></td>
                    <td><?php echo $usu["usu_nombre"]; ?></td>
                    <td><?php echo $usu["usu_apellido"]; ?></td>
                    <td><?php echo $usu["usu_edad"]; ?></td>
                    <td><?php echo $usu["usu_fechanacimiento"]; ?></td>
                    <td><a href="modelo/modificar.php?id=<?php echo $usu["id_usuario"]; ?>"><input type="button" name="btnActualizar" id="btnActualizar" value="Modificar"></a></td>
                    <td><a href="modelo/eliminar.php?id=<?php echo $usu["id_usuario"]; ?>"><input type="button" name="btnBorrar" id="btnBorrar" value="Eliminar"></a></td>
                </tr>
            <?php
            endforeach;
            ?>
            <tr>
                <td></td>
                <td><input type="text" name="txtNombre" id="txtNombre"></td>
                <td><input type="text" name="txtApellido" id="txtApellido"></td>
                <td><input type="number" name="txtEdad" id="txtEdad"></td>
                <td><input type="date" name="txtFechanacimiento" id="txtFechanacimiento"></td>
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