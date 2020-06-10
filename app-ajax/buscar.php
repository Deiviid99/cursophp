<?php
include("conexion.php");

$buscar = $_POST['buscar'];

if (!empty($buscar)) {
    $sql = "select * from tblusuario where usu_nombre like '%$buscar%'";
    $resultado = mysqli_query($conexion, $sql);
    if (!$resultado) {
        die("Error de Consulta: " . mysqli_error($conexion));
    }
    $json = array();
    while ($fila = mysqli_fetch_array($resultado)) {
        //LLENAR EL JSON CON EL ARRAY QUE TRAE DE LA CONSULTA
        $json[] = array(
            "Id" => $fila["id_usuario"],
            "Nombre" => $fila["usu_nombre"],
            "Apellido" => $fila["usu_apellido"],
            "Edad" => $fila["usu_edad"],
            "Fecha de Nacimiento" => $fila["usu_fechanacimiento"]
        );
    }
    //CONVERTIR EL JSON PARA ENVIARLO Y ESTO ME TRAE UN STRING
    $json_string = json_encode($json);
    echo $json_string;
}
