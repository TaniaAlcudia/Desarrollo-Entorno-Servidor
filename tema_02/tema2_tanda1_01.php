<!DOCTYPE html>
<html lang="en">
<?php
    define("DESPL", [3, 5, 10]);
    define("DIR", "./ficheros_clave/");

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

    $botonPulsado = false;
    $txtValidate = false;
    $despValidate = false;

    if (isset($_POST['cesar']) or isset($_POST['sust']))
    {
        $botonPulsado = true;

        if (!empty($_POST['txt']))
            $txtValidate = true;

        if (isset($_POST['desp']))
            $despValidate = true;
    }
    
    $txt_reploblado = isset($_POST['txt']) ?  $_POST['txt'] : ''; 
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda 2</title>
</head>
<body>
    <form action="tema2_tanda1_01.php" method="post">
          <table>
            <tr>
                <td>
                    <label for="txt">Texto a cifrar</label>
                </td>
                <td>
                    <input type="text" name="txt" id="txt" value="<?php echo $txt_reploblado ?>"><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="desp">Desplazamiento</label>
                </td>
                <td>
                    <?php
                        cargarRadios();
                    ?>
                </td>
                <td>
                    <input type="submit" value="CIFRADO CESAR" name="cesar"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fich">Fichero de clave</label>
                </td>
                <td>
                    <select name="fich" id="fich">
                        <?php
                            cargarCombo();
                        ?>
                    </select>
                </td>
                <td>
                    <input type="submit" value="CIFRADO POR SUSTITUCION" name="sust">
                </td>
            </tr>
        </table>
    </form>
    <?php

        if ($botonPulsado)
        {
            echo !$txtValidate ? "<p style='color: red'>El campo texto esta vacío</p>" : "<p>El campo de texto NO ESTA VACIO</p>";
            echo !$despValidate ? "<p style='color: red'>Seleccionar opción de desplazamiento</p>" : "<p>Opción de desplazamiento seleccionada</p>";
        }
    ?>
    
</body>
</html>