<?php
class Contacto
{

    private $id;
    private $nombre;
    private $telefono;

    //Constructor mágico
    public function __construct($id, $nombre, $telefono)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    //Setters y getters mágicos
    public function __set($name, $value)
    {
        switch ($name) {
            case 'Id':
                $this->id = $value;
                break;
            case 'Nombre':
                $this->nombre = $value;
                break;
            case 'Telefono':
                $this->telefono = $value;
                break;
            default:
                break;
        }
    }
    public function __get($name)
    {
        switch ($name) {
            case 'Id':
                return $this->id;
                break;
            case 'Nombre':
                return $this->nombre;
                break;
            case 'Telefono':
                return $this->telefono;
                break;
            default:
                break;
        }
    }

    //__toString mágico
    public function __toString()
    {
        return "$this->ids - $this->nombre ($this->telefono)";
        //return $this->
    }
}
