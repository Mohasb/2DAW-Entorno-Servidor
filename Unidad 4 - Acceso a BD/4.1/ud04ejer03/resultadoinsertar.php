<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado introducción</title>
</head>

<body>
    <p>
        Artículo: <?php
                    //imprimer el valor del nombre o teexto predeterminado
                    echo empty($_GET['nombre']) ? '(No determinado)' : $_GET['nombre']
                    ?>
        insertado en <?php
                            //imprimer el valor del nombre o teexto predeterminado
                        echo empty($_GET['seccion']) ? '(No determinado)' : $_GET['seccion']
                        ?>
    </p>
    <!--Anyadido-->
    <a href="./formulariointroduccion.php">Insertar un artículo NUEVO</a>
    <!--Anyadido-->
</body>

</html>