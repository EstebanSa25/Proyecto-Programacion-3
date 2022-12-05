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

function fn_listar_usuarios(){
    if(isset($_REQUEST['Id_usuario'])){
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
      if(!$link){
         echo "error al conectar a mysql";
         exit;
      }
      $sql = "SELECT us.Nombre,us.Id_usuario,asig.Id_asignatura,asig.Nombre,hor.Dia,hor.HoraInicio,hor.HoraFin,niv.Aula from Usuarios us INNER JOIN Asignatura_has_alumno has ON has.Id_alumno=us.Id_usuario
      INNER JOIN Asignatura asig ON asig.Id_asignatura=has.Id_asignatura
      INNER JOIN Nivel niv ON niv.Id_nivel=asig.Id_nivel
      INNER JOIN Horario hor ON hor.Id_asignatura=asig.Id_asignatura where us.Id_usuario=".$_REQUEST['Id_usuario']."  order by case hor.Dia when 'Lunes' then 10 when 'Martes' then 20 when 'Miercoles' then 30 when 'Jueves' then 40 when 'Viernes' then 50 when 'Sabado' then 60 else 100 end;";
     $rs = $link->query($sql);
     $salida="<div class='container'>
     <!-- TIMELINE -->
     
     <div id='2020' class='spacer-toc'><i class='fa fa-calendar'></i></div>
     <h2 class='border-line'>Curso lectivo 2022</h2>";

    while ($fila = $rs->fetch_assoc()) {
      $HoraInicio_12hr=date( "g:i a", strtotime($fila['HoraInicio']) );
      $HoraFin_12hr=date( "g:i a", strtotime($fila['HoraFin']) );

$salida.="
<!-- 2020 -->

<div class='eventWrapper'>
	<div class='event'>
		<div class='event--img'>
		<img src='http://localhost/ProyectoProgramacion3/SVG/logo-color.svg' width='20px'>
		</div>
		<div class='event--date'><span>Aula</span><span>".$fila['Aula']."</span><span>Dia: ".$fila['Dia']."</span></div>
		<div class='event--content'>
			<h2>".$fila['Nombre']."</h2>
			<p class='event--content-hall'>".$HoraInicio_12hr." a ".$HoraFin_12hr."</p>
			<p class='event--content-ensemble'>Curso lectivo 2022</p>
		</div>
	</div>
</div><!-- container -->";

  }
  echo$salida;

    }else {
      echo "Error en WS";
      exit();
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
