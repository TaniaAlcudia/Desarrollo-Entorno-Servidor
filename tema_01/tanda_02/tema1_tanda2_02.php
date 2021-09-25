<!DOCTYPE html>
<html lang="en">
<?php

    define("EXTENSIONES", ["jpg", "png", "tiff", "gif"]);
    define("DIR", "./fotos/");

    function cargarCombo()
    {
        $n = cuantasImg();
        for ($cont=1; $cont <= $n; $cont++) 
            echo "<option>".$cont."</option>";
    }

    function cuantasImg()
    {
        $contImagenes = 0;

        $files = scandir(DIR);
        foreach ($files as $file) 
        {
            foreach (EXTENSIONES as $ext) 
            { 
                if ( is_file(DIR.$file) and strpos(strtolower($file), $ext) !== false)
                {
                    $contImagenes++;
                    break;
                }
            }
        }

        return $contImagenes;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
    <table>
        <tr>
            <td><p>Cuántas imágenes deseas ver?</p></td>
            <td>
                <select id="cantFotos">
                <?php
                    cargarCombo();
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <button>VER IMAGENES</button>
            </td>
        </tr>
    </table>   
</body>
</html>