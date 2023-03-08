<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ud03ejer02</title>
</head>

<body>
    <h1>ud03ejer03</h1>
    <?php
    //Añadir clases para poder usarlas
    require_once('Contacto.php');
    require_once('Agenda.php');
    //Instancia de Agenda y 3 contactos
    $agenda1 = new Agenda();
    $contacto1 = new Contacto("001", "Juan", 698574235);
    $contacto2 = new Contacto("002", "Pedro", 658769586);
    $contacto3 = new Contacto("003", "Antonio", 632596587);


    //Usando métodos mágicos: set
    echo "<h2>Usando set y get mágicos:</h2>";
    echo "Estableciendo(set) el nombre del contacto 2 de Pedro a Luis <br><code>(\$contacto2->Nombre = 'Luis')</code>";
    $contacto2->Nombre = 'Luis';
    echo "<br><br>Obteniendo(get) el nombre del contacto 2: $contacto2->Nombre <br><code>(\$contacto2->Nombre)</code><hr>";


    //Añadir estos tres contactos a la agenda
    $agenda1->addContact($contacto1);
    $agenda1->addContact($contacto2);
    $agenda1->addContact($contacto3);


    echo "<h2>Usando clone mágico:</h2>";
    //Clonar la agenda en una nueva variable llamada agenda2
    $agenda2 = clone $agenda1;
    ?>
    <!--Muestra la tabla original-->
    <p>Agenda original:</p>
    <table border="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Teléfono</th>
        </tr>
        <?php echo $agenda1 ?>
    </table>
    <!--Muestra la agenda copia-->
    <p>Agenda copia:</p>
    <table border="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Teléfono</th>
        </tr>
        <?php echo $agenda2 ?>
    </table>
    <p>- Modifico el teléfono del contacto 3 de la agenda original...</p>
    <p>- Y modifico el nombre contacto 1 de la copia...</p>
    <?php
    //Modificar el nombre del primer contacto
    $contacto1Agenda2 = $agenda2->ArrayContactos['001'];
    $contacto1Agenda2->Nombre = "Juan Lopez Gomez";
    //Modificar el numero teléfono del 3º contacto
    $contacto3Agenda1 = $agenda1->ArrayContactos['003'];
    $contacto3Agenda1->Telefono = 111111111;
    ?>
    <!--Muestra la tabla original-->
    <p>Agenda original:</p>
    <table border="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Teléfono</th>
        </tr>
        <?php echo $agenda1 ?>
    </table>
    <!--Muestra la agenda copia-->
    <p>Agenda copia:</p>
    <table border="5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Teléfono</th>
        </tr>
        <?php echo $agenda2 ?>
    </table>

   <hr>
    <h2>Usando método mostrarLista():</h2>
    <h4>Lista contactos original</h4>
    <ol>
        <!--Mostrar lista retorna los contactos en formato lista-->
        <?php echo $agenda1->mostrarLista() ?>
    </ol>
    <h4>Lista contactos copia</h4>
    <ol>
        <?php echo $agenda2->mostrarLista() ?>
    </ol>
</body>

</html>