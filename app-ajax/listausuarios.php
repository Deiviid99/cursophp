<?php
include("conexion.php");


$sql = "select * from tblusuario where usu_estado = 'A'";
$resultado = mysqli_query($conexion, $sql);
if (!$resultado) {
    die("Error de Consulta: " . mysqli_error($conexion));
}
$json = array();
while ($fila = mysqli_fetch_array($resultado)) {
    $json[] = array(
        "Id" => $filas["id_usuario"],
        "Nombre" => $filas["usu_nombre"],
        "Apellido" => $filas["usu_apellido"],
        "Edad" => $filas["usu_edad"],
        "Fecha_de_Nacimiento" => $filas["usu_fechanacimiento"],
        "Usuario" => $filas["usu_login"],
        "Password" => $filas["usu_password"]
    );
}
$json_str = json_encode($json);
echo $json_str;
