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
	labels: ['保有年数','購入費用'],
	datasets: [
		{
			type: 'bar',
			label: 'you',
			data: [<?php echo $_GET['hoyu']; ?>,<?php echo $_GET['konyu']; ?>],
			borderColor : 'rgba(54,164,235,0.8)',
			backgroundColor : 'rgba(54,164,235,0.5)',
			yAxisID: 'y-axis-1',
		},
		{
			type: 'bar',
			label: 'average',
			data: [7.6,137],
			borderColor : 'rgba(0,128,0,0.8)',
			backgroundColor : 'rgba(0,128,0,0.5)',
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
