<?php

$metodo = $_SERVER['REQUEST_METHOD'];
switch ($metodo) {
    case 'GET':
        header("HTTP/1.1 200 successful");
        fn_listar_usuarios();
        // Mostrar_Compañeros();
        break;
    case 'DELETE':
        header("HTTP/1.1 200 successful");
        fn_borrar_usuario();
        break;
    case 'POST':
        fn_Actualizar_usuario();
        break;
    case 'PUT':
        fn_crear_usuario();
        break;
    default:
        header("HTTP/1.1 405 Method not allowed");
        header("Allow GET");
        break;
}

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
            "<td class='img-accion'><img src='http://localhost/ProyectoProgramacion3/SVG/delete.svg' style='cursor: pointer;' width='30px' title='Borrar Usuario' onclick='DELETEService(`rsf_usuarios.php`,`?Id_usuario=`," . $fila['Id_usuario'] .",`usuario`,1);'>";
        $salida .="<img src='http://localhost/ProyectoProgramacion3/SVG/edit.svg'  data-bs-toggle='modal' data-bs-target='#exampleModal'title='Editar Usuario' onclick='Editar_datos_form(" .$Cedula .",`" .$Usuario ."`,`" .$Contraseña ."`,`" .$Email ."`,`" .$Nombre ."`,`" .$Apellido1 ."`,`" .$Apellido2 ."`," .$Telefono ."," .$Id_rol .",`" .$Titulo ."`,`" .$Btn_crear ."`);' style='cursor: pointer;' width='30px' ></td>";
        $salida .= "</tr>";
    }
    $salida .= "</table>";
    echo $salida;
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

function fn_Actualizar_usuario()
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
        $sql = "UPDATE Usuarios set Usuario='$Usuario',Contraseña=MD5('uh_$Contraseña'),Email='$Email',Nombre='$Nombre',Apellido1='$Apellido1',Apellido2='$Apellido2',Telefono=$Telefono,Id_rol=$Id_rol WHERE Id_usuario=$Id_usuario;";
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

?>
