<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    try {
        //CONEXION A LA BD
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

            echo "<script>alert('Bienvenido.');location='paginas/home.php';</script>";
        } else {
            header("location:login.php");
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
        //echo "El error en la linea: ". $e->getLine();
    }
    ?>
</body>

</html>