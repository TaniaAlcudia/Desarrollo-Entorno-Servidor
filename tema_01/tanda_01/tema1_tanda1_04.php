<!DOCTYPE html>
<html lang="en">
<?php
//Función que recibe un array con rutas de imágenes (dentro del proyecto) y las muestra en una tabla, todas ellas con el mismo tamaño.
//La tabla tiene un máximo de 3 columnas y tantas filas como sean necesarias
//No deben mostrarse imágenes repetidas
//Además, cada imagen será un enlace a la propia imagen

$imgs = [
    "imagenes/root-1.png",
    "imagenes/borde-exterior-1.png",
    "imagenes/king-of-tokyo-1.png",
    "imagenes/marvel-champions-1.png",
    "imagenes/parade-1.png",
    "imagenes/sagrada-1.png",
    "imagenes/patchwork-1.png",
];

$cache = [];


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
        <table>
            <?php

            $cont = 0;

                foreach ($imgs as $img) 
                {
                    $md5 = md5_file($img, true);
                    if (!in_array($md5, $cache)) 
                    {
                        if ($cont % 3 == 0)
                            echo "<tr>";

                        $cache[$img] = $md5;
                        echo "<td><a href='$img'><img src='$img' alt='imagen' style='width: 200px; height: 200px'></a></td>";
                        $cont++;

                        if ($cont % 3 == 0)
                            echo "</tr>";
                    }
                }
            ?>
        </table>
    </main>

    <footer>
    </footer>

</body>

</html>