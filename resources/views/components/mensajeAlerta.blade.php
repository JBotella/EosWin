<div class="alert mensaje-alerta-{{$tipo}} text-center" role="alert">
	<i class="fas fa-check mr-1"></i>
	{{$mensaje}}
</div>
<script>
	fadeAlert('.alert');
	function fadeAlert(elemento){
		$(elemento).hide().slideDown(500, function() {
			$(elemento).fadeTo(3000, 1).slideUp(500);
		});
	}
</script>
