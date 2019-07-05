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
<?php
	echo "labels: ['".$_GET['lbl']."'],";
?>
	datasets: [
		{
			type: 'bar',
			label: 'you',

<?php
			if(isset($_GET['you'])){
				$you = abs($_GET['you']);	
			}else{
				$you = 0;	
			}
			echo "data: ['".$you."'],";
?>
			borderColor : 'rgba(54,164,235,0.8)',
			backgroundColor : 'rgba(54,164,235,0.5)',
		},
		{
			type: 'bar',
			label: 'average',
<?php
			echo "data: ['".$_GET['avg']."'],";
?>
			borderColor : 'rgba(0,128,0,0.8)',
			backgroundColor : 'rgba(0,128,0,0.5)',
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
