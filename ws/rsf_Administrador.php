<?php
if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];

$metodo = $_SERVER['REQUEST_METHOD'];
switch ($metodo) {
    case 'GET':
        header("HTTP/1.1 200 successful");
        switch($accion){
            case"Listar_asignaturas";
            fn_listar_asignaturas();
            break;
            case "listar_usuarios":
                fn_listar_usuarios();
                    break;
                case "ver_lista_matricular":
                    fn_listar_alumnos_matricular();
                        break;
                case "ver_lista_usuario_pendiente":
                    fn_listar_usuarios_pendiente();
                        break;
                case "ver_iframe_chat":
                    fn_listar_panel_chat();
                    break;
                case "ver_datos_personales":
                    fn_listar_usuario_datos_personales();
                    break;
        }
        break;
    case 'DELETE':
        header("HTTP/1.1 200 successful");
       switch($accion){
                case "Borrar_asignatura":
            fn_borrar_asignatura();
            break;
                case "Borrar_usuario":
                    fn_borrar_usuario();
                    break;
                case "Rechazar_aprobacion_cuenta":
                    fn_borrar_usuario_pendiente();
                    break;

       }
        break;
        case 'POST':
            switch ($accion) {
                case"Actualizar_asignatura";
                Actualizar_asignatura();
                break;
                case "Actualizar_usuario":
                    fn_Actualizar_usuario();
                    break;
            }
        break;
        case 'PUT':
            switch ($accion){
                case "Insertar_asignatura":
                    fn_crear_asignatura();
                    break;
                case "Insertar_usuario":
                    fn_crear_usuario();
                    break;
                case "matricular_alumno":
                    fn_matricular_alumno();
                    break;
                case "aprobar_registro_cuenta":
                    fn_aprobar_usuario_pendiente();
                    break;
            
            }
        break;
    default:
        header("HTTP/1.1 405 Method not allowed");
        header("Allow GET");
        break;
}
}
//Funciones
//Asignatura
function Cargar_Modal_asignaturas(){
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }
    $sql = "SELECT Nombre From Asignatura;";

    $rs = $link->query($sql);
$salida = "<div class='modal fade' id='edit_asig' tabindex='-1' aria-labelledby='edit_asig' aria-hidden='true'>
<div class='modal-dialog'>
  <div class='modal-content'>
    <div class='modal-header'>
      <h5 class='modal-title' id='titulo_accion'>Editar asignatura</h5>
      <button type='button' class='fas fa-times' data-bs-dismiss='modal' aria-label='Close'></button>
    </div>
    <div class='modal-body'>
        <form>
            <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                    <label class='input-group-text' for='inputGroupSelect01'>Id_asignatura</label>
                  </div>
              <input  type='text' class='form-control' aria-label='default input example' id='Id_asignatura' placeholder='Ingrese el id de la asignatura' readonly>
              <!-- <small id='emailHelp' class='form-text text-muted'>We'll never share your email with anyone else.</small> -->
            </div>
            <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                    <label class='input-group-text' for='inputGroupSelect01'>Id_Nivel</label>
                  </div>
              <input type='text' class='form-control' aria-label='default input example' id='Id_nivel' placeholder='Ingrese el id del nivel'>
            </div>
            <div class='input-group mb-3'>
            <div class='input-group-prepend'>
                <label class='input-group-text' for='inputGroupSelect01'>Profesor</label>
              </div>";
              $sql = "Select Id_usuario,Nombre from Usuarios where Id_rol=3;";

              $rs = $link->query($sql);
            $salida .= "<select class='custom-select' id='Id_profesor'>";
              while ($fila = $rs->fetch_assoc()) {
                $salida .= "<option value='".$fila['Id_usuario']."'>".$fila['Nombre']."</option>";
                   }
          $salida.= "
            </select>
        </div>
              <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                    <label class='input-group-text' for='inputGroupSelect01'>Materia</label>
                  </div>
                <input type='text' class='form-control' aria-label='default input example' id='Nombre_materia' placeholder='Ingrese el nombre de la materia'>
            </div>
            <div class='input-group mb-3'>
              <div class='input-group-prepend'>
                  <label class='input-group-text' for='inputGroupSelect01'>Numero_Horario</label>
                </div>
              <input type='text' class='form-control' aria-label='default input example' id='Numero_Horario' placeholder='Ingrese el Id del horario'>
          </div>
            <div class='input-group mb-3'>
              <div class='input-group-prepend'>
                  <label class='input-group-text' for='inputGroupSelect01'>Dia</label>
                </div>
              <input type='text' class='form-control' aria-label='default input example' id='Dia' placeholder='Ingrese el Dia'>
          </div>
            <div class='input-group mb-3'>
              <div class='input-group-prepend'>
                  <label class='input-group-text' for='inputGroupSelect01'>Hora Inicio</label>
                </div>
              <input type='time' class='form-control' aria-label='default input example' id='HoraInicio' placeholder='Ingrese la hora de inicio'>
              <div class='input-group-prepend'>
                <label class='input-group-text' for='inputGroupSelect01'>Hora Fin</label>
              </div>
              <input type='time' class='form-control' aria-label='default input example' id='HoraFin' placeholder='Ingrese la hora de fin'>
            </div>
          </form>
    </div>
    <div class='modal-footer'>
      <button type='button' class='btn btn-secondary' data-bs-dismiss='modal' id='btn_cerrar'>Cancelar</button>
      <button id='edit_asignatura' type='button' class='btn btn-primary' onclick='fn_actualizar_asignatura();'>Editar asignatura</button>
      <button  type='button' id='crear_asignatura' class='btn btn-primary' onclick='fn_insertar_asignatura();'>crear asignatura</button>
    </div>
  </div>
