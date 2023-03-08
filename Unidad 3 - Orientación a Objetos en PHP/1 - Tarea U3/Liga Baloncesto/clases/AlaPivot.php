<?php
//Tipo de jugador que hereda de la clase jugador
class AlaPivot extends Jugador
{

    private $tapones;

    public function __construct($dorsal, $nombre, $estatura, $tapones)
    {
        //llamando al constructor del padre y pasándola los valores
        parent::__construct($dorsal, $nombre, $estatura);
        $this->tapones = $tapones;
    }
    //Set y get mágico
    public function __get($name)
    {
        switch ($name) {
            case 'Tapones':
                return   $this->tapones;
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
            case 'Tapones':
                $this->tapones = $value;
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
