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
	labels: ['～34','～39','～44','～49','～54','～59','～64','～69','70～'],
	datasets: [
		{
			type: 'bar',
			label: 'you',
			data: [<?php echo $_GET['income_val']; ?>],
			borderColor : 'rgba(<?php include 'func/get_color.php';echo get_color(1);  ?>,0.8)',
			backgroundColor : 'rgba(<?php echo get_color(1);  ?>,0.5)',
		},
		{
			type: 'bar',
			label: 'statistic',
			data: [457*0.85,512*0.85,563*0.85,633*0.85,661*0.85,649*0.85,479*0.85,387*0.85,368*0.85],
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
