<?php
include("../controlador/conexion.php");
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
    //VALIDO SI EXISTE ID EN URL O NO
    if (isset($_GET["id"])) {
        $idUsuario = $_GET["id"];
        //RETORNAR UN ARRAY DE OBJETOS
        $consulta = $conexion->query("select * from tblusuario where id_usuario='$idUsuario'")->fetchAll(PDO::FETCH_OBJ);
        //RECORREMOS EL ARRAY CON EL FOREACH
        foreach ($consulta as $dato) :
    ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="txtId" id="txtId" value="<?php echo $dato->id_usuario; ?>"><br>
                <label>Nombres: </label>
                <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $dato->usu_nombre; ?>"><br>
                <label>Apellidos: </label>
                <input type="text" name="txtApellido" id="txtApellido" value="<?php echo $dato->usu_apellido; ?>"><br>
                <label>Edad: </label>
                <input type="number" name="txtEdad" id="txtEdad" value="<?php echo $dato->usu_edad; ?>"><br>
                <label>Fecha de Nacimiento: </label>
                <input type="date" name="txtFechanacimiento" id="txtFechanacimiento" value="<?php echo $dato->usu_fechanacimiento; ?>"><br>
                <input type="submit" name="btnModificar" id="btnModificar" value="Actualizar"><br>
            </form>
    <?php
        endforeach;
    }
    ?>
    <?php
    //VERIFICO SI EL BOTON MODIFICAR ESTA ACTIVADO
    if (isset($_POST["btnModificar"])) {
        $idus = $_POST["txtId"];
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $edad = $_POST["txtEdad"];
        $fechnac = $_POST["txtFechanacimiento"];
        $sql = ("update tblusuario set usu_nombre=:nom, usu_apellido=:ape, usu_edad=:ed, usu_fechanacimiento=:fec where id_usuario = :id");
        $result = $conexion->prepare($sql);
        $result->execute(array(":nom" => $nombre, ":ape" => $apellido, ":ed" => $edad, ":fec" => $fechnac, ":id" => $idus));
        echo "<script>alert('Registro Actualizado');location='../formulario.php';</script>";
        // echo "<script>alert('Error en la actualizacion del registo');</script>";
    }
    ?>
</body>

</html>