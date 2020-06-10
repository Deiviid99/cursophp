<?php
include("../modelo/usuarios.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>
    <form action="../modelo/usuarios.php" method="POST">
        <label>Nombres: </label>
        <input type="text" name="txtNombre" id="txtNombre"><br>
        <label>Apellidos: </label>
        <input type="text" name="txtApellido" id="txtApellido"><br>
        <label>Edad: </label>
        <input type="number" name="txtEdad" id="txtEdad"><br>
        <label>Fecha de Nacimiento: </label>
        <input type="date" name="txtFechanacimiento" id="txtFechanacimiento"><br>
        <input type="submit" name="btnGuardarDato" id="btnGuardarDato" value="Guardar"><br>
    </form>
</body>

</html>