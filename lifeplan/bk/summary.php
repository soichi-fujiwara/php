<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title>Summary</title>

<style>
body{
	font-size:13px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

<?php

	$i = 0;
	$ary = array("");
	
	//ファイルを変数に格納
	$filename = 'summary_text.txt';
	 
	//fopenでファイルを開く
	$fp = fopen($filename, 'r');
	 
	//whileで行末までループ処理
	while (!feof($fp)) {
	 
		// fgetsでファイルを読み込み、変数に格納
		array_push($ary,fgets($fp));

		$i = $i + 1;
	}
	 
	// fcloseでファイルを閉じる
	fclose($fp);

	$skill_value = $ary[1];
	$min_tanka_value = $ary[2];
	$max_tanka_value =  $ary[3];
	$avg_tanka_value =  $ary[4];
	$pj_value =  $ary[5];


	echo '<div style="font-size:20px;text-align:center;margin-top:15px"><統計>言語別契約単価</div>';
	echo '<div style="font-size:13px;text-align:center;margin-bottom:8px">(集計期間:2018/08/01～　件数:2000件　企業数:67社)</div>';

	echo "<script>";
	echo "window.onload = function() {";
	echo "    ctx = document.getElementById('canvas').getContext('2d');";
	echo "    ctx.canvas.height = 120;";
	echo "    window.myBar = new Chart(ctx, {";
	echo "        type: 'bar',";
	echo "        data: barChartData,";
	echo "        options: complexChartOption";
	echo "    });";
	echo "};";
	echo "</script>";

	echo "<script>";
	echo "var barChartData = {";
	echo "    labels: [".$skill_value;
	echo "    ],";
	echo "    datasets: [";

	//◆1本目(最低単価)
	echo "    {";
	echo "        type: 'bar',";

	echo "        label: 'min',";
	echo "        data: [".$min_tanka_value;

	echo "        ],";
	echo "        borderColor : 'rgba(54,164,235,0.8)',";
	echo "        backgroundColor : 'rgba(54,164,235,0.5)',";
	echo "        yAxisID: 'y-axis-1',";
	echo "    },";

	//◆2本目(最高単価)
	echo "    {";
	echo "        type: 'bar',";

	echo "        label: 'max',";
	echo "        data: [".$max_tanka_value;
	
	echo "        ],";
	echo "        borderColor : 'rgba(254,97,132,0.8)',";
	echo "        backgroundColor : 'rgba(254,97,132,0.5)',";
	echo "        yAxisID: 'y-axis-1',";
	echo "    },";

	//◆3本目(平均単価)
	echo "    {";
	echo "        type: 'bar',";

	echo "        label: 'avg',";
	echo "        data: [".$avg_tanka_value;

	echo "        ],";
	echo "        borderColor : 'rgba(0,128,0,0.8)',";
	echo "        backgroundColor : 'rgba(0,128,0,0.5)',";
	echo "        yAxisID: 'y-axis-1',";
	echo "    },";

	//◆4本目(案件数)
	echo "    {";
	echo "        type: 'line',";

	echo "        label: 'pj',";
	echo "        data: [".$pj_value;

	echo "        ],";
	echo "        hidden : 'true',";
	echo "        borderColor : 'rgba(255,140,0,0.8)',";
	echo "        backgroundColor : 'rgba(255,140,0,0.5)',";
	echo "        yAxisID: 'y-axis-2',";
	echo "    },";

	echo "    ],";
	echo "};";
	echo "</script>";

	//縦軸設定
	echo "<script>";
	echo "var complexChartOption = {";
	echo "    responsive: true,";

	echo "scales: {";
	echo "    yAxes: [{";
	echo "        id: 'y-axis-1',";
	echo "        type: 'linear',";
	echo "        position: 'left',";

    echo "      ticks: {";
    echo "        beginAtZero: true,";
    echo "        min: 0,";
    echo "        max: 150";
    echo "      }";
            
	echo "    }, {";
	echo "        id: 'y-axis-2',";
	echo "        type: 'linear', ";
	echo "        position: 'right',";

	//横軸罫線設定
	echo "        gridLines:{";
	echo "        drawOnChartArea: false,";
	echo "        },";

	echo "    }],";
	echo "    }";

	echo "};";
	echo "</script>";

	echo "<div class='container' style='width:100%'>";
	echo "    <canvas id='canvas'></canvas>";
	echo "</div>";

?>
</body>
</html>