</div>
</div>";
    $salida .= "";
    echo $salida;
}
function fn_listar_asignaturas()
{
    Cargar_Modal_asignaturas();
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }

    $sql = "select asig.Id_asignatura,us.Nombre as Nombre_Persona,asig.Nombre,asig.Id_nivel,asig.Id_profesor,hor.Dia,hor.HoraInicio,hor.HoraFin,hor.Id_horario from Usuarios us INNER JOIN Asignatura asig ON asig.Id_profesor=us.Id_usuario
    INNER JOIN Horario hor On hor.Id_asignatura=asig.Id_asignatura;";

    $rs = $link->query($sql);
    $salida = "<div class='d-grid gap-2'><button class='btn btn-primary btn-lg btn-block' type='button' onclick='modal_crear_asig();' data-bs-toggle='modal' data-bs-target='#edit_asig'>Crear nueva asignatura</button></div>";
    $salida .= "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>Id_Asignatura</th>";
    $salida .= "<th>Profesor</th>";
    $salida .= "<th>Materia</th>";
    $salida .= "<th>Id_nivel</th>";
    $salida .= "<th>Accion</th>";
    $salida .= "</tr>";
    $msg = "hola";
    while ($fila = $rs->fetch_assoc()) {
        $salida .= "<tbody>";
        $salida .= "<td>" . $fila['Id_asignatura'] . "</td>";
        $salida .= "<td>" . $fila['Nombre_Persona'] . "</td>";
        $salida .= "<td>" . $fila['Nombre'] . "</td>";
        $salida .= "<td>" . $fila['Id_nivel'] . "</td>";
        $salida .=
            "<td clas='img-accion'><img src='http://localhost/ProyectoProgramacion3/SVG/delete.svg' style='cursor: pointer;' width='30px' title='Borrar Usuario' onclick='DELETEService(`rsf_Administrador.php?accion=Borrar_asignatura`,`&Id_asignatura=`,".$fila['Id_asignatura'].",`asignatura`,1,`Listar_asignaturas`);'>
            <img src='http://localhost/ProyectoProgramacion3/SVG/edit.svg' data-bs-toggle='modal' data-bs-target='#edit_asig' title='Editar Usuario' onclick='Editar_datos_asig(".$fila['Id_asignatura'].",".$fila['Id_nivel'].",".$fila['Id_profesor'].",`".$fila['Nombre']."`,`".$fila['HoraInicio']."`,`".$fila['HoraFin']."`,`".$fila['Dia']."`,".$fila['Id_horario'].");' style='cursor: pointer;' width='30px' ></td>";
        $salida .= "</tbody>";
    }
    $salida .= "</table>";
    echo $salida;
}

