// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Recoger datos
var label = $("#diagramaOperaciones").data('label');
var colores = $("#diagramaOperaciones").data('colores');
var cifras = $("#diagramaOperaciones").data('cifras');

// Convertir en array
var array_label = label.split(',');
var array_colores = colores.split(',');
var array_cifras = cifras.split(',');


// Pie Chart
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
	type: 'doughnut',
	data: {
		labels: array_label,
		datasets: [{
			data: array_cifras,
			backgroundColor: array_colores,
		}],
	},
	options: {
		responsive: true,
		legend: {
			display: true,
			position: 'top',
			labels: {
				padding: 20,
				boxWidth: 10
			}
		}
	}
});
