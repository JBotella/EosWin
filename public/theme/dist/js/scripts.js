/*!
* Start Bootstrap - SB Admin v6.0.1 (https://startbootstrap.com/templates/sb-admin)
* Copyright 2013-2020 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
*/

(function($) {
	"use strict";

	// Add active state to sidbar nav links
	var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
		$("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
			if (this.href === path) {
				$(this).addClass("active");
			}
		});

	// Toggle the side navigation
	$("#sidebarToggle").on("click", function(e) {
		e.preventDefault();
		$("body").toggleClass("sb-sidenav-toggled");
	});
})(jQuery);

/* Loader Gráfico */
function loaderGrafico(id){
	$(id).html('<div class="animationload"><div class="osahanloadingBack"></div><div class="osahanloading"></div></div>');
}
function loaderGraficoTabla(id,colspan){
	$(id).html('<div><div colspan="'+colspan+'"><div class="d-flex justify-content-center"><div class="spinner-border text-primary " role="status"><span class="sr-only">Loading...</span></div></div></div></div>');
}
function loaderGraficoForm(id){
	$(id).html('<div class="animationloadForm"><div class="osahanloadingBackForm"></div><div class="osahanloadingForm"></div></div>');
}
function goToByScroll(id){
	$('html,body').animate({ scrollTop: $(id).offset().top-80 }, 'slow');
}
	