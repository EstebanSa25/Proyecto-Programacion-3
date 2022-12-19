
function fn_registrar_nuevo_usuario_pendiente(Id_usuario, Usuario, Contraseña, Email, Nombre, Apellido1, Apellido2, Telefono, Id_rol) {
    // alert('http://localhost/ProyectoProgramacion3/ws/rsf_aprobar_cuenta.php?Id_usuario='+Id_usuario+'&Usuario='+Usuario+'&Contraseña='+Contraseña+'&Email='+Email+'&Nombre='+Nombre+'&Apellido1='+Apellido1+'&Apellido2='+Apellido2+'&Telefono='+Telefono+'&Id_rol='+Id_rol);

    $.ajax({
        type: "PUT",
        url:
            urlService+"rsf_Administrador.php?accion=aprobar_registro_cuenta&Id_usuario=" +Id_usuario +
            "&Usuario=" +Usuario +
            "&Contraseña=" +Contraseña +
            "&Email=" +Email +
            "&Nombre=" +Nombre +
            "&Apellido1=" +Apellido1 +
            "&Apellido2=" + Apellido2 +
            "&Telefono=" +Telefono +
            "&Id_rol=" +Id_rol,
        success: function (data) {
            if (data == "ok") {
                var _msg = "Se aprobo el usuario correctamente";
                mostrar_alerta_correcto(_msg,1);
                DELETEService(`rsf_Administrador.php?accion=Rechazar_aprobacion_cuenta`,'&Id_usuario=',Id_usuario,'usuario',10,`ver_lista_usuario_pendiente`);
            } else {
                var _msg = "Este usuario ya se encuentra registrado";
                mostrar_alerta_incorrecto(_msg,1);
                ajax_metodos('rsf_Administrador.php?accion=ver_lista_usuario_pendiente','GET','');
            }
        },
        headers: { Authorization: "1253" },
        error: function (error) {
            GETService('rsf_aprobar_cuenta.php');
            var _msg = "No se pudo registrar el usuario";
            mostrar_alerta_incorrecto(_msg,1);
        },
    });
}

