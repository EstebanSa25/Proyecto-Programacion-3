<?php
if (isset($_REQUEST["accion"])) {
    $accion = $_REQUEST["accion"];

$metodo = $_SERVER['REQUEST_METHOD'];
switch ($metodo) {
    case 'GET':
        header("HTTP/1.1 200 successful");
        switch($accion){
            case"listar_materias_asociar";
            fn_listar_materias_asociar();
            break;
            case"Ver_notas_alumnos";
            fn_mostrar_notas_alumno();
            break;
                case "Ver_asistencia_alumnos":
                    fn_listar_asistencia();
                    break;
                case "Ver_horario_alumnos":
                    fn_listar_horario_alumno();
                    break;
                case "Ver_companeros_alumnos":
                    fn_listar_materias_alumno_companeros();
                    break;
                case "Ver_lista_companeros":
                    fn_listar_companeros_de_alumno();
                    break;
                case "Ver_lista_profesores":
                    fn_listar_profesores_de_alumno();
                        break;
                case "Ver_timeline":
                    fn_mostrar_timeLine();
                    break;
                case "Pagar_matricula":
                    fn_listar_panel_Pago();
                    break;
        }
        // Mostrar_Compañeros();
        break;
    case 'DELETE':
        header("HTTP/1.1 200 successful");
        fn_borrar_usuario();
        break;
        case 'POST':
            switch ($accion) {
                case "Editar_asistencia_alumno":
                    fn_actualizar_asistencia();
                    break;
            }
        break;
        case 'PUT':
            switch ($accion){
                case "insertar_asistencia_de_alumno":
                    fn_insertar_asistencia();
                    break;
                case "Insertar_nota":
                    fn_insertar_promedio();
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
//----------Listar todas las materias y los btn de asistencia y nota-----------Listar todas las materias y los btn de asistencia y nota----------//
function fn_listar_materias_asociar()
{

    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }

    $sql = "SELECT asig.Nombre,asig.Id_asignatura FROM Usuarios us
  INNER JOIN Asignatura_has_alumno has ON has.Id_alumno=us.Id_usuario INNER JOIN
  Asignatura asig ON asig.Id_asignatura=has.Id_asignatura where us.Id_usuario = " . $_REQUEST["Id_usuario"];

    $rs = $link->query($sql);
    $salida = "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>Curso</th>";
    $salida .= "<th></th>";
    $salida .= "<th></th>";
    $salida .= "</tr>";
    $msg = "hola";
    $salida .= "<tbody>";
    while ($fila = $rs->fetch_assoc()) {
        $salida .= "<tr>";
        $salida .= "<td>" . $fila['Nombre'] . "</td>";
        $salida .= "<td>" . "<button type='button' class='btn btn-primary btn-sm'
          onclick=GETService_accion('rsf_Alumno.php?accion=Ver_notas_alumnos','&Id_usuario=',`{$_REQUEST["Id_usuario"]}&Id_asignatura=" . $fila['Id_asignatura'] . "`);>Nota</button>" . "</td>";
        $salida .= "<td>" . "<button type='button' class='btn btn-primary btn-sm'
          onclick=GETService_accion('rsf_Alumno.php?accion=Ver_asistencia_alumnos','&Id_usuario=',`{$_REQUEST["Id_usuario"]}&Id_asignatura=" . $fila['Id_asignatura'] . "`);>Asistencia</button>" . "</td>";
        $salida .= "</tr>";

    }
    $salida .= "</tbody>";
    $salida .= "</table>";
    echo $salida;
}

//----------Pago de matricula-----------Pago de matricula----------------Pago de matricula-----------------------//
function fn_listar_panel_Pago()
{
  if (isset($_REQUEST['Id_usuario'])) {
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
    if (!$link) {
      echo "error al conectar a mysql";
      exit();
    }
    $sql = "SELECT Email,Nombre,Apellido1,Apellido2 from Usuarios where Id_usuario=" . $_REQUEST['Id_usuario'] . "";
    $rs = $link->query($sql);
    $fila = $rs->fetch_assoc();
    $Num_aleatorio= rand(5, 300);
    $salida = " <section class='payment-form dark'>
    <div class='container'>
      <div class='block-heading'>
        <h2>Matricula 2023</h2>
        <p>Aqui es donde se podra hacer el pago de la matricula del curso 2023 de manera totalmente online por este metodo.</p>
      </div>
      <form>
        <div class='products'>
          <h3 class='title'>Articulos</h3>
          <div class='item'>
            <span class='price'>₡25000</span>
            <p class='item-name'>Matricula curso 2023</p>
            <p class='item-description'>Matricula 2023</p>
          </div>
          <div class='item'>
            <span class='price'>₡3250</span>
            <p class='item-name'>IVA 13%</p>
            <p class='item-description'>Comision IVA</p>
          </div>
          <div class='total'>Total<span class='price'>₡28250</span></div>
        </div>
        <div class='card-details'>
          <h3 class='title'>Datos de la tarjeta</h3>
          <div class='row'>
            <div class='form-group col-sm-7'>
              <label for='card-holder'>A nombre de</label>
              <input id='card-holder' type='text' class='form-control' placeholder='Nombre completo' aria-label='Card Holder' aria-describedby='basic-addon1' required>
            </div>
            <div class='form-group col-sm-5'>
              <label for=''>Fecha de caducidad</label>
              <div class='input-group expiration-date'>
                <input type='year' class='form-control' placeholder='MM' aria-label='MM' aria-describedby='basic-addon1' required>
                <span class='date-separator'>/</span>
                <input type='month' class='form-control' placeholder='YY' aria-label='YY' aria-describedby='basic-addon1' required>
              </div>
            </div>
            <div class='form-group col-sm-8'>
              <label for='card-number'>Numero de la tarjeta</label>
              <input id='card-number' type='text' class='form-control' placeholder='0000-0000-0000-0000' aria-label='Card Holder' aria-describedby='basic-addon1' required>
            </div>
            <div class='form-group col-sm-4'>
              <label for='cvc'>CVC</label>
              <input id='cvc' type='text' class='form-control' placeholder='CVC' aria-label='Card Holder' aria-describedby='basic-addon1' required>
            </div>
            <div class='form-group col-sm-12'>
              <button type='btn' onclick='Enviar_correo(`".$fila['Email']."`,`$Num_aleatorio`,`".$fila['Nombre']." " .$fila['Apellido1']." " .$fila['Apellido2']."`);' class='btn btn-primary btn-block'>PAGAR</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>";
     
  
  echo $salida;
  }
    
}
function fn_mostrar_notas_alumno(){

    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
  
    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }
    $sql = "select nota.Nota,nota.Trimestre,asig.Nombre from Nota nota INNER JOIN Usuarios us ON us.Id_usuario=nota.Id_alumno INNER JOIN Asignatura asig ON asig.Id_asignatura=nota.Id_asignatura where asig.Id_asignatura=".
    $_REQUEST["Id_asignatura"]." and nota.Id_alumno=".$_REQUEST['Id_usuario'].";";
      echo"<script>Console.log(`$sql`)</script>";
  
    $rs = $link->query($sql);
    $salida = "<div class='d-grid gap-2'><button class='bg-dark btn btn-primary btn-lg btn-block '  type='button'
    onclick=GETService_accion('rsf_Alumno.php?accion=listar_materias_asociar','&Id_usuario=',{$_REQUEST["Id_usuario"]})>Volver</button></div>";
    $salida .= "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>Materia</th>";
    $salida .= "<th>Trimestre</th>";
    $salida .= "<th>Nota</th>";
    $salida .= "</tr>";
    $msg = "hola";
    $salida .= "<tbody>";
    while ($fila = $rs->fetch_assoc()) {
  
        $salida .= "<tr>";
            $salida .= "<td>" . $fila['Nombre'] . "</td>";
            $salida .= "<td>" . $fila['Trimestre'] . "</td>";
            $salida .= "<td>" . $fila['Nota'] . "</td>";
        $salida .= "</tr>";
  
    }
    $salida .= "</tbody>";
    $salida .= "</table>";
    echo $salida;
  
  }
  function fn_listar_asistencia()
{
    if(isset($_REQUEST['Id_usuario'],$_REQUEST['Id_asignatura'])){
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }

    $sql = "Select asig.Nombre,falta.Fecha,falta.Justificada from Usuarios us INNER JOIN Asignatura_has_alumno has ON has.Id_alumno=us.Id_usuario
    LEFT JOIN Asignatura asig ON asig.Id_asignatura=has.Id_asignatura
    LEFT JOIN Falta_Asistencia falta ON falta.Id_alumno=us.Id_usuario and falta.Id_asignatura=asig.Id_asignatura where asig.Id_asignatura=".$_REQUEST['Id_asignatura']." and us.Id_usuario=".$_REQUEST['Id_usuario'].";";
    $rs = $link->query($sql);
    $salida = "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>Dia</th>";
    $salida .= "<th>Estado</th>";
    $salida .= "</tr>";
    while ($fila = $rs->fetch_assoc()) {
        $salida .= "<tbody>";
        $salida .= "<td>" . $fila['Fecha'] . "</td>";
        $salida .= "<td>" . $fila['Justificada'] . "</td>";
        $salida .= "</tbody>";
    }
    $salida .= "</table>";
    echo$salida;
}else {
    echo "Error en WS";
    exit();
    }
}

