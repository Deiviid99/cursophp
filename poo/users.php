<?php
require('conexionPOO.php');

class Users extends Conexion
{
    public function Users()
    {
        //ACCEDEMOS AL CONSTRUCTOR QUE NOS ESTA HEREDANDO
        parent::Conexion();
    }

    //METODO PARA LISTAR USUARIOS
    public function obtenerUsers()
    {
        //CAPTURAR LA CONSULTA
        $result = $this->conexion_db->query("select * from tblusuario");
        //AGREGAMOS A UN ARRAY ASOCIATIVO LA CONSULTA 
        $usuarios = $result->fetch_all(MYSQLI_ASSOC);
        //RETORNE EL ARRAY
        return $usuarios;
    }

    //METODO PARA LISTAR USUARIOS
    public function obtenerUsersxNombre($nom)
    {
        //CAPTURAR LA CONSULTA
        $resultado = $this->conexion_db->query("select * from tblusuario where usu_nombre='" . $nom . "'");
        //AGREGAMOS A UN ARRAY ASOCIATIVO LA CONSULTA 
        $usuariosnombre = $resultado->fetch_all(MYSQLI_ASSOC);
        //RETORNE EL ARRAY
        return $usuariosnombre;
    }
}
