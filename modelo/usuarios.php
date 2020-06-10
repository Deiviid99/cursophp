<?php
include("../controlador/conexionBD.php");

function obtenerUsuarios()
{
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "select * from tblusuario where usu_estado='A'";
    //CREA UNA TABLA EN MEMORIA CON TODA LA INFORMACION DE LA BD
    $result = mysqli_query($dato, $query);
    //RETORNO UN RESULTADO
    return $result;
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_close($dato);
}

function obtenerUsuariosxID($id)
{
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "select * from tblusuario where id_usuario=$id";
    //CREA UNA TABLA EN MEMORIA CON TODA LA INFORMACION DE LA BD
    $result = mysqli_query($dato, $query);
    //RETORNO UN RESULTADO
    return $result;
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_close($dato);
}

function buscarUsuarios()
{
    //OBTENER EN LA URL EL PARAMETRO DE BUSQUEDA
    $buscar = $_GET["txtBuscar"];
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "select * from tblusuario where usu_nombre LIKE'%$buscar%' and usu_estado='A'";
    //CREA UNA TABLA EN MEMORIA CON TODA LA INFORMACION DE LA BD
    $result = mysqli_query($dato, $query);
    //RETORNO UN RESULTADO
    return $result;
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_close($dato);
}

function insertarUsuarios()
{
    //CAPTURAMOS LO INGRESADO POR EL USUARIO
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $edad = $_POST["txtEdad"];
    $fechanacimiento = $_POST["txtFechanacimiento"];
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "insert into tblusuario (usu_nombre, usu_apellido, usu_edad, usu_fechanacimiento) values ('$nombre','$apellido','$edad','$fechanacimiento')";
    //CREA UNA TABLA EN MEMORIA CON TODA LA INFORMACION DE LA BD
    $result = mysqli_query($dato, $query);
    //VALIDA SI LA CONSULTA SE REALIZO CORRECTAMENTE
    if ($result) {
        echo "<script>alert('Registro guardado.');location='../vista/listausuarios.php';</script>";
    } else {
        echo "<script>alert('Error de guardado.');location='../vista/insertarusuarios.php';</script>";
    }
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_close($dato);
}

function eliminarUsuarios($idusu)
{
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "update tblusuario set usu_estado='I' where id_usuario=$idusu";
    //CREA UNA TABLA EN MEMORIA CON TODA LA INFORMACION DE LA BD
    $result = mysqli_query($dato, $query);
    //VALIDA SI LA CONSULTA SE REALIZO CORRECTAMENTE
    if ($result) {
        //COMPROBAR QUE UNA FILA DE LA TABLA FUE AFECTADA
        if (mysqli_affected_rows($dato) == 1) {
            echo "<script>alert('Registro eliminado.');location='../vista/listausuarios.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar el registro seleccionado.');location='../vista/listausuarios.php';</script>";
        }
    } else {
        echo "<script>alert('Error al eliminar registro.');location='../vista/insertarusuarios.php';</script>";
    }
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_close($dato);
}

function actualizarUsuarios()
{
    //CAPTURAMOS LO INGRESADO POR EL USUARIO
    $idusu = $_POST["txtID"];
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $edad = $_POST["txtEdad"];
    $fechanacimiento = $_POST["txtFechanacimiento"];
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "update tblusuario set usu_nombre='$nombre', usu_apellido='$apellido', usu_edad='$edad', usu_fechanacimiento='$fechanacimiento' where id_usuario=$idusu";
    //CREA UNA TABLA EN MEMORIA CON TODA LA INFORMACION DE LA BD
    $result = mysqli_query($dato, $query);
    //VALIDA SI LA CONSULTA SE REALIZO CORRECTAMENTE
    if ($result) {
        //COMPROBAR QUE UNA FILA DE LA TABLA FUE AFECTADA
        if (mysqli_affected_rows($dato) == 1) {
            echo "<script>alert('Registro actualizado.');location='../vista/listausuarios.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar el registro seleccionado.');location='../vista/listausuarios.php';</script>";
        }
    } else {
        echo "<script>alert('Error al actualizar registro.');location='../vista/listausuarios.php';</script>";
    }
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_close($dato);
}

// REALIZAR ACCION CUANDO SE DE CLICK EN BOTONES
if (isset($_POST["btnGuardar"])) {
    insertarUsuarios();
} elseif (isset($_POST["btnActualizar"])) {
    actualizarUsuarios();
} elseif (isset($_POST["btnGuardarDato"])) {
    prcinsertarUsuarios();
} elseif (isset($_POST["btnRegistrar"])) {
    pdoInsertarUsuarios();
} elseif (isset($_POST["btnLogin"])) {
    pdoUsuariosLogin();
}

/*$idusu = $_GET["id_usuario"];
if ($idusu != null) {
    eliminarUsuarios($idusu);
} else {
    echo "Error.";
}*/

/*----------------------------------------------CONSULTAS ALMACENADAS---------------------------------------------*/
function prcBuscarUsuarios()
{
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
    }
    //RETORNO EL RESULTADO
    return $result;
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_stmt_close($result);
}

