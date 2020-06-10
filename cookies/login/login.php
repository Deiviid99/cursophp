<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>

<body>
    <?php
    //CREAR UNA VARIABLE PARA VERIFICAR SI ESTA AUTENTICADO
    $autenticar = false;
    if (isset($_POST["btnIngresar"])) {
        try {
            $conexion = new PDO("mysql:host=localhost; dbname=cursophp", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "select * from tblusuario where usu_login = :log and usu_password = :pass and usu_estado='A'";
            $result = $conexion->prepare($sql);
            //CAPTURAR LOS DATOS CONVIERTE  CUALQUIER SIMBOLO EN HTML y ADDSLASHES EVITA CARACTERES ESPECIALES
            $usuario = htmlentities(addslashes($_POST["txtUsuario"]));
            $password = htmlentities(addslashes($_POST["txtPassword"]));
            //USAR ESTA FUNCION CUANDO SE ESTABLECE A TRAVES DE MARCADORES
            $result->bindValue(":log", $usuario);
            $result->bindValue(":pass", $password);
            //EJECUTAR EL SQL
            $result->execute();
            //CAPTURAR LO QUE RETORNA EL ROW COUNT SEA 0 / 1
            $valor = $result->rowCount();
            if ($valor != 0) {
                //CAMBIAR EL ESTADO DE AUTENTICADO A TRUE
                $autenticar = true;
                //VERIFICAR SI EL USUARIO ACTIVO O NO EL CHECKBOX
                if (isset($_POST["chkGuardar"])) {
                    //CREAMOS LA COOKIE
                    setcookie("nombreUsuario", $_POST["txtUsuario"], time() + 86400);
                }
            } else {
                echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
            //echo "El error en la linea: ". $e->getLine();
        }
    }
    ?>
    <?php
    //VALIDAMOS SI NO EXISTE SESION PARA QUE INCLUYA EL CONTENIDO DEL LOGIN
    if ($autenticar == false) {
        if (!isset($_COOKIE["nombreUsuario"])) {
            include("formularios/tmp_login.php");
        }
    }
    //MOSTRAR EL NOMBRE DEL USUARIO QUE CONTIENE EN LA COOKIE
    if (isset($_COOKIE["nombreUsuario"])) {
        echo "Bienvenido: " . $_COOKIE["nombreUsuario"] . "<br>" . "<a href='quitarCookie.php'>Cerrar Sesión</a>";
        //MOSTRAR EL NOMBRE DE USUARIO DEL LOGIN SIN COOKIE       
    } else if ($autenticar == true) {
        echo "Bienvenido: " . $_POST["txtUsuario"] . "<br>" . "<a href='quitarCookie.php'>Cerrar Sesión</a>";
    }
    ?>
    <h2>Contenido Web</h2>
    <table>
        <tr>
            <td>UNO</td>
        </tr>
        <tr>
            <td>DOS</td>
        </tr>
        <tr>
            <td>TRES</td>
        </tr>
        <tr>
            <td>CUATRO</td>
        </tr>
    </table>
    <?php
    //AGREGAR CONTENIDO SI EL USUARIOS INICIO SESION CON COOKIE O SIN COOKIE
    if ($autenticar == true || isset($_COOKIE["nombreUsuario"])) {
        include("formularios/tmp_contenido.php");
    }
    ?>

</body>

</html>