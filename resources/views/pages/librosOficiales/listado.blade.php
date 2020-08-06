@extends('layouts.app')
@section('content')
	@php
		$extrabar = 'oculta';
	@endphp
	<div class="contenedorSeccion @if(isset($extrabar) and $extrabar == 'visible') cSeccExtraVisible @endif">
		<div class="cabeceraSeccion" id="cabeceraSeccionFormulario">
			<span><i class="fas fa-percent icoCab mr-2"></i></span>
			<span id="nombreCabecera"></span>
			<div class="cabSeccBtnAcciones">
			</div>
		</div>
		
		
		
	</div>
	<script>
	</script>
@endsection
