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
	if($('#layoutSidenav_nav').hasClass('side-oculta')){
		var content = $(".side-oculta").css("display");
		if(content == 'none'){
			$('#layoutSidenav_nav').removeClass('side-oculta');
			$('body').removeClass('sb-sidenav-toggled');
			procesaValorSidebar('no');
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

/* ----- ************** ----- */
/* ----- * Selectores * ----- */
/* ----- ************** ----- */

// Seleccionar radio list
$('.radList').click(function(){
	var valor = $('#'+this.id+' input').val();
	var prefijo = this.id.split('_',1)[0];
	$('.'+prefijo).removeClass('radSel');
	$('.'+prefijo+' input').prop('checked',false);
	$(this).addClass('radSel');
	$('#'+this.id+' input').prop('checked',true);
});

// Seleccionar checkbox list
$('.chkList').click(function(){
	var valor = $('#'+this.id+' input').val();
	var prefijo = this.id.split('_',1)[0];
	if(!$(this).hasClass('chkSel')){
		$(this).addClass('chkSel');
		$('#'+this.id+' input').prop('checked',true);
		$('#'+this.id+' .cuadroCheck').html('<i class="fas fa-check chkIcoSel"></i>');
	}else{
		$(this).removeClass('chkSel');
		$('#'+this.id+' input').prop('checked',false);
		$('#'+this.id+' .cuadroCheck').html('');
	}
});

// Seleccionar todo
$('.cuadroCkeckSelTodos').click(function(){
	var id = $(this).children('.cuadroCheck').attr('id');
	var checked = $("#"+id).data('checked');
	
	if(checked == 'checked'){ // Desmarcar (Lleno)
		$("#"+id).data('checked','');
		$("#"+id).html('');
		$('.'+id).children('.cuadroCheck').html('');
		$('.'+id).removeClass('chkSel');
		
	}else{ // Marcar (Vacio)
		$("#"+id).data('checked','checked');
		$("#"+id).html('<i class="fas fa-check chkIcoSel"></i>');
		$('.'+id).children('.cuadroCheck').html('<i class="fas fa-check chkIcoSel"></i>');
		$('.'+id).addClass('chkSel');
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
		$('.menuLateral_extraInt').load(ruta, function(){
			//extraBar();
		});
	}else{
		extraBar();
	}
}

/* ----- ************* ----- */
/* ----- * Búsquedas * ----- */
/* ----- ************* ----- */

/* Resaltar Búsqueda con opción a ocultar los no coincidentes */
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
	$(desde+' .resaltarTexto').contents().unwrap(); // Elimina el anterior resaltado
	if(busqueda.length >= 2){
		$(desde).resaltar(busqueda,"resaltarTexto");
		ocultarSinResaltado(desde,linea,1);
	}else{
		ocultarSinResaltado(desde,linea,0);
	}
}
function ocultarSinResaltado(desde,linea,acc){
	var divs = $(desde).find(".resaltarTexto").parent().parent();
	if(acc == 1){
		$(linea).addClass('d-none');
		$.each(divs , function (index, value){
			$('#'+value.id).removeClass('d-none');		
		});
	}else{
		$(linea).removeClass('d-none');
	}
}

/* ----- ************************ ----- */
/* ----- * Fichas y Formularios * ----- */
/* ----- ************************ ----- */

/* Abre o cierra la ficha asociada a la fila de una tabla */
function verLinea(id,ruta){
	ruta = ruta.replace(':id',id);
	$('#visorFicha_0').load(ruta, function(){
		visorFicha(0);
	});
}
/* Abre una ruta */
function abrirLinea(id,ruta){
	ruta = ruta.replace(':id', id);
	window.open(ruta,"_self");
}
/* Abre o cierra el visor de la ficha asociada a la fila de una tabla o al elemento de una sección (oculta o muestra la tabla en función del estado de la ficha) */
function visorFicha(n){
	if($('#visorFicha_'+n).hasClass('ocultaContenedor')){
		$('#contenido_'+n).addClass('ocultaContenedor');
		$('.barraOpcionesLista').addClass('ocultaContenedor');
		$('#cabeceraSeccionTabla').addClass('ocultaContenedor').addClass('colapsaContenedor');
		$('#cabeceraSeccionVer').removeClass('ocultaContenedor').removeClass('colapsaContenedor');
		setTimeout(function(){
			$('#contenido_'+n).addClass('d-none');
			$('.barraOpcionesLista').addClass('d-none');
			$('#visorFicha_'+n).removeClass('ocultaContenedor').removeClass('d-none');
			contenidoSeccionHeight();
		},300);
	}else{
		$('#visorFicha_'+n).addClass('ocultaContenedor').addClass('colapsaContenedor');
		$('#contenido_'+n).removeClass('d-none');
		$('#cabeceraSeccionTabla').removeClass('ocultaContenedor').removeClass('colapsaContenedor');
		$('#cabeceraSeccionVer').addClass('ocultaContenedor').addClass('colapsaContenedor');
		setTimeout(function(){
			$('.barraOpcionesLista').removeClass('d-none');
			$('#visorFicha_'+n).addClass('d-none');
			$('#contenido_'+n).removeClass('ocultaContenedor');
			$('.barraOpcionesLista').removeClass('ocultaContenedor');
			contenidoSeccionHeight();
		},300);
	}
}
/* Muestra la cabecera de una tabla tras la carga de sus filas */
function mostrarThCabecera(cab){
	$('#cabeceraLista_'+cab).removeClass('thead-th-ocultos');
}
/* Preguntar antes de borrar linea */
function preguntaBorrarLinea(id){
	if($('#tdConfirmarBorrar_'+id).hasClass('d-none')){
		$('.tdBorrar').removeClass('d-none');
		$('.tdConfirmaAccion').addClass('d-none');
		$('#tdConfirmarBorrar_'+id).removeClass('d-none');
		$('#tdBorrar_'+id).addClass('d-none');
	}else{
		$('.tdBorrar').removeClass('d-none');
		$('.tdConfirmaAccion').addClass('d-none');
	}
	
	// Detener la función de abrir linea
	event.stopImmediatePropagation();
}

/* ----- ********* ----- */
/* ----- * Orden * ----- */
/* ----- ********* ----- */

/* Ordenar tabla */
function sortTable(tabla,n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById(tabla);
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
/* Buscar en tabla (No funciona bien - Sin uso) */
function searchTable(tabla) {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("busqueda");
  filter = input.value.toUpperCase();
  table = document.getElementById(tabla);
  tbody = table.getElementsByTagName("tbody");
  tr = tbody[0].getElementsByTagName("tr");
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
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
