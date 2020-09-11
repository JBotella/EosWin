<html>
<title>{{$nombreArchivo}}</title>
<style>

@page { margin:10mm; }
.page_break { page-break-before:always; }
	table { width:100%; font-size:10px; border-collapse: collapse; }
	thead { background-color:#D7EBE0; }
	th, td { border:solid 1px #000000; text-align:left; padding:2px 5px; }
</style>
<body>
	<?php echo utf8_encode($data); ?>
</body>
</html>
