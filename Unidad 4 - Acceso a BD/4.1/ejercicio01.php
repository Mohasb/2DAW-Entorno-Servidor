<?php
/*
$errores --> guardará los errores si los hubiera al insertar
insertarLibros() --> Inserta los libros; Si hay algún error se gestiona ahi
conectarbd() --> retorna un objeto msqli con la conexión ; Si hay algún error se gestiona ahi
*/
$errores = insertarLibros(conectarbd());

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>U4 - Ejercicio 1</title>
</head>

<body style="background-color: darkgray;">
    <h1>UD-04a - Acceso a BD con PHP</h1>
    <hr>
    <h2>Tabla libros en dblibros:</h2>
    <table border="2">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Author</th>
            <th>Páginas</th>
        </tr>
        <?php
        //obtenerLibros() retorna una cadena con los libros de la bbdd en formato tabla
        echo obtenerLibros(conectarbd());
        ?>
    </table>
    <h2>Tabla libros ordenada por título descendente:</h2>
    <table border="2">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Author</th>
            <th>Páginas</th>
        </tr>
        <?php
        //obtenerLibrosDesc() retorna una cadena con los libros de la bbdd en formato tabla ordenada por titulo descendente 
        echo obtenerLibrosDesc(conectarbd())
        ?>
    </table>
    <h2>Titulo y páginas de los libros de JK Bowling:</h2>
    <table border="2">
        <tr>
            <th>Título</th>
            <th>Páginas</th>
        </tr>
        <?php
        //obtenerLibrosBowling() retorna una cadena con los libros de la bbdd en formato tabla del autor JK Bowling
        echo obtenerLibrosBowling(conectarbd());
        ?>
    </table>
    <h2>Eliminando libros de JK Bowling:</h2>
    <?php
    //eliminaLibrosBowling() reorna una cadena que informa del número de libros eliminados de JK Bowling
    echo eliminaLibrosBowling(conectarbd());
    ?>
    <h2>Tabla con el título del libro id=8 modificado:</h2>
    <?php
    //actualizaLibro() usa la conexion para realizar un UPDATE y modificar el libro con id=8
    echo actualizaLibro(conectarbd());
    ?>
    <table border="2">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Author</th>
            <th>Páginas</th>
        </tr>
        <?php
        //obtenerLibros() retorna una cadena con los libros de la bbdd en formato tabla
        echo obtenerLibros(conectarbd());
        ?>
    </table>
    <p>
        <?php
        //Si la variable $errores(insert) NO esta vacia... lo muestro. Si no, no muestra nada
        echo !empty($errores) ? $errores : ""
        ?>
    </p>
</body>

</html>



