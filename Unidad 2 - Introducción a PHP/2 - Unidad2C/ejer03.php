<?php

if (!empty($_POST['nombre']) && !empty($_POST['musicas'])) {

    $nombre = $_POST['nombre'];
    $musicas = $_POST['musicas'];
    echo "Nombre: $nombre <br> Musicas favoritas: " . implode(", ", $musicas);
    echo "<br><br><a href='./ejer03.php'>Volver</a>";



    //Preparación de la variables 'musicas' para pasar por $_GET
    $music = "";
    foreach ($musicas as $value) {
        $music .= "musicas[]=$value&";
    }
    //elimino el ultimo '&'
    $music = substr($music, 0, -1);

    echo "<br><a href='./ejer03.php?nombre=$nombre&$music'>Volver con datos</a>";
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios</title>
    </head>

    <body>
        <form action="" method="POST">
            <label for="nombre"><span style="color: red;">*</span>Nombre: </label>
            <!-- Determina si esta definida la variable nombre y si es así la mantiene(tanto por $_POST como $_GET al pulsar sobre el link 'volver') -->
            <input type="text" name="nombre" value="<?php if (isset($_POST['nombre'])) {
                                                        echo $_POST['nombre'];
                                                    } elseif (isset($_GET['nombre'])) {
                                                        echo $_GET['nombre'];
                                                    } ?>">
            <?php

            //Determina si se ha pulsado enviar y si el campo nombre está vacío; si es asi muestra mensaje de error
            if (isset($_POST['submit']) && empty($_POST['nombre'])) {
                echo "<span style='color:red;'> *El nombre no puede quedar vacío </span>";
            }
            ?>
            <br>
            <label for="musica"><span style="color: red;">*</span>Tipos de música favoritos: </label>
            <br>
            <!--Se comprueba si existe la variable tanto por $_POST o por $_GET al pulsar sobre el link 'volver' y si es asi se marcan las que habia-->
            <select name="musicas[]" multiple>
                <option value="Acústica" <?php if (
                                                isset($_POST['musicas']) && in_array('Acústica', $_POST['musicas']) ||
                                                isset($_GET['musicas']) && in_array('Acústica', $_GET['musicas'])
                                            ) {
                                                echo 'selected';
                                            } ?>>Acústica</option>

                <option value="BSO" <?php if (
                                        isset($_POST['musicas']) && in_array('BSO', $_POST['musicas']) ||
                                        isset($_GET['musicas']) && in_array('BSO', $_GET['musicas'])
                                    ) {
                                        echo 'selected';
                                    } ?>>BSO</option>
                <!--Aqui tambien se imprime el valor R&B de forma que en la url este correcta y asi seleciona si habia sido selecionada---> 
                <option value=<?php echo (urlencode("R&B")); ?> <?php if (
                                        isset($_POST['musicas']) && in_array('R&B', $_POST['musicas']) ||
                                        isset($_GET['musicas']) && in_array('R&B', $_GET['musicas'])
                                    ) {
                                        echo 'selected';
                                    } ?>>R&amp;B</option>

                <option value="Electrónica" <?php if (
                                                isset($_POST['musicas']) && in_array('Electrónica', $_POST['musicas']) ||
                                                isset($_GET['musicas']) && in_array('Electrónica', $_GET['musicas'])
                                            ) {
                                                echo 'selected';
                                            } ?>>Electrónica</option>
                <option value="Folk" <?php if (
                                            isset($_POST['musicas']) && in_array('Folk', $_POST['musicas']) ||
                                            isset($_GET['musicas']) && in_array('Folk', $_GET['musicas'])
                                        ) {
                                            echo 'selected';
                                        } ?>>Folk</option>
                <option value="Jazz" <?php if (
                                            isset($_POST['musicas']) && in_array('Jazz', $_POST['musicas']) ||
                                            isset($_GET['musicas']) && in_array('Jazz', $_GET['musicas'])
                                        ) {
                                            echo 'selected';
                                        } ?>>Jazz</option>
                <option value="Pop" <?php if (
                                        isset($_POST['musicas']) && in_array('Pop', $_POST['musicas']) ||
                                        isset($_GET['musicas']) && in_array('Pop', $_GET['musicas'])
                                    ) {
                                        echo 'selected';
                                    } ?>>Pop</option>
                <option value="Rock" <?php if (
                                            isset($_POST['musicas']) && in_array('Rock', $_POST['musicas']) ||
                                            isset($_GET['musicas']) && in_array('Rock', $_GET['musicas'])
                                        ) {
                                            echo 'selected';
                                        } ?>>Rock</option>
            </select>
            <?php

            //Determina si se ha pulsado enviar y si el campo musicas está vacío; si es asi muestra mensaje de error
            if (isset($_POST['submit']) && empty($_POST['musicas'])) {
                echo "<span style='color:red;'> *Debes elegir al menos un tipo de música </span>";
            }
            ?>
            <br>
            <br>
            <input type="submit" value="Enviar" name="submit">
        </form>
    </body>

    </html>
<?php
}
?>