function prcObtenerUsuarios()
{
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "select * from tblusuario where usu_estado='A'";
    //LA FUNCION DEVUELVE UN V O F - PREPARA LA CONSULTA SQL
    $result = mysqli_prepare($dato, $query);
    //RETORNO EL RESULTADO
    return $result;
}

function ejecutarConsulta($result)
{
    $respuestaResult = mysqli_stmt_execute($result);
    return $respuestaResult;
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_stmt_close($result);
}

function prcinsertarUsuarios()
{
    //CAPTURAMOS LO INGRESADO POR EL USUARIO
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $edad = $_POST["txtEdad"];
    $fechanacimiento = $_POST["txtFechanacimiento"];
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "insert into tblusuario (usu_nombre, usu_apellido, usu_edad, usu_fechanacimiento) values (?,?,?,?)";
    //PREPARAR LA CONSULTA SQL
    $result = mysqli_prepare($dato, $query);
    //UNIR LOS PARAMTEROS ASIGNADOS A LA CONSULTA SQL
    $respuestaResult = mysqli_stmt_bind_param($result, "ssis", $nombre, $apellido, $edad, $fechanacimiento);
    //EJECUTAMOS LA CONSULTA
    $respuestaResult = mysqli_stmt_execute($result);
    if ($respuestaResult == false) {
        echo "Error al ejecutar la consulta.";
    } else {
        echo "<script>alert('Registro guardado correctamente.');location='../vista/listaprcusuarios.php';</script>";
        mysqli_stmt_close($result);
    }
}



/*----------------------------------------------CONSULTAS PDO ALMACENADAS---------------------------------------------*/
function pdoInsertarUsuarios()
{
    //CAPTURAMOS LO INGRESADO POR EL USUARIO
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $edad = $_POST["txtEdad"];
    $fechanacimiento = $_POST["txtFechanacimiento"];
    $login = $_POST["txtUsuario"];
    $password = $_POST["txtPassword"];
    //ENCRIPTAR EL PASSWORD
    $password_crypt = password_hash($password, PASSWORD_DEFAULT, array("cost" => 12));
    try {
        //INSTANCIAMOS LA CLASE PDO = OBJETO
        $conexion =  new PDO('mysql:host=localhost; dbname=cursophp', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        //USO DE UN MARCADOR :
        $sql = "insert into tblusuario (usu_nombre, usu_apellido, usu_edad, usu_fechanacimiento, usu_login, usu_password) 
                values (:nom, :ape, :eda, :fechanac, :usu, :pass)";
        $result = $conexion->prepare($sql);
        //ASIGNAR EN EL ARRAY A CUAL HACE REFERENCIA DEL MARCADOR Y EJECUTA LA CONSULTA
        $result->execute(array(
            ":nom" => $nombre, ":ape" => $apellido, ":eda" => $edad, ":fechanac" => $fechanacimiento,
            ":usu" => $login, ":pass" => $password_crypt
        ));

        echo "<script>alert('Registro guardado.');location='../vista/listausuarios.php';</script>";
        $result->closeCursor();
    } catch (Exception $e) {
        //die("Error: " . $e->getMessage());
        echo "Error en la linea: " . $e->getLine();
    } finally {
        //VACIAR LA MEMORIA USADA POR LA SENTENCIA SQL
        $conexion = NULL;
    }
}
function pdoUsuariosLogin()
{
    try {
        //CAPTURAMOS LO INGRESADO POR EL USUARIO
        $login = htmlentities(addslashes($_POST["txtUsuario"]));
        $password = htmlentities(addslashes($_POST["txtPassword"]));
        $contador = 0;
        //INSTANCIAMOS LA CLASE PDO = OBJETO
        $conexion =  new PDO('mysql:host=localhost; dbname=cursophp', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        //USO DE UN MARCADOR :
        $sql = "select * from tblusuario where usu_login = :usulog";
        $result = $conexion->prepare($sql);
        //ASIGNAR EN EL ARRAY A CUAL HACE REFERENCIA DEL MARCADOR Y EJECUTA LA CONSULTA
        $result->execute(array(":usulog" => $login));
        while ($registro = $result->fetch(PDO::FETCH_ASSOC)) {
            //COMPROBAR LA CONTRASEÑA INGRESADA CON LA BASE
            if (password_verify($password, $registro["usu_password"])) {
                $contador++;
            }
        }
        if ($contador > 0) {
            echo "<script>alert('Bienvenidos.');location='../vista/listaprcusuarios.php';</script>";
        } else {
            echo "<script>alert('Usuario o Contraseña incorrectos.');location='../encriptar/login.php';</script>";
        }
        $result->closeCursor();
    } catch (Exception $e) {
        //die("Error: " . $e->getMessage());
        echo "Error en la linea: " . $e->getLine();
    } finally {
        //VACIAR LA MEMORIA USADA POR LA SENTENCIA SQL
        $conexion = NULL;
    }
}
