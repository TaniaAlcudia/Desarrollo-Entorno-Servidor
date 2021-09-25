<!DOCTYPE html>
<html lang="en">
<?php
    define("DESPL", [3, 5, 10]);
    define("DIR", "./ficheros_clave/");
    define("CHAR_Z", ord("Z"));
    define("CHAR_A", ord("A"));
    define("ABC", "ABCDEFGHIJKLMNOPQRSTUVWXYZ");

    function cargarRadios()
    {
        foreach (DESPL as $cant) {
            if(isset($_POST['desp']) and $_POST['desp'] == $cant)
                echo "<input checked type='radio' name='desp' value='$cant'/>$cant<br>";
            else
                echo "<input type='radio' name='desp' value='$cant'/>$cant<br>";
        }
    }

    function cargarCombo()
    {
        $files = scandir(DIR);
        foreach ($files as $file) {
            if (is_file(DIR.$file) and strpos($file, ".txt") == true)
                echo "<option>$file</option>";
        }
    }

    function cifradoCesar($txtIni, $despl)
    {
        $txtCif = "";
        for ($i=0; $i < strlen($txtIni); $i++) 
        {
            $c = ord($txtIni[$i]);
            for ($j=0; $j < $despl; $j++)
            {
                if ($c == CHAR_Z)
                    $c = CHAR_A;
                else
                $c++;
            }
            $txtCif .= chr($c); 
        }
        return $txtCif;
    }

    function cifradoPorSustitucion($txtIni, $opcion)
    {
        $txtCif = "";
        $tamanio = filesize(DIR.$opcion);
        if ($tamanio <= 0)
            $txtCif = "No se ha podico realizar el cifrado. El fichero esta vacio.";
        else
        {
            $file = fopen(DIR.$opcion, "r");
            $str = fread($file, $tamanio);
            fclose($file);

            for ($i = 0; $i < strlen($txtIni); $i++)
            {
                $pos = strrpos(ABC, $txtIni[$i]);
                $txtCif .= substr($str, $pos, 1);  
            }
        }
        return $txtCif;     
    }

    $botonCesarPulsado = false;
    $botonSustPulsado = false;
    $txtValidate = false;
    $despValidate = false;

    if (isset($_POST['cesar']))
    {
        $botonCesarPulsado = true;

        if (!empty($_POST['txt']))
            $txtValidate = true;

        if (isset($_POST['desp']))
            $despValidate = true;
    }

    if (isset($_POST['sust']))
    {
        $botonSustPulsado = true;

        if (!empty($_POST['txt']))
            $txtValidate = true;
    }
    
    $txt = isset($_POST['txt']) ?  $_POST['txt'] : ''; 
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 2</title>
</head>
<body>
    <form action="tema1_tanda2_01.php" method="post">
          <table>
            <tr>
                <td><label for="txt">Texto a cifrar</label></td>
                <td><input type="text" name="txt" id="txt" value="<?php echo $txt ?>"><br></td>
                <?php
                    if ($botonCesarPulsado or $botonSustPulsado)
                        echo !$txtValidate ? "<td style='color: red'>El campo texto esta vacío</td>" : "";
                ?>
            </tr>
            <tr>
                <td><label for="desp">Desplazamiento</label></td>
                <td>
                    <?php
                        cargarRadios();
                    ?>
                </td>
                <td><input type="submit" value="CIFRADO CESAR" name="cesar"/></td>
                <?php
                    if ($botonCesarPulsado)
                        echo !$despValidate ? "<td style='color: red'>Seleccionar opción de desplazamiento</td>" : "";
                ?>
            </tr>
            <tr>
                <td><label for="fich">Fichero de clave</label></td>
                <td>
                    <select name="fich" id="fich">
                        <?php
                            cargarCombo();
                        ?>
                    </select>
                </td>
                <td><input type="submit" value="CIFRADO POR SUSTITUCION" name="sust"></td>
            </tr>
        </table>
    </form>
    <?php

        if ($botonCesarPulsado)
        {
            if ($txtValidate and $despValidate)
                echo "<p>". cifradoCesar(strtoupper($_POST['txt']), $_POST['desp'])."</p>";
        }

        if ($botonSustPulsado)
        {
            if ($txtValidate)
            echo "<p>".cifradoPorSustitucion(strtoupper($_POST['txt']), $_POST['fich'])."</p>";
        }

    ?>
</body>
</html>