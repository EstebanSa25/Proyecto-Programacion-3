function Mostrar_compañeros(endPoint,Id_usuario,Id_asignatura,Dia,Id_nivel,Aula ){
    console.log(urlService+endPoint+"?Id_usuario="+Id_usuario+
    "&Id_asignatura="+Id_asignatura+
    "&Dia="+Dia+
    "&Id_nivel="+Id_nivel+
    "&Aula="+Aula);
    $.ajax({
        type: "GET",
        url: urlService+endPoint+"?Id_usuario="+Id_usuario+
        "&Id_asignatura="+Id_asignatura+
        "&Dia="+Dia+
        "&Id_nivel="+Id_nivel+
        "&Aula="+Aula,
        success: function(data) {
          $("#contenedor").html(data);
      }, headers: {"Authorization": '223238679'},
      error: function(error) {
          $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
          }
      });
    
}