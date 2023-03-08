<?php
//Tipo de jugador que hereda de la clase jugador
class Pivot extends Jugador
{
    private $rebotes;

    public function __construct($dorsal, $nombre, $estatura, $rebotes)
    {
        //llamando al constructor del padre y pasándola los valores
        parent::__construct($dorsal, $nombre, $estatura);
        $this->rebotes = $rebotes;
    }
    //Set y get mágico
    public function __get($name)
    {
        switch ($name) {
            case 'Rebotes':
                return   $this->rebotes;
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
            case 'Rebotes':
                $this->Rebotes = $value;
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
