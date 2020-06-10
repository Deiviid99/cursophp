<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>

<body>
    <?php
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
                //INICIAMOS LA SESION
                session_start();
                $_SESSION["user"] = $_POST["txtUsuario"];
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
    //VALIDAR DE QUE EL USUARIO AUN NO HAYA INICIADO SESION
    if (!isset($_SESSION["user"])) {
        //USAR CODIGO HTML
        include("formularios/tmp_login.php");
    } else {
        echo "Bienvenido: " . $_SESSION["user"];
    ?>
        <a href="sesion/cerrar.php">Cerrar Sesion</a>
    <?php }
    ?>
    <h2>Contenido Web</h2>
    <table>
        <tr>
            <td>UNO</td>
        </tr>
        <tr>
            <td>DOS</td>
        </tr>
    </table>

</body>

</html>