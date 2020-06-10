<?php

class Coche
{
    //ATRIBUTOS
    var $ruedas;
    var $color;
    var $motor;
    var $puertas;
    private $placa; // ENCAPSULAR Y SOLO ES ACCESIBLE DENTRO DE SU MISMA CLASE
    protected $velocidad; // ACCESIBLE DESDE LA CLASE PRINCIPAL Y LAS QUE HEREDAN 
    //METODO CONSTRUCTOR
    function Coche()
    {
        $this->ruedas = 4;
        $this->color = "";
        $this->motor = 1600;
        $this->puertas = 4;
        $this->placa = "";
        $this->velocidad = 250;
    }

    //METODOS O FUNCIONES SIEMPRE Y CUANDO ESTEN DENTRO DE UNA CLASE
    function getVelocidad()
    {
        return $this->velocidad; //GET PARA VER LAS PROPIEDADES
    }
    function arrancar()
    {
        echo "Estoy arrancando. <br>";
    }
    function frenar()
    {
        echo "Estoy frenando. <br>";
    }
    function girar()
    {
        echo "Estoy girando. <br>";
    }
    function estacionar()
    {
        echo "Estoy estacionado. <br>";
    }
    function setColor($colorCoche)
    {
        $this->color = $colorCoche;
        echo "El color de este coche es: " . $this->color . "<br>";
    }

    function setPlaca($placaCoche)
    {
        $this->placa = $placaCoche;
        echo "La placa de este coche es: " . $this->placa . "<br>";
    }
}

/* -----------------------------------------------------------------------------------------------*/

class Camion extends Coche
{

    //METODO CONSTRUCTOR
    function Camion()
    {
        $this->ruedas = 4;
        $this->color = "";
        $this->motor = 3500;
        $this->puertas = 2;
        $this->placa = "";
        $this->velocidad = 150;
    }

    //METODOS O FUNCIONES SIEMPRE Y CUANDO ESTEN DENTRO DE UNA CLASE- USANDO PARENT llama al metodo de la clase padre
    function arrancar()
    {
        parent::arrancar();
        echo "Soy camion. <br>";
    }
    //METODOS O FUNCIONES SIEMPRE Y CUANDO ESTEN DENTRO DE UNA CLASE- SOBREESCRIBIR UN METODO HEREDADO

    function setColor($colorCamion)
    {
        $this->color = $colorCamion;
        echo "El color de este camion es: " . $this->color . "<br>";
    }

    function setPlaca($placaCamion)
    {
        $this->placa = $placaCamion;
        echo "La placa de este camion es: " . $this->placa . "<br>";
    }
}

/* -----------------------------------------------------------------------------------------------*/

class Trailer extends Camion
{
    //METODO CONSTRUCTOR
    function Trailer()
    {
        $this->ruedas = 8;
        $this->color = "";
        $this->motor = 4500;
        $this->puertas = 2;
        $this->placa = "";
        $this->velocidad = "";
    }
    //METODOS O FUNCIONES SIEMPRE Y CUANDO ESTEN DENTRO DE UNA CLASE - SOBREESCRIBIR UN METODO HEREDADO
    function setColor($colorTrailer)
    {
        $this->color = $colorTrailer;
        echo "El color de este trailer es: " . $this->color . "<br>";
    }
    function setPlaca($placaTrailer)
    {
        $this->placa = $placaTrailer;
        echo "La placa de este trailer es: " . $this->placa . "<br>";
    }
}
