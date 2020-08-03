// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    datasets: [
		{
		  label: "Ingresos",
		  backgroundColor: "#62af82",
		  borderWidth:0,
		  data: [1000, 3000, 500, 2000, 2200, 1200, 950, 1200, 6250, 650, 980, 3500],
		},
		{
		  label: "Gastos",
		  backgroundColor: "#628faf",
		  borderWidth:0,
		  data: [800, 2500, 600, 1800, 2000, 1000, 1300, 1000, 5000, 1100, 800, 3000],
		},
		{
		  label: "Resultado",
		  backgroundColor: "#8262af",
		  borderWidth:0,
		  data: [200, 500, -100, 200, 200, 200, -350, 200, 1250, -450, 180, 500],
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
          display: false
        },
        ticks: {
          maxTicksLimit: 12
        }
      }],
      yAxes: [{
        ticks: {
          min: -500,
          max: 7000,
          maxTicksLimit: 10
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: true
    }
  }
});
