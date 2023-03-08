<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liga Baloncesto</title>
</head>

<body>
    <?php
    //Para poder instanciar los jugadores
    require_once('./clases/Equipo.php');
    require_once('./clases/Jugador.php');
    require_once('./clases/Base.php');
    require_once('./clases/Escolta.php');
    require_once('./clases/Alero.php');
    require_once('./clases/AlaPivot.php');
    require_once('./clases/Pivot.php');

    //Instancia de 5 jugadores deferentes
    $base = new Base(23, 'Michael Jordan', 1.98, 5633);
    $escolta = new Escolta(6, 'LeBron James', 2.06, 1257);
    $alero = new Alero(33, 'Kareem Abdul-Jabbar', 2.18, 3250);
    $alaPivot = new AlaPivot(6, 'Bill Russell', 2.08, 1592);
    $pivot  = new Pivot(16, 'Wilt Chamberlain', 2.16, 2458);
    ?>
    <!--Muestro el equipo-->
    <table border="5">
        <tr>
            <th>Nombre</th>
            <th>Clase</th>
        </tr>
        <?php $equipo1 = new Equipo("Los Angeles", $base, $escolta, $alero, $alaPivot, $pivot); ?>
    </table>
    <!--Muestra el resultado de la estatura media(estaturaMedia()) y la máxima(estaturaMaxima())-->
    <!--el método bcdiv() se puede usar para limitar el numero de decimales de un numero-->
    <p>Estatura media: <?php echo bcdiv($equipo1->estaturaMedia(), '1', 3) ?> m</p>
    <p>Estatura maxima: <?php echo bcdiv($equipo1->estaturaMaxima(), '1', 2) ?> m</p>

</body>

</html>