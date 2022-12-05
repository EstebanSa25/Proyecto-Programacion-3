<?php
/* Smarty version 4.2.1, created on 2022-11-30 01:28:42
  from 'C:\xampp\htdocs\ProyectoProgramacion3\view\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6386a3baf27a69_49061792',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '318e926e3c7e5b6ef8597dbc2728ce3101905908' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProyectoProgramacion3\\view\\templates\\index.tpl',
      1 => 1669519509,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6386a3baf27a69_49061792 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="googlebot" content="notranslate">
        <link rel="stylesheet" href="css/page-principal.css">
        <link rel="stylesheet" href="css/pseudoclases.css">
        <link rel="stylesheet" href="css/responsive.css">
        <?php echo '<script'; ?>
 src="js/eliminar_postback.js"><?php echo '</script'; ?>
>
        <title>Colegio Rodrigo Hernandez</title>
    </head>
    <body>
        <header>
            <div class="header-principal">
                <div class="logo-header">
                    <a href="">
                        <img class="logo-header" src="svg/logo.svg" alt="">
                    </a>
                </div>
                <div class="header-menu">
                <div><a class="menu" href="index.php?accion=abrir_registro">REGISTRO</a></div>
                <div><a class="menu" href="">PLATAFORMA</a></div>
                <div><a class="menu" href="">TRAMITES</a></div>
                </div>
                <div class="header-iniciar_sesion">
                    <input type="hidden" name="accion" value="abrir_login">
                    <a href="index.php?accion=abrir_login" class="txtIniciarsesion">iniciar sesion <span class="btn-login">LOGIN</span> </a>
                </div>
            </div>
        </header>
        <main>
            <div class="body-principal">
                <div class="txtSec1">
                    <p class="colegio-publico">COLEGIO PÚBLICO</p>
                    <h2>Matrícula con nosotros</h2>
                    <p class="txt3">Fomenta tu nivel <br> de aprendizaje y prepárate <br> para un mejor futuro </p>
                    <div class="btn-principal1">
                        <a class="btn-sec1-servicios" href="#servicios">
                            <div>Servicios</div>
                        </a>
                        <a class="btn-sec1-contacto" href="tel:+506 41001656">
                            <div>contacto</div>
                        </a>
                    </div>
                </div>
                <div class="image1">
                    <img src="images/image1.png" alt="">
                </div>
            </div>
            <div class="barra-divisora1">
                <div class="scroll-hidden">
                    <p class="txt-barra-ubicacion">Colegio publicó ubicado en Heredia</p>
                </div>
                <div class="scroll-hidden">
                    <h3 class="txt-barra-educacion">Educación <span class="txt-rojo">secundaria</span></h3>
                </div>
            </div>
            <div class="main-servicios" id="servicios">
                <h3 class="txt-info_titulo">Nuestros <span class="txt-rojo">servicios</span>
                </h3>
                <p class="txt-info_servicios">Estos son los servicios que ofrece el colegio a los estudiantes</p>
            </div>
            <div class="main-img_servicios">
                <div class="main-plataforma_educativa">
                    <img class="img-ingles" src="svg/Plataforma_Educativa.svg" alt="">
                    <p>Plataforma <span class="txt-bold">Educativa</span>
                    </p>
                </div>
                <div main-curso_ingles>
                    <img class="img-ingles" src="svg/Curso_Ingles.svg" alt="">
                    <p>Curso de  <span class="txt-bold">Inglés</span>
                    </p>
                </div>
                <div>
                    <img class="img-ingles" src="svg/Biblioteca.svg" alt="">
                    <p>Acceso a la <span class="txt-bold">Biblioteca</span>
                    </p>
                </div>
            </div>
            <div class="barra-divisora2">
                <div class="scroll-hidden">
                    <p class="txt-barra-ubicacion">Agenda una cita para visitar nuestra instalación</p>
                </div>
                <div class="scroll-hidden">
                    <h3 class="txt-barra-educacion">En Heredia</h3>
                </div>
                <div class="btn-llamar">
                    <a href="tel:+506 41001656">
                        <div>Llamar</div>
                    </a>
                </div>
            </div>
            <div class="main-infraestructura">
                <p class="txt-infraestructura">CONTAMOS CON UNA INFRAESTRUCTURA MODERNA</p>
                <p class="txt-instalacion">Nuestra instalación está aprobada<br> por el <span class="txt-rojo">MEP</span>
                </p>
            </div>
            <div class="main-infrestructura_img">
                <div>
                    <img class="img-estructura" src="svg/colegio_foto1.svg" alt="">
                    <p>Contamos una instalacion con <br>capacidad de <span class="txt-naranja"> 22 000 estudiantes </span>
                        <br>y <span class="txt-naranja">4671​ profesores</span>
                    </p>
                </div>
                <div class="estructura2">
                    <img class="img-estructura" src="svg/colegio_foto2.svg" alt="">
                    <p>Nuestra institucion fue fundada <br>el <span class="txt-naranja">8 de septiembre de 1636</span>
                    </p>
                </div>
            </div>
        </main>
        <footer>
            <div class="footer-principal">
                <div class="logo-header">
                    <a href="">
                        <img class="logo-header" src="svg/logo.svg" alt="">
                    </a>
                </div>
                <div class="info-footer"><p class="menu-footer">Para más Información<br>
                    Contáctanos de Lunes a Viernes de 7am a 4:30pm
                </p></div>
                <div class="footer-menu">
                    <div class="footer-contacto">
                        <div class="txt-normal"><p class="menu-footer">WhatsApp 8332-3915</p></div>
                        <div class="txt-normal"><p class="menu-footer">Teléfono 4100-1656</p></div>
                        <div class="txt-normal"><p class="menu-footer">colegioHernandez@ch.ac.cr</p></div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html><?php }
}
