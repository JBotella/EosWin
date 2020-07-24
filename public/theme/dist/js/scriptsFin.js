var actHeightWindow = window.innerHeight;
function mostrarThCabecera(cab){
	$('#cabeceraLista_'+cab).removeClass('thead-th-ocultos');
}
function contenidoSeccionHeight(){
	var contenedorSeccion = window.innerHeight;
	var topNav = $('.sb-topnav').outerHeight(true);
	var cabeceraSeccion = $('.cabeceraSeccion').outerHeight(true);
	var barraOpcionesLista = $('.barraOpcionesLista').outerHeight(true);
	
		if(!topNav){ var topNav = 0; }
		if(!cabeceraSeccion){ var cabeceraSeccion = 0; }
		if(!barraOpcionesLista){ var barraOpcionesLista = 0; }
	
	var resta = Math.round(contenedorSeccion - topNav - cabeceraSeccion - barraOpcionesLista);
	$('.contenidoSeccion').css( 'height','' + resta + 'px' );
}
$(document).ready(function(){
	contenidoSeccionHeight();
});
$(window).bind('resize', function() {
	contenidoSeccionHeight();
});
