<?php
/* Smarty version 4.2.1, created on 2022-12-19 05:49:41
  from 'C:\xampp\htdocs\ProyectoProgramacion3\view\templates\Principal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_639fed65d17987_14886740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e0e49225780eff8a6f618bd175cd61cf5d6c04f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ProyectoProgramacion3\\view\\templates\\Principal.tpl',
      1 => 1671424637,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_639fed65d17987_14886740 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 src="js/utils_rsf_alumno_materias_asociar.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/utils_rsf_usuarios.js" ><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/utils_rsf_Asignatura.js" ><?php echo '</script'; ?>
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
 src="js/profe.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/utils_rsf_alumno_datos_personales.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="css/timeline.css">
    <?php echo '<script'; ?>
 type="text/javascript"
    
  src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="js/rsf_Matricular_alumno.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/profe.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
  emailjs.init('41wlQajnuUJa9k5qv')
<?php echo '</script'; ?>
>
<link rel="stylesheet" href="css/Pago.css">
</head>
<body class="notranslate">
  <input type="hidden" name="accion" value="Principal">
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
                  <li onclick="ajax_metodos('rsf_Alumno.php?accion=listar_materias_asociar&Id_usuario=','GET',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
);"><a href="#">Mis cursos</a></li>
                  <li onclick="ajax_metodos('rsf_Alumno.php?accion=Ver_horario_alumnos&Id_usuario=','GET',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
);"><a href="#">Mi horario</a></li>
                  <li onclick="ajax_metodos('rsf_Alumno.php?accion=Ver_companeros_alumnos&Id_usuario=','GET',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)"><a href="#">Mis compañeros</a></li>
                  <li onclick="ajax_metodos('rsf_Alumno.php?accion=Ver_lista_profesores&Id_usuario=','GET',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)"><a href="#">Mis profesores</a></li>
                </ul>
              </li>
              
              <li>
                <div class="link"><i class="fa fa-university"></i>Servicios<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                  <li onclick="ajax_metodos('rsf_Alumno.php?accion=Ver_timeline','GET','');"><a href="#">Informacion matricula 2023</a></li>
                </ul>
              </li>
              <li>
                <div class="link"><i class="fa fa-credit-card"></i>Financiero<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                  <li onclick="ajax_metodos('rsf_Alumno.php?accion=Pagar_matricula&Id_usuario=','GET',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
);"><a href="#">Pagar Matricula</a></li>
                </ul>
              </li>
              <li>
                <div class="link"><i class="fa fa-user"></i>Mi cuenta<i class="fa fa-chevron-down"></i></div>
                <ul class="submenu">
                  <li onclick="GETService_accion('rsf_Todos_los_usuarios.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)" ><a href="#">Mis datos personales</a></li>
                  <li><a href="logoff.php">Cerrar Sesion</a></li>
                </ul>
              </li>
            
            <?php }?>
            <!-- profesor -->
            <?php if ($_smarty_tpl->tpl_vars['rol']->value == "3") {?>
            <li>
              <div class="link"><i class="fa fa-book"></i>Asignaturas<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <input type="hidden" id="Id_profesor_ws" value="<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
">
               
                <li onclick='ajax_metodos("rsf_Profesor.php?accion=Colocar_asistencia&Id_usuario=","GET",<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
);'><a href="#">Colocar asistencia</a></li>
                <li onclick="ajax_metodos('rsf_Profesor.php?accion=Colocar_promedios&Id_usuario=','GET',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
);"><a href="#">Ingresar promedios</a></li>
                <li onclick="ajax_metodos('rsf_Profesor.php?accion=Mostrar_todos_mis_alumnos&Id_usuario=','GET',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
);"><a href="#">Ver mis estudiantes</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-users"></i>Usuarios<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="ajax_metodos('rsf_Profesor.php?accion=Mostrar_todos_los_profesores','GET','');"><a href="#">Mostrar profesores</a></li>
              </ul>
            </li>
            
            <li>
              <div class="link"><i class="fa fa-user"></i>Mi cuenta<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService_accion('rsf_Todos_los_usuarios.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)" ><a href="#">Mis datos personales</a></li>
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
                <li onclick="ajax_metodos('rsf_Administrador.php?accion=Listar_asignaturas','GET','');"><a href="#">Editar o eliminar Asignaturas</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-users"></i>Usuarios<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="ajax_metodos('rsf_Administrador.php?accion=listar_usuarios','GET','')"><a href="#">Editar o borrar usuarios</a></li>
                <li onclick="ajax_metodos('rsf_Administrador.php?accion=ver_lista_matricular','GET','')"><a href="#">Matricular a un alumno</a></li>
                <li onclick="ajax_metodos('rsf_Administrador.php?accion=ver_lista_usuario_pendiente','GET','');"><a href="#">Aprobar registro de cuenta</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-comments"></i>Chat<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="ajax_metodos('rsf_Administrador.php?accion=ver_iframe_chat','GET','')"><a href="#">Administrar chat</a></li>
              </ul>
            </li>
            <li>
              <div class="link"><i class="fa fa-user"></i>Mi cuenta<i class="fa fa-chevron-down"></i></div>
              <ul class="submenu">
                <li onclick="GETService_accion('rsf_Todos_los_usuarios.php','?Id_usuario=',<?php echo $_smarty_tpl->tpl_vars['_Id_usuario']->value;?>
)" ><a href="#">Mis datos personales</a></li>
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
                          <div class="input-group mb-3 password_class">
                            <div class="input-group-prepend">
                                <label id="contra_label" class="input-group-text" for="inputGroupSelect01">Contraseña</label>
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


         <div class="modal fade" id="asistencia" tabindex="-1" aria-labelledby="asistencia" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="titulo_accion_usu">Colocar asistencia</h5>
                <button type="button" class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Fecha</label>
                        </div>
                      <input type="date" class="form-control" aria-label="default input example" id="Fecha_asistencia" placeholder="dite la fecha">
                    </div>
                  <select class="custom-select" id="Tipo_Asistencia">
                      <option value="Presente">Presente</option>
                      <option value="Ausente">Ausente</option>
                      <option value="Ausencia Justificada">Ausencia justificada</option>
                  </select>
                    </form>
                   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn_cerrar">Cancelar</button>
                <button  type="button" id="crear_usu" class="btn btn-primary" onclick="fn_insertar_asistencia();">Aceptar cambios</button>
              </div>
            </div>
          </div>
        </div>



        <div class="modal fade" id="promedio" tabindex="-1" aria-labelledby="promedio" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="titulo_accion_usu">Colocar promedio</h5>
                <button type="button" class="fas fa-times" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form>
                      <div class="input-group mb-3">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Examen #</label>
                            </div>
                          <input type="text" class="form-control" aria-label="default input example" id="Id_nota_promedio"placeholder="Id_nota">
                        </div>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Nota</label>
                                </div>
                              <input type="text" class="form-control" aria-label="default input example" id="Nota_promedio"placeholder="Nota">
                            </div>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <label class="input-group-text" for="inputGroupSelect01">Trimestre</label>
                                </div>
                              <input type="text" class="form-control" aria-label="default input example" id="Trimestre_promedio"placeholder="Numero de trimestre">
                            </div>
                      </div>
                    </form>
                   
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn_cerrar">Cancelar</button>
                <button  type="button" id="crear_usu" class="btn btn-primary" onclick="fn_insertar_promedio();">Aceptar cambios</button>
              </div>
            </div>
          </div>
        </div>


         <!-- Moda/editar_asig/crear -->
         
          <!-- Modal matricular a alumno -->
          <!--  -->
          <?php if ($_smarty_tpl->tpl_vars['rol']->value == "1" || $_smarty_tpl->tpl_vars['rol']->value == "2") {?>
          <?php echo '<script'; ?>
 src="//code.tidio.co/c7jyn52rr1u3b1mhke7u4jbxqo84qmjj.js" async><?php echo '</script'; ?>
>
          <?php }?>
        
         
</body>
</html><?php }
}
