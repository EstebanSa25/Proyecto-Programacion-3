<?php
/* Smarty version 4.2.1, created on 2022-12-19 00:14:56
  from 'C:\xampp\htdocs\ProyectoProgramacion3\view\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_639f9ef03f79d5_42897562',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '782870e1967cbac34f44e0e3f008b3597bbc75fb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProyectoProgramacion3\\view\\templates\\login.tpl',
      1 => 1670293687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_639f9ef03f79d5_42897562 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="googlebot" content="notranslate">
    <title>Login</title>
    <link rel="stylesheet" href="css/Login.css">
    <link rel="stylesheet" href="css//responsive_login.css">
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
            <form class="form-flex"  action="index.php" method="post">
               <h3 class="error_login"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</h3>
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
        <h3>Cuenta admin<br>Usuario:admin<br>Password:123<br><br>Cuenta Alumno o Padre<br>Usuario:alum<br>Password:123</h3>
</body>
</html><?php }
}
