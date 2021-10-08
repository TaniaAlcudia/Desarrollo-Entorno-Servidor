<?php 
    
    define("USUARIOS", "../bd/usuarios.txt");

    

    function validarLogin($url, $user, $pass){

        $file = fopen($url, "r");
        $linea = "";
        while (!feof($file))
        {
            $linea = fgets($file);
            $parametros = explode($linea, ";");
            if ($user == $parametros[0])
            {
                if($pass == $parametros[1])
                {
                    // vas al chat
                }
                else
                {
                    // vuleves a la pagina de inicio y mantienes el nombre de usuario
                    // mensaje de que la contraseña es erronea
                }
            }
            else
            {
                // redirigir a la pagina a alta.php donde nos podremos registrar
            }
        }
        fclose($file);
    }



    

?>