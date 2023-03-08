<?php
//Tipo de jugador que hereda de la clase jugador
class Escolta extends Jugador
{
    private $robos;

    public function __construct($dorsal, $nombre, $estatura, $robos)
    {
        //llamando al constructor del padre y pasándola los valores
        parent::__construct($dorsal, $nombre, $estatura);
        $this->robos = $robos;
    }
    //Set y get mágico
    public function __get($name)
    {
        switch ($name) {
            case 'Robos':
                return   $this->robos;
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
            case 'Robos':
                $this->robos = $value;
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
