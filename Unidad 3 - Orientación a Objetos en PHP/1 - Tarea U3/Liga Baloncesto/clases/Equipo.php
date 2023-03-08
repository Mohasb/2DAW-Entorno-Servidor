<?php
//Clase que crea el equipo
class Equipo
{
    private $nombre;
    private $quinteto;
    //El constructor recibe el nombre del equipo y 5 tipos de jugadores
    public function __construct($nombre, Base $base, Escolta $escolta, Alero $alero, Alapivot $alaPivot, Pivot $pivot)
    {
        $this->nombre = $nombre;
        $this->quinteto = [$base, $escolta, $alero, $alaPivot, $pivot];

        echo "<h1>Equipo: $nombre<br></h1>";
        //imprime el nombre y el tipo(clase de los integrantes) 
        foreach ($this->quinteto as $jugador) {
            echo "<tr><td>$jugador->Nombre</td><td>" . get_class($jugador) . "</td></tr>";
        }
    }
    //get mágico
    public function __get($name)
    {
        switch ($name) {
            case 'Nombre':
                return $this->nombre;
                break;
            case 'Quinteto':
                return $this->quinteto;
                break;
        }
    }
    //retorna la estatura media
    public function estaturaMedia()
    {

        $sumatorio = 0;
        foreach ($this->quinteto as $jugador) {
            $sumatorio += $jugador->Estatura;
        }
        return $sumatorio / count($this->quinteto);
    }
    //retorna la estatura maxima
    public function estaturaMaxima()
    {
        $estaturaMax = 0;
        foreach ($this->quinteto as $jugador) {
            if ($jugador->Estatura > $estaturaMax) {
                $estaturaMax = $jugador->Estatura;
            }
        }
        return $estaturaMax;
    }
}
