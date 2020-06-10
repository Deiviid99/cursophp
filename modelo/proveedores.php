<?php
include("../controlador/conexionBD.php");

function obtenerProveedores()
{
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "select * from tblproveedor";
    //CREA UNA TABLA EN MEMORIA CON TODA LA INFORMACION DE LA BD
    $result = mysqli_query($dato, $query);
    //RETORNO UN RESULTADO
    return $result;
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_close($dato);
}

function buscarProveedores()
{
    //PASANDO POR URL EL PARAMETRO DE BUSQUEDA
    $buscar = $_GET["txtBuscar"];
    //INSTANCIO LA CLASE DE BASE DE DATOS
    $conexionbd = new Conexion();
    $dato = $conexionbd->Conectar();
    //FUNCION PARA INCLUIR LETRAS ESPECIALES LATINAS
    mysqli_set_charset($dato, "utf8");
    //ALMACENA EN UNA VARIBALE LA SENTENCIA SQL
    $query = "select * from tblproveedor where pro_nombre LIKE'%$buscar%'";
    //CREA UNA TABLA EN MEMORIA CON TODA LA INFORMACION DE LA BD
    $result = mysqli_query($dato, $query);
    //RETORNO UN RESULTADO
    return $result;
    //FINALIZAR UNA CONEXION Y OPTIMIZAR RECURSOS
    mysqli_close($dato);
}
