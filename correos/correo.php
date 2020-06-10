<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="enviar_mail.php" method="POST">
        <label>Nombre: </label>
        <input type="text" name="txtNombre" id="txtNombre"><br>
        <label>Apellido: </label>
        <input type="text" name="txtApellido" id="txtApellido"><br>
        <label>E-mail: </label>
        <input type="text" name="txtEmail" id="txtEmail"><br>
        <label>Telefono: </label>
        <input type="text" name="txtTelefono" id="txtTelefono"><br>
        <label>Asunto: </label>
        <input type="text" name="txtAsunto" id="txtAsunto"><br>
        <label>Comentarios: </label>
        <textarea name="txtComentario" id="txtComentario" cols="30" rows="10"></textarea><br>
        <input type="submit" name="btnEnviarcorreo" id="btnEnviarcorreo" value="Enviar"><br>
    </form>
</body>

</html>