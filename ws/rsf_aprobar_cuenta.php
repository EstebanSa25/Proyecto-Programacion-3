<?php

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'GET':
        header("HTTP/1.1 200 successful");
        fn_listar_usuarios_pendiente();
        break;

    case 'DELETE':
        header("HTTP/1.1 200 successful");
        fn_borrar_usuario_pendiente();
        break;
    case 'PUT':
        header("HTTP/1.1 200 successful");
        fn_aprobar_usuario_pendiente();
        break;
    default:
        header("HTTP/1.1 405 Method not allowed");
        header("Allow GET");
        break;
}

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
            "<td class='img-accion'><img src='http://localhost/ProyectoProgramacion3/SVG/delete.svg' style='cursor: pointer;' width='30px' title='Descartar Usuario' onclick='DELETEService(`rsf_aprobar_cuenta.php`,`?Id_usuario=`,".$fila['Id_usuario'].",`usuario pendiente`,1);'>";
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
?>
