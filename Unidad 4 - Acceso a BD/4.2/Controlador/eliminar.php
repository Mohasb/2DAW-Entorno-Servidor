<?php

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    
    require_once('../Modelo/consulta.php');
    $myquery = new Consulta();
    //llama a método del modelo para eliminar un libro
    $myquery->eliminaLibro($id);
    //Redirijo a la página principal que al recargar ya no mostrará el libro eliminado
    header('location:../Vista/ud04ejer04.php');
    exit();
}
