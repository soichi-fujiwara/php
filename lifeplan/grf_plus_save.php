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
	ctx = document.getElementById('canvas_04').getContext('2d');
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
	labels: [<?php  echo $_GET['age']; ?>],
	datasets: [
		{
			type: 'bar',
			label: '毎年の貯蓄増金額',
			data: [<?php echo $_GET['plus_save']; ?>],
			borderColor : 'rgba(<?php include 'func/get_color.php';echo get_color(1);  ?>,0.8)',
			backgroundColor : 'rgba(<?php echo get_color(1);  ?>,0.5)',
		},
	],
};
</script>
<script>
var complexChartOption = {
	responsive: true,
	scales: {
		yAxes: [
				{
					id: 'y-axis-1',
					type: 'linear',
					position: 'left'
				},
		],
	}
};
</script>
<div class='container'>
	<canvas id='canvas_04'></canvas>
</div>

<div style="position:absolute;left:8px;margin:-1% 0 0 0;font-size:11px;">
<?php 
	echo '(※将来30年分のみ)';
?>


</div>
<div style="position:absolute;right:8px;margin:-1% 0 0 0;font-size:11px;">年齢</div>

</body>
</html>
