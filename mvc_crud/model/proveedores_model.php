<?php

class Proveedores_model
{
    private $conn;
    private $proveedores;

    public function __construct()
    {
        require_once("model/conectar.php");
        $this->conn = Conectar::Conexion();
        $this->proveedores = array();
    }

    //OBTENER LOS PROVEEDORES
    public function getProveedores()
    {
        require("paginacion_proveedores.php");
        $consulta = $this->conn->query("select * from tblproveedor where pro_estado='A' limit $empezar_desde, $tamano_pagina");
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->proveedores[] = $filas;
        }
        return $this->proveedores;
    }
}
