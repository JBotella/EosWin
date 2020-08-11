/* ----- ************** ----- */
/* ----- * Selectores * ----- */
/* ----- ************** ----- */

// Devuelve la clase del icono del selector
function iconoSelector(){
	return 'fas fa-check';
}
// Seleccionar radio list
$('.radList').click(function(){
	var valor = $('#'+this.id+' input').val();
	var prefijo = this.id.split('_',1)[0];
	$('.'+prefijo).removeClass('radSel');
	$('.'+prefijo+' input').prop('checked',false);
	$(this).addClass('radSel');
	$('#'+this.id+' input').prop('checked',true);
	event.stopImmediatePropagation();
});
// Seleccionar checkbox list
$('.chkList').click(function(){
	var obj = this;
	clickChkList(obj);
});
// Clicar chkList (Para cargas asíncronas)
function clickChkList(obj){
	// Comprobar si se trata de una tabla
	if(obj.tagName == 'TD') {
		var tr = obj.closest('TR');
	}
	var valor = $('#'+obj.id+' input').val();
	var prefijo = obj.id.split('_',1)[0];
	var claseIcono = iconoSelector();
	if(!$(obj).hasClass('chkSel')){
		$(obj).addClass('chkSel');
		if(tr){ $(tr).addClass('chkSel'); }
		$('#'+obj.id+' input').prop('checked',true);
		$('#'+obj.id+' .cuadroCheck').html('<i class="'+claseIcono+' chkIcoSel"></i>');
	}else{
		$(obj).removeClass('chkSel');
		if(tr){ $(tr).removeClass('chkSel'); }
		$('#'+obj.id+' input').prop('checked',false);
		$('#'+obj.id+' .cuadroCheck').html('');
	}
	event.stopImmediatePropagation();
}
// Seleccionar todo
$('.cuadroCkeckSelTodos').click(function(){
	// Comprobar si se trata de una tabla
	if(this.closest('TH')) {
		var tabla = this.closest('TABLE');
	}
	var id = $(this).children('.cuadroCheck').attr('id');
	var checked = $("#"+id).data('checked');
	var claseIcono = iconoSelector();
	if(checked == 'checked'){ // Desmarcar (Lleno)
		$("#"+id).data('checked','');
		$("#"+id).html('');
		$('.'+id).children('.cuadroCheck').html('');
		$('.'+id).removeClass('chkSel');
		if(tabla){ $(tabla).find("tr").removeClass('chkSel'); }
		
	}else{ // Marcar (Vacio)
		$("#"+id).data('checked','checked');
		$("#"+id).html('<i class="'+claseIcono+' chkIcoSel"></i>');
		$('.'+id).children('.cuadroCheck').html('<i class="'+claseIcono+' chkIcoSel"></i>');
		$('.'+id).addClass('chkSel');
		if(tabla){ $(tabla).find("tr").addClass('chkSel'); }
	}
});
// Imprimir el selector en el caso de requerirlo externamente
function imprimeSelector(clase){
	var claseIcono = iconoSelector();
	$('.'+clase).addClass(claseIcono+' chkIcoSel');
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
function resaltaBusquedaListado(busqueda,desde){
	if(busqueda.length >= 3){
		$(desde).resaltar(busqueda,"resaltarTexto");
	}
}
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

/* Función para la Búsqueda en Listado */
function buscarLista(nLista){
	$('#alertaBusqueda_'+nLista).empty();
	var busqueda = $('#busqueda_'+nLista).val().trim();
	if(busqueda.length>=3){
		cargarListar(nLista);
	}else{
		$('#alertaBusqueda_'+nLista).html($('#alertaBusqueda_'+nLista).data('min-busqueda'));
	}
}
/* Limpiar búsqueda y recargar */
function limpiarBusqueda(nLista){
	$("#busqueda_"+nLista).val('');
	cargarListar(nLista);
	$('#alertaBusqueda_'+nLista).empty();
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
function ocultarThCabecera(cab){
	$('#cabeceraLista_'+cab).addClass('thead-th-ocultos');
}
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

/* Función para el Orden de Listado */
$('th').click(function(){
	var thead = $(this).parent().parent();
	var idLista = thead.attr('id');
	var nLista = idLista.split('_')[1];
	var orden = $(this).data('orden');
	if(orden){
		var ordenActual = $('#'+idLista).data('orden');
		var direccionActual = $('#'+idLista).data('direccion');
		$('.flechaOrdenTh').remove();
		console.log(obj);
		$('th').removeClass('thResaltado');
		if(orden == ordenActual){
			$('#'+idLista).data('orden', orden);
			$('#'+idLista).data('direccion', dirOrdenOpuesta(direccionActual));
			var flecha = flechaDirOrden(dirOrdenOpuesta(direccionActual));
		}else{
			$('#'+idLista).data('orden', orden);
			$('#'+idLista).data('direccion', 'ASC');
			var flecha = flechaDirOrden('ASC');
			
		}
		ocultarThCabecera(nLista);
		var obj = this;
		$(obj).append(flecha);
		$(obj).addClass('thResaltado');
		cargarListar(nLista);
	}
});
function dirOrdenOpuesta(direccion){
	if(direccion == 'ASC'){
		opuesta = 'DESC'; 
	}else if(direccion == 'DESC'){
		opuesta = 'ASC';
	}
	return opuesta;
}
function flechaDirOrden(direccion){
	if(direccion == 'ASC'){
		flecha = '<i class="flechaOrdenTh fas fa-long-arrow-alt-up"></i>';
	}else if(direccion == 'DESC'){
		flecha = '<i class="flechaOrdenTh fas fa-long-arrow-alt-down"></i>';
	}
	return flecha;
}

/* Ordenar tabla (No funciona bien - Sin uso) */
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

/* ----- ****************************************** ----- */
/* ----- * Ocultar o mostrar columnas de la tabla * ----- */
/* ----- ****************************************** ----- */

function visibilidadColumna(col,acc){
	if(acc == 0){
		$('td:nth-child('+col+'),th:nth-child('+col+')').addClass('d-none');
	}else if(acc == 1){
		$('td:nth-child('+col+'),th:nth-child('+col+')').removeClass('d-none');
	}
}
/* Visibilidad de columnas de listado */
$('.itemColumna').click(function(e){
	var idColumna = $(this).data('id-columna');
	if ($('#checkColumna_'+idColumna).is(":checked")){
		visibilidadColumna(idColumna,1);
	}else{
		visibilidadColumna(idColumna,0);
	}
	/* Comprobar si hay 0 columnas mostradas y volver a marcar el último */
	var cantChecked = $(".itemColumna .checkColumna:checked").length;
	if(cantChecked == 0){
		$('#itemColumna_'+idColumna).click();
	}
	e.stopPropagation();
});
/* Carga de columnas visibles */
function cargarColumnasVisibles(){
	$(".itemColumna .checkColumna:checked").each(function(){
		var id = $(this).parent().data('id-columna');
		visibilidadColumna(id,1);
	});
}

/* ----- **************** ----- */
/* ----- * Carga Listas * ----- */
/* ----- **************** ----- */

function cargaListado(idLista,variables,desde = null){
	var busqueda = variables['busqueda'];
	if(busqueda.length < 3){
		busqueda = '';
		variables['busqueda'] = '';
	}
	var variables = JSON.stringify(variables);
	var ruta = $('#cabeceraLista_'+idLista).data('ruta');
	ruta = ruta.replace(':variables', variables);
	if(desde == null){ var desde = 0; }
	var contenedorLista = $('.contenedorLista[data-lista-id = "'+idLista+'"][data-lista-desde = "'+desde+'"]');
	loaderGrafico(contenedorLista);
	$(contenedorLista).load(ruta, function(){
		// Mostrar columnas visibles
		cargarColumnasVisibles();
		// Cargar contador de resultados
		cargaContadorCabecera(idLista);
		// Mostrar cabecera de listado
		mostrarThCabecera(idLista);
		// Resalta búsqueda
		resaltaBusquedaListado(busqueda,contenedorLista);
	});
}
/* Carga contado de resultados en cabecera de sección */
function cargaContadorCabecera(idLista){
	var contListado = $('#listado_'+idLista).data('listado-cant');
	$('#cabCantLista_'+idLista).html('('+contListado+')');
}
/* Recargar listar */
function recargarListar(nLista){
	cargarListar(nLista);
}
/* Cargar listar con timeout */
function cargarListar(nLista){
	ocultarThCabecera(nLista);
	setTimeout(function(){
		listar(nLista);
	},300);
}

/* ----- *************** ----- */
/* ----- * Auto Scroll * ----- */
/* ----- *************** ----- */

/* Listado Automático-Scroll (Pendiente de implantar) */
function cargaListadoAutomatico(){
	if($(window).scrollTop() + $(window).height() > $(document).height() - 50){
		// Inicio Marcador de variable vDesde
		if($("#vDesde").length == 0){
			/* N */$('#tablaReg').append('<input id="vDesde" type="hidden" value="'+vDesde+'">');
		}
		//
		tm = setTimeout(function(){
			if($('#docuCont'+vDesde).is(':empty')) {
				cargaListado(vDesde,vLimite);
			}else{
				var totalCuenta = $('#totalCuenta').val();
				/* N */ var vDesde = $('#vDesde').val();
				if(eval(totalCuenta) > eval(vDesde)){
					if(eval(totalCuenta) > eval(vLimite)){
						$(window).scrollTop($(window).scrollTop()-50);
						//vDesde=vDesde+vLimite;
						/* N */ vDesde = eval(vDesde) + eval(vLimite);
						/* N */ $('#vDesde').val(vDesde);
						$('#tablaReg').append('<tbody class="extraCont" id="docuCont'+vDesde+'"></tbody>');
						cargaListado(vDesde,vLimite);
					}
				}
				clearTimeout(tm);
			}
		}, 500);
	}
}
/* Listado Automático-Scroll */
if(typeof(listaAuto)!=='undefined'){
	if(listaAuto=='ok'){
		$(window).stop().scroll(function(){
			cargaListadoAutomatico();
		});
	}
}