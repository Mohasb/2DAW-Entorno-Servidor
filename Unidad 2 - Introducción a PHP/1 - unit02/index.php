<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unit 2</title>
</head>

<body style="background-color: darkgray;">
    <?php

    echo "<br>**********exercise 1**********<br>";
    $intValue = 3;
    $floatValue = 7.2;
    $hexaValue = 0x0C;
    $suma = $intValue + $floatValue + $hexaValue;
    echo "$intValue + $floatValue + $hexaValue = $suma";

    echo "<br>**********exercise 2**********<br>";
    define("SUBJECT", "DWES");
    $mark = 10;
    $date = date(" (d/m/Y - H:i)");
    date_default_timezone_set("Europe/Madrid");
    echo "I hope to get a $mark in " . SUBJECT . $date;

    echo "<br>**********exercise 3**********<br>";
    require_once('functions.php');
    echo spanishDate();
    echo "<br>";
    echo factorial(5);

    echo "<br>**********exercise 4**********<br>";
    echo multiplyTable(5);

    echo "<br>**********exercise 5**********<br>";
    echo priceIt(58);
    echo priceIt(180);
    echo priceIt(600);

    echo "<br>**********exercise 6**********<br>";
    //phpinfo();
    echo "<br>**********exercise 7**********<br>";
    ?>
    <table style='width:40%' , border="5">
        <?php
        //Recorrer superglobal e imprimir row con las keys y sus valores un una tabla 
        foreach ($_SERVER as $key => $value) {
            echo "<tr>
                    <td>$key</td>
                    <td>$value</td>
                    </tr>";
        }
        ?>
    </table>
    <?php

    echo "<br>**********exercise 8**********<br>";
    //3 arrays multidimensionales para probar el programa 'larguestArray()'
    $m = array(array(1, 3, 0, 8), array(3, 5, 2), array(8, 4, 1, 9, 7), array(6, 9));
    $n = array(array(1, 3, 0, 2, 3, 9, 8, 8), array(3, 8, 7, 5, 2, 4, 8, 73, 5, 2), array(8), array(6, 9));
    $o = [[6, 7, 2, 4], [2], [6, 1, 0, 9, 3, 7, 5], [5, 9, 7, 3, 8, 5, 7, 23, 4], [4, 2, 7, 8]];

    echo larguestArray($m);
    echo larguestArray($n);
    echo larguestArray($o);

    function larguestArray($array)
    {
        $larger = [];
        $position = 0;
        //Se recorre el array principal contando los elementos de los arrays interiores; 
        foreach ($array as $key => $subArray) {
            //Si el array de la iteración es mayor que el de la variable auxiliar...
            if (count($subArray) > count($larger)) {
                //este es el mas largo
                $larger = $subArray;
                //y esta es su posición
                $position = $key;
            }
        }
        return "<p>Larguest array: " . implode(", ", $array[$position]) . "</p>";
    }

    echo '<br>**********exercise 9**********<br>';

    //reinicio el puntero de la posición de array
    reset($_SERVER);
    $contador = 0;
    echo "<table style='width:40%' , border=5>";
    
    //mientras el contador sea menor que el numero de elementos de $_SERVER imprimer la key y el current value en una tabla
    while ($contador < count($_SERVER)) {
        echo    "<tr>
                <td>" . key($_SERVER) . "</td>
                <td>" . current($_SERVER) . "</td>
                </tr>";
        //avanzo el puntero una posición
        next($_SERVER);
        //aumento el contador
        $contador++;
    }
    echo "</table>";

    echo '<br>**********exercise 10**********<br>';
    /*a)*/
    $alumni = ["Jhon", "Jane", "Noah", "Emma", "Jacob"];
    /*b)*/
    echo "<p>b) " . implode(', ', $alumni) . "</p>";
    /*c)*/
    echo "<p>c) Number of elements: " . count($alumni);
    /*d)*/
    asort($alumni); //asort() mantiene las keys
    echo '<p> d) ';
    foreach ($alumni as $key => $value) {
        echo " [$key] => $value";
    }
    echo '</p>';
    /*e)*/
    ksort($alumni);  //ksort ordena según las keys
    echo "<p>e) Reversed sort array: " . implode(', ', array_reverse($alumni)) . "</p>";
    /*f)*/
    echo "<p>f) The name 'Emma' is in position " . array_search("Emma", $alumni) . " in the original array</p>";
    /*g)*/
    $students = array(["Id" => "001", "Name" => "Jhon", "Age" => "18"], ["Id" => "002", "Name" => "Jane", "Age" => "20"], ["Id" => "003", "Name" => "Noah", "Age" => "22"], ["Id" => "004", "Name" => "Emma", "Age" => "25"], ["Id" => "005", "Name" => "Jacob", "Age" => "28"]);
    /*h)*/
    echo "h) <table style='width:40%', border= 5>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                </tr>";

    foreach ($students as $key => $value) {
        echo "<tr>";
        echo "<td>$value[Id]</td>";
        echo "<td>$value[Name]</td>";
        echo "<td>$value[Age]</td>";
        echo "</tr>";
    }
    echo "</table>";
    /*i)*/
    $names = array_column($students, 'Name'); //obtiene una columna en un array asociativo
    echo "<p>i) ";
    print_r($names);
    echo "</p>";
    ?>
</body>

</html>