<?php
/* Smarty version 4.2.1, created on 2022-12-19 05:05:09
  from 'C:\xampp\htdocs\ProyectoProgramacion3\view\templates\Registro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_639fe2f5ea9760_22640042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7dc1d1cba3aa2ac72d64a8e7d45ebb51400504ff' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProyectoProgramacion3\\view\\templates\\Registro.tpl',
      1 => 1669519524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_639fe2f5ea9760_22640042 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="googlebot" content="notranslate">
    <link rel="stylesheet" href="css//cuenta_tipo.css">
   <link rel="stylesheet" href="css//responsive_registro.css">
    <title>Registro</title>
    <?php echo '<script'; ?>
 src="js/eliminar_postback.js"><?php echo '</script'; ?>
>
</head>
<body>
 <input type="hidden" name="accion" value="alumno_account">
    <header>
        <div class="header-principal">
            <div class="logo-nombre">
            <div><a href="index.php?accion=abrir_pagina_principal"><img class="logo" src="SVG/logo.svg" alt=""></a></div>
            <div><a href="index.php?accion=abrir_pagina_principal"><h2 class="nombre-colegio">Rodrigo <span class="txt-naranja">Hernandez</span></h2></a></div>
        </div>
        </div>
    </header>
    <main>
        <div class="sec1-principal">
            <div><h2> <span class="registro">REGISTRO</span>  <br>SISTEMA <span class="txt-rojo">ACADÉMICO</span></h2></div>
            <div >
                <img class="imagen-fondo" src="images//Persona_usando_pc.png" alt="">
            </div>
        </div>
        <div class="barra-divisora1">
            <div>
                <p class="txt-barra-cuenta">Selecciona tu cuenta </p>
            </div>
            <div>
                <h3 class="txt-barra-plataforma">Accede a la mejor plataforma académica para tus necesidades desde un mismo lugar</h3>
            </div>
        </div>
        <h2 class="tipo-cuenta">Registra una cuenta de alumno o <span class="txt-rojo">PADRE</span></h2>
        <div class="img-seleccion">
            <div><a href="index.php?accion=abrir_registro_alumno"><img class="registro" src="SVG/Alumno.svg" alt=""></a></div>
            <div> <a href="index.php?accion=abrir_registro_padres"><img class="registro img-padres" src="SVG/Madre_padre.svg" alt=""></a></div>
        </div>
        <div class="btn-seleccion">
            <a href="index.php?accion=abrir_registro_alumno"><div class="btn-rectangle">Alumno</div></a>
            <a href="index.php?accion=abrir_registro_padres"><div class="btn-rectangle">Padre o Madre</div></a>
        </div>
    </main>
    <footer>
        <div class="centrado-footer">
            <div class="consulta"><h3>Si tienes alguna consulta llama al soporte técnico del colegio</h3></div>
        <div class="txt-footer-centro">
            <div class="txt-normal"><p>Te atendemos de Lunes a Viernes de 7am a 4:30pm</p></div>
            <div class="txt-normal"><p>Telefono:89238756</p></div>
            <div class="txt-normal"><p>Rodrigo_Hernandez-soporte@contacto.ac.cr</p></div>
    </div>
        </div>
    </footer>
</body>
</html><?php }
}
