// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
	type: 'pie',
	data: {
		labels: ["Ingresos", "Gastos", "Beneficios", "Pendiente Cobros / Pagos"],
		datasets: [{
			data: [30520.5, 22198.15, 8322.35, 2198.15],
			backgroundColor: ['#62af82', '#628faf', '#8262af', '#b05751'],
		}],
	},
});
