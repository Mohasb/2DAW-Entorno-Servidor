<?php
//Update de un libro de la bbdd
function actualizaLibro($id, $titulo, $autor, $paginas) {

    require_once('../Modelo/consulta.php');
    $myquery = new Consulta();
    //llamada a modelo y ejecución
    $myquery->updateLibro($id, $titulo, $autor, $paginas);
    //redirijo a la página principal
    header('location:../Vista/ud04ejer04.php');
    exit();
}

?>