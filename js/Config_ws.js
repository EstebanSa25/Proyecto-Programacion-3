//URL SERVICIO
const urlService ='http://localhost/ProyectoProgramacion3/ws/';

function GETService(endPoint){
  $.ajax({
        type: "GET",
        url: urlService+endPoint,
        success: function(data) {
          $("#contenedor").html(data);
      }, headers: {"Authorization": '223238679'},
      error: function(error) {
          $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
          }
      });
}

function DELETEService(endPoint,accion,variable,msg,show){
  var _msg="";
  $.ajax({
      type: "DELETE",
      url: urlService+endPoint+accion+variable,
      success: function(data) {
        console.log(data);
          if(data=="ok"){
              // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Borrando registro</div>');
              _msg=`Se borro ${msg} correctamente`;
              GETService(endPoint);
              mostrar_alerta_correcto(_msg,show);
          }else{
              $("#contenedor").html("");
              GETService(endPoint);
              _msg=`Error Borrando ${msg}`;
          }
      }, headers: {"Authorization": '121323239'},
          error: function(error) {
          // $("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
      }
  });
}