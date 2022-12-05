<?php
/* Smarty version 4.2.1, created on 2022-12-05 04:26:30
  from 'C:\xampp\htdocs\ProyectoProgramacion3\view\templates\Principal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_638d64e6558fd4_99913182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0e49225780eff8a6f618bd175cd61cf5d6c04f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProyectoProgramacion3\\view\\templates\\Principal.tpl',
      1 => 1670210789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638d64e6558fd4_99913182 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es" translate="no">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="googlebot" content="notranslate">

    <title>Sistema academico</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="css/Principal_accion.css">
    <link rel="stylesheet" href="css/pseudoclases.css">
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.1.min.js" ><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" href="css/Tabla_Horario.css">
    <link rel="stylesheet" href="css/mostrar_compas.css">
    <link rel="stylesheet" href="css/pago.css">
    <?php echo '<script'; ?>
 src="js/utils_rsf_alumno_materias_asociar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/utils_rsf_usuarios.js" ><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js//utils_rsf_Asignatura.js" ><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/utils_rsf_aprobar_cuenta.js" ><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/Config_ws.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/rsf_Companeros_clase.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/modal.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/eliminar_postback.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/utils_rsf_alumno_datos_personales.js"><?php echo '</script'; ?>
>
</head>
<body class="notranslate">
   <p id="_Id_rol" hidden><?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
</p>
    <input type="hidden" name="accion" value="menu_principal">

        <div class="Contendor-principal">
          <div class="header"></div>
          <input onclick="ajustar_tabla();" type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
          <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
            </label>
            <div id="sidebarMenu">
              <ul class="sidebarMenuInner">
                <!-- rol 1=alumno
                      rol 2=padre
                      rol 3=profe
                      rol 4=administrador
                -->
                <?php if ($_smarty_tpl->tpl_vars['rol']->value == "1") {?>
                <li><?php echo $_smarty_tpl->tpl_vars['_nombre']->value;?>
<span>Alumno</span></li>
                <h1><?php echo '<?php'; ?>
 echo "This message is from server side."<?php echo '?>'; ?>
</h1>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['rol']->value == "2") {?>
                <li><?php echo $_smarty_tpl->tpl_vars['_nombre']->value;?>
<span>Encargado</span></li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['rol']->value == "3") {?>
                <li><?php echo $_smarty_tpl->tpl_vars['_nombre']->value;?>
<span>Profesor</span></li>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['rol']->value == "4") {?>
                <li><?php echo $_smarty_tpl->tpl_vars['_nombre']->value;?>
<span>Administrador</span></li>
                <?php }?>
              </ul>
                <ul id="accordion" class="accordion">
            <?php if ($_smarty_tpl->tpl_vars['rol']->value == "1" || $_smarty_tpl->tpl_vars['rol']->value == "2") {?>
              <li>
                <div class="link"><i class="fa fa-book"></i>Cursos<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                  <li onclick="GETService_accion('rsf_alumno_materias_asociar.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
);"><a href="#">Mis cursos</a></li>
                  <li onclick="GETService_accion('rsf_horario.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
);"><a href="#">Mi horario</a></li>
                  <li onclick="GETService_accion('rsf_mostrar_materias_alumno.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)"><a href="#">Mis compañeros</a></li>
                </ul>
              </li>
              <li>
                <div class="link"><i class="fa fa-university"></i>Servicios<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                  <li><a href="#">Informacion matricula 2023</a></li>
                  <li><a href="#">Matricular</a></li>
                  <li><a href="#">Proceso de admision 2023</a></li>
                </ul>
              </li>
              <li>
                <div class="link"><i class="fa fa-credit-card"></i>Financiero<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                  <li onclick="GETService('rsf_Pagar_Matricula.php');"><a href="#">Pagar Matricula</a></li>
                </ul>
              </li>
              <li>
                <div class="link"><i class="fa fa-user"></i>Mi cuenta<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                  <li onclick="GETService_accion('rsf_alumno_datos_personales.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)" ><a href="#">Mis datos personales</a></li>
                  <li><a href="#">Actualizar Correo Electronico</a></li>
                  <li><a href="logoff.php">Cerrar Sesion</a></li>
                </ul>
              </li>
            <?php }?>
            <!-- profesor -->
            <?php if ($_smarty_tpl->tpl_vars['rol']->value == "3") {?>
            <li>
              <div class="link"><i class="fa fa-book"></i>Asignaturas<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService('rsf_Asignatura.php');"><a href="#">Editar o eliminar Asignaturas</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-users"></i>Usuarios<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService('rsf_usuarios.php')"><a href="#">Editar o borrar usuarios</a></li>
                <li><a href="#">Matricular a un alumno</a></li>
                <li onclick="GETService('rsf_aprobar_cuenta.php');"><a href="#">Aprobar registro de cuenta</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-credit-card"></i>Financiero<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService('rs_Pagar_Matricula');"><a href="#">Pagar Matricula</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-user"></i>Mi cuenta<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService_accion('rsf_alumno_datos_personales.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)" ><a href="#">Mis datos personales</a></li>
                <li><a href="#">Actualizar Correo Electronico</a></li>
                <li><a href="logoff.php">Cerrar Sesion</a></li>
              </ul>
            </li>
            <?php }?>
            <!-- profesor -->

            <!-- administrador -->
            <?php if ($_smarty_tpl->tpl_vars['rol']->value == "4") {?>
            <li>
              <div class="link"><i class="fa fa-book"></i>Asignaturas<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService('rsf_Asignatura.php');"><a href="#">Editar o eliminar Asignaturas</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-users"></i>Usuarios<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService('rsf_usuarios.php')"><a href="#">Editar o borrar usuarios</a></li>
                <li><a href="#">Matricular a un alumno</a></li>
                <li onclick="GETService('rsf_aprobar_cuenta.php');"><a href="#">Aprobar registro de cuenta</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-credit-card"></i>Financiero<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li><a href="#">Recibos por pagar</a></li>
                <li><a href="#">Metodos de pago</a></li>
                <li><a href="#">Precio por matricula 2023</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-comments"></i>Chat<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService('rsf_iframe_chat.php')"><a href="#">Administrar chat</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-user"></i>Mi cuenta<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService_accion('rsf_alumno_datos_personales.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)" ><a href="#">Mis datos personales</a></li>
                <li><a href="#">Actualizar Correo Electronico</a></li>
                <li><a href="logoff.php">Cerrar Sesion</a></li>
                
              </ul>
            </li>
                <!-- <a href="#" onclick="GETService('rsf_Asignatura.php');"><li>Asignaturas</li></a>
                <a href="#" onclick="GETService('rsf_usuarios.php')" ><li>Usuario</li></a>
                <a href="#"onclick="GETService('rsf_aprobar_cuenta.php');" ><li>Aprobar registro de cuenta</li></a> -->
               
            <?php }?>
        </ul>
          </div>
            <div id='center' class="main center">
                
              <div class="Contenedor-TH" id="contenedor"></div>
            </div>
            <!-- administrador -->
        </div>
        <div id="alert" class="alert hide">
            <span id="icon-alert" class="fas fa-exclamation-circle"></span>
            <span class="msg" id="txt-alerta">...</span>
            <div class="close-btn">
               <span class="fas fa-times"></span>
            </div>
         </div>
         <!-- Modal/crear/editar usuario -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="titulo_accion_usu">Editar usuario</h5>
                  <button type="button" class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Nombre</label>
                              </div>
                          <input type="text" class="form-control" aria-label="default input example" id="nombre" placeholder="Ingrese el nombre del usuario">
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Primer apellido</label>
                              </div>
                          <input type="text" class="form-control" aria-label="default input example" id="apell1" placeholder="Ingrese el apellido 1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Segundo apellido</label>
                              </div>
                            <input type="text" class="form-control" aria-label="default input example" id="apell2" placeholder="Ingrese el apellido 2">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Usuario</label>
                              </div>
                            <input type="text" class="form-control" aria-label="default input example" id="usu" placeholder="Ingrese el usuario">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Email</label>
                              </div>
                            <input type="email" class="form-control" aria-label="default input example" id="Email" placeholder="Ingrese el correo electronico">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Telefono</label>
                              </div>
                            <input type="tel" class="form-control" aria-label="default input example" id="Telefono" placeholder="Ingrese el telefono">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Cedula</label>
                              </div>
                            <input type="text" class="form-control" aria-label="default input example" id="cedula" readonly placeholder="Ingrese la cedula">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Contraseña</label>
                              </div>
                            <input type="password" class="form-control" aria-label="default input example" id="pass" placeholder="Ingrese la contraseña">
                          </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Rol</label>
                              </div>
                            <select class="custom-select" id="rol">
                                <option value="1">Alumno</option>
                                <option value="2">Madre o Padre</option>
                                <option value="3">Profesor</option>
                                <option value="4">Administrador</option>
                            </select>
                            
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn_cerrar">Cancelar</button>
                  <button type="button" class="btn btn-primary" id="actualizar_usu" onclick="fn_actualizar_usuario();">Actualizar usuario</button>
                  <button  type="button" id="crear_usu" class="btn btn-primary" onclick="fn_insertar_usuario();">Crear usuario</button>
                </div>
              </div>
            </div>
          </div>
          
         <!-- Modal -->

         <!-- Moda/editar_asig/crear -->
         <div class="modal fade" id="edit_asig" tabindex="-1" aria-labelledby="edit_asig" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="titulo_accion">Editar asignatura</h5>
                  <button type="button" class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Id_asignatura</label>
                              </div>
                          <input  type="text" class="form-control" aria-label="default input example" id="Id_asignatura" placeholder="Ingrese el id de la asignatura" readonly>
                          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Id_Nivel</label>
                              </div>
                          <input type="text" class="form-control" aria-label="default input example" id="Id_nivel" placeholder="Ingrese el id del nivel">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Id_profesor</label>
                              </div>
                            <input type="text" class="form-control" aria-label="default input example" id="Id_profesor" placeholder="Ingrese la cedula del profesor">
                          </div>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Materia</label>
                              </div>
                            <input type="text" class="form-control" aria-label="default input example" id="Nombre_materia" placeholder="Ingrese el nombre de la materia">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Numero_Horario</label>
                            </div>
                          <input type="text" class="form-control" aria-label="default input example" id="Id_horario" placeholder="Ingrese el Id del horario">
                      </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Dia</label>
                            </div>
                          <input type="text" class="form-control" aria-label="default input example" id="Dia" placeholder="Ingrese el Dia">
                      </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Hora Inicio</label>
                            </div>
                          <input type="time" class="form-control" aria-label="default input example" id="HoraInicio" placeholder="Ingrese la hora de inicio">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Hora Fin</label>
                          </div>
                          <input type="time" class="form-control" aria-label="default input example" id="HoraFin" placeholder="Ingrese la hora de fin">
                        </div>
                      </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn_cerrar">Cancelar</button>
                  <button id="edit_asignatura" type="button" class="btn btn-primary" onclick="fn_actualizar_asignatura();">Editar asignatura</button>
                  <button  type="button" id="crear_asignatura" class="btn btn-primary" onclick="fn_insertar_asignatura();">crear asignatura</button>
                </div>
              </div>
            </div>
          </div>
          <?php if ($_smarty_tpl->tpl_vars['rol']->value == "1" || $_smarty_tpl->tpl_vars['rol']->value == "2") {?>
          <?php echo '<script'; ?>
 src="//code.tidio.co/c7jyn52rr1u3b1mhke7u4jbxqo84qmjj.js" async><?php echo '</script'; ?>
>
          <?php }?>
          
</body>
</html><?php }
}