function Actualizar_asignatura(){
    if (isset($_REQUEST['Id_asignatura'],$_REQUEST['Id_nivel'],$_REQUEST['Id_profesor'],$_REQUEST['Nombre'],$_REQUEST['HoraInicio'],$_REQUEST['HoraFin'],$_REQUEST['Dia'],$_REQUEST['Id_horario'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql = "UPDATE Asignatura set Id_nivel=".$_REQUEST['Id_nivel'].",Id_profesor=".$_REQUEST['Id_profesor'].",Nombre='".$_REQUEST['Nombre']."' WHERE Id_asignatura=".$_REQUEST['Id_asignatura'].";";
        $sql2 = "UPDATE Horario set Dia='".$_REQUEST['Dia']."',HoraInicio='".$_REQUEST['HoraInicio']."',HoraFin='".$_REQUEST['HoraFin']."' where Id_horario= ".$_REQUEST['Id_horario'].";";
         try {
            if ($link->query($sql) === true && $link->query($sql2) === true  ) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";

            return "er";
        }
    } else {
        echo "Error en WS";
    }
}
function fn_crear_asignatura()
{
    if (isset($_REQUEST['Id_asignatura'],$_REQUEST['Id_nivel'],$_REQUEST['Id_profesor'],$_REQUEST['Nombre'],$_REQUEST['HoraInicio'],$_REQUEST['HoraFin'],$_REQUEST['Dia'],$_REQUEST['Id_horario'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql = "INSERT INTO Asignatura VALUES(".$_REQUEST['Id_asignatura'].",".$_REQUEST['Id_nivel'].",".$_REQUEST['Id_profesor'].",'".$_REQUEST['Nombre']."');";
        $sql2 = "insert into Horario values(".$_REQUEST['Id_horario'].",".$_REQUEST['Id_asignatura'].",'".$_REQUEST['Dia']."','".$_REQUEST['HoraInicio']."','".$_REQUEST['HoraFin']."');";
        try {
            if ($link->query($sql) === true && $link->query($sql2) === true ) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "$e";

            return "er";
        }
    } else {
        echo "Error en WS";
        exit();
    }
}
function fn_borrar_asignatura()
{
    if (isset($_REQUEST['Id_asignatura'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql = "delete from  Asignatura where Id_asignatura=".$_REQUEST['Id_asignatura'].";";

        $sql2 = "delete from Horario where Id_asignatura=".$_REQUEST['Id_asignatura'].";";
        try {
            if ($link->query($sql2) === true && $link->query($sql) === true) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";

            return "er";
        }
    } else {
        echo "Error en WS";
    }
}
//Asignatura

//Usuarios
function fn_listar_usuarios()
{
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }
    $sql = "Select*from Usuarios";

    $rs = $link->query($sql);
    $salida = "<div class='d-grid gap-2'><button class='btn btn-primary btn-lg btn-block' onclick='modal_crear_usu();' type='button' data-bs-toggle='modal' data-bs-target='#exampleModal'>Crear nuevo Usuario</button></div>";
    $salida .= "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>ID</th>";
    $salida .= "<th>Usuario</th>";
    $salida .= "<th>Email</th>";
    $salida .= "<th>Nombre</th>";
    $salida .= "<th>Apellido 1</th>";
    $salida .= "<th>Apellido 2</th>";
    $salida .= "<th>Telefono</th>";
    $salida .= "<th>Rol</th>";
    $salida .= "<th>Accion</th>";
    $salida .= "</tr>";

    while ($fila = $rs->fetch_assoc()) {
        $salida .= "<tr>";
        $salida .= "<td>" . $fila['Id_usuario'] . "</td>";
        $salida .= "<td>" . $fila['Usuario'] . "</td>";
        $salida .= "<td>" . $fila['Email'] . "</td>";
        $salida .= "<td>" . $fila['Nombre'] . "</td>";
        $salida .= "<td>" . $fila['Apellido1'] . "</td>";
        $salida .= "<td>" . $fila['Apellido2'] . "</td>";
        $salida .= "<td>" . $fila['Telefono'] . "</td>";
        $salida .= "<td>" . $fila['Id_rol'] . "</td>";
        $Cedula = $fila['Id_usuario'];
        $Usuario = $fila['Usuario'];
        $Contraseña = $fila['Contraseña'];
        $Email = $fila['Email'];
        $Nombre = $fila['Nombre'];
        $Apellido1 = $fila['Apellido1'];
        $Apellido2 = $fila['Apellido2'];
        $Telefono = $fila['Telefono'];
        $Id_rol = $fila['Id_rol'];
        $Titulo = "Editar usuario";
        $Btn_crear = "Guardar cambios";
        $salida .=
            "<td class='img-accion'><img src='http://localhost/ProyectoProgramacion3/SVG/delete.svg' style='cursor: pointer;' width='30px' title='Borrar Usuario' onclick='DELETEService(`rsf_Administrador.php?accion=Borrar_usuario`,`&Id_usuario=`," . $fila['Id_usuario'] .",`usuario`,1,`listar_usuarios`);'>";
        $salida .="<img src='http://localhost/ProyectoProgramacion3/SVG/edit.svg'  data-bs-toggle='modal' data-bs-target='#exampleModal'title='Editar Usuario' onclick='Editar_datos_form(" .$Cedula .",`" .$Usuario ."`,`" .$Contraseña ."`,`" .$Email ."`,`" .$Nombre ."`,`" .$Apellido1 ."`,`" .$Apellido2 ."`," .$Telefono ."," .$Id_rol .",`" .$Titulo ."`,`" .$Btn_crear ."`);' style='cursor: pointer;' width='30px' ></td>";
        $salida .= "</tr>";
    }
    $salida .= "</table>";
    echo $salida;
}
function fn_crear_usuario()
{
    if (isset($_REQUEST['Id_usuario'], $_REQUEST['Usuario'], $_REQUEST['Contraseña'], $_REQUEST['Email'], $_REQUEST['Nombre'], $_REQUEST['Apellido1'], $_REQUEST['Apellido2'], $_REQUEST['Telefono'], $_REQUEST['Id_rol'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $Id_usuario = $_REQUEST['Id_usuario'];
        $Usuario = $_REQUEST['Usuario'];
        $Contraseña = $_REQUEST['Contraseña'];
        $Email = $_REQUEST['Email'];
        $Nombre = $_REQUEST['Nombre'];
        $Apellido1 = $_REQUEST['Apellido1'];
        $Apellido2 = $_REQUEST['Apellido2'];
        $Telefono = $_REQUEST['Telefono'];
        $Id_rol = $_REQUEST['Id_rol'];
        $sql = "INSERT INTO Usuarios VALUES($Id_usuario, '$Usuario', MD5('uh_$Contraseña'), '$Email', '$Nombre', '$Apellido1', '$Apellido2', $Telefono, $Id_rol);";
        // echo$sql;
        try {
            if ($link->query($sql) === true) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "$e";

            return "er";
        }
    } else {
        echo "Error en WS";
        exit();
    }
}
function fn_borrar_usuario()
{
    if (isset($_REQUEST['Id_usuario'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql = "delete from  Usuarios where Id_usuario=" . $_REQUEST['Id_usuario'];
        try {
            if ($link->query($sql) === true) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";

            return "er";
        }
    } else {
        echo "Error en WS";
    }
}
function fn_Actualizar_usuario()
{
    if (isset($_REQUEST['Id_usuario'], $_REQUEST['Usuario'], $_REQUEST['Email'], $_REQUEST['Nombre'], $_REQUEST['Apellido1'], $_REQUEST['Apellido2'], $_REQUEST['Telefono'], $_REQUEST['Id_rol'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $Id_usuario = $_REQUEST['Id_usuario'];
        $Usuario = $_REQUEST['Usuario'];
        $Contraseña = $_REQUEST['Contraseña'];
        $Email = $_REQUEST['Email'];
        $Nombre = $_REQUEST['Nombre'];
        $Apellido1 = $_REQUEST['Apellido1'];
        $Apellido2 = $_REQUEST['Apellido2'];
        $Telefono = $_REQUEST['Telefono'];
        $Id_rol = $_REQUEST['Id_rol'];
        $sql = "UPDATE Usuarios set Usuario='$Usuario',Email='$Email',Nombre='$Nombre',Apellido1='$Apellido1',Apellido2='$Apellido2',Telefono=$Telefono,Id_rol=$Id_rol WHERE Id_usuario=$Id_usuario;";
        try {
            if ($link->query($sql) === true) {
                echo $sql;
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";

            return "er";
        }
    } else {
        echo "Error en WS";
        exit();
    }
}
//Usuarios

//Matricular alumno
function fn_listar_modal_matricular_alumno()
{
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }
    $sql1 = "select asig.Id_asignatura,us.Nombre as Nombre_Persona,asig.Nombre,asig.Id_nivel,asig.Id_profesor,hor.Dia,hor.HoraInicio,hor.HoraFin,hor.Id_horario from Usuarios us INNER JOIN Asignatura asig ON asig.Id_profesor=us.Id_usuario
    INNER JOIN Horario hor On hor.Id_asignatura=asig.Id_asignatura;";

    $rs1 = $link->query($sql1);
    $salida1="<div class='modal fade' id='Matricular_modal' tabindex='-1' aria-labelledby='Matricular_modal' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title' id='titulo_accion'>Editar asignatura</h5>
          <button type='button' class='fas fa-times' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
            <form>
                <div class='input-group mb-3'>
                  <div class='input-group-prepend'>
                      <label class='input-group-text' for='inputGroupSelect01'>Materia</label>
                    </div>
                     <select class='custom-select' id='Id_asig'>";
                     
    while ($fila1 = $rs1->fetch_assoc()) {
        $salida1 .= "<option value=".$fila1['Id_asignatura'].">".$fila1['Nombre']."</option>";
    }
    $salida1.="</select>
    </div>
    <div class='input-group mb-3'>
                        <div class='input-group-prepend'>
                            <label class='input-group-text' for='inputGroupSelect01'>Id_Nota</label>
                          </div>
                      <input type='text' class='form-control' aria-label='default input example' id='Id_nota' placeholder='Ingrese el id de la nota'>
                    </div>
  </form>
</div>
<div class='modal-footer'>
<button type='button' class='btn btn-secondary' data-bs-dismiss='modal' id='btn_cerrar'>Cancelar</button>
<button id='edit_asignatura' type='button' class='btn btn-primary' onclick='PUT_Matricular(`rsf_Administrador.php?accion=matricular_alumno`);'>Matricular Alumno</button>
</div>
</div>
</div>
</div>";
    echo $salida1;
}
function fn_listar_alumnos_matricular()
{
    fn_listar_modal_matricular_alumno();
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }

    $sql = "select us.Nombre,us.Id_usuario from Usuarios us INNER JOIN Roles rol ON rol.Id_rol=us.Id_rol where us.Id_rol=1;";
    $rs = $link->query($sql);
    $salida = "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>Alumno</th>";
    $salida .= "<th>Cedula</th>";
    $salida .= "<th>Accion</th>";
    $salida .= "</tr>";
    $msg = "hola";
    $salida .= "<input type='hidden' id='Id_alumno_matricular'>";
    while ($fila = $rs->fetch_assoc()) {
        $salida .= "<tbody>";
        $salida .= "<td>" . $fila['Nombre'] . "</td>";
        $salida .= "<td>" . $fila['Id_usuario'] ."</td>";
        $salida .= "<td><div class='d-grid gap-2'><button class='btn btn-primary' type='button'  data-bs-toggle='modal' data-bs-target='#Matricular_modal' onclick='GuardarId(".$fila['Id_usuario'].");'>Matricular</button></div></td>";
        $salida .= "</tbody>";
    }
    $salida .= "</table>";
    echo $salida;

}

function fn_matricular_alumno()
{
    if (isset($_REQUEST['Id_asignatura'],$_REQUEST['Id_usuario'],$_REQUEST['Id_nota'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql2=
        $sql = "INSERT INTO Asignatura_has_alumno VALUES(".$_REQUEST['Id_asignatura'].",".$_REQUEST['Id_usuario'].",".$_REQUEST['Id_nota'].");";
        try {
            if ($link->query($sql) === true ) {
                echo "ok";
               
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "$e";

            return "er";
        }
    } else {
        echo "Error en WS";
        exit();
    }
}
//Matricular alumno

//Aceptar cuenta
function fn_listar_usuarios_pendiente()
{
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }
    $sql = "select*from Registro_temporal;";
    $rs = $link->query($sql);
    $salida="  <span class='txt-aprobar_usu'>APROBAR REGISTRO DE <span class='txt-rojo'>USUARIO</span></span></h1>";
    $salida.= "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>ID</th>";
    $salida .= "<th>Usuario</th>";
    $salida .= "<th>Email</th>";
    $salida .= "<th>Nombre</th>";
    $salida .= "<th>Apellido 1</th>";
    $salida .= "<th>Apellido 2</th>";
    $salida .= "<th>Telefono</th>";
    $salida .= "<th>Rol</th>";
    $salida .= "<th>Accion</th>";
    $salida .= "</tr>";
    $msg = "hola";
    while ($fila = $rs->fetch_assoc()) {
        $salida .= "<tr>";
        $salida .= "<td>" . $fila['Id_usuario'] . "</td>";
        $salida .= "<td>" . $fila['Usuario'] . "</td>";
        $salida .= "<td>" . $fila['Email'] . "</td>";
        $salida .= "<td>" . $fila['Nombre'] . "</td>";
        $salida .= "<td>" . $fila['Apellido1'] . "</td>";
        $salida .= "<td>" . $fila['Apellido2'] . "</td>";
        $salida .= "<td>" . $fila['Telefono'] . "</td>";
        $salida .= "<td>" . $fila['Id_rol'] . "</td>";

        $Id_usuario = $fila['Id_usuario'];
        $Usuario = (string) $fila['Usuario'];
        $Contraseña = $fila['Contraseña'];
        $Email = $fila['Email'];
        $Nombre = $fila['Nombre'];
        $Apellido1 = $fila['Apellido1'];
        $Apellido2 = $fila['Apellido2'];
        $Telefono = $fila['Telefono'];
        $Id_rol = $fila['Id_rol'];
        $salida .=
            "<td class='img-accion'><img src='http://localhost/ProyectoProgramacion3/SVG/delete.svg' style='cursor: pointer;' width='30px' title='Descartar Usuario' onclick='DELETEService(`rsf_Administrador.php?accion=Rechazar_aprobacion_cuenta`,`&Id_usuario=`,".$fila['Id_usuario'].",`usuario pendiente`,1,`ver_lista_usuario_pendiente`);'>";
        $salida .=
            "<img id='editar' src='http://localhost/ProyectoProgramacion3/SVG/check.svg' title='Aprobar usuario' onclick='fn_registrar_nuevo_usuario_pendiente(" .$Id_usuario .",`" .$Usuario ."`,`" .$Contraseña ."`,`" .$Email ."`,`" .$Nombre ."`,`" .$Apellido1 ."`,`" .$Apellido2 ."`," .$Telefono ."," .$Id_rol .");' style='cursor: pointer;' width='30px'></td>";
        $salida .= "</tr>";
    }
    $salida .= "</table>";
    echo $salida;
}

function fn_aprobar_usuario_pendiente()
{
    if (isset($_REQUEST['Id_usuario'], $_REQUEST['Usuario'], $_REQUEST['Contraseña'], $_REQUEST['Email'], $_REQUEST['Nombre'], $_REQUEST['Apellido1'], $_REQUEST['Apellido2'], $_REQUEST['Telefono'], $_REQUEST['Id_rol'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $Id_usuario = $_REQUEST['Id_usuario'];
        $Usuario = $_REQUEST['Usuario'];
        $Contraseña = $_REQUEST['Contraseña'];
        $Email = $_REQUEST['Email'];
        $Nombre = $_REQUEST['Nombre'];
        $Apellido1 = $_REQUEST['Apellido1'];
        $Apellido2 = $_REQUEST['Apellido2'];
        $Telefono = $_REQUEST['Telefono'];
        $Id_rol = $_REQUEST['Id_rol'];
        $sql = "insert into Usuarios values($Id_usuario,'$Usuario',MD5('uh_$Contraseña'),'$Email','$Nombre','$Apellido1','$Apellido2',$Telefono,$Id_rol)";
        try {
            if ($link->query($sql) === true) {
                echo "ok";
                return "ok";
            } else {
                return "er";
            }
        } catch (Exception $e) {
            echo "error";

            return "er";
        }
    } else {
        echo "Error en WS";
        exit();
    }
}
function fn_borrar_usuario_pendiente()
{
    if (isset($_REQUEST['Id_usuario'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql = "delete from Registro_temporal where Id_usuario=" . $_REQUEST['Id_usuario'];
        $rs = $link->query($sql);
        echo "ok";
    } else {
        echo "Error en WS";
    }
}
//Aceptar cuenta
function fn_listar_panel_chat()
{
    $salida = "<iframe class='iframe_chat' src='https://www.tidio.com/panel/inbox/conversations?stream=unassigned' frameborder=0' style='position: absolute; height: 100%; overflow:hidden'width=100% ></iframe>";
    echo $salida;
    
}
function fn_listar_usuario_datos_personales(){
    if(isset($_REQUEST['Id_usuario'])){
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
      if(!$link){
         echo "error al conectar a mysql";
         exit;
      }
      $sql = "SELECT Id_usuario,Usuario,Email,Nombre,Apellido1,Apellido2,Telefono,Id_rol FROM Usuarios where Id_usuario=".$_REQUEST['Id_usuario'].";";
      $rs = $link->query($sql);
      $fila = $rs->fetch_assoc();
    $salida="<div class='container mt-4'>
    <h1 class='display-4 text-center'>
      <i class='fas fa-user text-secondary'></i><span class='text-dark'>  MIS DATOS <span class='text-danger'>  PERSONALES</span></span></h1>
      <form id='book-form'>
        <divclass='form-group'>
          <label id='Nombre_datos_label' for='Nombre'>Nombre</label>
          <input readonly id='Nombre_datos'type='text' class='form-control' value=".$fila['Nombre'].">
        </divclass=>
        <div class='form-group'>
          <label id='Apellido1_datos_label' for='author'>Primer apellido</label>
          <input id='Apellido1_datos' readonly type='text'class='form-control' value=".$fila['Apellido1'].">
        </div>
        <div class='form-group'>
          <label  id='Apellido2_datos_label'  for='author'>Segundo apellido</label>
          <input id='Apellido2_datos' readonly type='text'class='form-control' value=".$fila['Apellido2'].">
        </div>
        <div class='form-group'>
        <labe  id='Email_datos_label'  for='author'>Correo electronico</labe>
        <input id='Email_datos' readonly type='email' class='form-control' value=".$fila['Email'].">
      </div>
      <div class='form-group'>
      <label  id='Usuario_datos_label'  for='author'>Usuario</label>
      <input id='Usuario_datos' readonly type='text' class='form-control' value=".$fila['Usuario'].">
    </div>
    <div class='form-group'>
    <label  id='Telefono_datos_label'  for='author'>Telefono</label>
    <input id='Telefono_datos' readonly type='tel' class='form-control' value=".$fila['Telefono'].">
    </div>
      <div class='form-group'>
        <label  id='Id_usuario_datos_label'  for='author'>Cedula</label>
        <input id='Id_usuario_datos' readonly type='text' class='form-control' value=".$fila['Id_usuario'].">
      </div>
      <div class='form-group'>
        <input hidden id='Id_rol_datos' readonly type='text' class='form-control' value=".$fila['Id_rol'].">
      </div>
      <input id='btn-correo' type='submit' value='Enviar' onclick='fn_actualizar_usuario_correo();' hidden>
      </form>
    </div>
    ";
    
      echo $salida;
    }else {
      echo "Error en WS";
      exit();
    }
    }
?>
