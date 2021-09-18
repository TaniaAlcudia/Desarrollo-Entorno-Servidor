<!DOCTYPE html>
<html lang="en">
<?php
//Función que:
//Define un array de arrays, representando cada posición/fila una correspondencia de nombre de persona con sus películas preferidas
//Recibe un nombre de película y devuelve cuántas personas la tienen entre sus favoritas
//Muestra, por cada persona, 2 de sus películas favoritas al azar

function funcionDeFunciones($peli)
{
    $bbdd = array(
        "Aketza" => ["El Señor de los Anillos", "El Resplandor", "Yor Name"],
        "Nelson" => ["Sharknado V"],
        "Cesar" => ["Hot Shots", "Rambo", "Kung Fury"],
        "Tania" => ["Sharknado V", "Troll II", "Evil Dead", "Sharknado V"],
        "Javi" => ["Avengers", "Harry Potter", "Star Wars"],
        "Marta" => []

    );

    $contPersonas = 0;

    foreach ($bbdd as $nombre => $pelis) 
    {
        if (count($pelis) > 1)
        {
            $iRand1 = rand(0, count($pelis) - 1);
            $iRand2 = $iRand1;

            while ($iRand1 == $iRand2)
                $iRand2 = rand(0, count($pelis) - 1);

            echo "<p>${nombre}: ${pelis[$iRand1]}, ${pelis[$iRand2]}</p>";
        }
        else if (count($pelis) == 1)
            echo "<p>${nombre}: ${pelis[0]}</p>";
        else
            echo "<p>${nombre}: No tiene una pelicula favorita.</p>";

        foreach ($pelis as $pelicula) 
        {
            if ($pelicula == $peli) 
            {
                $contPersonas++;
                break;
            }
        }
    }

    return $contPersonas;
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 1</title>
</head>

<body>

    <header>
        <h1>Ejercicio 4</h1>
    </header>

    <main>
        <?php
            echo "<p>Cuantas personas han visto Sharknado?" . funcionDeFunciones("Sharknado V") . " </p>";
        ?>
    </main>

    <footer>
    </footer>

</body>

</html>