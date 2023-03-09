<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Paises</title>
</head>

<body>
    <?php
    require("datosconexion.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contrasena);
    if (mysqli_connect_errno()) {
        echo "Houston, tenemos un problema...";
        exit();
    }
    // seleccionamos la conexión y la base de datos (si verdadero, ya no muere)
    mysqli_select_db($conexion, $db_nombre) or die("NO encuentro la base de datos.");
    // para admitir ñ y tildes (conjunto de caracteres para envíos desde y hacia el servidor de la BD).
    mysqli_set_charset($conexion, "utf8");
    // creamos la sentencia SQL sustituyendo los criterios por ?
    $sql = "SELECT codigo, seccion, precio, paisorigen FROM productos WHERE paisorigen = ? ";
    $resultado = mysqli_prepare($conexion, $sql);
    $pais = $_GET["pais"];
    mysqli_stmt_bind_param($resultado, "s", $pais);
    // finalmente, ejecutamos la sentencia preparada
    $ok = mysqli_stmt_execute($resultado);
    if (!$ok) {
        echo "Error al ejecutar la consulta";
    } else {
        // asociamos variables nuevas al resultado de la consulta
        mysqli_stmt_bind_result($resultado, $micodigo, $miseccion, $miprecio, $mipais);
        // mostramos por pantalla los valores encontrados
        echo "Artículos Encontrados: <br><br>";
        // recorremos las filas del resultado
        while (mysqli_stmt_fetch($resultado)) {
            echo $micodigo . " " . $miseccion . " " . $miprecio . " " . $mipais . "<br>";
        }
        //IMPORTANTE: Cerramos el objeto $resultado
        mysqli_stmt_close($resultado);
    }
    // cerramos conexión
    mysqli_close($conexion);
    ?>
</body>

</html>