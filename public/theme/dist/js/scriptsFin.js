function extraBar(){
	if(!$('.menuLateral_extra').hasClass('mLExtraVisible')){
		$('.contenedorSeccion').addClass('cSeccExtraVisible');
		$('.menuLateral_extra').addClass('mLExtraVisible');
	}else{
		$('.contenedorSeccion').removeClass('cSeccExtraVisible');
		$('.menuLateral_extra').removeClass('mLExtraVisible');
	}
}
/* Abre o cierra la ficha asociada a la fila de una tabla */
function verLinea(id,ruta){
	ruta = ruta.replace(':id', id);
	$('#visorFicha_0').load(ruta, function(){
		visorFichaTabla(0);
	});
}
/* Abre o cierra el visor de la ficha asociada a la fila de una tabla (oculta o muestra la tabla en función del estado de la ficha) */
function visorFichaTabla(n){
	if($('#visorFicha_'+n).hasClass('ocultaContenedor')){
		$('#tabla_'+n).addClass('ocultaContenedor');
		$('.barraOpcionesLista').addClass('ocultaContenedor');
		$('.cabeceraSeccion').addClass('ocultaContenedor').addClass('colapsaContenedor');
		setTimeout(function(){
			$('#tabla_'+n).addClass('d-none');
			$('.barraOpcionesLista').addClass('d-none');
			$('#visorFicha_'+n).removeClass('ocultaContenedor');
			$('#visorFicha_'+n).removeClass('d-none');
			contenidoSeccionHeight();
		},300);
	}else{
		$('#visorFicha_'+n).addClass('ocultaContenedor').addClass('colapsaContenedor');
		$('#tabla_'+n).removeClass('d-none');
		$('.cabeceraSeccion').removeClass('ocultaContenedor').removeClass('colapsaContenedor');
		setTimeout(function(){
			$('.barraOpcionesLista').removeClass('d-none');
			$('#visorFicha_'+n).addClass('d-none');
			$('#tabla_'+n).removeClass('ocultaContenedor');
			$('.barraOpcionesLista').removeClass('ocultaContenedor');
			contenidoSeccionHeight();
		},300);
	}
}
/* Muestra la cabecera de una tabla tras la carga de sus filas */
function mostrarThCabecera(cab){
	$('#cabeceraLista_'+cab).removeClass('thead-th-ocultos');
}
/* Calcular y asignar la altura para el contenido de una sección */
function contenidoSeccionHeight(){
	var contenedorSeccion = window.innerHeight;
	var topNav = $('.sb-topnav').outerHeight(true);
		if(!topNav){ var topNav = 0; }
	var cabeceraSeccion = $('.cabeceraSeccion').outerHeight(true);
		if(!cabeceraSeccion){ var cabeceraSeccion = 0; }
	//var barraOpcionesLista = $('.barraOpcionesLista').outerHeight(true);
	var barraOpcionesLista = $('.barraOpcionesLista').height();
		if(!barraOpcionesLista){ var barraOpcionesLista = 0; }
	var resta = Math.round(contenedorSeccion - topNav - cabeceraSeccion - barraOpcionesLista);
	$('.contenidoSeccion').css('height',''+resta+'px');
}
/* Evento resize */
$(window).bind('resize', function() {
	contenidoSeccionHeight();
});
/* Evento ready */
$(document).ready(function(){
	contenidoSeccionHeight();
});
