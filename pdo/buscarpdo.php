<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="GET">
        <label>Ingrese el nombre: </label>
        <input type="text" name="txtBuscardato" id="txtBuscardato">
        <label>Ingrese la edad: </label>
        <input type="number" name="txtEdad" id="txtEdad">
        <input type="submit" name="btnBuscardato" id="btnBuscardato" value="Buscar">
    </form>
    <?php
    $busquedaDato = $_GET["txtBuscardato"];
    $busquedaEdad = $_GET["txtEdad"];
    try {
        //INSTANCIAMOS LA CLASE PDO = OBJETO
        $conexion =  new PDO('mysql:host=localhost; dbname=cursophp', 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET utf8");
        //USO DE UN MARCADOR :
        $sql = "select * from tblusuario where usu_nombre =:nom and usu_edad =:ed and usu_estado='A' ";
        $result = $conexion->prepare($sql);
        //ASIGNAR EN EL ARRAY A CUAL HACE REFERENCIA DEL MARCADOR Y EJECUTA LA CONSULTA
        $result->execute(array(":nom" => $busquedaDato, ":ed" => $busquedaEdad));
        while ($dato = $result->fetch(PDO::FETCH_ASSOC)) {
            echo $dato["usu_apellido"] . " " . $dato["usu_fechanacimiento"] . "<br>";
        }
        $result->closeCursor();
    } catch (Exception $e) {
        //die("Error: " . $e->getMessage());
        echo "Error en la linea: " . $e->getLine();
    } finally {
        //VACIAR LA MEMORIA USADA POR LA SENTENCIA SQL
        $conexion = NULL;
    }
    ?>

</body>

</html>