<?php
//require_once("model/config.php");
class Conectar
{
    public static function Conexion()
    {
        try {
            $conexion = new PDO("mysql:host=localhost; dbname=cursophp", "root", "");
            //$conexion = new PDO(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec("SET CHARACTER SET utf8");
           // $conexion->exec(DB_CHARACTER);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
            echo "Linea del error: " . $e->getLine();
        }
        return $conexion;
    }
}
