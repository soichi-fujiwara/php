<html>
<head>
<meta charset = "UTF-8">
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>Lifeplan-Simulation</title>
</head>
<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script>
window.onload = function() {
	ctx = document.getElementById('canvas_01').getContext('2d');
	window.myBar = new Chart(
		ctx, {
			type: 'bar',
			data: barChartData,
			options: complexChartOption
		}
	);
};
</script>
<script>
var barChartData = {
	labels: ['～34','～39','～44','～49','～54','～59','～64','～69','～74','～79','～84','85～'],
	datasets: [
		{
			type: 'bar',
			label: 'you',
			data: [<?php echo $_GET['outgo_val']; ?>],
			borderColor : 'rgba(<?php include 'func/get_color.php';echo get_color(1);  ?>,0.8)',
			backgroundColor : 'rgba(<?php echo get_color(1);  ?>,0.5)',
		},
		{
			type: 'bar',
			label: 'statistic',
			data: [24.2887*12,26.6011*12,29.2405*12,33.7032*12,35.7999*12,32.9953*12,30.9541*12,27.6353*12,25.5210*12,22.8081*12,21.5480*12,21.6757*12],
			borderColor : 'rgba(<?php echo get_color(2);  ?>,0.8)',
			backgroundColor : 'rgba(<?php echo get_color(2);  ?>,0.5)',
		},
	],
};
</script>
<script>
var complexChartOption = {
	responsive: true,scales: {
		yAxes: [
				{
					id: 'y-axis-1',
					type: 'linear',
					position: 'left',
					ticks: {
						beginAtZero: true,
						min: 0
					},
				},
		],
	}
};
</script>
<div class='container'>
	<canvas id='canvas_01'></canvas>
</div>
</body>
</html>
