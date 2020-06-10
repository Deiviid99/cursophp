<?php
include("../modelo/usuarios.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>
    <form action="" method="GET">
        <label>Ingrese el texto a buscar</label>
        <input type="text" name="txtBuscar" id="txtBuscar">
        <input type="submit" name="btnBuscar" id="btnBuscar" value="Buscar">
    </form>
    <table>
        <?php
        //VERIFICAR SI SE DIO CLICK EN EL BOTON
        if (isset($_GET["btnBuscar"])) {
            //OBTENER EL RESULTADO DE LA FUNCION
            $resultado = buscarUsuarios();
            //RECORRER LO QUE TRAE EL RESULTADO QUE ES VARIAS FILAS CADA UNA ES UN ARRAY ASOCIATIVO
            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                $id = $fila["id_usuario"]; ?>
                <tr>
                    <td><?php echo $fila["id_usuario"] ?></td>
                    <td><?php echo $fila["usu_nombre"] ?></td>
                    <td><?php echo $fila["usu_apellido"] ?></td>
                    <td><?php echo $fila["usu_edad"] ?></td>
                    <td><?php echo $fila["usu_fechanacimiento"] ?></td>
                    <td><a href="actualizarusuarios.php?id_usuario=<?php echo $id; ?>">Actualizar</a></td>
                    <td><a href="../modelo/usuarios.php?id_usuario=<?php echo $id; ?>">Eliminar</a></td>
                </tr>
            <?php } ?>
    </table>

<?php } else { ?>
    <table>
        <?php
            //OBTENER EL RESULTADO DE LA FUNCION
            $resultado = obtenerUsuarios();
            //RECORRER LO QUE TRAE EL RESULTADO QUE ES VARIAS FILAS CADA UNA ES UN ARRAY ASOCIATIVO
            while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                $id = $fila["id_usuario"]; ?>
            <tr>
                <td><?php echo $fila["id_usuario"] ?></td>
                <td><?php echo $fila["usu_nombre"] ?></td>
                <td><?php echo $fila["usu_apellido"] ?></td>
                <td><?php echo $fila["usu_edad"] ?></td>
                <td><?php echo $fila["usu_fechanacimiento"] ?></td>
                <td><?php echo $fila["usu_estado"] ?></td>
                <td><a href="actualizarusuarios.php?id_usuario=<?php echo $id; ?>">Actualizar</a></td>
                <td><a href="../modelo/usuarios.php?id_usuario=<?php echo $id; ?>">Eliminar</a></td>
            </tr>
        <?php } ?>
    </table>

<?php } ?>
</body>

</html>