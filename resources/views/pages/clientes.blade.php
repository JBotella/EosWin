@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion">
			<span><i class="fas fa-users mr-2"></i></span>
			<span>@lang('texto.clientes')</span>
		</div>
		<div class="contenidoSeccion">
			
			<div class="barraFiltros"></div>
			
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Codigo</th>
							<th scope="col">Nombre</th>
							<th scope="col">Cif</th>
						</tr>
					</thead>
					<tbody id="docuCont0">
					</tbody>
				</table>
			</div>
			
			
		</div>
	</div>
	<script>
		function cargaListado(){
			var ruta = '{{ route("listaClientes") }}';
			$('#docuCont0').load(ruta, function(){
				
			});
		}
		$(document).ready(function(){
			cargaListado();
		});
	</script>
@endsection
