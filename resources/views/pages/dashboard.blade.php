@extends('layouts.app')
@section('content')
	<div class="contenedorSeccion">
		<div class="cabeceraSeccion"><i class="fas fa-tachometer-alt mr-2" onclick="extraBar()"></i>Dashboard</div>
		<div class="contenidoSeccion">
			
			@include('includes.ejemplos.formulario')
		
		</div>
	</div>
@endsection
