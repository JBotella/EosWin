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
		$('.'+id+' input').prop('checked',false);
		
	}else{ // Marcar (Vacio)
		$("#"+id).data('checked','checked');
		$("#"+id).html('<i class="'+claseIcono+' chkIcoSel"></i>');
		$('.'+id).children('.cuadroCheck').html('<i class="'+claseIcono+' chkIcoSel"></i>');
		$('.'+id).addClass('chkSel');
		if(tabla){ $(tabla).find("tr").addClass('chkSel'); }
		$('.'+id+' input').prop('checked',true);
	}
});
// Imprimir el selector en el caso de requerirlo externamente
function imprimeSelector(clase){
	var claseIcono = iconoSelector();
	$('.'+clase).addClass(claseIcono+' chkIcoSel');
}

/* ----- ****************************** ----- */
/* ----- * Acciones selects y options * ----- */
/* ----- ****************************** ----- */

// Al cambiar el selector, recibimos el objeto, la ruta y los id de los selectores afectados
function selectorChange(obj,ruta,cargaSelect){
	cargaSelect.forEach(function(index){
		var carga = index;
		var valor = $(obj).val();
		var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		var URLdomain = window.location.origin;
		$.ajax({
			type:'POST',
			url:ruta,
			data:{_token:_token, carga:carga, valor:valor},
			headers:{'Access-Control-Allow-Origin':URLdomain},
			success:function(listado){
				cargaOptionsSelector(carga,listado);
			}
		});
	});
}
// Tras la respuesta de la ruta, cargamos los datos en los options de los selectores afectados
function cargaOptionsSelector(id,data){
	var array = $.parseJSON(data);
	var options = '';
	var tipo = $('#'+id).data('tipo');
	switch(tipo){
		case 'select':
			array.forEach(function(index){
				options += '<option value="'+index.codigo+'">'+index.nombre+'</option>';
			});
			resaltaElemento('#'+id);
		break;
		case 'datalist':
			$('#'+id+'Datalist').val('');
			var placeholder = $('#'+id+'Datalist').data('placeholder');
			$('#'+id+'Datalist').prop('placeholder',placeholder);
			array.forEach(function(index){
				options += '<option value="'+index.codigo+' - '+index.nombre+'" data-option-id="'+index.codigo+'"></option>';
			});
			resaltaElemento('#'+id+'Datalist')
		break;
	}
	$('#'+id).html(options);
}
function resaltaElemento(id){
	$(id).addClass('resaltadoAnimado');
	setTimeout(function(){
		$(id).removeClass('resaltadoAnimado');
	},500);
}
function opcionDatalist(obj){
	if($('datalist').find('option[value="'+obj.value+'"]')){
		var valOp = $('option[value="'+obj.value+'"]').data('option-id');
		$('#'+obj.id+'Id').val(valOp);
	}
}

/* ----- ************** ----- */
/* ----- * Row Radios * ----- */
/* ----- ************** ----- */

function compruebaRowRadios(){
	$('.rowRadio').addClass('rowRadioInactivo');
	var id = $('.rowRadio input[type=radio]:checked').val();
	$('.rowRadio[data-row = "'+id+'"]').removeClass('rowRadioInactivo');
}
$('.rowRadio input[type=radio]').change(function(){
	compruebaRowRadios();
});

/* ----- ***************************** ----- */
/* ----- * Estados con custom-switch * ----- */
/* ----- ***************************** ----- */

