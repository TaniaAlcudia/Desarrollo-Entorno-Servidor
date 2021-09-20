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
        <h1>Ejercicio 7</h1>
    </header>

    <main>
        <ul>
        <?php
            $handle = fopen("url/urls.txt", "r");
            while (!feof($handle)) 
            {
                $linea = fgets($handle); //Va dejando en $linea cada linea del fichero. Al leer con fgets tener en cuenta que también se leen los caracteres de fin de línea
                $partes = explode(" ", $linea);
                echo "<li>$partes[0] <a href='$partes[1]'>$partes[1]</a></li>";
            }
            fclose($handle);
        ?>
        </ul>
    </main>

    <footer>
    </footer>

</body>

</html>
