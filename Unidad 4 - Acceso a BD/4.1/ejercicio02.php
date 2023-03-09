<?php
//Si están rellenas las variables
if (!empty($_POST['id']) && !empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['paginas'])) {
    //Añade un libro a la bd mediante la conexión pasada como parámetro
    anyadeLibro(conexion());
    //Si no muestro el form
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>U4 - Ejercicio 2</title>
    </head>

    <body style="background-color: darkgray;">

        <form action="" method="POST">
            <!--Para todos los inputs si el valor se ha establecido se mantiene y si se envia vacio muestra un error-->
            <label for="id">Id:&nbsp;</label>
            <input type="number" name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : "" ?>">
            <?php
            if (isset($_POST['submit']) && empty($_POST['id'])) {
                echo "<span style='color:red;'> <code><--</code> ¡Debes introducir un id!</span>";
            }
            ?>
            <br>
            <label for="titulo">Titulo:&nbsp;</label>
            <input type="text" name="titulo" value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : "" ?>">
            <?php
            if (isset($_POST['submit']) && empty($_POST['titulo'])) {
                echo "<span style='color:red;'> <code><--</code> ¡Debes introducir un título!</span>";
            }
            ?>
            <br>
            <label for="autor">Autor</label>
            <input type="text" name="autor" value="<?php echo isset($_POST['autor']) ? $_POST['autor'] : "" ?>">
            <?php
            if (isset($_POST['submit']) && empty($_POST['autor'])) {
                echo "<span style='color:red;'> <code><--</code> ¡Debes introducir un autor!</span>";
            }
            ?>
            <br>
            <label for="paginas">Páginas</label>
            <input type="number" name="paginas" value="<?php echo isset($_POST['paginas']) ? $_POST['paginas'] : "" ?>">
            <?php
            if (isset($_POST['submit']) && empty($_POST['paginas'])) {
                echo "<span style='color:red;'> <code><--</code> ¡Debes introducir el número de páginas!</span>";
            }
            ?>
            <br>
            <br>
            <input type="submit" value="Introducir libro" name="submit">
            <hr>
            <br>
            <table border="2">
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>AUTHOR</th>
                    <th>PAGINAS</th>
                    <?php
                    //Inicialmente está vacia si la bbdd está vacia; Si no hay errores imprime los libros en la taba
                    echo empty($_GET['error']) ? cargaLibros(conexion()) : "";
                    ?>
                </tr>
            </table>
            <br>
            <span>
                <?php
                //Aqui se muestran los errores de conexion a bd, inserción libros o carga de libros
                if (isset($_GET['error'])) {
                    echo "Se ha producido un error:<br>" .  $_GET['error'];
                } ?>
            </span>
        </form>
    </body>

    </html>
<?php }

function conexion()
{
    try {
        //Intenta retornar conexión
        return $conexion = new mysqli('localhost', 'root', '', 'bdlibros');
    } catch (mysqli_sql_exception $e) {
        //Si hay error redirijo hacia el index con una variable _GET con el error a mostrar
        header("location:./ejercicio02.php?error=Conexion:" . $e->getMessage());
        exit();
    }
}

function anyadeLibro($conexion)
{
    //Cadena con el insert
    $insert = "INSERT INTO libros(id, titulo, autor, paginas) VALUES(" . $_POST['id'] . ", '" . $_POST['titulo'] . "', '" . $_POST['autor'] . "', " . $_POST['paginas'] . ")";

    try {
        //Intenta realizar insert
        $conexion->query($insert);
        //Si ha ido bien cierro la conexión
        $conexion->close();
        //Redirijo al index
        header("location:./ejercicio02.php");
        //Salir para evitar comportamientos extraños
        exit();
    } catch (mysqli_sql_exception $e) {
        //Si ha ocurrido error cierro conexión
        $conexion->close();
        //Redirijo hacia el index con una variable _GET con el error a mostrar
        header("location:./ejercicio02.php?error=Insert:" . $e->getMessage());
        exit();
    }
}

function cargaLibros($conexion)
{
    try {
        $consulta = $conexion->query("SELECT * FROM libros");
    } catch (mysqli_sql_exception $e) {
        $conexion->close();
        header("location:./ejercicio02.php?error=Carga:" . $e->getMessage());
        exit();
    }

    $tablaLibros = "";
    while ($resultado = $consulta->fetch_object()) {
        $tablaLibros .= "<tr><td>$resultado->id</td>" .
            "<td>$resultado->titulo</td>" .
            "<td>$resultado->autor</td>" .
            "<td>$resultado->paginas</td></tr>";
    }

    $conexion->close();
    return $tablaLibros;
} ?>