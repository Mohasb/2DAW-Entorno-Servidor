<?php
//Si estan rellenas todas las variables del form...Imprimo los valores
if (!empty($_POST['nombre']) && !empty($_POST['vehiculos']) && !empty($_POST['presentacion'])) {

    $nombre = $_POST['nombre'];
    $vehiculos = $_POST['vehiculos'];
    $presentacion = $_POST['presentacion'];

    echo "<br>Nombre: $nombre <br>Vehiculos: " . implode(", ", $vehiculos) . "<br>Presentación: $presentacion";

    //Si NO... Muestro el form
} else {
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios</title>
    </head>

    <body>
        <form action="" method="POST">
            <label for="nombre">Nombre: </label>
            <!-- Determina si esta definida la variable nombre y si es así la mantiene -->
            <input type="text" name="nombre" value="<?php if (isset($_POST['nombre'])) {
                                                        echo $_POST['nombre'];
                                                    } ?>">
            <?php

            //Determina si se ha pulsado enviar y si el campo nombre está vacío; si es asi muestra mensaje de error
            if (isset($_POST['submit']) && empty($_POST['nombre'])) {
                echo "<span style='color:red;'> *El nombre no puede quedar vacío </span>";
            }
            ?>
            <br>
            <label for="vehiculos">Tipo vehiculo: </label>
            <!-- Determina si esta definida la variable vehiculos y si el valor esta en el array; si es así mantiene lo seleccionado -->
            <input type="checkbox" name="vehiculos[]" value="Coche" <?php if (isset($_POST['vehiculos']) && in_array('Coche', $_POST['vehiculos'])) {
                                                                        echo 'checked';
                                                                    } ?>>Coche
            <input type="checkbox" name="vehiculos[]" value="Moto" <?php if (isset($_POST['vehiculos']) && in_array('Moto', $_POST['vehiculos'])) {
                                                                        echo 'checked';
                                                                    } ?>>Moto
            <input type="checkbox" name="vehiculos[]" value="Avión" <?php if (isset($_POST['vehiculos']) && in_array('Avión', $_POST['vehiculos'])) {
                                                                        echo 'checked';
                                                                    } ?>>Avión
            <?php

            //Determina si se ha pulsado enviar y si el array vehiculos está vacío; si es asi muestra mensaje de error
            if (isset($_POST['submit']) && empty($_POST['vehiculos'])) {
                echo "<span style='color:red;'> *Debes seleccionar un tipo vehiculo </span> ";
            }
            ?>
            <br>
            <label for="presentacion">Preséntate: </label>
            <br>
            <textarea name="presentacion" cols="30" rows="3"><?php if (isset($_POST['presentacion'])) {
                                                                    echo $_POST['presentacion'];
                                                                } ?></textarea>
            <?php

            //Determina si se ha pulsado enviar y el texarea está vacío; si es asi muestra mensaje de error
            if (isset($_POST['submit']) && empty($_POST['presentacion'])) {
                echo "<span style='color:red;'> *Debes presentarte </span>";
            }
            ?>
            <br>
            <input type="submit" value="Enviar" name="submit">
        </form>
    </body>

    </html>
<?php
}
?>