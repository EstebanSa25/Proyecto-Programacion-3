<?php

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'GET':
        header("HTTP/1.1 200 successful");
        fn_listar_asignatura();
        break;

    case 'DELETE':
        header("HTTP/1.1 200 successful");
        fn_borrar_asignatura();
        break;
    case 'PUT':
        header("HTTP/1.1 200 successful");
        fn_crear_asignatura();
        break;
    case 'POST':
        Actualizar_asignatura();
        break;
    default:
        header("HTTP/1.1 405 Method not allowed");
        header("Allow GET");
        break;
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

function fn_listar_asignatura()
{
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
            "<td clas='img-accion'><img src='http://localhost/ProyectoProgramacion3/SVG/delete.svg' style='cursor: pointer;' width='30px' title='Borrar Usuario' onclick='DELETEService(`rsf_Asignatura.php`,`?Id_asignatura=`,".$fila['Id_asignatura'].",`asignatura`,1);'>
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

?>
