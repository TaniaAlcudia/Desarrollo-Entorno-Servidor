<!DOCTYPE html>
<html lang="en">
<?php
//Crea un array con 10 nombres de ciudades, que puede contener repetidos.
//Visualízalo, en forma de lista numerada y sin repetidos.

    $planetas = ["Tatooine", "Datooine", "Dragoba", "Mon Calamari", "Tatooine", "Hoth", "Mon Calamari"];
    $planetas = array_unique($planetas);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 1</title>
</head>

<body>

    <header>
        <h1>Ejercicio 3</h1>
    </header>

    <main>
        <ol> PLANETAS:
            <?php
                foreach ($planetas as $planeta)
                    echo "<li>$planeta</li>";
            ?>
        </ol>
    </main>

    <footer>
    </footer>
</body>

</html>