<html>
<head>
</head>
<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
window.onload = function() {
    ctx = document.getElementById('canvas').getContext('2d');
    ctx.canvas.height = 150;
    window.myBar = new Chart(ctx, {type: 'bar',data: barChartData,options: complexChartOption});
};

</script>
<script>
  var barChartData = {labels: ['33','34','35','36','37','38','39','40','41','42'],
  datasets: [
	{type: 'bar',label: 'income(sal)',data: ['408','415','447','469','479','514','539','564','570','575'],
	borderColor : 'rgba(54,164,235,0.8)',backgroundColor : 'rgba(54,164,235,0.5)',yAxisID: 'y-axis-1',},
  
	{type: 'bar',label: 'outgo(sal)',data: ['335','363','361','362','354','358','376','460','378','409'],
	borderColor : 'rgba(0,128,0,0.8)',backgroundColor : 'rgba(0,128,0,0.5)',yAxisID: 'y-axis-1',},
	
	{type: 'line',label: 'savings(sal)',data: ['593','645','731','838','963','1120','1282','1386','1578','1745'],
	borderColor : 'rgba(254,97,132,0.8)',backgroundColor : 'rgba(254,97,132,0.5)',yAxisID: 'y-axis-2',},
	
	{type: 'line',label: 'savings(free)',data: ['718','890','1085','1290','1501','1731','1953','2102','2316','2499'],
	hidden : 'true',borderColor : 'rgba(255,196,0,0.8)',backgroundColor : 'rgba(255,196,0,0.5)',yAxisID: 'y-axis-2',},
	],};
</script>
<script>
	 var complexChartOption = {
	 	responsive: true,scales: {
	 		yAxes: [{id: 'y-axis-1',type: 'linear',position: 'left',ticks: {beginAtZero: true,min: 0},},
	 				{id: 'y-axis-2',type: 'linear',position: 'right',gridLines:{drawOnChartArea: false,},
	 		}],
	 }};
</script>
  <div class='container'>
  	 <canvas id='canvas'></canvas>
  </div>
</div>
</body>
</html>