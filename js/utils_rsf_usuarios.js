function Editar_datos_form(Id_usuario, Usuario, Contraseña, Email, Nombre, Apellido1, Apellido2, Telefono, Id_rol, titulo, btn_crear) {
    $("#titulo_accion_usu").text(titulo);
    $("#cedula").val(Id_usuario);
    $("#usu").val(Usuario);
    $("#Email").val(Email);
    $("#nombre").val(Nombre);
    $("#apell1").val(Apellido1);
    $("#apell2").val(Apellido2);
    $("#Telefono").val(Telefono);
    $("#rol").val(Id_rol);
    $("#pass").attr('hidden',true);
    $("#contra_label").attr('hidden',true);
    $("#btn_btn-primary").css("background-color", "#FA4747");
    $("#btn_btn-primary").text(btn_crear);
    $("#btn_cerrar").css("background-color", "#FA4747");
    $("#title-editar_cuenta").text("Editar cuenta de " + Nombre);
    $("#actualizar_usu").css("display", "block");
    $("#crear_usu").css("display", "none");
    $("#cedula").attr("readonly", true);
    $(".password_class").css('display','none');
    }
function modal_crear_usu(){
    $("#titulo_accion_usu").text('Crear Usuario');
    $("#nombre").val('');
    $("#apell1").val('');
    $("#apell2").val('');
    $("#cedula").val('');
    $("#usu").val('');
    $("#pass").val('');
    $("#rol").val(1);
    $("#Email").val('');
    $("#pass").attr('hidden',false);
    $("#contra_label").attr('hidden',false);
    $("#Telefono").val('');
    $("#cedula").attr("readonly", false);
    $("#crear_usu").css("display", "block");
    $("#actualizar_usu").css("display", "none");
}

function fn_actualizar_usuario() {
    var Nombre = document.getElementById("nombre").value;
    var Apell1 = document.getElementById("apell1").value;
    var Apell2 = document.getElementById("apell2").value;
    var Id_usuario = document.getElementById("cedula").value;
    var Usuario = document.getElementById("usu").value;
    var Id_rol = document.getElementById("rol").value;
    var Email = document.getElementById("Email").value;
    var Telefono = document.getElementById("Telefono").value;
    $.ajax({
        type: "POST",

        url:
            urlService+"rsf_Administrador.php?accion=Actualizar_usuario&Id_usuario=" +Id_usuario +
            "&Usuario=" +Usuario +
            "&Email=" +Email +
            "&Nombre=" +Nombre +
            "&Apellido1=" +Apell1 +
            "&Apellido2=" +Apell2 +
            "&Telefono=" +Telefono +
            "&Id_rol=" +Id_rol,
        success: function (data) {
            console.log(URL);
            if (data != "er") {
                $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                $("#exampleModal").modal("hide");
                ajax_metodos('rsf_Administrador.php?accion=listar_usuarios','GET','');
                mostrar_alerta_correcto("Se actualizo el usuario correctamente", 1);
            } else {
                // $("#contenedor").html("");
                ajax_metodos('rsf_Administrador.php?accion=listar_usuarios','GET','');
                mostrar_alerta_incorrecto("No se actualizo el usuario", 1);
            }
        },
        headers: { Authorization: "121323239" },
        error: function (error) {
            $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        },
    });
}

function fn_insertar_usuario() {
    var Nombre = document.getElementById("nombre").value;
    var Apell1 = document.getElementById("apell1").value;
    var Apell2 = document.getElementById("apell2").value;
    var Id_usuario = document.getElementById("cedula").value;
    var Usuario = document.getElementById("usu").value;
    var Contraseña = document.getElementById("pass").value;
    var Id_rol = document.getElementById("rol").value;
    var Email = document.getElementById("Email").value;
    var Telefono = document.getElementById("Telefono").value;
    $.ajax({
        type: "PUT",

        url:
                urlService+"rsf_Administrador.php?accion=Insertar_usuario&Id_usuario=" +Id_usuario +
            "&Usuario=" +Usuario +
            "&Contraseña=" +Contraseña +
            "&Email=" +Email +
            "&Nombre=" +Nombre +
            "&Apellido1=" +Apell1 +
            "&Apellido2=" +Apell2 +
            "&Telefono=" +Telefono +
            "&Id_rol=" +Id_rol,
        success: function (data) {
            console.log(URL);
            if (data == "ok") {
                $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                $("#exampleModal").modal("hide");
                ajax_metodos('rsf_Administrador.php?accion=listar_usuarios','GET','');
                mostrar_alerta_correcto("Se creo el usuario correctamente", 1);
            } else {
                // $("#contenedor").html("");
                ajax_metodos('rsf_Administrador.php?accion=listar_usuarios','GET','');
                mostrar_alerta_incorrecto("No se creo el usuario", 1);
            }
        },
        headers: { Authorization: "121323239" },
        error: function (error) {
            $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        },
    });
}
function GETService_accion_correo(endPoint,accion,variable){
	$.ajax({
		  type: "GET",
		  url: urlService+endPoint+accion+variable,
		  success: function(data) {
			$("#contenedor").html(data);
            ActualizarCorreo();
		}, headers: {"Authorization": '223238679'},
		error: function(error) {
			$("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
			}
		});
  }

  function fn_actualizar_usuario_correo() {
    var Nombre = document.getElementById("Nombre_datos").value;
    var Apell1 = document.getElementById("Apellido1_datos").value;
    var Apell2 = document.getElementById("Apellido2_datos").value;
    var Id_usuario = document.getElementById("Id_usuario_datos").value;
    var Usuario = document.getElementById("Usuario_datos").value;
    var Id_rol = document.getElementById("Id_rol_datos").value;
    var Email = document.getElementById("Email_datos").value;
    var Telefono = document.getElementById("Telefono_datos").value;
    $.ajax({
        type: "POST",

        url:
            urlService+"rsf_usuarios.php?Id_usuario=" +Id_usuario +
            "&Usuario=" +Usuario+
            "&Email=" +Email +
            "&Nombre=" +Nombre +
            "&Apellido1=" +Apell1 +
            "&Apellido2=" +Apell2 +
            "&Telefono=" +Telefono +
            "&Id_rol=" +Id_rol,
        success: function (data) {
            console.log(URL);
            if (data != "er") {
                $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
                $("#exampleModal").modal("hide");
                GETService_accion('rsf_alumno_datos_personales.php','?Id_usuario=',Id_usuario);
                mostrar_alerta_correcto("Se actualizo el usuario correctamente", 1);
            } else {
                // $("#contenedor").html("");
                GETService_accion('rsf_alumno_datos_personales.php','?Id_usuario=',Id_usuario);
                mostrar_alerta_incorrecto("No se actualizo el usuario", 1);
            }
        },
        headers: { Authorization: "121323239" },
        error: function (error) {
            $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
        },
    });
}