<?php
//Tipo de jugador que hereda de la clase jugador
class Base extends Jugador
{

  private $asistencias;

  public function __construct($dorsal, $nombre, $estatura, $asistencias)
  {
    //llamando al constructor del padre y pasándola los valores
    parent::__construct($dorsal, $nombre, $estatura);
    $this->asistencias = $asistencias;
  }
  //Set y get mágico
  public function __get($name)
  {
    switch ($name) {
      case 'Asistencias':
        return $this->asistencias;
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
      case 'Asistencias':
        $this->asistencias = $value;
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
