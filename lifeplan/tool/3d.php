<!DOCTYPE html>
<html>
<head>
    <title>d3test</title>
	<script src="https://d3js.org/d3.v3.min.js" charset=UTF-8'></script>
	<link href="https://fonts.googleapis.com/css?family=Kosugi+Maru" rel="stylesheet">
</head>
<body>
<style type="text/css">
body{
	background: -moz-linear-gradient(bottom right, #03c4eb, #87cefa); 
	background: -webkit-linear-gradient(bottom right, #03c4eb, #87cefa); 
	background: linear-gradient(to top right, #03c4eb, #87cefa);
	font-family: 'Kosugi Maru', sans-serif;
	font-weight:700;
}

</style>
<script type="text/javascript">
    var width = 800;
    var height = 300;

    // nodeの定義。ここを増やすと楽しい。
    var nodes = [

<?php
		$lbl0 = $_GET['lbl0'];;	
		$lbl1 = $_GET['lbl1'];	
		$lbl2 = $_GET['lbl2'];	
		$lbl3 = $_GET['lbl3'];	

        echo '{id:0, label:"'.$lbl0.'"},';
        echo '{id:1, label:"'.$lbl1.'"},';
        echo '{id:2, label:"'.$lbl2.'"},';
        echo '{id:3, label:"'.$lbl3.'"}';
?>

    ];

    // node同士の紐付け設定。実用の際は、ここをどう作るかが難しいのかも。
    var links = [
        {source:0, target:1},
        {source:0, target:2},
        {source:0, target:3}
    ];
    // forceLayout自体の設定はここ。ここをいじると楽しい。
    var force = d3.layout.force()
        .nodes(nodes)
        .links(links)
        .size([width, height])
        .distance(170) // node同士の距離
        .friction(0.9) // 摩擦力(加速度)的なものらしい。
        .charge(-400) // 寄っていこうとする力。推進力(反発力)というらしい。
        .gravity(0.05) // 画面の中央に引っ張る力。引力。
        .start();

    // svg領域の作成
    var svg = d3.select("body")
        .append("svg")
        .attr({width:width, height:height});

    // link線の描画(svgのline描画機能を利用)
    var link = svg.selectAll("line")
        .data(links)
        .enter()
        .append("line")
        .style({stroke: "#FFFFFF",
        "stroke-width": 1
    });

    // nodesの描画(今回はsvgの円描画機能を利用)
    var node = svg.selectAll("circle")
        .data(nodes)
        .enter()
        .append("circle")
        .attr({
            // 円の大きさ
            r: function() {return 70;}
        })
        .style({
            fill: "white"
        })
        .call(force.drag);

    // nodeのラベル周りの設定
    var label = svg.selectAll('text')
        .data(nodes)
        .enter()
        .append('text')
        .attr({
            "text-anchor":"middle",
            "fill":"#03c4eb",
            "font-size": "15px"
        })
        .text(function(data) { return data.label; });

    // tickイベント(力学計算が起こるたびに呼ばれるらしいので、座標追従などはここで)
    force.on("tick", function() {
        link.attr({
            x1: function(data) { return data.source.x;},
            y1: function(data) { return data.source.y;},
            x2: function(data) { return data.target.x;},
            y2: function(data) { return data.target.y;}
        });
        node.attr({
            cx: function(data) { return data.x;},
            cy: function(data) { return data.y;}
        });
        // labelも追随するように
        label.attr({
            x: function(data) { return data.x;},
            y: function(data) { return data.y;}
        });
    });

</script>

</body>
</html>