function fn_listar_horario_alumno(){
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
    function fn_listar_materias_alumno_companeros(){
        if(isset($_REQUEST['Id_usuario'])){
        $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');
          if(!$link){
             echo "error al conectar a mysql";
             exit;
          }
          $sql = "SELECT us.Nombre,us.Id_usuario,asig.Id_asignatura,asig.Nombre,hor.Dia,hor.HoraInicio,hor.HoraFin,niv.Aula,niv.Id_nivel from Usuarios us INNER JOIN Asignatura_has_alumno has ON has.Id_alumno=us.Id_usuario
          INNER JOIN Asignatura asig ON asig.Id_asignatura=has.Id_asignatura
          INNER JOIN Nivel niv ON niv.Id_nivel=asig.Id_nivel
          INNER JOIN Horario hor ON hor.Id_asignatura=asig.Id_asignatura where us.Id_usuario=".$_REQUEST['Id_usuario']."  order by case hor.Dia when 'Lunes' then 10 when 'Martes' then 20 when 'Miercoles' then 30 when 'Jueves' then 40 when 'Viernes' then 50 when 'Sabado' then 60 else 100 end;";
         $rs = $link->query($sql);
         $salida="<div class='container'>
         <!-- TIMELINE -->
         
         <div id='2020' class='spacer-toc'><i class='fa fa-users'></i></div>
         <h2 class='border-line'>Mis compañeros de clase</h2>";
         while ($fila = $rs->fetch_assoc()) {
    
          $HoraInicio_12hr=date( "g:i a", strtotime($fila['HoraInicio']) );
          $HoraFin_12hr=date( "g:i a", strtotime($fila['HoraFin']) );
    
    $salida.="
    
    <div onclick='Mostrar_compañeros(`rsf_Alumno.php?accion=Ver_lista_companeros`,".$fila['Id_usuario'].",".$fila['Id_asignatura'].",`".$fila['Dia']."`,".$fila['Id_nivel'].",`".$fila['Aula']."`);' class='eventWrapper'>
        <div class='event'>
            <div class='event--img'>
                <a href='#' onclick='Mostrar_compañeros(`rsf_Alumno.php?accion=Ver_lista_companeros`,".$fila['Id_usuario'].",".$fila['Id_asignatura'].",`".$fila['Dia']."`,".$fila['Id_nivel'].",`".$fila['Aula']."`);' class='w-fancybox'>
                </a>
                <img src='http://localhost/ProyectoProgramacion3/SVG/logo-color.svg' title='Ver mis compañeros de ".$fila['Nombre']."' onclick='Mostrar_compañeros(`rsf_Alumno.php?accion=Ver_lista_companeros`,".$fila['Id_usuario'].",".$fila['Id_asignatura'].",`".$fila['Dia']."`,".$fila['Id_nivel'].",`".$fila['Aula']."`);'>
            </div>
            <div class='event--date'><span>Aula</span><span>".$fila['Aula']."</span><span>".$fila['Dia']."</span><span>".$HoraInicio_12hr." a ".$HoraFin_12hr."</span></div>
            <div class='event--content'>
                <h2><a href='#' onclick='Mostrar_compañeros(`rsf_Alumno.php?accion=Ver_lista_companeros`,".$fila['Id_usuario'].",".$fila['Id_asignatura'].",`".$fila['Dia']."`,".$fila['Id_nivel'].",`".$fila['Aula']."`);'  title='Ver mis compañeros de ".$fila['Nombre']."'>".$fila['Nombre']."</a></h2>
                <p class='event--content-hall'>Lista de alumnos que comparte esta clase contigo</p>
                <p class='event--content-ensemble'></p>
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
        function fn_listar_companeros_de_alumno()
{
    if(isset($_REQUEST['Id_usuario'],$_REQUEST['Id_asignatura'],$_REQUEST['Dia'],$_REQUEST['Id_nivel'],$_REQUEST['Aula'])){
    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }

    $sql = "SELECT DISTINCT tabla1.*
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
WHERE tabla1.Id_usuario != ".$_REQUEST['Id_usuario']."  AND Alumno IS NOT NULL;";
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
function fn_listar_profesores_de_alumno()
{
    if (isset($_REQUEST['Id_usuario'])){

    $link = mysqli_connect('a2nlmysql19plsk.secureserver.net', 'US', 'US123', 'UH');

    if (!$link) {
        echo "error al conectar a mysql";
        exit();
    }
    $sql = "select us.Nombre,asig.Nombre,asig.Id_asignatura from Usuarios us INNER JOIN Asignatura_has_alumno has ON has.Id_alumno=us.Id_usuario
    INNER JOIN Asignatura asig ON asig.Id_asignatura=has.Id_asignatura where us.Id_usuario=".$_REQUEST['Id_usuario'].";";
    $rs = $link->query($sql);
    $salida="<span class='txt-aprobar_usu'>Mis <span class='txt-rojo'>Profesores</span></span></h1>";
    $salida.= "<table class='table table-striped'>";
    $salida .= "<tr>";
    $salida .= "<th>Materia</th>";
    $salida .= "<th>Nombre</th>";
    $salida .= "<th>Apellido1</th>";
    $salida .= "<th>Apellido2</th>";
    $salida .= "<th>Email</th>";
    $salida .= "</tr>";
    $msg = "hola";
    while ($fila = $rs->fetch_assoc()) {
        $sql2 = "select us.Nombre as Nombre_persona,asig.Nombre,us.Apellido1,us.Apellido2,us.Email from Usuarios us INNER JOIN Asignatura asig ON asig.Id_profesor=us.Id_usuario where asig.Id_asignatura=".$fila['Id_asignatura'].";";
        $rs2 = $link->query($sql2);
            while ($fila2 = $rs2->fetch_assoc()) {
                $salida .= "<td>" . $fila2['Nombre'] . "</td> ";
                $salida .= "<td>" . $fila2['Nombre_persona'] . "</td>";
                $salida .= "<td>" . $fila2['Apellido1'] . "</td>";
                $salida .= "<td>" . $fila2['Apellido2'] . "</td>";
                $salida .= "<td>" . $fila2['Email'] . "</td>";
                $salida .= "</tr>";
            }
    }
    $salida .= "</table>";
    echo $salida;
}
}
function fn_mostrar_timeLine(){

    $salida = "<div class='container'>
    <div class='row'>
      <div class='col'>
        <div class='main-timeline'>
          <div class='timeline'>
            <a href='#' class='timeline-content'>
              <span class='timeline-year'>25/01</span>
              <div class='timeline-icon'>
                <i class='fa fa-address-card-o' aria-hidden='true'></i>
              </div>
              <div class='content'>
                <h3 class='title'>Entrega de Documentos</h3>
                <p class='description'>
                  La persona postulante en último año de Educación Diversificada, el M.E.P. suministrará la nota de la Educación Diversificada en el mes de Enero 2022.
                </p>
              </div>
            </a>
          </div>
          <div class='timeline'>
            <a href='#' class='timeline-content'>
              <span class='timeline-year'>30/02</span>
              <div class='timeline-icon'>
                <i class='fa fa-credit-card' aria-hidden='true'></i>
              </div>
              <div class='content'>
                <h3 class='title'>Pago admision</h3>
                <p class='description'>
                  Se debera pagar el examen de admision en la universidad o por la pagina en el apartado Financiero
                </p>
              </div>
            </a>
          </div>
          <div class='timeline'>
            <a href='#' class='timeline-content'>
              <span class='timeline-year'>15/05</span>
              <div class='timeline-icon'>
                <i class='fa fa-pencil-square' aria-hidden='true'></i>
              </div>
              <div class='content'>
                <h3 class='title'>Prueba de Aptitud Académica (Examen de Admisión)</h3>
                <p class='description'>
                   La cita de examen ordinaria o en día diferente a sábado por motivos religioso, serán publicadas en la página Departamento de Registro así como el folleto informativo. 
                </p>
              </div>
            </a>
          </div>
          <div class='timeline'>
            <a href='#' class='timeline-content'>
              <span class='timeline-year'>30/06</span>
              <div class='timeline-icon'>
                <i class='fa fa-heart' aria-hidden='true'></i>
              </div>
              <div class='content'>
                <h3 class='title'>Entrega de resultados de admision</h3>
                <p class='description'>
                  Se entregara los resultados de admision 2022
                </p>
              </div>
            </a>
          </div>
          <div class='timeline'>
            <a href='#' class='timeline-content'>
              <span class='timeline-year'>03/08  </span>
              <div class='timeline-icon'>
                <i class='fa fa-globe' aria-hidden='true'></i>
              </div>
              <div class='content'>
                <h3 class='title'>Pago matricula</h3>
                <p class='description'>
                  Pago de Matricula para el curso lectivo 2023 con un costo de ₡28250 con iva inconcluida tienen una plazo del 2 meses para entregar el comprobante de pago
                </p>
              </div>
            </a>
          </div>
          <div class='timeline'>
            <a href='#' class='timeline-content'>
              <span class='timeline-year'>17/09</span>
              <div class='timeline-icon'>
                <i class='fa fa-address-book' aria-hidden='true'></i>
              </div>
              <div class='content'>
                <h3 class='title'>Documentos</h3>
                <p class='description'>
                  Entrega de documentos y matricula de materias para el curso 2023 
                </p>
              </div>
            </a>
          </div>
   
        </div>
      </div>
    </div>
  </div>";
  echo $salida;

}
?>
