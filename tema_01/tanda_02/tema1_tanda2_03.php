<!DOCTYPE html>
<html lang="en">
<?php

    define("FICH", "./bd/articulos.txt");
    define("URL_SUBIDA", "./bd/");

    function cogerArticulos()
    {
        $articulos = [];
        if (file_exists(FICH))
        {
           
            $lineas = explode("\n", file_get_contents(FICH));
            foreach ($lineas as $linea)
            {
               $articulos[] = explode(";", $linea);
            }
            
        }
        return $articulos;

    }

    function aniadirArticulo($nombre = "", $precio = "", $archivo = false)
    {
        $file = fopen(FICH, "a");
        if($archivo)
            fwrite($file, "\n".$nombre.";".$precio.";".$archivo);
        else
            fwrite($file, "\n".$nombre.";".$precio);
        fclose($file);
    }

    $totalCompra = isset($_GET['total']) ? $_GET['total'] : 0;
    $archivoSubida = isset($_FILES['subir']) ? $_FILES['subir'] : false;
    $error = false;
    
    
    if (isset($_POST['aniadir']))
    {
        if (!empty($_POST['nombre']) and !empty($_POST['precio']) and is_numeric($_POST['precio'])){

            if($archivoSubida){
                if(isset($archivoSubida['size']) and $archivoSubida['size'] > 0) {
                    if($archivoSubida['type'] == "text/plain"){
                        $url = URL_SUBIDA.$_POST['nombre']."txt";
                        $movido = move_uploaded_file($_FILES['subir']['tmp_name'], $url);
                        if($movido)
                            aniadirArticulo($_POST['nombre'],$_POST['precio'],$url);
                        else
                            $error = "El archivo no se pudo subir";
                    }else 
                        $error = "Por favor, vuesa merced se ve en la obligación para/con la pleitesia hacia el pueblo de brindar un manuscrito en texto plano";
                } else {
                    aniadirArticulo($_POST['nombre'],$_POST['precio']);
                }
            } else  {
                aniadirArticulo($_POST['nombre'],$_POST['precio']);
            }
               
          
        }else
            $error = "Campo(s) invalido(s)";
    }

    $articulos = cogerArticulos();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <style type="text/css">
        .destacado { 
            background-color: grey;
            font-weight: bold;
            text-align: center;
            padding: 5px;
        }

        table {
            margin: auto;
        }

        td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <p class="destacado">ELIGE TU PEDIDO</p>
    <table>
        <?php

            foreach ($articulos as $articulo) {
                $nombre = $articulo[0];
                $precio = $articulo[1];
                echo "<tr><td>".$nombre."</td>";
                echo "<td>".$precio."</td>";
                echo "<td><a href='?total=".(floatval($precio) + floatval($totalCompra))."'>Añadir unidad</a></td>";
                if(count($articulo) > 2)
                    echo "<td><a href=".$articulo[2].">".$nombre.".txt</a></td>";

                echo "</tr>";
            }
        ?>
    </table>
    <p class="destacado">TOTAL: <?php echo $totalCompra?>€</p>
    <p class="destacado" id="aniadir">AÑADE ARTICULO</p>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="nombre">Nombre:</label></td>
                <td><label>Precio(€):</label></td>
                <td><label for="subir">Selecciona un archivo:</label></td>
            </tr>
            <tr>
                <td><input type="text" name="nombre" id="nombre"></td>
                <td><input type="text" name="precio" id="precio"></td>
                <td><input type="file" name="subir" id="subir" accept=".txt"></td>
                <td><input type="submit" name="aniadir" id="aniadir" value="AÑADIR"></td>
            </tr>
            <?php
                if ($error)
                    echo "<tr><td><p style='color: red'>$error</p></td></tr>";
            ?>
        </table>
    </form>
</body>
</html>

