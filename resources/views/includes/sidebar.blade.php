<div id="layoutSidenav_nav">
	<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
		<div class="sb-sidenav-menu">
			<div class="nav mt-3">
				<a class="nav-link" href="{!! route('dashboard')!!}">
					<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
					@lang('texto.dashboard')
				</a>
				<div class="sb-sidenav-menu-heading">Bloque 1</div>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
					Sección 1
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav">
						<a class="nav-link" href="layout-static.html">SubSección 1-1</a>
						<a class="nav-link" href="layout-sidenav-light.html">SubSección 1-2</a>
					</nav>
				</div>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
					<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
					Sección 2
					<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
					<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
							SubSección 2-1
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="login.html">SubSubSección 2-1-1</a>
							</nav>
						</div>
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
							SubSección 2-2
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
							<nav class="sb-sidenav-menu-nested nav">
								<a class="nav-link" href="401.html">SubSubSección 2-2-1</a>
							</nav>
						</div>
					</nav>
				</div>
				<div class="sb-sidenav-menu-heading">Bloque 2</div>
				<a class="nav-link" href="charts.html">
					<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
					Sección 3
				</a>
				<a class="nav-link" href="tables.html">
					<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
					Sección 4
				</a>
			</div>
		</div>
		<div class="sb-sidenav-footer">
			<div class="small">Logged in as:</div>
			Juan
		</div>
	</nav>
</div>
