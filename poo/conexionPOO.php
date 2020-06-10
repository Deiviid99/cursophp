<?php
//CONEXION DE BASE DE DATOS EN POO
require("config.php");

class Conexion
{
    protected $conexion_db;

    public function Conexion()
    {
        //INGRESAR AL METODO O FUNCION PARA PEDIR PARAMETROS DE LA CONEXION
        $this->conexion_db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        //COMPARA SI EXISTE ALGUN ERROR DE CONEXION
        if ($this->conexion_db->connect_errno) {
            echo "Falla al conectar: " . $this->conexion_db->connect_error;
            return;
        }
        //UTILIZAR LOS CARACTERES LATINOS
        $this->conexion_db->set_charset(DB_CHARSET);
    }
}
