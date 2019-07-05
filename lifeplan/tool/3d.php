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

    // node�̒�`�B�����𑝂₷�Ɗy�����B
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

    // node���m�̕R�t���ݒ�B���p�̍ۂ́A�������ǂ���邩������̂����B
    var links = [
        {source:0, target:1},
        {source:0, target:2},
        {source:0, target:3}
    ];
    // forceLayout���̂̐ݒ�͂����B������������Ɗy�����B
    var force = d3.layout.force()
        .nodes(nodes)
        .links(links)
        .size([width, height])
        .distance(170) // node���m�̋���
        .friction(0.9) // ���C��(�����x)�I�Ȃ��̂炵���B
        .charge(-400) // ����Ă������Ƃ���́B���i��(������)�Ƃ����炵���B
        .gravity(0.05) // ��ʂ̒����Ɉ�������́B���́B
        .start();

    // svg�̈�̍쐬
    var svg = d3.select("body")
        .append("svg")
        .attr({width:width, height:height});

    // link���̕`��(svg��line�`��@�\�𗘗p)
    var link = svg.selectAll("line")
        .data(links)
        .enter()
        .append("line")
        .style({stroke: "#FFFFFF",
        "stroke-width": 1
    });

    // nodes�̕`��(�����svg�̉~�`��@�\�𗘗p)
    var node = svg.selectAll("circle")
        .data(nodes)
        .enter()
        .append("circle")
        .attr({
            // �~�̑傫��
            r: function() {return 70;}
        })
        .style({
            fill: "white"
        })
        .call(force.drag);

    // node�̃��x������̐ݒ�
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

    // tick�C�x���g(�͊w�v�Z���N���邽�тɌĂ΂��炵���̂ŁA���W�Ǐ]�Ȃǂ͂�����)
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
        // label���ǐ�����悤��
        label.attr({
            x: function(data) { return data.x;},
            y: function(data) { return data.y;}
        });
    });

</script>

</body>
</html>