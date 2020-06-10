<?php
//RECIBIMOS LOS DATOS DE LA IMAGEN
$nombre_imagen = $_FILES["imgNombre"]["name"];
$tipo_imagen = $_FILES["imgNombre"]["type"];
$tamano_imagen = $_FILES["imgNombre"]["size"];
//VALIDAMOS EL TAMAÑO Y EL TIPO DE ARCHIVO QUE SE VA ALMACENAR
if ($tamano_imagen <= 3000000) {
    if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png") {
        //INDICAMOS EL DIRECTORIO DESTINO EN SERVIDOR DONDE GUARDAD LA IMAGEN
        $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "/img/uploads/";
        //MOVER LA IMAGEN DEL DIRECTORIO TEMPORAL AL DIRECTORIO ESCOGIDO EN EL SERVIDOR
        move_uploaded_file($_FILES["imgNombre"]["tmp_name"], $carpeta_destino . $nombre_imagen);
        //ENVIAR A LA BASE DE DATOS LA DIRECCION DE LA RUTA DE LA IMAGEN
        try {
            $conexion = new PDO("mysql:host=localhost; dbname=cursophp", "root", "");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
            $sql = "update tblproveedor set pro_imagen='$nombre_imagen' where id_proveedor=1";
            $resultado = $conexion->prepare($sql);
            $resultado->execute(array());
            echo "<script>alert('Envio correcto');location='subir.php';</script>";
            $resultado->closeCursor();
        } catch (Exception $e) {
            echo "Error en el Envio. " . $e;
        } finally {
            //VACIAR LA MEMORIA USADA POR LA SENTENCIA SQL
            $conexion = NULL;
        }
    } else {
        echo "<script>alert('El tipo de imagen no es compatible');location='subir.php';</script>";
    }
} else {
    echo "<script>alert('El tamaño es grande');location='subir.php';</script>";
}
