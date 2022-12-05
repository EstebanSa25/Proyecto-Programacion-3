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
        $sql = "delete from  Asignatura where Id_asignatura=" . $_REQUEST['Id_asignatura'];
        echo"<script>Console.log($sql)</script>";
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

function fn_listar_asignatura()
{
    if(isset($_REQUEST['Id_usuario'],$_REQUEST['Id_asignatura'])){
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }

    $sql = "Select asig.Nombre,falta.Fecha,falta.Justificada from Usuarios us lEFT JOIN Asignatura_has_alumno has ON has.Id_alumno=us.Id_usuario
    LEFT JOIN Asignatura asig ON asig.Id_asignatura=has.Id_asignatura
    LEFT JOIN Falta_Asistencia falta ON falta.Id_alumno=us.Id_usuario and falta.Id_asignatura=asig.Id_asignatura where asig.Id_asignatura=".$_REQUEST['Id_asignatura']." and us.Id_usuario=".$_REQUEST['Id_usuario'].";";
    $rs = $link->query($sql);
   $title= $rs->fetch_assoc();
   $salida="<h3>Hoja de asistencia de: $title[Nombre]</h3>";
    $salida .= "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>Dia</th>";
    $salida .= "<th>Estado</th>";
    $salida .= "</tr>";
    $msg = "hola";
    while ($fila = $rs->fetch_assoc()) {
        $salida .= "<tbody>";
        $salida .= "<td>" . $fila['Fecha'] . "</td>";
        $salida .= "<td>" . $fila['Justificada'] . "</td>";
        $salida .= "</tbody>";
    }
    $salida .= "</table>";
    echo $salida;
}else {
    echo "Error en WS";
    exit();
  }
}
function Actualizar_asignatura(){
    if (isset($_REQUEST['Id_asignatura'],$_REQUEST['Id_nivel'],$_REQUEST['Id_profesor'],$_REQUEST['Nombre'])) {
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
    if (isset($_REQUEST['Id_asignatura'],$_REQUEST['Id_nivel'],$_REQUEST['Id_profesor'],$_REQUEST['Nombre'])) {
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
        if (!$link) {
            echo "error al conectar a mysql";
            exit();
        }
        $sql = "INSERT INTO Asignatura VALUES(".$_REQUEST['Id_asignatura'].",".$_REQUEST['Id_nivel'].",".$_REQUEST['Id_profesor'].",'".$_REQUEST['Nombre']."');";
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

?>
