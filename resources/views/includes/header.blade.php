<nav class="sb-topnav navbar navbar-expand navbar-dark">
	<a class="navbar-brand" href="{!!route('dashboard')!!}">
		<img src="{!! asset('theme/img/logoEosWin_nb_pq.png') !!}" />
	</a>
	<button class="btn btn-link btn-sm order-1 order-lg-0 btn-menu" id="sidebarToggle" href="#" onclick="clickSidebar()"><i class="fas fa-bars"></i></button>
	<!-- Navbar Search-->
	{{--<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
		<div class="input-group">
			<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
			<div class="input-group-append">
				<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
			</div>
		</div>
	</form>--}}
	<!-- Navbar-->
	<ul class="navbar-nav ml-auto ml-md-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle navIdioma" id="langDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{ Session::get("lang") }}
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="langDropdown">
				<a class="dropdown-item" href="{{route('change_lang','es')}}">@lang('texto.espanol')</a>
				<a class="dropdown-item" href="{{route('change_lang','ca')}}">@lang('texto.catalan')</a>
				<a class="dropdown-item" href="{{route('change_lang','en')}}">@lang('texto.ingles')</a>
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
				<a class="dropdown-item" href="#">@lang('texto.configuracion')</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="login.html">@lang('texto.logout')</a>
			</div>
		</li>
	</ul>
</nav>
