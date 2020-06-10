<?php
include("conexion.php");

if (isset($_POST["nombre"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $fechanac = $_POST["fechanac"];
    $user = $_POST["usuario"];
    $pass = $_POST["password"];

    $sql = "insert into tblusuario (usu_nombre, usu_apellido, usu_fechanacimiento, usu_edad, usu_login, usu_password) 
            values ('$nombre','$apellido','$fechanac','$edad','$user','$pass')";

    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        die("La consulta ha fallado.");
    }
    echo "Registro Guardado";
}
