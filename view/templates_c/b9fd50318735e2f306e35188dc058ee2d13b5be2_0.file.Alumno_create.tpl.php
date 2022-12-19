<?php
/* Smarty version 4.2.1, created on 2022-12-19 05:05:11
  from 'C:\xampp\htdocs\ProyectoProgramacion3\view\templates\Alumno_create.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_639fe2f7311564_13218085',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9fd50318735e2f306e35188dc058ee2d13b5be2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProyectoProgramacion3\\view\\templates\\Alumno_create.tpl',
      1 => 1669520364,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_639fe2f7311564_13218085 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="googlebot" content="notranslate">
    <title>Login</title>
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/alumno_padre_registro.css">
    <link rel="stylesheet" href="css/responsive_login.css">
    <?php echo '<script'; ?>
 src="js/alumno_padre_registro.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <?php echo '<script'; ?>
 src="js/modal.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/eliminar_postback.js"><?php echo '</script'; ?>
>
</head>
<body>
        <div class="cuadro-main">
        <div class="txt-flex">
            <div class="logo txt-encabezado"><a href="index.php?accion=abrir_pagina_principal"><img src="SVG/logo-color.svg" alt=""></a></div>
            <div class="txt-titulo txt-encabezado"><a href="index.php?accion=abrir_pagina_principal"><h2>Rodrigo <span class="txt-rojo">Hernandez</span></h2></a></div>
        </div>
        <div class="txt-info">
            <p>Crea una cuenta de Alumno</p>
        </div>
        <div class="txt-info-2">
        </div>
        <div class="flex-form-image">
        <div class="form">
            <form class="form-flex"  action="index.php" method="post">
                <input type="hidden" name="accion" value="registrar_nuevo_usuario">
            <div class="Fila-1">
                <input type="text" id="nombre" placeholder="Nombre" required name="nombre">
                <input type="text" id="apell1" placeholder="Primer apellido" required name="apell1">
                <input type="text" id="apell2" placeholder="Segundo apellido" required name="apell2">
                <input type="hidden" name="Id_rol" id="Id_rol" aria-describedby="Id_rol" value="1">
            </div>
            <div class="Fila-2">
                <input type="text" id="Id_usuario" placeholder="Cedula" required name="Id_usuario">
                <input type="text" id="telefono" placeholder="Telefono" required name="telefono">
            </div>
            <div class="Fila-3">
                <input type="email" id="email" placeholder="Email" name="email">
            </div>
            <!-- <img class="img-alumno" src="/SVG/Alumnos_crear_cuenta2.svg" alt="" width="300px"> -->
            <div class="Fila-4">
                <input type="text" id="usuario" placeholder="Usuario" required name="usuario">
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
            <img src="SVG/Alumnos_crear_cuenta2.svg" alt="" width="400px">
        </div>
    </div>
        </div>
        <?php echo '<script'; ?>
><?php echo $_smarty_tpl->tpl_vars['ejecutar_alumno']->value;
echo '</script'; ?>
>
        <div id="alert" class="alert hide">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg" id="txt-alerta">...</span>
            <div class="close-btn">
               <span class="fas fa-times"></span>
            </div>
         </div>
        <?php echo '<script'; ?>
><?php echo $_smarty_tpl->tpl_vars['action_alerta']->value;
echo '</script'; ?>
>
</body>
</html><?php }
}
