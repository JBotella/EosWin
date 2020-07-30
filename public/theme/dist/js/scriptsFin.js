function extraBar(){
	if(!$('.menuLateral_extra').hasClass('mLExtraVisible')){
		$('.contenedorSeccion').addClass('cSeccExtraVisible');
		$('.menuLateral_extra').addClass('mLExtraVisible');
	}else{
		$('.contenedorSeccion').removeClass('cSeccExtraVisible');
		$('.menuLateral_extra').removeClass('mLExtraVisible');
	}
}
/* Carga el contenido de una ruta en la extraBar */
function listaExtra(ruta){
	if(!$('.menuLateral_extra').hasClass('mLExtraVisible')){
		$('.menuLateral_extraInt').load(ruta, function(){
			extraBar();
		});
	}else{
		extraBar();
	}
}
/* Resaltar Búsqueda */
$.fn.extend({
	resaltar: function(busqueda,claseCSSbusqueda){
		var regex = new RegExp("(<[^>]*>)|("+busqueda.replace(/([-.*+?^${}()|[\]\/\\])/g,"\\$1")+')','ig');
		var nuevoHtml = this.html(this.html().replace(regex,function(a,b,c){
			return (a.charAt(0) == "<") ? a : "<span class=\""+claseCSSbusqueda+"\">"+c+"</span>";
		}));
		return nuevoHtml;
	}
});
function resaltaBusqueda(busqueda,desde,linea){
	$(desde+' span').contents().unwrap(); // Elimina el anterior resaltado
	if(busqueda.length >= 1){
		$(desde).resaltar(busqueda,"resaltarTexto");
		ocultarSinResaltado(desde,linea,1);
	}else{
		ocultarSinResaltado(desde,linea,0);
	}
}
function ocultarSinResaltado(desde,linea,acc){
	//var linea = $(desde).children().attr("class");
	var divs = $(desde).find("span").parent().parent();
	if(acc == 1){
		$(linea).addClass('d-none');
		$.each(divs , function (index, value){
			$('#'+value.id).removeClass('d-none');		
		});
	}else{
		$(linea).removeClass('d-none');
	}
}
/* Abre o cierra la ficha asociada a la fila de una tabla */
function verLinea(id,ruta){
	ruta = ruta.replace(':id',id);
	$('#visorFicha_0').load(ruta, function(){
		visorFichaTabla(0);
	});
}
/* Abre una ruta */
function abrirLinea(id,ruta){
	ruta = ruta.replace(':id', id);
	window.open(ruta,"_self");
}
/* Abre o cierra el visor de la ficha asociada a la fila de una tabla (oculta o muestra la tabla en función del estado de la ficha) */
function visorFichaTabla(n){
	if($('#visorFicha_'+n).hasClass('ocultaContenedor')){
		$('#tabla_'+n).addClass('ocultaContenedor');
		$('.barraOpcionesLista').addClass('ocultaContenedor');
		$('#cabeceraSeccionTabla').addClass('ocultaContenedor').addClass('colapsaContenedor');
		$('#cabeceraSeccionVer').removeClass('ocultaContenedor').removeClass('colapsaContenedor');
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
		$('#cabeceraSeccionTabla').removeClass('ocultaContenedor').removeClass('colapsaContenedor');
		$('#cabeceraSeccionVer').addClass('ocultaContenedor').addClass('colapsaContenedor');
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
