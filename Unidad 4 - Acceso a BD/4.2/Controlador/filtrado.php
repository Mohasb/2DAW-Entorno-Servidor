<?php
//retorna una tabla con los libros filtrados por titulo indicado por el usuario 
function tablaLibrosFiltrados($titulo)
{
    require_once('../Modelo/consulta.php');
    $myquery = new Consulta();

    $rows = $myquery->filtraLibros($titulo); //Aqui se reciben los datos y se guardan en array
    if (!$rows)
        $string = "No hay libros que contengan: '$titulo'";
    else {
        $string = "<table border>";
        $string .= "<tr><th>Id</th><th>titulo</th><th>Autor</th><th>Páginas</th></tr>";
        foreach ($rows as $row) {
            $string .= "<tr><td>" . $row['id'] . "</td><td>" . $row['titulo'] . "</td><td>" . $row['autor'] . "</td><td>" . $row['paginas'] .
                //Este enlace lleva a eliminar.php pasando el id por GET(como no hace falta interaccion de usuario se llama directamente al controlador que pide a modelo la acción)
                "</td><td><a href=\"../Controlador/eliminar.php?id=" . $row['id'] . "\">eliminar</a>" .
                //Este enlace lleva a modificar.php, una vista con todos los datos de libro para que sea modificado por el usuario
                "</td><td><a href=\"../Vista/modificar.php?id=" . $row['id'] . "\">modificar</a>" . "</td>";
        }
        $string .= "</table>";
    }
    return $string;
}
