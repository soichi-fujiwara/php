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
	ctx = document.getElementById('canvas_02').getContext('2d');
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
	labels: ['<?php echo $_GET['lbl1']; ?>','<?php echo $_GET['lbl2']; ?>','<?php echo $_GET['lbl3']; ?>'],
	datasets: [
		{
			type: 'bar',
			label: 'you',
			data: [<?php echo $_GET['car']; ?>,<?php echo $_GET['trip']; ?>,<?php echo $_GET['it']; ?>],
			borderColor : 'rgba(<?php include 'func/get_color.php';echo get_color(1);  ?>,0.8)',
			backgroundColor : 'rgba(<?php echo get_color(1);  ?>,0.5)',
			yAxisID: 'y-axis-1',
		},
		{
			type: 'bar',
			label: 'statistic',
			data: [<?php echo $_GET['car_avg']; ?>,<?php echo $_GET['trip_avg']; ?>,<?php echo $_GET['it_avg']; ?>],
			borderColor : 'rgba(<?php echo get_color(2);  ?>,0.8)',
			backgroundColor : 'rgba(<?php echo get_color(2);  ?>,0.5)',
			yAxisID: 'y-axis-1',
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
	<canvas id='canvas_02'></canvas>
</div>
</body>
</html>
