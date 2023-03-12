<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - PDO</title>
</head>

<body style="background-color: darkgray">
    <h1>Mis Libros</h1>
    <form action="" method="GET">
        <input type="text" name="titulo">
        <input type="submit" name="submit" value="Buscar">
        <?php if (isset($_GET['submit']) && empty($_GET['titulo'])) {
            //Se controla el input vacío
            echo "<span style='color:red;'> <code><--</code>¡Intoduce el título!</span>";
        } ?>
    </form>
    <br>

    <?php
    //Se se ha pulsado en buscar y se ha escrito un título
    if (isset($_GET['submit']) && !empty($_GET['titulo'])) {
        //Llamada a modelo que retorna una tabla con el filtro
        require_once('../Controlador/filtrado.php');
        echo tablaLibrosFiltrados($_GET['titulo']);
    } else {
        //muestro la tabla completa
        require_once('../Controlador/cargar.php');
        echo tablaLibros();
    }

    ?>
    <br>
    <br>
    <!--Link que retorna a la página principal-->
    <a href="./ud04ejer04.php">Nuevo libro</a>
</body>

</html>