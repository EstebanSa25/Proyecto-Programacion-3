<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="googlebot" content="notranslate">
    <title>Login Padres</title>
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/alumno_padre_registro.css">
    <link rel="stylesheet" href="css/responsive_login.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="js/alumno_padre_registro.js"></script>
    <script src="js/eliminar_postback.js"></script>
</head>
<body>
        <div class="cuadro-main">
        <div class="txt-flex">
            <div class="logo txt-encabezado"><a href="index.php?accion=abrir_pagina_principal"><img src="SVG/logo-color.svg" alt=""></a></div>
            <div class="txt-titulo txt-encabezado"><a href="index.php?accion=abrir_pagina_principal"><h2>Rodrigo <span class="txt-rojo">Hernandez</span></h2></a></div>
        </div>
        <div class="txt-info">
            <p>Crea una cuenta de Padre o Madre</p>
        </div>
                <div class="txt-info-2">
        </div>
        <div class="flex-form-image">
        <div class="form">
            <form class="form-flex" id="form_padre" action="index.php" method="post">
                <input type="hidden" name="accion" value="registrar_nuevo_usuario_padre">
            <div class="Fila-1">
                <input type="text" placeholder="Nombre" required name="nombre" id="nombre" >
                <input type="text" placeholder="Primer apellido" required name="apell1" id="apell1">
                <input type="text" id="apell2" placeholder="Segundo apellido" required name="apell2">
                <input type="hidden" required name="Id_rol" id="Id_rol" aria-describedby="Id_rol" value="2">
            </div>
            <div class="Fila-2">
                <input type="text" placeholder="Cedula" id="Id_usuario" required name="Id_usuario">
                <input type="text" placeholder="Telefono" id="telefono" required name="telefono">
            </div>
            <div class="Fila-3">
                <input type="email" placeholder="Email" name="email" id="email">
            </div>
            <!-- <img class="img-alumno" src="/SVG/Alumnos_crear_cuenta2.svg" alt="" width="300px"> -->
            <div class="Fila-4">
                <input type="text" placeholder="Usuario" required id="usuario" name="usuario">
                <input type="text" placeholder="Cedula de su hijo o hija" id="cedula_hijo" required name="nombre_hijo">
            </div>
            <div class="Fila-5">
                <input type="password" placeholder="Contraseña" name="password" id="password">
                <input type="password" placeholder="Confirmacion" name="password_confirmar" id="password_confirmar">
            </div>
            <div class="Fila-6">
                <input type="checkbox"  name="" onclick="mostrarContrasena()+mostrarContrasena_confirm()" id="">
                <p>Mostrar contraseña</p>
            </div>
            <div class="Fila-7">
                <a href="index.php?accion=abrir_login"><p class="txt-rojo">Prefiero iniciar sesion</p></a>
                <input class="btn-enviar" type="submit" value="Enviar">
            </div>
            </form>
        </div>
        <div class="image">
            <img src="SVG/familia.svg" alt="" width="300px">
        </div>
    </div>
        </div>
         <script>{$ejecutar_padre}</script>
        <div id="alert" class="alert hide">
           <span class="fas fa-exclamation-circle"></span>
           <span class="msg" id="txt-alerta">{$msg}</span>
           <div class="close-btn">
              <span class="fas fa-times"></span>
           </div>
        </div>
        <script>{$action_alerta}</script>
</body>
</html>