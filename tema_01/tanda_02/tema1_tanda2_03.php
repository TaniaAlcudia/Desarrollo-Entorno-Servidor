<!DOCTYPE html>
<html lang="en">
<?php

    define("FICH", "./bd/articulos.txt");

    function mostarArticulos($totalCompra)
    {
        if (file_exists(FICH))
        {
            $lineas = explode("\n", file_get_contents(FICH));
            foreach ($lineas as $linea)
            {
               $articulos = explode(";", $linea);
               $articulo = $articulos[0];
               $precio = $articulos[1];
               echo "<tr><td>".$articulo."</td>";
               echo "<td>".$precio."</td>";
               echo "<td><a href='?total=".(floatval($precio) + floatval($totalCompra))."'>Añadir unidad</a></td></tr>";
            }
        }
    }

    function aniadirArticulo()
    {
        $file = fopen(FICH, "a");
        fwrite($file, "\n".$_POST['nombre'].";".$_POST['precio']);
        fclose($file);
    }

    $totalCompra = isset($_GET['total']) ? $_GET['total'] : 0;
    $error = false;
    
    if (isset($_GET['aniadir']))
    {
        if (!empty($_POST['nombre']) and !empty($_POST['precio']) and is_numeric($_POST['precio']))
            aniadirArticulo();
        else
            $error = true;
    }

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
            mostarArticulos($totalCompra);
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
                <td><input type="file" name="subir" id="subir"></td>
                <td><input type="submit" name="aniadir" id="aniadir" value="AÑADIR"></td>
            </tr>
            <?php
                if ($error)
                    echo "<tr><td><p style='color: red'>Campo(s) invalido(s)</p></td></tr>";
            ?>
        </table>
    </form>
</body>
</html>

