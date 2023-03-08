<?php 
//Clase abstracta que será el 'padre' de las demás clases de jugadores
abstract class Jugador {

    protected $dorsal;
    protected $nombre;
    protected $estatura;

    public function __construct($dorsal, $nombre, $estatura)
    {
        $this->dorsal = $dorsal;
        $this->nombre = $nombre;
        $this->estatura = $estatura;
    }
    //set get mágico
    public function __get($name)
    {
        switch ($name) {
            case 'Dorsal':
              return   $this->dorsal;
                break;
            case 'Nombre':
              return   $this->nombre;
                break;
            case 'Estatura':
                return $this->estatura;
                break;
        }
    }
    public function __set($name, $value)
    {
        switch ($name) {
            case 'Dorsal':
                $this->dorsal = $value;
                break;
            case 'Nombre':
                $this->nombre = $value;
                break;
            case 'Estatura':
                $this->estatura = $value;
                break;
        }
    }
}


?>