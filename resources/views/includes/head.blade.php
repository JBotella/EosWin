<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="" />
	<meta name="author" content="" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EosWin') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('theme/dist/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/dist/css/estilos.css') }}" rel="stylesheet">
	<!-- Font Awesome -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('theme/dist/js/scriptsIni.js') }}"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
