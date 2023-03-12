<?php

$id = $_GET['id'];
$titulo = $_GET['titulo'];
$autor = $_GET['autor'];
$paginas = $_GET['paginas'];



//Aqui se genrera un string con una url dinámica en función de las variables y los errores
//La instrodución de letras en los campos de numeros no genera una excepción por lo que se controla mediante is_numeric()
$url = "ud04ejer04.php";
if (empty($_GET['id'])) {
    $url .= '?id=';
} else {
    $url .= "?id=$id";
}

if (!empty($_GET['id']) && !is_numeric($id)) {
    $url .= '&errorid=' . urlencode('El id debe ser un número');
}


if (empty($_GET['titulo'])) {
    $url .= '&titulo=';
} else {
    $url .= "&titulo=$titulo";
}
if (empty($_GET['autor'])) {
    $url .= '&autor=';
} else {
    $url .= "&autor=$autor";
}
if (empty($_GET['paginas'])) {
    $url .= '&paginas=';
} else {
    $url .= "&paginas=$paginas";
}

if (!empty($_GET['paginas']) && !is_numeric($paginas)) {
    $url .= '&errorpg=' . urlencode('Las páginas debe ser un número');
}
$url .= '&submit=Introducir+libro';


//Si esta la url correcta y tengo los valores INcorrectos
if (!empty($url)  && !is_numeric($id) || empty($_GET['titulo']) || empty($_GET['autor']) || !is_numeric($paginas)) {
    //retorna a la página principal con el estado del valor actual de las variables por GET
    header("location:../Vista/$url");
    exit();
} else {
    //Aqui se llega si esta todo correcto y se realiza el INSERT mediante el modelo
    require_once('../Modelo/consulta.php');
    $myquery = new Consulta();
    //llama al modelo para insertar; Si es correcto será 1. si no será el error
    $ok = $myquery->insertarLibro($id, $titulo, $autor, $paginas);

    if ($ok == 1) {
        //retorno a la principal y al recargar aparece el libro insertado
        header('location:../Vista/ud04ejer04.php');
        exit();
    } else {
        //Si no retorno a la principal con error
        header("location:../Vista/ud04ejer04.php?errorbd=$ok");
        exit();
    }
}
