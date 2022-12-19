function editar_asistencia_datos(fecha,asistencia){
    var Fecha=$("#Fecha_asistencia").val(fecha);
    var Justificada=$("#Tipo_Asistencia").val(asistencia);

}
function recuperar_cedula(cedula){
    $("#cedula_alumno").val(cedula);
}
function fn_insertar_asistencia(){
    var cedula=$("#cedula_alumno").val();
    var Id_asignatura=$("#Id_asignatura_asistencia").val();
    var Fecha=$("#Fecha_asistencia").val();
    var Justificada=$("#Tipo_Asistencia").val();
    var _msg="";
    $.ajax({
        type: "PUT",
        url: urlService+"rsf_Profesor.php?accion=insertar_asistencia_de_alumno"+"&Id_usuario="+cedula+
        "&Id_asignatura="+Id_asignatura+
        "&Fecha="+Fecha+
        "&Justificada="+Justificada,
        success: function(data) {
          console.log(data);
            if(data=="ok"){
                // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                _msg=`Se inserto la asistencia correctamente`;
                $("#asistencia").modal("hide");
                $(".modal-backdrop.show").css("display","none");

                mostrar_alerta_correcto(_msg,1);
            }else{
                $("#asistencia").modal("hide");
                $(".modal-backdrop.show").css("display","none");
                _msg=`Error poniendo asistencia al alumno`;
                mostrar_alerta_incorrecto(_msg,1);
            }
        }, headers: {"Authorization": '121323239'},
            error: function(error) {
            // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        }
    });
  }

  function fn_insertar_promedio(){
    var cedula=$("#cedula_alumno").val();
    var Id_asignatura=$("#Id_asignatura_asistencia").val();
    var Id_nota=$("#Id_nota_promedio").val();
    var Nota=$("#Nota_promedio").val();
    var Trimestre=$("#Trimestre_promedio").val();
    // var Justificada=$("#Tipo_Asistencia").val();
    var _msg="";
    $.ajax({
        type: "PUT",
        url: urlService+"rsf_Profesor.php?accion=Insertar_nota"+"&Id_nota="+Id_nota+
        "&Id_usuario="+cedula+
        "&Id_asignatura="+Id_asignatura+
        "&Trimestre="+Trimestre+
        "&Nota="+Nota,
        success: function(data) {
          console.log(data);
            if(data=="ok"){
             
                // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                _msg=`Se inserto la Nota correctamente`;
                $("#promedio").modal("hide");
                $(".modal-backdrop.show").css("display","none");

                mostrar_alerta_correcto(_msg,1);
            }else{
                
                $("#promedio").modal("hide");
                $(".modal-backdrop.show").css("display","none");
                _msg=`Error poniendo Nota al alumno`;
                mostrar_alerta_incorrecto(_msg,1);
            }
        }, headers: {"Authorization": '121323239'},
            error: function(error) {
            // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        }
    });
  }
  function fn_actualizar_asistencia(num,_Id_alumno,_Id_asignatura,_Fecha){
    var cedula=_Id_alumno;
    var Id_asignatura=_Id_asignatura;
    var Fecha=_Fecha;
    var Justificada=$("#Tipo_Asistencia_editar"+num).val();
    var _msg="";
    $.ajax({
        type: "POST",
        url: urlService+"rsf_Profesor.php?accion=Editar_asistencia_alumno"+"&Id_usuario="+cedula+
        "&Id_asignatura="+Id_asignatura+
        "&Fecha="+Fecha+
        "&Justificada="+Justificada,
        success: function(data) {
          console.log(data);
            if(data=="ok"){
                // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                _msg=`Se actualizo la asistencia correctamente`;
                $(".modal-backdrop.show").css("display","none");
                GETService_accion(`rsf_Profesor.php?accion=mostrar_alumnos_asistencia`,`&Id_asignatura=`,Id_asignatura);
                mostrar_alerta_correcto(_msg,1);
            }else{
                GETService_accion(`rsf_Profesor.php?accion=mostrar_alumnos_asistencia`,`&Id_asignatura=`,Id_asignatura);
                $("#asistencia").modal("hide");
                $(".modal-backdrop.show").css("display","none");
                _msg=`Error actualizando asistencia al alumno`;
                mostrar_alerta_incorrecto(_msg,1);
            }
        }, headers: {"Authorization": '121323239'},
            error: function(error) {
            // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        }
    });
  }