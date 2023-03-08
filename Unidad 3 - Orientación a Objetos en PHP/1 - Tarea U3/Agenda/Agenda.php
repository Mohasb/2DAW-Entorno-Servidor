<?php

class Agenda
{

    private $arrayContactos = [];

    //Setter y getter mágicos
    public function __set($name, $value)
    {
        switch ($name) {
            case 'ArrayContactos':
                $this->arrayContactos = $value;
                break;
            default:
                break;
        }
    }
    public function __get($name)
    {
        switch ($name) {
            case 'ArrayContactos':
                return $this->arrayContactos;
                break;
            default:
                break;
        }
    }

    //Clone mágico
    public function __clone()
    {
        //Recorro el array de contactos como un objeto contacto
        foreach ($this->arrayContactos as $contacto) {
            //Este subObjeto del array es igual a clonar el contacto
            //Asi se clonan los objetos dentro del array que hasta ahora eran referencias a los originales pero ahora son objetos diferentes
            $this->arrayContactos[$contacto->Id] = clone $contacto;
        }
    }

    //Método que añade un contacto al array de contactos
    public function addContact(Contacto $cont)
    {
        //Si se introduce un contacto con id duplicado no sobrescribe el que hay
        if (key_exists($cont->Id, $this->arrayContactos)) {
            //Si ya existe la clave del contacto en el array sale
            return;
        }
        //Añade como array asociativo el id como key y como valor un objeto de la clase Contacto
        $this->arrayContactos[$cont->Id] = $cont;
    }


    //Método que elimina un contacto mediante el id
    public function deleteContact($id)
    {
        //Elimina el contacto en el id que es la key en el array
        unset($this->arrayContactos[$id]);
    }


    //Método que retorna los contactos en formato elementos de una lista 
    public function mostrarLista()
    {

        $cadena = "";
        //Recorro el array de contactos como un objeto contacto
        foreach ($this->arrayContactos as $contacto) {
            //A cada iteración concateno una linea a la cadena que contendrá las propiedades del contacto y un enlace a la página info_contacto.php con 3 variables pasadas por _GET
            $cadena .= "<li>$contacto <a href=\"info_contacto.php?id=$contacto->Id&nombre=$contacto->Nombre&telefono=$contacto->Telefono\">Ver contacto</a></li><br>";
        }
        return $cadena;
    }


    //Retorna un string con las propiedades de los contactos en formato rows para una tabla 
    public function __toString()
    {
        $cadena = "";
        foreach ($this->arrayContactos as $contacto) {
            $cadena .= "<tr>" .
                "<td>" . $contacto->Id . "</td>" .
                "<td>" . $contacto->Nombre . "</td>" .
                "<td>" . $contacto->Telefono . "</td>" .
                "</tr>";
        }
        return $cadena;
    }
}
