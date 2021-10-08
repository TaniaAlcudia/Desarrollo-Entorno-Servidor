<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <form action="./php/validacion.php" method="post">
        <p name="error"></p>
        <table>
            <tr>
                <td><label for="usuario">Nombre de usuario:</label></td>
                <td><input type="text" name="usuario" id="usuario"></td>
                <td rowspan="2"><input type="submit" name="enviar" id="enviar" value="ENTRAR"></td>
            </tr>
            <tr>
                <td><label for="pass">Contraseña:</label></td>
                <td><input type="password" name="pass" id="pass"></td>
            </tr>
        </table>
    </form>        
</body>
</html>