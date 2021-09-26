<!DOCTYPE html>
<html lang="en">
<?php

    define("DIR", "../fotos/");
    define("EXTENSIONES", ["jpg", "png", "tiff", "gif"]);

    function rutas_imag()
    {
        $rutas = [];
        $files = scandir(DIR);
        foreach ($files as $file)
        {
            foreach (EXTENSIONES as $ext) 
            { 
                if ( is_file(DIR.$file) and strpos(strtolower($file), $ext) !== false)
                {
                    $rutas[] = "../fotos/".$file;
                    break;
                }
            }
        }     
        return $rutas; 
    }

    function dibujar_tabla($rutas)
    {
        $str = "";
        $posiciones = array_rand(rutas_imag(), $_POST['cantFotos']);
        for ($i=0; $i < count($posiciones); $i++) 
        { 
            $str .= "
                    <tr>
                    <td><img height='200'src='".$rutas[$posiciones[$i]]."'></td>
                    <td><input type='checkbox' name='camisas' value='camisa_".$posiciones[$i]."'>Me gusta</td>
                    </tr>
            ";
        }
        return $str;
    }
?>    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
    <form action="./eval_img.php" method="post">
        <table>
            <?php
                echo dibujar_tabla(rutas_imag());   
            ?>
        </table>
        <input type="submit" name="btnEnviar" value="ENVIAR VALORACIONES">
    </form>
</body>
</html>