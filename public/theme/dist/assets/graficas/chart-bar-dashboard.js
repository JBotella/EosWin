// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Recoger datos
var labels = $("#graficaAnual").data('labels');
var label = $("#graficaAnual").data('label');
var colores = $("#graficaAnual").data('colores');
var ingresos = $("#graficaAnual").data('ingresos');
var gastos = $("#graficaAnual").data('gastos');
var resultados = $("#graficaAnual").data('resultados');

// Convertir en array
var array_labels = labels.split(',');
var array_label = label.split(',');
var array_colores = colores.split(',');
var array_ingresos = ingresos.split(',');
var array_gastos = gastos.split(',');
var array_resultados = resultados.split(',');

var maxIngresos = Math.max.apply(Math,array_ingresos);
var minIngresos = Math.min.apply(Math,array_ingresos);
var maxGastos = Math.max.apply(Math,array_gastos);
var minGastos = Math.min.apply(Math,array_gastos);
var maxResultados = Math.max.apply(Math,array_resultados);
var minResultados = Math.min.apply(Math,array_resultados);

var maxY = Math.max.apply(Math,[maxIngresos,maxGastos,maxResultados]);
var minY = Math.min.apply(Math,[minIngresos,minGastos,minResultados]);

// Índice de redondeo
var proxMax = 5;
var proxMin = 5;
var maxYLength = Math.ceil(maxY).toString().length;
var minYLength = Math.ceil(minY).toString().length;
for(rmax = 2; rmax < maxYLength; rmax++){
	var proxMax = proxMax+'0';
}
for(rmin = 2; rmin < minYLength; rmin++){
	var proxMin = proxMin+'0';
}

// Redondeo de máximos y mínimos
var maxYRound = Math.ceil(maxY/proxMax)*proxMax;
var minYRound = Math.ceil(Math.abs(minY)/proxMin)*proxMin;
if(minY < 0){
	minYRound = minYRound * -1;
}

// Bar Chart
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels: array_labels,
		datasets: [
			{
				label: array_label[0],
				backgroundColor: array_colores[0],
				borderWidth:0,
				data: array_ingresos,
			},
			{
				label: array_label[1],
				backgroundColor: array_colores[1],
				borderWidth:0,
				data: array_gastos,
			},
			{
				label: array_label[2],
				backgroundColor: array_colores[2],
				borderWidth:0,
				data: array_resultados,
			}
		],
	},
	options: {
		scales: {
			xAxes: [{
				time: {
					unit: 'month'
				},
				gridLines: {
					display: true
				},
				ticks: {
					maxTicksLimit: 12
				}
			}],
			yAxes: [{
				ticks: {
					min: minYRound,
					max: maxYRound,
					maxTicksLimit: 10
				},
				gridLines: {
					display: true
				}
			}],
		},
		legend: {
			display: true,
			position: 'top'
		}
	}
});
