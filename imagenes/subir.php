<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="envio.php" method="POST" enctype="multipart/form-data">
        <label>Seleccione la imagen: </label>
        <input type="file" name="imgNombre" id="imgNombre"><br>
        <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar">
    </form>
    <a href="ver_imagen.php">Ver la imagen</a>
</body>

</html> 