function GETService_accion(endPoint,accion,variable){
	$.ajax({
		  type: "GET",
		  url: urlService+endPoint+accion+variable,
		  success: function(data) {
			$("#contenedor").html(data);
		}, headers: {"Authorization": '223238679'},
		error: function(error) {
			$("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
			}
		});
  }
  function GETService_2accion(endPoint,accion,variable,accion2,variable2){
	$.ajax({
		  type: "GET",
		  url: urlService+endPoint+accion+variable+accion2+variable2,
		  success: function(data) {
			$("#contenedor").html(data);
		}, headers: {"Authorization": '223238679'},
		error: function(error) {
			$("#contenedor").html('<div class="alert alert-warning" role="alert">Error Recuperando Datos</div>');
			}
		});
  }
  