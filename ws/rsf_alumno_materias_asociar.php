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
      $sql = "
      SELECT asig.Nombre,asig.Id_asignatura,nota.Id_nota,nota.Nota FROM Usuarios us INNER JOIN Roles rol ON rol.Id_rol=us.Id_rol
      INNER JOIN Asignatura_has_alumno has ON has.Id_alumno=us.Id_usuario INNER JOIN
      Asignatura asig ON asig.Id_asignatura=has.Id_asignatura and asig.Id_asignatura=has.Id_asignatura
      INNER JOIN Nota nota ON nota.Id_nota=has.Id_nota
      where has.Id_alumno IN (".$_REQUEST['Id_usuario'].");";
       $salida="";
     $rs = $link->query($sql);

      while($fila= $rs->fetch_assoc()){
         $sql2=" select us.Nombre as Nombre_Profesor,us.Email,niv.Nivel,niv.Aula,niv.Curso from Usuarios us INNER JOIN Asignatura asig ON asig.Id_profesor=us.Id_usuario INNER JOIN Nivel niv ON niv.Id_nivel=asig.Id_nivel where asig.Id_asignatura=".$fila['Id_asignatura'].";";
         $rs2 = $link->query($sql2);
            while ($fila2=$rs2->fetch_assoc()) {
                $sql3="SELECT us.Nombre,us.Id_usuario,asig.Id_asignatura,asig.Nombre,nota.Trimestre,nota.Id_nota,nota.Nota,hor.Dia,hor.HoraInicio,hor.HoraFin from Usuarios us INNER JOIN Asignatura_has_alumno has ON has.Id_alumno=us.Id_usuario
                INNER JOIN Asignatura asig ON asig.Id_asignatura=has.Id_asignatura INNER JOIN Nota nota ON nota.Id_asignatura=asig.Id_asignatura INNER JOIN Horario hor ON hor.Id_asignatura=asig.Id_asignatura where asig.Id_asignatura=".$fila['Id_asignatura'].";";
                $rs3=$link->query($sql3);
                while ($fila3=$rs3->fetch_assoc()) {
                    $HoraInicio_12hr=date( "g:i a", strtotime($fila3['HoraInicio']) );
                    $HoraFin_12hr=date( "g:i a", strtotime($fila3['HoraFin']) );
        
        $salida="
        <div class='dxtc-content' style='border-color:#bf0000;border-width:1px;border-style:Solid;' id='ctl00_phMainPageContents_cbpCourses_pgctlCourses_CC'>
       <div>
           <div style='height: 2642.72px;'>
               <table style='width:100%;border-collapse:separate;'>
               <tbody>
                   <tr>
                       <td>
                           <table  class='tabla_style' style='width:100%;empty-cells:show;'>
                               <tbody>
                                   <tr  class='tabla_style_tema'>
                                   </tr>
                                   <tr class='tabla_style_tema' >
                                       <td class='dxgv' style='width:0.1%;border-right-width:0px;border-bottom-width:0px;'><img class='dxGridView_gvExpandedButton_Aqua'  style='cursor:pointer;'></td>
                                       <td class='dxgv' colspan='4' style='border-right-width:0px;'>Trimestre:"." </td>
                                   </tr>
                                   <tr  class='tr_row'>
                                       <td class='identacion_tabla dxgv' style='width:30px;border-left-width:0px;border-bottom-width:0px;'><img src='https://www.pngmart.com/files/5/Snow-PNG-Transparent-Image.png' width=30px></td>
                                       <td id='ctl00_phMainPageContents_cbpCourses_pgctlCourses_grdvStudentSchedules_tcrow2' class='dxgvDRTC' colspan='4' style='border-right-width:0px;'>
                                           <div style='padding-top: 5px; padding-left: 5px; padding-right: 5px; padding-bottom: 15px;'>
                                               <table class='global_templateTable' cellpadding='2' cellspacing='1' width='100%'>
                                                   <tbody>
                                                       <tr>
                                                           <td colspan='4'>
                                                               <table class='global_templateTableInside' width='100%' cellpadding='0' cellspacing='0' border='0'>
                                                                   <tbody>
                                                                       <tr>
                                                                           <td class='global_scheduleTitles' align='left' style='padding-left: 5px; padding-top: 5px;
                                                                               padding-bottom: 5px;'>
                                                                              ".$fila['Nombre']."

                                                                           </td>
                                                                           <td>
                                                                               <div style='background-color:White;border-style:None;height:27px;width:96px;background-repeat:no-repeat;vertical-align:Top;'>
                                                                                   <div style='border-style: none; vertical-align: top;' id='ctl00_phMainPageContents_cbpCourses_pgctlCourses_grdvStudentSchedules_row2_btnAttendance_CD'>
                                                                                       <div >
                                                                                           <input  value='Asistencia' type='submit' onclick='GETService_2accion(`rsf_Asistencia.php`,`?Id_usuario=`,".$_REQUEST['Id_usuario'].",`&Id_asignatura=`,".$fila['Id_asignatura'].");'>
                                                                                       </div>
                                                                                   </div>
                                                                               </div>
                                                                           </td>
                                                                       </tr>
                                                                   </tbody>
                                                               </table>
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class='global_templateCaption' style='width: 110px;'>
                                                               Nivel:
                                                           </td>
                                                           <td colspan='5'>
                                                              "."
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class='style1'>
                                                               No. de Aula:
                                                           </td>
                                                           <td class='style2' colspan='3'>
                                                              ".$fila2['Aula']."
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class='global_templateCaption'>
                                                               Horario:
                                                           </td>
                                                           <td colspan='5'>
                                                           
                                                           ".$fila3['Dia'].": ($HoraInicio_12hr a $HoraFin_12hr)[--] </td>
                                                       </tr>
                                                       <tr>
                                                           <td class='global_templateCaption'>
                                                               Profesor:
                                                           </td>
                                                           <td colspan='5'>
                                                             ".$fila2['Nombre_Profesor']."
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td class='global_templateCaption'>Correo institucional:
                                                           </td>
                                                           <td colspan='5'>
                                                           ".$fila2['Email']."
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td >
                                                               Primer Parcial:
                                                           </td>
                                                           <td id='Primer_parcial' class='style4'>
                                                           ".$fila3['Nota']."
                                                           </td>
                                                           <td class='style1'>
                                                           </td>
                                                           <td class='style4'>
                                                           </td>
                                                           <td class='style3'>
                                                               Examen Final:
                                                           </td>
                                                           <td id='Examen_final' class='style4'>
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td>
                                                              Segundo parcial:
                                                           </td>
                                                           <td id='Segundo_parcial' class='style4'>
                                                              "."
                                                           </td>
                                                           <td class='style1'>
                                                               Examen Extraordinario:
                                                           </td>
                                                           <td class='style5' colspan='3'>
                                                           </td>
                                                       </tr>
                                                       <tr>
                                                           <td colspan='3' class='global_templateCaption g2c_Students_Courses_FinalGrade_Caption'>
                                                               Nota Final:
                                                           </td>
                                                           <td class='style5' colspan='3'>
                                                               MAT
                                                           </td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                           </div>
                                       </td>
                                   </tr>
                                   <tr class='tr_row'>
           </div>
           </td></tr></tbody></table>
       </div>
   </div>";

}
echo$salida;
}

}

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
