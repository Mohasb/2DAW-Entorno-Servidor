<?php
//Tipo de jugador que hereda de la clase jugador
class Alero extends Jugador
{
    private $puntos;

    public function __construct($dorsal, $nombre, $estatura, $puntos)
    {
        //llamando al constructor del padre y pasándola los valores
        parent::__construct($dorsal, $nombre, $estatura);
        $this->puntos = $puntos;
    }
    //Set y get mágico
    public function __get($name)
    {
        switch ($name) {
            case 'Puntos':
                return   $this->puntos;
                break;
            case 'Dorsal':
            case 'Nombre':
            case 'Estatura':
                return parent::__get($name);
                break;
            default:
                return "Error: Propiedad no encontrada";
                break;
        }
    }
    public function __set($name, $value)
    {
        switch ($name) {
            case 'Puntos':
                $this->puntos = $value;
                break;
            case 'Dorsal':
            case 'Nombre':
            case 'Estatura':
                parent::__set($name, $value);
                break;
            default:
                return "Error: Propiedad no encontrada";
                break;
        }
    }
}
