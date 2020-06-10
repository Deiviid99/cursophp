<?php
require('users.php');
//INSTANCIAMOS LA CLASE
$usuarios = new Users();
//ALMACENA LO QUE DEVUELVE EL METODO
$array_usuarios = $usuarios->obtenerUsers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //RECORREMOS EL ARRAY ASOCIATIVO DEVUELTO
    foreach ($array_usuarios as $dato) {
    ?>
        <table>
            <tr>
                <td><?php echo $dato["id_usuario"]; ?></td>
                <td><?php echo $dato["usu_apellido"]; ?></td>
                <td><?php echo $dato["usu_nombre"]; ?></td>
                <td><?php echo $dato["usu_edad"]; ?></td>
                <td><?php echo $dato["usu_fechanacimiento"]; ?></td>
                <td><a href="actualizarusuarios.php?id_usuario=<?php echo $dato['id_usuario']; ?>">Actualizar</a></td>
                <td><a href="../modelo/usuarios.php?id_usuario=<?php echo $dato['id_usuario']; ?>">Eliminar</a></td>
            </tr>
        </table>
    <?php
    }
    ?>

</body>

</html>