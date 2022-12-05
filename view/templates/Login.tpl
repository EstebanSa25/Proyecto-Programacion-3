<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="googlebot" content="notranslate">
    <title>Login</title>
    <link rel="stylesheet" href="css/Login.css">
    <link rel="stylesheet" href="css//responsive_login.css">
    <script src="js/eliminar_postback.js"></script>
</head>
<body>

        <div class="cuadro-main">
        <div class="txt-flex">
            <div class="logo txt-encabezado"><a href="index.php?accion=abrir_pagina_principal"><img src="SVG/logo-color.svg" alt=""></a></div>
            <div class="txt-titulo txt-encabezado"><a href="index.php?accion=abrir_pagina_principal"><h2>Rodrigo <span class="txt-rojo">Hernandez</span></h2></a></div>
        </div>
            <form class="form-flex"  action="index.php" method="post">
               <h3 class="error_login">{$msg}</h3>
                <input type="hidden" name="accion" value="login">
                <div>
                    <h3>Usuario</h3>
                    <input class="borde" name="usuario" type="text" placeholder="Usuario" required/>
                </div>
            <div>
                <h3>Password</h3>
                <input class="borde" name="password" type="password" placeholder="Contraseña" required/>
            </div>
            <div>
                <input class="btn-enviar" type="submit" value="Enviar">
            </div>
            </form>
        </div>
</body>
</html>