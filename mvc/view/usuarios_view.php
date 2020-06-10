<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>

<body>
    <h1>Lista de Usuarios</h1>
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
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>

</html>