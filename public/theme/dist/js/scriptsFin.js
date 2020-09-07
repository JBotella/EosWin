/* ----- ************ ----- */
/* ----- * Side Bar * ----- */
/* ----- ************ ----- */

function clickSidebar(cont){
	var ruta = $(cont).data('href');
	if($('#layoutSidenav_nav').hasClass('side-oculta')){
		var plegado = 'no';
	}else{
		var plegado = 'si';
	}
	if($('body').hasClass('sb-sidenav-toggled')){
		$('#layoutSidenav_nav').removeClass('side-oculta');
	}else{
		$('#layoutSidenav_nav').addClass('side-oculta');
	}
	compruebaSidebar(ruta);
	procesaValorSidebar(ruta,plegado);
}
function procesaValorSidebar(ruta,plegado){
	ruta = ruta.replace(':plegado', plegado);
	$.get(ruta);
}
function compruebaSidebar(ruta){
	if(!ruta){
		var ruta = $('#sidebarToggle').data('href');
	}
	if($('#layoutSidenav_nav').hasClass('side-oculta')){
		var content = $(".side-oculta").css("display");
		if(content == 'none'){
			$('#layoutSidenav_nav').removeClass('side-oculta');
			$('body').removeClass('sb-sidenav-toggled');
			procesaValorSidebar(ruta,'no');
		}
	}
}
$(document).ready(function(){
	compruebaSidebar();
});
/* Bloque Ajustes */
function bloqueOpcionesPie(){
	if($('#contenedorEmergenteAjustes').hasClass('ocultaEmergenteAjustes')){
		$('#contenedorEmergenteAjustes').removeClass('ocultaEmergenteAjustes');
	}else{
		$('#contenedorEmergenteAjustes').addClass('ocultaEmergenteAjustes');
	}
}
$(document).on('click',function(e){
	// Control del contenedor emergente de ajustes
	if(!$('#contenedorEmergenteAjustes').hasClass('ocultaEmergenteAjustes')){
		var fP = 0; // Click fuera del botón ajustes en el pié
		var fC = 0; // Click fuera del contenedor emergente de ajustes
		if($(e.target).closest(".sb-sidenav-footer").length === 0){ fP++; }
		if($(e.target).closest("#contenedorEmergenteAjustes").length === 0){ fC++; }
		if(fP && fC){
			bloqueOpcionesPie();
		}
	}
});

/* ----- ************* ----- */
/* ----- * Extra Bar * ----- */
/* ----- ************* ----- */

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
function listaExtra(cont){
	var ruta = $(cont).data('href');
	if(!$('.menuLateral_extra').hasClass('mLExtraVisible')){
		extraBar();
		loaderGrafico('.menuLateral_extraInt');
		$('.menuLateral_extraInt').load(ruta);
	}
}

/* ----- ****************** ----- */
/* ----- * Altura Sección * ----- */
/* ----- ****************** ----- */

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
