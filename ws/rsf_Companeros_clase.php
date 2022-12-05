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
    if(isset($_REQUEST['Id_usuario'],$_REQUEST['Id_asignatura'],$_REQUEST['Dia'],$_REQUEST['Id_nivel'],$_REQUEST['Aula'])){
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }

    $sql = "SELECT tabla1.*
    FROM
    (
        SELECT usr.*,
        (SELECT Id_alumno FROM Asignatura_has_alumno WHERE Id_alumno=".$_REQUEST['Id_usuario']." AND Id_Asignatura=has.Id_Asignatura  ) as Alumno
        from Asignatura_has_alumno has
        INNER JOIN Usuarios  usr ON
        has.Id_alumno =  usr.Id_usuario
        INNER JOIN Horario hor ON
        hor.Id_asignatura = has.Id_asignatura
        INNER JOIN Asignatura asi  ON
        asi.Id_Asignatura= has.Id_asignatura
        INNER JOIN Nivel nvl ON
        nvl.Id_nivel = asi.Id_nivel
        WHERE has.Id_asignatura= ".$_REQUEST['Id_asignatura']." AND
        Dia='".$_REQUEST['Dia']."' AND
        nvl.Id_Nivel= ".$_REQUEST['Id_nivel']." AND
        Aula='".$_REQUEST['Aula']."'
    ) tabla1
WHERE tabla1.Id_usuario != 123245  AND Alumno IS NOT NULL;";
$sql2 = "Select Nombre as Nombre_materia from Asignatura where Id_asignatura=".$_REQUEST['Id_asignatura'].";";
// echo$sql;
    $rs = $link->query($sql);
    $rs2 = $link->query($sql2);
    $title= $rs2->fetch_assoc();

        $salida = "<section class='Container-lista_compañeros'>
        <div class='container'>";
        $salida="<h3 class='Tittle_section'>Mis compañeros de clase de: ".$title['Nombre_materia']."</h3>";
           $salida.=" <div class='row justify-content-center'>
                <div class='col-12 col-lg-8'>
                    <div class='lista'>
                    <ol>";
    $msg = "hola";
    while ($fila = $rs->fetch_assoc()) {
            $salida .= " <li>
            <div class='card card-css'>
                <div class='card-header'>
                   ".$fila['Nombre']."   ".$fila['Apellido1']."
                </div>
            </div>
        </li>";
    }
    $salida .= "</ol>
    </div>
</div>
</div>
</div>
</section>";
    echo$salida;
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
