<?php
include("controlador/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>

<body>
    <?php
    //----------------------------PAGINACION-----------------------------------
    $tamano_pagina = 5;
    //VALIDAR SI VIAJA POR URL EL NUMERO DE LA PAGINA 
    if (isset($_GET["pagina"])) {
        if ($_GET["pagina"] == 1) {
            header("location:formulario.php");
        } else {
            $pagina = $_GET["pagina"];
        }
    } else {
        $pagina = 1;
    }
    $empezar_desde = ($pagina - 1) * $tamano_pagina;
    $sql_total = "select * from tblusuario where usu_estado='A'";
    $resultado = $conexion->prepare($sql_total);
    $resultado->execute(array());
    //OBTENEMOS EL NUMERO DE FILAS
    $num_fila = $resultado->rowCount();
    $total_pagina = ceil($num_fila / $tamano_pagina);
    //----------------------------------------------------------------------------
    //ALMACENAMOS EN LA VARIABLE UN ARRAY DE OBJETOS 
    $consulta = $conexion->query("select * from tblusuario where usu_estado='A' limit $empezar_desde, $tamano_pagina")->fetchAll(PDO::FETCH_OBJ);
    ?>
    <h1>CRUD</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr>
                <td>Id</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Edad</td>
                <td>Fecha de Nacimiento</td>
            </tr>

            <?php
            //POR CADA OBJETO QUE EXISTE EN EL ARRAY REPITE EL CODIGO QUE ESTA DENTRO
            foreach ($consulta as $dato) :
            ?>
                <tr>
                    <td><?php echo $dato->id_usuario; ?></td>
                    <td><?php echo $dato->usu_nombre; ?></td>
                    <td><?php echo $dato->usu_apellido; ?></td>
                    <td><?php echo $dato->usu_edad; ?></td>
                    <td><?php echo $dato->usu_fechanacimiento; ?></td>
                    <td><a href="modelo/modificar.php?id=<?php echo $dato->id_usuario; ?>"><input type="button" name="btnActualizar" id="btnActualizar" value="Modificar"></a></td>
                    <td><a href="modelo/eliminar.php?id=<?php echo $dato->id_usuario; ?>"><input type="button" name="btnBorrar" id="btnBorrar" value="Eliminar"></a></td>
                </tr>
            <?php
            endforeach;
            ?>
            <tr>
                <td></td>
                <td><input type="text" name="txtNombre" id="txtNombre"></td>
                <td><input type="text" name="txtApellido" id="txtApellido"></td>
                <td><input type="number" name="txtEdad" id="txtEdad"></td>
                <td><input type="date" name="txtFechanacimiento" id="txtFechanacimiento"></td>
                <td><input type="submit" name="btnAgregar" id="btnAgregar" value="Agregar"></td>
            </tr>
        </table>
    </form>
    <?php
    //---------------------------------MOSTRAR LA PAGINACION------------------------
    for ($i = 1; $i <= $total_pagina; $i++) {
    ?>
        <a href="?pagina=<?php echo $i ?>"><?php echo $i ?></a>
    <?php
    }
    //-------------------------------------------------------------------------------
    ?>
    <?php
    //VALIDAR SI EL BOTON DE AGREGAR ESTA ACTIVADO
    if (isset($_POST["btnAgregar"])) {
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $edad = $_POST["txtEdad"];
        $fechnac = $_POST["txtFechanacimiento"];

        $sql = ("insert into tblusuario (usu_nombre, usu_apellido, usu_edad, usu_fechanacimiento )
                values(:nom, :ape, :ed, :fec)");
        $result = $conexion->prepare($sql);
        $result->execute(array(":nom" => $nombre, ":ape" => $apellido, ":ed" => $edad, ":fec" => $fechnac));
        echo "<script>alert('Registro Guardado');location='formulario.php';</script>";
    }
    ?>
</body>

</html>