
function mostrar_alerta_correcto(_msg,show){
  if (show==1) {
    var parrafo = $("#icon-alert");
  parrafo.removeClass('fas fa-exclamation-circle fas fa-times-circle');
  parrafo.addClass('fas fa-check-circle');
  $('.fa-exclamation-circle,.alert .fa-check-circle,.alert .fa-times-circle').css('color','green');
  $('.msg') .text (_msg);
  $('.alert').css('background-color', '#8fce00');
  $('.fa-times-circle').css('color','#ffffff');
  $('.alert .msg').css('color', '#ffffff');
  $('.alert .close-btn .fas').css('color', '#587f00');
  $('.alert .close-btn').css('background-color', '#d6ff78');
  $('.alert').css('border-left', '8px solid #587f00');

    $('.alert').addClass("show");
    $('.alert').removeClass("hide");
    $('.alert').addClass("showAlert");
    setTimeout(function(){
      $('.alert').removeClass("show");
      $('.alert').addClass("hide");
    },5000);
  $('.close-btn').click(function(){
    $('.alert').removeClass("show");
    $('.alert').addClass("hide");
  });
  }else{
console.log('no voy a mostar alerta');
  }
}

function mostrar_alerta_incorrecto(_msg,show){
  if (show==1) {
  var parrafo = $("#icon-alert");
  parrafo.removeClass('fas fa-exclamation-circle fa-check-circle');
  parrafo.addClass('fas fa-times-circle');
  $('.fa-exclamation-circle,.alert .fa-check-circle,.alert .fa-times-circle').css('color','red');
  $('.msg') .text (_msg);
  $('.fa-times-circle').css('color','#ffffff');//color del signo
  $('.alert .close-btn .fas').css('color','#CA4141');//X
  $('.alert').css('background-color','#FA4747');//color fondo
  $('.alert').css('border-left','8px solid #CA4141');//borde
  $('.alert .msg').css('color', '#ffffff');//color txt
  $('.close-btn').css('background-color','#FE7676')//color de fondo de la X
  $('.alert').addClass("show");
  $('.alert').removeClass("hide");
  $('.alert').addClass("showAlert");
  setTimeout(function(){
    $('.alert').removeClass("show");
    $('.alert').addClass("hide");
  },5000);
$('.close-btn').click(function(){
  $('.alert').removeClass("show");
  $('.alert').addClass("hide");
});
  }else{
    console.log('no voy a mostar alerta');
  }
}
function ajustar_tabla(){
  if ($('#openSidebarMenu').prop('checked') ) {
    console.log("Checkbox seleccionado");
    $('main').css('transform','translateX(-250px)')
    $('main').css('transform','250ms ease-in-out')
    $('.main').click().css('margin-left','250px');
}else{
  $('.main').click().css('margin-left','auto');
}
}

//

$(function() {
	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});

//Tidio
function Enviar_correo(Email,Id_factura,Nombre){
  alert("lo estoy intentando");
  emailjs.send("service_5qt3fvz","template_dguwkln",{
    from_name: Email,
    Factura_num: Id_factura,
    Nombre_persona: Nombre,
    });
    
}

function ActualizarCorreo(){
  $("#Nombre_datos_label").attr('hidden',true);
  $("#Nombre_datos").attr('hidden',true);

  $("#Apellido1_datos_label").attr('hidden',true);
  $("#Apellido1_datos").attr('hidden',true);

  $("#Apellido2_datos_label").attr('hidden',true);
  $("#Apellido2_datos").attr('hidden',true);

  $("#Usuario_datos_label").attr('hidden',true);
  $("#Usuario_datos").attr('hidden',true);

  $("#Telefono_datos_label").attr('hidden',true);
  $("#Telefono_datos").attr('hidden',true);

  $("#Id_usuario_datos_label").attr('hidden',true);
  $("#Id_usuario_datos").attr('hidden',true);
  $("#Email_datos").attr("readonly", false);
  $("#btn-correo").attr("hidden", false);
}
