<?php
//CONEXION DE BASE DE DATOS EN POO
require("config.php");

class ConexionPDO
{
    protected $conexion_db;

    public function ConexionPDO()
    {
        try {
            $this->conexion_db = new PDO('mysql:host=localhost; dbname=cursophp', 'root', '');
            $this->conexion_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion_db->exec("SET CHARACTER SET utf8");
            return $this->conexion_db;
        } catch (Exception $e) {
            echo "Error en la linea: " . $e->getLine();
        }
    }
}