function cambiaEstadoLinea(obj){
	var desde = event.target.nodeName;
	if(desde == 'INPUT'){
		var valor = $(obj).children().prop('checked');
		var ruta = $(obj).data('ruta-estado');
		ruta = ruta.replace(':valor',valor);
		$.get(ruta);
	}
	event.stopImmediatePropagation();
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
/* Abre la ruta de una linea */
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
/* Preguntar antes de borrar linea (Para lineas con botones de acción en la linea) */
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

/* Muestra el Notificador de Acciones de Sección */
function notificacionAccion(accion){
	var checkLinea = $('.notificacionAccion[data-accion="'+accion+'"]').data('linea-check');
	var checked = $('.'+checkLinea+':checkbox:checked').length;
	$('.notificacionAccion').slideUp(200);
	if($('.notificacionAccion[data-accion="'+accion+'"]').is(":visible")){
		$('.notificacionAccion[data-accion="'+accion+'"]').slideUp(200);
	}else{
		if(checked > 0){
			$('.notificacionAccion[data-accion="'+accion+'"]').slideDown(200);
		}
	}
}
/* Recoge todos los checkbox seleccionados en una tabla para aplicarles la acción */
function accionLineas(obj,accion,checkLinea,tipo){
	var checked = $('.'+checkLinea+':checkbox:checked').length;
	if(checked > 0){
		var lineas = $('.'+checkLinea+':checkbox:checked').map(function() {
			return this.value;
		}).get();
		if(tipo == 'asinc'){
			ejecutaAccionLineasAsinc(obj,accion,lineas);
		}else if(tipo == 'form'){
			ejecutaAccionLineasForm(obj,accion,lineas,checkLinea);
		}
	}
}
/* Ejecuta acción asíncrona para las lineas y recarga */
function ejecutaAccionLineasAsinc(obj,accion,lineas){
	var nLista = $('.notificacionAccion[data-accion="'+accion+'"]').data('lista-id');
	var ruta = $(obj).data('ruta');
	var _token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
	var URLdomain = window.location.origin;
	$.ajax({
		type:'POST',
		url:ruta,
		data:{_token:_token, lineas:lineas},
		headers:{'Access-Control-Allow-Origin':URLdomain},
		success:function(data){
			recargarListar(nLista);
			notificacionAccion(accion);
		}
	});
}
/* Ejecuta acción para las lineas y redirecciona */
function ejecutaAccionLineasForm(obj,accion,lineas,checkLinea){
	var formCheck = 'form[name="'+checkLinea+'"]';
	var ruta = $(obj).data('ruta');
	$(formCheck).attr("action", ruta);
	var columnas = columnasActivas(formCheck);
	$(formCheck+' input[name="columnasActivas[]"]').val(columnas);
	$(formCheck).submit();
}
/* Columnas Activas */
function columnasActivas(contCheck){
	var dataColumna = $(contCheck).find('[data-columna]');
	var columnas = [];
	for(var i=0; i < dataColumna.length; i++) {
		if(!$(dataColumna[i]).hasClass("d-none")){
			columnas.push([dataColumna[i].dataset.columna]);
		}
	}
	return columnas;
}

/* ----- ********* ----- */
/* ----- * Orden * ----- */
/* ----- ********* ----- */

/* Función para el Orden de Listado en Tabla */
$('th').click(function(){
	var thead = $(this).parent().parent();
	var idLista = thead.attr('id');
	var nLista = idLista.split('_')[1];
	var orden = $(this).data('columna');
	if(orden){
		var ordenActual = $('#'+idLista).data('columna');
		var direccionActual = $('#'+idLista).data('direccion');
		$('.flechaOrdenTh').remove();
		$('th').removeClass('thResaltado');
		if(orden == ordenActual){
			$('#'+idLista).data('columna', orden);
			$('#'+idLista).data('direccion', dirOrdenOpuesta(direccionActual));
			var flecha = flechaDirOrden(dirOrdenOpuesta(direccionActual));
		}else{
			$('#'+idLista).data('columna', orden);
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

/* Ordenar listas UL con botones de orden alfabético o numérico */
function ordenaUlLi(elemento,obj,tipo){
	$('.ordenEmpresas').removeClass('principal');
	var ordenClass = $(obj).attr('class');
	$(obj).addClass('principal');
	if(ordenClass.includes("down-alt")){
		var sentido = "down-alt";
		var opuesto = "down";
	}else{
		var sentido = "down";
		var opuesto = "down-alt";
	}
	$(obj).removeClass(ordenClass);
	var ordenClassOpuesta = ordenClass.replace(sentido,opuesto);
	$(obj).addClass(ordenClassOpuesta);
	$(elemento+" li").sort(ordenaLi).appendTo(elemento);
	function ordenaLi(a, b){
		if(opuesto.includes("down-alt")){
			return ($(b).data(tipo)) > ($(a).data(tipo)) ? 1 : -1;
		}else{
			return ($(b).data(tipo)) < ($(a).data(tipo)) ? 1 : -1;
		}
	}
}

/* Ordenar tabla (No funciona bien - Sin uso) */
function sortTable(tabla,n){
	var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
	table = document.getElementById(tabla);
	switching = true;
	// Set the sorting direction to ascending:
	dir = "asc";
	/* Make a loop that will continue until
	no switching has been done: */
	while(switching){
		// Start by saying: no switching is done:
		switching = false;
		rows = table.rows;
		/* Loop through all table rows (except the
		first, which contains table headers): */
		for(i = 1; i < (rows.length - 1); i++){
		  // Start by saying there should be no switching:
		  shouldSwitch = false;
		  /* Get the two elements you want to compare,
		  one from current row and one from the next: */
		  x = rows[i].getElementsByTagName("TD")[n];
		  y = rows[i + 1].getElementsByTagName("TD")[n];
		  /* Check if the two rows should switch place,
		  based on the direction, asc or desc: */
		  if(dir == "asc"){
			if(x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()){
			  // If so, mark as a switch and break the loop:
			  shouldSwitch = true;
			  break;
			}
		  }else if(dir == "desc"){
			if(x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()){
			  // If so, mark as a switch and break the loop:
			  shouldSwitch = true;
			  break;
			}
		  }
		}
		if(shouldSwitch){
		  /* If a switch has been marked, make the switch
		  and mark that a switch has been done: */
		  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
		  switching = true;
		  // Each time a switch is done, increase this count by 1:
		  switchcount ++;
		}else{
		  /* If no switching has been done AND the direction is "asc",
		  set the direction to "desc" and run the while loop again. */
		  if(switchcount == 0 && dir == "asc"){
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
/* Buscador en extraBar */
function cargaBuscadorExtra(){
	$("#buscadorExtraBar").on("keyup", function () {
		var busqueda = $("#buscadorExtraBar").val();
		resaltaBusqueda(busqueda,'.mLE_ListaMin','.mLE_ListaMinLinea');
	});
}
function iniciaBuscadorExtra(){
	var rutaBuscadorExtraBar = $(".menuLateral_extraCabInt").data('ruta');
	$(".menuLateral_extraCabInt").load(rutaBuscadorExtraBar,function(){
		cargaBuscadorExtra();
	});
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
	}else{
		// Comprobar cadena de numeros de columna
		var columnas = [];
		$(".itemColumna .checkColumna:checked").each(function(){
			var id = $(this).parent().data('id-columna');
			columnas.push(id)
		});
		guardaColumnasAjustes(this,columnas);
	}
	e.stopPropagation();
});
/* Carga de columnas visibles */
function cargarColumnasVisibles(){
	$(".itemColumna .checkColumna").each(function(){
		var id = $(this).parent().data('id-columna');
		visibilidadColumna(id,0);
	});
	$(".itemColumna .checkColumna:checked").each(function(){
		var id = $(this).parent().data('id-columna');
		visibilidadColumna(id,1);
	});
}
/* Guarda cadena de columnas en tabla de ajustes */
function guardaColumnasAjustes(obj,columnas){
	var stringColumnas = columnas.join();
	var columnasUrl = stringColumnas.replace(/,/g,'-');
	var ruta = $(obj).parent().data('ruta-columnas');
	ruta = ruta.replace(':columnas',columnasUrl);
	$.get(ruta);
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
