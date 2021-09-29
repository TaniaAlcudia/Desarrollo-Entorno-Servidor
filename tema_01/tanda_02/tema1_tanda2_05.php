<!DOCTYPE html>
<html lang="en">
<?php

    define("FICH", "./bd/conversiones.txt");
    define("FACTOR", leerFactor());

    function leerFactor()
    {
        if (file_exists(FICH))
        {
            $file = fopen(FICH, "r");
            $factor = fscanf($file, "%f")[0];
            fclose($file);
        }
        else
            $factor = 0;
            
        return $factor;
    }
    
    function convertir($cant, $opcion)
    {
        if ($opcion == "euroAdolar")
             return $cant * FACTOR;
        else
            return $cant / FACTOR;
    }   

    $botonPulsado = (isset($_POST['convertir']));
    
    if ($botonPulsado)
    {
        $campoVacio = (empty($_POST['cantidad']));
        if (!$campoVacio)
            $esNumero = is_numeric($_POST['cantidad']);
    }

    $cant = isset($_POST['cantidad']) ?  $_POST['cantidad'] : '';

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <table>
            <tr>
                <td>
                    <label for="cantidad">Cantidad: </label>
                    <input type="text" name="cantidad" id="cantidad" value="<?php echo $cant?>">
                </td>
                <?php
                    if ($botonPulsado)
                        if ($campoVacio)
                            echo "<td><p style='color:red'>¡VACIO!</p></td>";
                        elseif (!$esNumero)
                            echo "<td><p style='color:red'>¡NO NÚMERICO!</p></td>"; 
                ?>
                <td>
                    <input type="radio" id="euroAdolar" name="tipoCambio" value="euroAdolar" checked>
                    <label for="euroAdolar">Euros a dólares</label><br>
                    <input type="radio" id="dolarAeuro" name="tipoCambio" value="dolarAeuro">
                    <label for="dolarAeuro">Dólares a euros</label>
                </td>
            </tr>
            <?php
                if ($botonPulsado and $campoVacio == false and $esNumero)
                    echo "<tr><td><p style='font-size:30px; margin:0px'>".convertir($_POST['cantidad'], $_POST['tipoCambio'])."</p></td></tr>";
            ?>
            <tr>
                <td><input type="submit" name="convertir" value="CONVERTIR"></td>
            </tr>
        </table>
        
    </form>
</body>
</html>