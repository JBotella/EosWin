// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Recoger datos
var labels = $("#graficaAnual").data('labels');
var label = $("#graficaAnual").data('label');
var ingresos = $("#graficaAnual").data('ingresos');
var gastos = $("#graficaAnual").data('gastos');
var resultados = $("#graficaAnual").data('resultados');

// Convertir en array
var array_labels = labels.split(',');
var array_label = label.split(',');
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

// Bar Chart
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: array_labels,
    datasets: [
		{
		  label: array_label[0],
		  backgroundColor: "#62af82",
		  borderWidth:0,
		  data: array_ingresos,
		},
		{
		  label: array_label[1],
		  backgroundColor: "#628faf",
		  borderWidth:0,
		  data: array_gastos,
		},
		{
		  label: array_label[2],
		  backgroundColor: "#8262af",
		  borderWidth:0,
		  data: array_resultados,
		}
	],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'mes'
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
          min: minY,
          max: maxY,
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
