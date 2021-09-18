<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 1</title>
</head>

<body>
    <header>
        <h1>Ejercicio 1</h1>
    </header>

    <main>
        <?php

            //punto 01
            //Muestra la fecha actual con el formato:    17th  September 2021, Wednesday
            date_default_timezone_set('Europe/Madrid');
            $dia = date("j");
            $mes = date("F");
            $anio = date("Y");
            $diaTxt = date("l");

            echo "<p>${dia}th $mes $anio, $diaTxt</p>";

            //punto 02
            //Muestra cuántos días quedan para finalizar el año
            $esBisiesto = date("L");
            $diasAnio = 365;

            if ($esBisiesto == 1) {
                $diasAnio = 366;
            }

            $diasTranscurridos = date("z") + 1;
            $diasQueFaltan = $diasAnio - $diasTranscurridos;

            echo "<p>Faltan $diasQueFaltan días para que termine el año</p>";

            //punto 03
            //Crea una cadena/frase a partir de los elementos de un array de palabras y la visualiza.

            $arr = ["the", "cake", "is", "a", "lie"];
            $str = "";
            for ($i = 0; $i < count($arr); $i++) {
                $str .= $arr[$i] . " ";
            }
            echo "<p>$str</p>";

            //punto 4
            //A partir de una cadena con eñes, crea y visualiza otra que reemplace las eñes por “gn”

            $str = "super ñoño, el superheroe más blando que la mierda de pavo";
            $strAux = str_replace('ñ', 'gn', $str);

            echo "<p>$strAux</p>";

            //punto 5
            //Función que devuelve un array con n números aleatorios entre limite1 y limite2
            //(n, limite1, limite2 son parámetros de la función)

            $arr = [];
            $limite1 = 1;
            $limite2 = 10;
            $n = 50;

            for ($i = 0; $i <= $n; $i++) 
            {
                $arr[$i] = rand($limite1, $limite2);
            }

            echo join(",", $arr);

            //punto6
            //Función que recibe una cadena y la devuelve cifrada.
            //Para saber cómo cifrar cada letra, utiliza un array constante asociativo que tiene como claves los caracteres y como valores sus cifrados.
            //Por ejemplo, dado el array de cifrado [“A”=>”20”, “H”=>”9R”, “M”=>”abcd”], la cadena “HOLA AMO”, se cifraría como “9ROL20 20abcdo”

            define("CIFRADOR", array("A" => "20", "H" => "9R", "M" => "abcd"));
            $texto = "HOLA AMO";
            $textoCifrado = str_replace(array_keys(CIFRADOR), array_values(CIFRADOR), $texto);

            echo "<p>$textoCifrado</p>";

        ?>
    </main>

    <footer>
    </footer>
    
</body>

</html>