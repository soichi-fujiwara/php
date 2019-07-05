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
	ctx = document.getElementById('canvas_si_02').getContext('2d');
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
	labels: ['必要金額'],
	datasets: [
		{
			type: 'bar',
			label: '～末子 独立',
			data: [<?php echo $_GET['child']; ?>],
			borderColor : 'rgba(<?php include 'func/get_color.php';echo get_color(1);  ?>,0.8)',
			backgroundColor : 'rgba(<?php echo get_color(1);  ?>,0.5)',
		},
		{
			type: 'bar',
			label: '～配偶者 年金受給',
			data: [<?php echo $_GET['haigusya']; ?>],
			borderColor : 'rgba(<?php echo get_color(2);  ?>,0.8)',
			backgroundColor : 'rgba(<?php echo get_color(2);  ?>,0.5)',
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
					
					ticks: {
					beginAtZero: true,
					max: 0
					},
					
				},
		],
	}
};
</script>
<div class='container'>
	<canvas id='canvas_si_02'></canvas>
</div>

<div style="position:absolute;left:8px;margin:-1% 0 0 0;font-size:11px;">
<?php 
	if($_GET['child_plan'] == 1){
		echo '(※出産前のお子様が含まれる場合は算出不可)';
	}else{
		echo '(※ご本人が1年後に死亡したと仮定)';
	}
?>

</div>
</body>
</html>
