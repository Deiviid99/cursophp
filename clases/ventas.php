<?php
class Ventas
{
    private static $ayuda = 0; //ESTE CAMPO PERTENECE A TODA LA CLASE Y COMPARTE SU INFORMACION HACIA LAS INSTANCIAS
    private $precio;

    function Ventas($gama)
    {

        if ($gama == "Microauto") {
            $this->precio = 9500;
        } elseif ($gama == "Todoterreno") {
            $this->precio = 15000;
        } elseif ($gama == "Minivan") {
            $this->precio = 20000;
        }
    }


    //METODO ESTATICO
    static function Descuento()
    {
        if (date("m-d-y") > "05-02-20") {
            self::$ayuda = 4500;
        }
    }

    //METODOS DE CLASE
    function Climatizador()
    {
        $this->precio += 3000;
    }

    function NavegacionGPS()
    {
        $this->precio += 2800;
    }

    function Tapiceria($tapiz)
    {
        if ($tapiz == "Blanco") {
            $this->precio += 1500;
        } elseif ($tapiz == "Negro") {
            $this->precio += 1600;
        } elseif ($tapiz == "Beige") {
            $this->precio += 1700;
        }
    }

    function getTotal()
    {
        $valTotal = $this->precio - self::$ayuda; //SELF PARA OBTENER VARIBALES ESTATICAS
        return $valTotal;
    }
}
