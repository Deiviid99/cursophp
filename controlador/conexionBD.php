<?php
class Conexion
{
    private $host;
    private $user;
    private $password;
    private $name;
    protected $conectarbase;
    function Conexion()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->name = "cursophp";
        $this->password = "";
    }
    function Conectar()
    {
    }
}
