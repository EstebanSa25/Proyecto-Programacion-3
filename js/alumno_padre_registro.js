function mostrarContrasena(){
    var tipo = document.getElementById("password","password_confirmar");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
        }
}
function mostrarContrasena_confirm(){
    var tipo = document.getElementById("password_confirmar");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
        }
}
