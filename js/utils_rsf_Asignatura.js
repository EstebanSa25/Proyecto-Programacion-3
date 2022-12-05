function Editar_datos_asig(Id_asignatura,Id_nivel,Id_profesor,Materia,HoraInicio,HoraFin,Dia,Id_horario) {
    $("#titulo_accion").text('Editar asignatura');
    $("#Id_asignatura").val(Id_asignatura);
    $("#Id_nivel").val(Id_nivel);
    $("#Id_profesor").val(Id_profesor);
    $("#Nombre_materia").val(Materia);
    $("#HoraInicio").val(HoraInicio);
    $("#HoraFin").val(HoraFin);
    $("#Dia").val(Dia);
    $("#Id_horario").val(Id_horario);
    $("#crear_asignatura").css("display", "none");
    $("#edit_asignatura").css("display", "block");
    $("#Id_asignatura").attr("readonly", true);
    $("#crear_asig").attr("hidden", true);
}
function modal_crear_asig(){
    $("#titulo_accion").text('Crear asignatura');
    $("#Id_asignatura").val('');
    $("#Id_nivel").val('');
    $("#Id_profesor").val('');
    $("#Nombre_materia").val('');
    $("#HoraInicio").val('');
    $("#HoraFin").val('');
    $("#Dia").val('');
    $("#Id_horario").val('');
    $("#Id_asignatura").attr("readonly", false);
    $("#crear_asignatura").css("display", "block");
    $("#edit_asignatura").css("display", "none");
}
function fn_actualizar_asignatura() {
    var Id_asignatura = document.getElementById("Id_asignatura").value;
    var Id_nivel = document.getElementById("Id_nivel").value;
    var Id_profesor = document.getElementById("Id_profesor").value;
    var Nombre_materia = document.getElementById("Nombre_materia").value;
    var HoraInicio= document.getElementById("HoraInicio").value;
    var HoraFin=document.getElementById("HoraFin").value;
    var Dia=document.getElementById("Dia").value;
    var Id_horario=document.getElementById("Id_horario").value;
    $.ajax({
        type: "POST",
        url:
            urlService+"rsf_Asignatura.php?Id_asignatura=" +Id_asignatura +
            "&Id_nivel=" +Id_nivel +
            "&Id_profesor=" +Id_profesor +
            "&Nombre=" +Nombre_materia+
            "&HoraInicio="+HoraInicio+
            "&HoraFin"+HoraFin+
            "&Dia"+Dia+
            "&Id_horario="+Id_horario,
        success: function (data) {
            alert(data);
            console.log(URL);
            if (data == "ok") {
                $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                $("#edit_asig").modal("hide");
                GETService("rsf_Asignatura.php");
                mostrar_alerta_correcto("Se actualizo la asignatura correctamente", 1);

            } else {
                // $("#contenedor").html("");
                GETService("rsf_Asignatura.php");
                mostrar_alerta_incorrecto("No se actualizo el la asignatura", 1);
            }
        },
        headers: { Authorization: "121323239" },
        error: function (error) {
            $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        },
    });
}

function fn_insertar_asignatura(){
    var Id_asignatura = document.getElementById("Id_asignatura").value;
    var Id_nivel = document.getElementById("Id_nivel").value;
    var Id_profesor = document.getElementById("Id_profesor").value;
    var Nombre_materia = document.getElementById("Nombre_materia").value;
    var HoraInicio= document.getElementById("HoraInicio").value;
    var HoraFin=document.getElementById("HoraFin").value;
    var Dia=document.getElementById("Dia").value;
    var Id_horario=document.getElementById("Id_horario").value;
    console.log(urlService+"rsf_Asignatura.php?Id_asignatura=" +Id_asignatura +
    "&Id_nivel=" +Id_nivel +
    "&Id_profesor=" +Id_profesor +
    "&Nombre=" +Nombre_materia+
    "&HoraInicio="+HoraInicio+
    "&HoraFin="+HoraFin+
    "&Dia="+Dia+
    "&Id_horario="+Id_horario);
    $.ajax({
        type: "PUT",
        url:
        urlService+"rsf_Asignatura.php?Id_asignatura=" +Id_asignatura +
        "&Id_nivel=" +Id_nivel +
        "&Id_profesor=" +Id_profesor +
        "&Nombre=" +Nombre_materia+
        "&HoraInicio="+HoraInicio+
        "&HoraFin="+HoraFin+
        "&Dia="+Dia+
        "&Id_horario="+Id_horario,
        success: function (data) {
            if (data == "ok") {
                $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                $("#Modal_crear_usu").modal("hide");
                mostrar_alerta_correcto('Se creo la asignatura correctamente',1);
                GETService("rsf_Asignatura.php");
            } else {
                // $("#contenedor").html("");
                mostrar_alerta_incorrecto("No se creo la asignatura", 1);
                GETService("rsf_Asignatura.php");
            }
        },
        headers: { Authorization: "121323239" },
        error: function (error) {
            $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        },
    });
}
