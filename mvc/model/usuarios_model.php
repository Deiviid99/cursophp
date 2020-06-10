<?php

class Usuarios_model
{
    private $conn;
    private $usuarios;

    public function __construct()
    {
        require_once("model/conectar.php");
        //ALACENAR LA CONEXION ESTATICA DENTRO DE LA VARIABLES
        $this->conn = Conectar::Conexion();
        //DEFINIMOS A LA VARIABLE EN UN ARRAY
        $this->usuarios = array();
    }

    //OBTENER USUARIOS
    public function getUsuarios()
    {
        $consulta = $this->conn->query("select * from tblusuario where usu_estado='A'");
        //RECORRER EL ARRAY ASOCIATIVO Y ESE REGISTRO LO ALMACENA DENTRO DE FILAS QUE LUEGO VA ALMACENAR EN EL ARRAY USUARIOS
        while ($filas = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $this->usuarios[] = $filas;
        }
        return $this->usuarios;
    }
}
