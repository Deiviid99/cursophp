<?php
include("../modelo/usuarios.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procedimientos Almacenados</title>
</head>

<body>
    <a href="../index.php">Ir al menu principal</a><br>
    <form action="" method="GET">
        <label>Ingrese el texto a buscar</label>
        <input type="text" name="txtBuscardato" id="txtBuscardato">
        <input type="submit" name="btnBuscardato" id="btnBuscardato" value="Buscar">
    </form>
    <a href="insertarprcusuarios.php">Crear usuario</a>
    <table>
        <?php
        //VERIFICAR SI SE DIO CLICK EN EL BOTON
        if (isset($_GET["btnBuscardato"])) {
            /*//OBTENER EL RESULTADO DE LA FUNCION
            $result = prcBuscarUsuarios();*/
            //OBTENER EN LA URL EL PARAMETRO DE BUSQUEDA
            $buscar = $_GET["txtBuscardato"];
            //INSTANCIO LA CLASE DE BASE DE DATOS
            $conexionbd = new Conexion();
            $dato = $conexionbd->Conectar();
            //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
            mysqli_set_charset($dato, "utf8");
            //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
            $query = "select * from tblusuario where usu_estado='A' and usu_nombre = ?";
            //LA FUNCION DEVUELVE UN V O F - PREPARA LA CONSULTA SQL
            $result = mysqli_prepare($dato, $query);
            //LA FUNCION SE ENCARGA DE UNIR LOS PARAMETROS A LA CONSULTA SQL
            $respuestaResult = mysqli_stmt_bind_param($result, "s", $buscar);
            //EJECUTA LA CONSULTA
            $respuestaResult = mysqli_stmt_execute($result);
            //VALIDAR QUE LA CONSULTA TENGA EXITO
            if ($respuestaResult == false) {
                echo "Error al ejecutar la consulta.";
            } else {
                //ASOCIAR LAS VARIBALES AL RESULTADO DE LA CONSULTA
                $respuestaResult = mysqli_stmt_bind_result($result, $idusuario, $nombre, $apellido, $edad, $fechanac, $estado);
                //RECORRER LO QUE TRAE EL RESULTADO QUE ES VARIAS FILAS CADA UNA ES UN ARRAY ASOCIATIVO
                while (mysqli_stmt_fetch($result)) { ?>
                    <tr>
                        <td><?php echo $idusuario; ?></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $apellido; ?></td>
                        <td><?php echo $edad; ?></td>
                        <td><?php echo $fechanac; ?></td>
                        <td><?php echo $estado; ?></td>
                        <td><a href="actualizarusuarios.php?id_usuario=<?php echo $idusuario; ?>">Actualizar</a></td>
                        <td><a href="../modelo/usuarios.php?id_usuario=<?php echo $idusuario; ?>">Eliminar</a></td>
                    </tr>
            <?php }
            } ?>
    </table>

<?php } else { ?>
    <table>
        <?php
            //OBTENER EL RESULTADO DE LA FUNCION
            //$result = prcobtenerUsuarios();
            //$respuestaResult = ejecutarConsulta($result);
            //INSTANCIO LA CLASE DE BASE DE DATOS
            $conexionbd = new Conexion();
            $dato = $conexionbd->Conectar();
            //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
            mysqli_set_charset($dato, "utf8");
            //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
            $query = "select * from tblusuario where usu_estado='A'";
            //LA FUNCION DEVUELVE UN V O F - PREPARA LA CONSULTA SQL
            $result = mysqli_prepare($dato, $query);
            //EJECUTA LA CONSULTA
            $respuestaResult = mysqli_stmt_execute($result);
            //VALIDAR QUE LA CONSULTA TENGA EXITO
            if ($respuestaResult == false) {
                echo "Error al ejecutar la consulta.";
            } else {
                //ASOCIAR LAS VARIBALES AL RESULTADO DE LA CONSULTA
                $respuestaResult = mysqli_stmt_bind_result($result, $idusuario, $nombre, $apellido, $edad, $fechanac, $estado);
                //RECORRER LO QUE TRAE EL RESULTADO QUE ES VARIAS FILAS CADA UNA ES UN ARRAY ASOCIATIVO
                while (mysqli_stmt_fetch($result)) {
        ?>
                <tr>
                    <td><?php echo $idusuario; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $apellido; ?></td>
                    <td><?php echo $edad; ?></td>
                    <td><?php echo $fechanac; ?></td>
                    <td><?php echo $estado; ?></td>
                    <td><a href="actualizarusuarios.php?id_usuario=<?php echo $idusuario; ?>">Actualizar</a></td>
                    <td><a href="../modelo/usuarios.php?id_usuario=<?php echo $idusuario; ?>">Eliminar</a></td>
                </tr>
        <?php }
            }
        ?>
    </table>
<?php } ?>
</body>

</html>