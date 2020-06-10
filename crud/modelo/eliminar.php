<?php
include("../controlador/conexion.php");

$idUsuario = $_GET["id"];

$consulta = $conexion->query("update tblusuario set usu_estado='I' where id_usuario=$idUsuario");

header("location:../formulario.php");
