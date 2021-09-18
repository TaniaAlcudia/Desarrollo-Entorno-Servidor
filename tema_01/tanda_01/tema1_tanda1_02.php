<!DOCTYPE html>
<html lang="en">
<?php
    //Crea un array con las temperaturas de varios días de un mes y lo muestra 
    //Calcula la media (sin utilizar un bucle) y visualízala de 2 maneras: redondeada y truncada
    //Visualiza las 5 temperaturas más bajas y las 5 más altas
    //(Dispones de las funciones array_sum, count, sort, rsort, ………)
            
    $temps = [34.4, 36.8, 32.2, 28.5, 30.8, 19.2, 18.3];
    $media = array_sum($temps) / count($temps);
    
    sort($temps);
    $tempsBajas = array_slice($temps, 0, 5);
         
    rsort($temps);
    $tempsAltas = array_slice($temps, 0, 5);

?>    

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tanda 1</title>
    </head>
    <body>

        <header>
            <h1>Ejercicio 2</h1>
        </header>

        <main>
            <p> TEMPERATURAS: 
                <?php
                     echo join(", ",$temps);
                ?>
            </p>
            
            <p> MEDIA REDONDEADA: 
                <?php
                    echo round($media);
                ?>
            </p>
            
            <p> MEDIA TRUNCADA: 
                <?php
                    echo floor($media);
                ?>
            </p>
            
            <p> 5 TEMPERATURAS MÁS ALTAS: 
                <?php
                    echo join(", ",$tempsAltas);
                ?>
            </p>
            
            <p> 5 TEMPERATURAS MAS BAJAS: 
                <?php
                    echo join(", ",$tempsBajas);
                ?>
            </p> 
        </main>

        <footer>
        </footer>
        
    </body>
</html>

