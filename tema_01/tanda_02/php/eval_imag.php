<!DOCTYPE html>
<html lang="en">
<?php

    define("DIR", "../fotos/");
    define("EXTENSIONES", ["jpg", "png", "tiff", "gif"]);
    define("BD", "../bd/bd.txt");

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
        $str = "<table>";
        $posiciones = array_rand(rutas_imag(), $_POST['cantFotos']);
        if (!is_array($posiciones))
            $posiciones = [$posiciones];

        for ($i=0; $i < count($posiciones); $i++) 
        {
            $ruta = $rutas[$posiciones[$i]];
            $indice_barra = strrpos($ruta,"/");
            $nombre = substr($ruta,$indice_barra + 1); 
            $str .= "
                    <tr>
                    <td><img height='200'src='".$ruta."'></td>
                    <td><input type='checkbox' name='camisas[]' value='".$nombre."'>Me gusta</td>
                    </tr>
            ";
        }
        $str .= "</table>";
        $str .= "<input type='submit' name='btnEnviar' value='ENVIAR VALORACIONES'>";
        return $str;
    }

    function aniadir_linea($url, $contenido)
    {
        $file = fopen($url, "a");
        fwrite($file, $contenido);
        fwrite($file, "\n"); // salto de linea
        fclose($file);
    }
    
    $botonPulsado = false;
    $seleccionada; 

    if (isset($_POST['btnEnviar']))
    {
        $botonPulsado = true;

        $camisas = isset($_POST['camisas']) ? $_POST['camisas'] : [];
        $seleccionada = count($camisas) > 0;
        
        if ($seleccionada)
        {
            $ip = $_SERVER['REMOTE_ADDR'];
            aniadir_linea(BD , $ip.": ".join(" ",$camisas));
        }
        
            
    }
    ?>    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <?php
            if (!$botonPulsado)
                echo dibujar_tabla(rutas_imag());
            else {
                if($seleccionada === true)
                    echo "<p>Gracias por tu envio</p>";
                else
                    echo "<p>Sentimos que no le haya gustado ninguna</p>";    

                echo " <a href='../tema1_tanda2_02.php'>Volver a la página inicial</a></p>";
            }
              
        ?>    
    </form>
</body>
</html>