<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - PDO</title>
</head>

<body style="background-color: darkgray;">

    <form action="../Controlador/insertar.php" method="GET">
        <!--Para todos los inputs si el valor se ha establecido se mantiene y si se envia vacio muestra un error-->
        <label for="id">Id:&nbsp;</label>
        <input type="text" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : "" ?>">
        <?php
        if (isset($_GET['submit']) && empty($_GET['id'])) {
            echo "<span style='color:red;'> <code><--</code> ¡Debes introducir un id!</span>";
        }
        //Aqui se muestra error si se ha introducido el id no numérico
        if (isset($_GET['errorid'])) {
            echo "<span style='color:red;'> <code><--</code> ¡" .  $_GET['errorid']  . "!</span>";
        }
        ?>
        <br>
        <label for="titulo">Titulo:&nbsp;</label>
        <input type="text" name="titulo" value="<?php echo isset($_GET['titulo']) ? $_GET['titulo'] : "" ?>">
        <?php
        if (isset($_GET['submit']) && empty($_GET['titulo'])) {
            echo "<span style='color:red;'> <code><--</code> ¡Debes introducir un título!</span>";
        }
        ?>
        <br>
        <label for="autor">Autor</label>
        <input type="text" name="autor" value="<?php echo isset($_GET['autor']) ? $_GET['autor'] : "" ?>">
        <?php
        if (isset($_GET['submit']) && empty($_GET['autor'])) {
            echo "<span style='color:red;'> <code><--</code> ¡Debes introducir un autor!</span>";
        }
        ?>
        <br>
        <label for="paginas">Páginas</label>
        <input type="text" name="paginas" value="<?php echo isset($_GET['paginas']) ? $_GET['paginas'] : "" ?>">
        <?php
        if (isset($_GET['submit']) && empty($_GET['paginas'])) {
            echo "<span style='color:red;'> <code><--</code> ¡Debes introducir el número de páginas!</span>";
        }
        //Aqui se muestra error si se ha introducido las páginas no numérico
        if (isset($_GET['errorpg'])) {
            echo "<span style='color:red;'> <code><--</code> ¡" . $_GET['errorpg'] . "!</span>";
        }
        ?>
        <br>
        <br>
        <input type="submit" value="Introducir libro" name="submit" />
        <!--Botón para ir a página de busqueda por titulo-->
        <a href="../Vista/verLibros.php"><input type="button" value="Buscar libro por título"></a>
        <hr>
        <br>
    </form>
    <?php
    require_once('../Controlador/cargar.php');
    //muestra la tabla retornada por el controlador cargar.php
    echo tablaLibros();
    ?>
    <br>
    <?php
    //Aqui se muestran los errores de la bbdd(PK duplicada,...)
    if (isset($_GET['errorbd'])) {
        echo  $_GET['errorbd'];
    } ?>
</body>

</html>