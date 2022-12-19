function GuardarId(Id_usuario){
document.getElementById("Id_alumno_matricular").value=Id_usuario;
}
function PUT_Matricular(endPoint){
    var Id_nota = document.getElementById("Id_nota").value;
    var Id_asignatura = document.getElementById("Id_asig").value;
    var Id_alumno=document.getElementById("Id_alumno_matricular").value;
    var _msg="";
    $.ajax({
        type: "PUT",
        url: urlService+endPoint+"&Id_asignatura="+Id_asignatura+
        "&Id_usuario="+Id_alumno+
        "&Id_nota="+Id_nota,
        success: function(data) {
          console.log(data);
            if(data=="ok"){
                // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                _msg=`Se matriculo al alumno correctamente`;
                $("#Matricular_modal").modal("hide");
                
                $(".modal-backdrop.show").css("display","none");
                ajax_metodos('rsf_Administrador.php?accion=ver_lista_matricular','GET','');
                mostrar_alerta_correcto(_msg,1);
            }else{
                ajax_metodos('rsf_Administrador.php?accion=ver_lista_matricular','GET','');
                $("#Matricular_modal").modal("hide");
                $(".modal-backdrop.show").css("display","none");
                _msg=`Error matriculando al alumno`;
                mostrar_alerta_incorrecto(_msg,1);
            }
        }, headers: {"Authorization": '121323239'},
            error: function(error) {
            // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        }
    });
  }