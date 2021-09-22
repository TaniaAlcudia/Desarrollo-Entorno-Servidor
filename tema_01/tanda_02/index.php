<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tanda 2</title>
    </head>
    <body>
        <header>
            <h1>Tema2 - Tanda1</h1>
        </header>
        <main>
            <nav>
                <ul>
            <?php
                $dir = scandir("./");
                $cont = 1;
                foreach ($dir as $file) 
                {
                    if (is_file($file) and strpos($file,".php") !== false and $file != "index.php") {
                        echo "<li><a href='$file'>Ejercicio $cont</a></li>";
                        $cont++;
                    }  
                }
            ?>
                </ul>
            </nav>
        </main>
        
        <footer>
        </footer>
        
    </body>
</html>