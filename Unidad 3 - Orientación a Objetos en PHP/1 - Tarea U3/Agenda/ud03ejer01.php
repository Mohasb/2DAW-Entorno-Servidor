<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ud03ejer01</h1>
    <?php

    //Para poder usar Contacto.php
    require_once('Contacto.php');
    //Creación de un contacto
    $contacto1 = new Contacto("001", "Juan", 698574235);
    //Imprimir el contacto1 con el método mágico __toString() que se llama solo
    echo "Contacto1: <br><p><b>$contacto1</b></p>";
    //Ahora voy a modificar el nombre de $contacto1 mediante setter
    $contacto1->Nombre  = "Pepe";
    echo 'Modificando el nombre del contacto a Pepe...';
    //Muestra contacto1 después de modificar
    echo "<p><b>$contacto1</b></p>";
    //Muestra el nombre contacto después de modificar con el getter
    echo "<p>Nombre después de modificar: " . $contacto1->Nombre . "</p>";

    ?>
</body>

</html>