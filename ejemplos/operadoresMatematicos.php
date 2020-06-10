<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operaciones Matematicas</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a>
    <h1>Formulario de Operaciones</h1>
    <form action="../validaciones/operaciones.php" method="POST">
        <label>Numero 1: </label>
        <input type="text" name="txtNumeroUno" id="txtNumeroUno"><br>
        <label>Numero 2: </label>
        <input type="text" name="txtNumeroDos" id="txtNumeroDos"><br>
        <label>Seleccione el tipo de operacion:</label>
        <select name="cmbOperacion" id="cmbOperacion">
            <option>Suma</option>
            <option>Resta</option>
            <option>Multiplicacion</option>
            <option>Division</option>
            <option>Modulo</option>
        </select>
        <br>
        <input type="submit" name="btnAceptar" id="btnAceptar" value="Aceptar">
    </form>
</body>
</html>