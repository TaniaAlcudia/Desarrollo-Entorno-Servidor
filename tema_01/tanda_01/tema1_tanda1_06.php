<!DOCTYPE html>
<html lang="en">
<?php
//Función que recibe un array con días de la semana, un hora de inicio, una hora de fin 
//y un intervalo en minutos y visualiza una tabla horaria así:
//- El número de filas y columnas será dinámico en función de los parámetros recibidos por la función
//- En la zona de datos, una de cada 2 filas se sombrea

define("DIAS_SEMANA", ["Lun", "Mar", "Mier", "Jue", "Vie", "Sab", "Dom"]);
define("HORA_INI", [8, 0]);
define("HORA_FIN", [15, 0]);
define("INTERVALO", 13);


function visualizarTabla($diasSemana, $horaIni, $horaFin, $intervalo)
{
    $str = "<tr>"; // imprimir los dias de la semana
    for ($i = 0; $i < count($diasSemana); $i++) {
        $str .= "<th>${diasSemana[$i]}</th>";
    }
    $str .= "</tr>";

    $minsIni = $horaIni[0] * 60 + $horaIni[1]; // pasar las horas minutos
    $minsFin = $horaFin[0] * 60 + $horaFin[1];

    if ($minsIni > $minsFin) // validar que la hora de inicio sea menor que la hora final
    {
        $aux = $minsIni;
        $minsIni = $minsFin;
        $minsFin = $aux;
    }

    for ($cont = 1; $minsIni <= $minsFin && $minsIni < (24*60); $cont++) // imprimir el resto de celdas
    {
        $hImprimir = desglosarHora($minsIni);

        if ($cont%2 == 0) // cambiar el color de las filas pares
            $str .= "<tr style='background-color: #c1c1c1'>";
        else
            $str .= "<tr>";
        
        $str .= "<td>${hImprimir}</td>";

        for ($i = 1; $i <count($diasSemana); $i++)
            $str .= "<td></td>";
        $str .= "</tr>";

        $minsIni += $intervalo;
    }

    return $str;
}

function desglosarHora($mins) // pasar los minutos a string con la hora
{
    $h = floor($mins / 60);
    $m = $mins % 60;

    return ($m < 10) ?  "$h : 0$m" : "$h : $m";
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 1</title>
</head>
<style>
    table, th, td {
        border: 1px solid #9b9b9b;
    }
</style>

<body>

    <header>
        <h1>Ejercicio 6</h1>
    </header>

    <main>
        <?php
        echo "<table>" . visualizarTabla(DIAS_SEMANA, HORA_INI, HORA_FIN, INTERVALO) . "</table>";
        ?>
    </main>

    <footer>
    </footer>

</body>

</html>