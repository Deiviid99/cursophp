<?php
require('conexionPDO.php');

class Users extends ConexionPDO
{
    public function Users()
    {
        //ACCEDEMOS AL CONSTRUCTOR QUE NOS ESTA HEREDANDO
        parent::ConexionPDO();
    }

    //METODO PARA LISTAR USUARIOS
    public function obtenerUsersxNombre($nom)
    {
        //CAPTURAR LA CONSULTA
        $sql = "select * from tblusuario where usu_nombre='" . $nom . "'";
        $consulta = $this->conexion_db->prepare($sql);
        $consulta->execute(array());
        $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $consulta->closeCursor();
        return $result;
        $this->conexion_db = null;
    }
}
