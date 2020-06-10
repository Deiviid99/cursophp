<?php
include("../modelo/usuarios.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Actualizacion</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>
    <?php
    //OBTENEMOS EL ID A TRAVES DE LA URL
    $id = $_GET["id_usuario"];
    $resultado = obtenerUsuariosxID($id);
    //RECORRER EL RESULTADO DE LA FILA E IR CAPTURANDO EN CADA UNA DE LAS CAJAS DE TEXTO
    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) { ?>
        <form action="../modelo/usuarios.php" method="POST">
            <label>Codigo: </label>
            <input type="text" name="txtID" id="txtID" disabled="" value="<?php echo $fila['id_usuario']; ?>"><br>
            <label>Nombres: </label>
            <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $fila['usu_nombre']; ?>"><br>
            <label>Apellidos: </label>
            <input type="text" name="txtApellido" id="txtApellido" value="<?php echo $fila['usu_apellido']; ?>"><br>
            <label>Edad: </label>
            <input type="number" name="txtEdad" id="txtEdad" value="<?php echo $fila['usu_edad']; ?>"><br>
            <label>Fecha de Nacimiento: </label>
            <input type="date" name="txtFechanacimiento" id="txtFechanacimiento" value="<?php echo $fila['usu_fechanacimiento']; ?>"><br>
            <input type="submit" name="btnActualizar" id="btnActualizar" value="Actualizar"><br>
        </form>
    <?php } ?>
</body>

</html>