<!--Funciones-->
<?php
//retorna msqli object o error
function conectarbd()
{
    //si existe un error en los parámetros del constructor delobjeto msqli lanza un error fatal controlado con try-catch
    try {
        //si no hay errores retornará la conexión
        return $conexion = new mysqli('localhost', 'root', '', 'bdlibros');
    } catch (mysqli_sql_exception $e) {
        //Si hay error muestro mensaje y error
        die("Se ha producido un error al conectar a la base de datos: <br>Error: <code style=\"color: red;\">" . $e->getMessage() .  "</code>");
    }
}
//inserta libros y si hay error los va guardando en la variable $error y la retorna al final
function insertarLibros($conexion)
{

    //contendrá el mensaje error si lo hubiera
    $error = "";

    //cadena con el insert
    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(1, 'Jarry Choped y la Hierba Filosofal', 'JK Bowling', 301)";
    //Se intenta realizar el insert
    try {
        $conexion->query($insert);
    } catch (mysqli_sql_exception $e) {
        //Si hay algún error se añade a la cadena
        $error .= "Error/es: <br><span style=\"color: red;\">" . $e->getMessage() . "</span> en el insert: $insert<br><br>";
    }


    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(2, 'El Senyor de los Palillos', 'JRR TolQuien', 550)";
    try {
        $conexion->query($insert);
    } catch (mysqli_sql_exception $e) {
        $error .= "<span style=\"color: red;\">" . $e->getMessage() . "</span> en el insert: $insert<br><br>";
    }


    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(3, 'Jarry Choped y la Sabana Secreta', 'JK Bowling', 302)";
    try {
        $conexion->query($insert);
    } catch (mysqli_sql_exception $e) {
        $error .= "<span style=\"color: red;\">" . $e->getMessage() . "</span> en el insert: $insert<br><br>";
    }


    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(4, 'Los Polares de la Tierra', 'Ken Follonet', 400)";
    try {
        $conexion->query($insert);
    } catch (mysqli_sql_exception $e) {
        $error .= "<span style=\"color: red;\">" . $e->getMessage() . "</span> en el insert: $insert<br><br>";
    }


    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(5, 'Jarry Choped y el peluquero de Azkaban', 'JK Bowling', 303)";
    try {
        $conexion->query($insert);
    } catch (mysqli_sql_exception $e) {
        $error .= "<span style=\"color: red;\">" . $e->getMessage() . "</span> en el insert: $insert<br><br>";
    }


    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(6, 'Los Juegos de Enjambre', 'Suzanne Collonins', 450)";
    try {
        $conexion->query($insert);
    } catch (mysqli_sql_exception $e) {
        $error .= "<span style=\"color: red;\">" . $e->getMessage() . "</span> en el insert: $insert<br><br>";
    }


    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(7, 'Jarry Choped y el lapiz de fuego', 'JK Bowling', 304)";
    try {
        $conexion->query($insert);
    } catch (mysqli_sql_exception $e) {
        $error .= "<span style=\"color: red;\">" . $e->getMessage() . "</span> en el insert: $insert<br><br>";
    }

    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(8, 'El Bolido da Vinci', 'Dan Black', 500)";
    try {
        $conexion->query($insert);
    } catch (mysqli_sql_exception $e) {
        $error .= "<span style=\"color: red;\">" . $e->getMessage() . "</span> en el insert: $insert<br><br>";
    }
    //Se cierra la conexion 
    $conexion->close();
    //retorno cadena con los errores
    return $error;
}
//retorna los libros en formato tabla o error
function obtenerLibros($conexion)
{
    try {
        //Prueba a hacer la consulta
        $consulta = $conexion->query("SELECT * FROM libros");
    } catch (mysqli_sql_exception $e) {
        //Si hay error retorna este string
        return $tablaLibros = "<tr><td colspan=\"4\">Error en la carga: " . $e->getMessage()  . " </td></tr>";
    }

    //Si no hay error creo cadena con los libros en formato tabla
    $tablaLibros = "";
    while ($resultado = $consulta->fetch_object()) {
        $tablaLibros .= "<tr><td>$resultado->id</td>" .
            "<td>$resultado->titulo</td>" .
            "<td>$resultado->autor</td>" .
            "<td>$resultado->paginas</td></tr>";
    }

    //Cierro conexion por que ya no hace falta 
    $conexion->close();

    //Si hay libros
    if ($tablaLibros) {
        //retorno la cadena
        return $tablaLibros;
    } else {
        //Si no retorno un aviso
        return $tablaLibros = "<tr><td colspan=\"4\">No hay libros en la base de datos</td></tr>";
    }
}
//retorna los libros en formato tabla o error
function obtenerLibrosDesc($conexion)
{
    //obtenerLibrosDesc() funciona igual que el función obtenerLibros() pero ordena los libros por título desc

    try {
        $consulta = $conexion->query("SELECT * FROM libros ORDER BY titulo DESC ");
    } catch (mysqli_sql_exception $e) {
        return $tablaLibrosDesc = "<tr><td colspan=\"4\">Error en la carga: " . $e->getMessage()  . " </td></tr>";
    }

    $tablaLibrosDesc = "";
    while ($resultado = $consulta->fetch_object()) {
        $tablaLibrosDesc .= "<tr><td>$resultado->id</td>" .
            "<td>$resultado->titulo</td>" .
            "<td>$resultado->autor</td>" .
            "<td>$resultado->paginas</td></tr>";
    }

    $conexion->close();

    if ($tablaLibrosDesc) {
        return $tablaLibrosDesc;
    } else {
        return $tablaLibrosDesc = "<tr><td colspan=\"4\">No hay libros en la base de datos</td></tr>";
    }
}
//retorna los libros en formato tabla o error
function obtenerLibrosBowling($conexion)
{
    //obtenerLibrosBowling() funciona igual que el función obtenerLibros() pero filtra solo libros de JK Bowling

    try {
        $consulta = $conexion->query("SELECT titulo, paginas FROM libros WHERE autor='JK Bowling'");
    } catch (mysqli_sql_exception $e) {
        return $tablaLibrosBowling = "<tr><td colspan=\"4\">Error en la carga: " . $e->getMessage()  . " </td></tr>";
    }

    $tablaLibrosBowling = "";
    while ($resultado = $consulta->fetch_object()) {
        $tablaLibrosBowling .= "<td>$resultado->titulo</td>" .
            "<td>$resultado->paginas</td></tr>";
    }

    $conexion->close();

    if ($tablaLibrosBowling) {
        return $tablaLibrosBowling;
    } else {
        return $tablaLibrosBowling = "<tr><td colspan=\"4\">No hay libros en la base de datos de JK Bowling</td></tr>";
    }
}
//elimina los libros o error
function eliminaLibrosBowling($conexion)
{

    try {
        //Intenta ejecutar el delete
        $conexion->query("DELETE FROM libros WHERE autor='JK Bowling'");
    } catch (mysqli_sql_exception $e) {
        //Si hay error aviso y muestro error
        return $librosEliminados = "<tr><td colspan=\"4\">Error: " . $e->getMessage()  . " </td></tr>";
    }


    $librosEliminados = "";
    if ($conexion->affected_rows != 0) {
        //Si se ha eliminado algo informo de cuantos
        return $librosEliminados = "Se han eliminado $conexion->affected_rows libros";
        $conexion->close();
    } else {
        //Si no se ha eliminado nada informo también
        return $librosEliminados = "No se han eliminado libros";
        $conexion->close();
    }
}
//actualiza libro o error
function actualizaLibro($conexion)
{
    try {
        //Intenta ejecutar el update
        $conexion->query("UPDATE libros SET titulo=' El Morbido da Vinci' WHERE id=8");
    } catch (mysqli_sql_exception $e) {
        //si hay error informo de ello
        return  "Error al actualizar: <span style=\"color: red;\">" .  $e->getMessage() . "</span>";
    }

    $conexion->close();
}

?>