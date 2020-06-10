<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ingrese sus credenciales</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Usuario: </label>
        <input type="text" name="txtUsuario" id="txtUsuario">
        <br>
        <label>Contraseña: </label>
        <input type="password" name="txtPassword" id="txtPassword">
        <br>
        <label>Recordar contraseña</label>
        <input type="checkbox" name="chkGuardar" id="chkGuardar">
        <br>
        <input type="submit" name="btnIngresar" id="btnIngresar" value="Ingresar">
    </form>
</body>

</html>