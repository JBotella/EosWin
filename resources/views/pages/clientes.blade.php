@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		
		<div class="cabeceraSeccion">
			<span><i class="fas fa-users icoCab mr-2"></i></span>
			<span>@lang('texto.clientes')</span>
		</div>
		
		
		<div class="barraOpcionesLista">
			
			<div class="row justify-content-end">
				<div class="lineaBuscador order-1 order-sm-1 order-md-2 order-lg-2 order-xl-2 col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5">
					@include('includes.complementos.buscador')
				</div>
			</div>
			
		</div>
		
		<div class="contenidoSeccion">
			
			
			
			<div class="seccion-responsive">
			
				<div class="table-responsive">
					<table class="table table-striped table-fixed">
						<thead id="cabeceraLista_0" class="thead-th-ocultos">
							<tr>
								<th scope="col">Codigo</th>
								<th scope="col">Nombre</th>
								<th scope="col">Cif</th>
								<th scope="col">Teléfono</th>
								<th scope="col">Email</th>
								<th scope="col" class="tdBtnAcciones"></th>
							</tr>
						</thead>
						<tbody id="docuCont0"></tbody>
					</table>
				</div>
			
			</div>
			
			
		</div>
	</div>
	<script>
		function cargaListado(){
			var ruta = '{{ route("listaClientes") }}';
			$('#docuCont0').load(ruta, function(){
				mostrarThCabecera(0);
			});
		}
		$(document).ready(function(){
			cargaListado();
		});
	</script>
@endsection
