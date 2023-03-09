<?php
if (isset($_POST['submit'])) {
    //anyade un producto mediante la conexion; Si hay errores se manejan en la propia función
    anyadeProducto(conexion());
    //si se ha insertado bien redirijo a resultadoinsertar.php con dos variables pasadas por _GET
    header("location:./resultadoinsertar.php?nombre=" . $_POST['nombre'] . "&seccion=" . $_POST['seccion']);
    exit();
} else {
?>




    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Introducción</title>
    </head>

    <body style="background-color: darkgray;">
        <h1>Dar de alta ARTÍCULOS NUEVOS</h1>
        <form action="" method="POST">
            <label for="seccion" style="display: inline-block;width: 150px;">Sección del articulo</label>
            <input type="text" name="seccion">
            <br>
            <label for="nombre" style="display: inline-block;width: 150px;">Nombre del articulo</label>
            <input type="text" name="nombre">
            <br>
            <label for="precio" style="display: inline-block;width: 150px;">Precio del articulo</label>
            <input type="number" name="precio">
            <br>
            <label for="pais" style="display: inline-block;width: 150px;">Pais origen articulo</label>
            <input type="text" name="pais">
            <br>
            <br>
            <input type="submit" name="submit" value="Insertar!!" style="margin-left: 9em;">
            <button><a style="text-decoration: none;color: black;" href="./formulariobusqueda.php">Busqueda por país</a></button>
        </form>

        <p>
            <?php
            //si hay error se muestra; si no, no
            echo  !empty($_GET['error']) ? $_GET['error'] : ""
            ?>
        </p>


    </body>

    </html>
<?php }


//retorna conexión o redirige a formulariointroduccion con el mensaje de error pasado por _GET
function conexion()
{
    require_once('./datosconexion.php');
    try {
        //Intenta retornar conexión
        return $conexion = new mysqli($db_host, $db_usuario, $db_contrasena, $db_nombre);
    } catch (mysqli_sql_exception $e) {
        header("location:./formulariointroduccion.php?error=Error: " . $e->getMessage());
        exit();
    }
}
//añade producto o redirige a formulariointroduccion con el mensaje de error pasado por _GET
function anyadeProducto($conexion)
{
    try {
        //Usando query preparada
        $resultado = $conexion->prepare("INSERT INTO productos(seccion, articulo, precio, paisorigen) VALUES(?,?,?,?)");
        $resultado->bind_param('ssis', $_POST['seccion'], $_POST['nombre'], $_POST['precio'], $_POST['pais']);
        $resultado->execute();
        $conexion->close();
    } catch (mysqli_sql_exception $e) {
        header("location:./formulariointroduccion.php?error=Error: " . $e->getMessage());
        exit();
    }
}

?>