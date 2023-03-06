<?php

function spanishDate()
{
    $sDate = getSpanishDay() . ", " . date("d") . " de " . getSpanishMonth() . " de " . date("Y");
    
    // return date in spanish
    return $sDate;
}

function getSpanishDay()
{
    //Obtener dia de la semana en número
    $day = date('N');
    
    //en base a esto determinar el dia en español
    switch ($day) {
        case 0:
            $dayInSpanish = "Domingo";
            break;
        case 1:
            $dayInSpanish = "Lunes";
            break;
        case 2:
            $dayInSpanish = "Martes";
            break;
        case 3:
            $dayInSpanish = "Miércoles";
            break;
        case 4:
            $dayInSpanish = "Jueves";
            break;
        case 5:
            $dayInSpanish = "Viernes";
            break;
        case 6:
            $dayInSpanish = "Sábado";
            break;
        default:
            $dayInSpanish = "Unknown day";
            break;
    }
    return $dayInSpanish;
}
function getSpanishMonth()
{
    //Obtener el numero del mes del array asociativo
    $date = getdate();
    $month = $date["mon"];
    
    //determinar el mes en epañol en base al numero
    $monthInSpanish = match ($month) {
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre",
        default => "Mes"
    };
    return $monthInSpanish;
}

function factorial($number)
{
    //variable que contendrá el factorial. 1 para que no multiplique por 0
    $factorial = 1;
    
    //Array que contendrá los numeros recorridos
    $factorialNumbers = [];

    for ($i = $number; $i > 0; $i--) {  
        $factorial *= $i; 
        $factorialNumbers[] = $i;
    }

    //implode() de array a string con separador
    $result =  $number . " != " . implode(" x ", $factorialNumbers) . " = $factorial";

    return $result;
}

function multiplyTable($number) {

    $table = "";
    //generate dinamic table
    for ($i=0; $i <= 10; $i++) { 
        
        $table .= "<Table style='width:20%', border = 5'>";
        $table .= "<th>Table of $number</th>";
        $table .= "<th>Result</th>";
        

        for ($i=0; $i <= 10; $i++) { 
            $table .= "<tr>";
            $table .= "<td>$number * $i</td>";
            $table .= "<td>" . $number * $i . "</td>";
            $table .= "</tr>";
        }
        $table .= "</table>";

        return $table;
    }
    
}

function priceIt($puchase) {
    echo "<Table style='width:40%', border = 5>";
        echo "<tr>";
        //operador ternario anidado para imprimir el valor inicial  + uno de los tres posibles mensajes
        echo "<td>Initial puchase: ".$puchase.($puchase < 100 ? "€ (no discount is applied)</td>" : 
                                                                ($puchase >= 100 && $puchase <= 500 ?
                                                                 " (10% discount applied)" : " (15% discount applied)"));
        echo "</tr>";
        //cualculo del precio con los descuentos 
        $finalPrice = match(true) {
            $puchase < 100 => $puchase,
            $puchase >= 100 && $puchase <= 500 => $puchase -= $puchase*0.1,
            $puchase > 500 => $puchase -= $puchase*0.15
        };
        echo "<tr>";
        echo "<td>Final puchase: $finalPrice €";
        echo "</tr>";
        echo "</table>";
}
