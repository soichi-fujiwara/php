<?php setcookie('age_year', $_POST['age_year'], time() + 7776000);?>
<?php setcookie('age_month', $_POST['age_month'], time() + 7776000);?>
<?php setcookie('one_kuchime', $_POST['one_kuchime'], time() + 7776000);?>
<?php setcookie('A_kuchisu', $_POST['A_kuchisu'], time() + 7776000);?>
<?php setcookie('B_kuchisu', $_POST['B_kuchisu'], time() + 7776000);?>
<?php setcookie('ideco_kakekin', $_POST['ideco_kakekin'], time() + 7776000);?>
<?php setcookie('ideco_rate', $_POST['ideco_rate'], time() + 7776000);?>
<!DOCTYPE html>
<head>
<meta charset = "UTF-8">
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>Lifeplan-Simulation</title>
<link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kosugi+Maru" rel="stylesheet">
<script type="text/javascript" charset="UTF-8" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" charset="UTF-8" src="../js/refchk.js"></script>
<script type="text/javascript" charset="UTF-8" src="../js/fixed_midashi.js"></script>
<style>
body{
	font-size:13px;
	font-family : "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", Verdana, Arial, sans-serif;
	/*font-family:-apple-system,BlinkMacSystemFont,"Helvetica Neue",YuGothic,'Yu Gothic',Verdana,Meiryo,sans-serif;*/
	background-color:#F0F0F0;
}

.midashi_head{
    /*background:#03c4eb;*/
    /*color:#FFFFFF;*/
    padding:8px;
    font-weight:600;
    font-size:13px;
    margin:0 0 8px 0;
    /*letter-spacing: 2px;*/
	border-bottom: solid 1px #444444;
}
.midashi_child{
    border-top:solid 1px #777777;
    border-bottom:solid 1px #777777;
    padding:2% 0 2% 0;
    font-weight:bold;
    font-size:13px;
    margin:2.1% 0 3.4% 0;
    /*letter-spacing: 2px;*/
    width:96.5%;
}
.imptnt{
    color:#e74c3c;
    font-weight:bold;
}
/*スマホ･タブレット用*/
@media screen and (min-width: 0px) and (max-device-width: 1024px) {
	#container{
	  /*scrollerと同じ固定幅を設定*/
	  width:100%;
	  position:relative;
	  /*◎セルの高さに応じて調整(td+4)*/
	  padding-top:24px;
	  overflow:hidden;
	  margin:0 0 12px 0px;
	}
	#grf_area{
		width:800px;
		background-color:#ffffff;
	}
	#scroller{
		height:350px;
		/*border-bottom: solid 1px #8a8a8a;*/
		overflow:scroll;
		margin:5px 1.2% 15px 1%;
	}
	.block3{
		background-color:#ffffff;
		margin:0 0 15px 0;
		padding:4px;
		border-radius:5px;
		box-shadow: 2px 2px 4px #CCCCCC;
	}
	#grf_rap{
		width:100%;
		overflow:scroll;
		background-color:#ffffff;
		border-radius:5px 5px 0 0;
		box-shadow: 2px 2px 4px #CCCCCC;
		padding:15px 0 35px 0px;
	}
	#info_rap{
		font-family: 'Kosugi Maru', sans-serif;
		width:100%;
		overflow:scroll;
		background-color:#ffffff;
		border-radius:0 0 5px 5px;
		box-shadow: 2px 2px 4px #CCCCCC;
		padding:15px 0 20px 0px;
	}
	#fp_ad{
		padding:12px;
		margin-bottom:8px;
	}
}
/*PC用*/
@media only screen and (min-width: 1025px) {
	body{
		padding:0 2% 0 2%;
	}
	#container{
	  /*scrollerと同じ固定幅を設定*/
	  width:88%;
	  position:relative;
	  /*◎セルの高さに応じて調整(td+4)*/
	  padding-top:24px;
	  overflow:hidden;
	  margin:1% 6% 12px 6%;
	}
	#grf_area{
		width:100%;
		max-width:1900px;
	}
	#scroller{
		/*width:1100px;*/
		width:90%;
		height:450px;
		overflow:auto;
		margin:15px auto 15px auto;
	}
	.block3{
		width:31%;
		margin:0 1.7% 1.7% 0;
		float:left;
		background-color:#ffffff;
		padding:4px;
		border-radius:5px;
		box-shadow: 2px 2px 4px #CCCCCC;
	}
	#grf_rap{
		width:80%;
		background-color:#ffffff;
		border-radius:5px 5px 0 0;
		box-shadow: 2px 2px 4px #CCCCCC;
		padding:4% 6% 4% 6%;
		margin:auto;
	}
	#info_rap{
		font-family: 'Kosugi Maru', sans-serif;
		width:80%;
		background-color:#ffffff;
		border-radius:0 0 5px 5px;
		box-shadow: 2px 2px 4px #CCCCCC;
		padding:10px 6% 4% 6%;
		margin:auto;
	}
	#fp_ad{
		padding:12px;
		margin-bottom:8px;
		min-height:250px;
	}
}

#resultTbl {
  border-collapse: collapse;
  font-size:10px;
  margin:0px;
  padding:0px;
  font-family:"Calibri","メイリオ",Meiryo,"ヒラギノ角ゴ Pro W3",Hiragino Kaku Gothic Pro,"ＭＳ Ｐゴシック",sans-serif;
  background-color:#ffffff;
}
#resultTbl thead th {
  background: #D19B9B;
  color: #fff;
}
#resultTbl tbody td {
  text-align:center;
}

#resultTbl tbody td:first-child#minus{
  background:#e6e6fa;
  color:#483d8b;
  font-weight:bold;
  /*display: table-cell;*/
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}

#resultTbl tbody td:first-child#income{
  background:#FFF0F0;
  color:#AA5A5A;
  font-weight:bold;
  /*display: table-cell;*/
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}

#resultTbl tbody td:first-child#age{
  background:#98fb98;
  color:#006400;
  font-weight:bold;
  /*display: table-cell;*/
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}

#resultTbl tbody td:first-child#saving{
  background:#ee82ee;
  color:#800080;
  font-weight:bold;
  display: table-cell;
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}

table{
	font-size:18px;
}
td{
	padding:3px 6px 3px 6px;
}
/*----------------------------*/
/*header                      */
/*----------------------------*/
/*◆固定行*/
#resultTbl tr:first-child{
	background-color:#223a70;
	color:white;
	height:19px;
	border: solid 1px #8a8a8a;
}
/*◆固定列*/
#resultTbl td:first-child{
  min-width:55px;
  height:16px;
  border: solid 1px #8a8a8a;
}
#resultTbl td{
  min-width:35px;
  height:16px;
  border: solid 1px #8a8a8a;
}

.mini_grf{
    position:relative;
    width:100%;
	padding: 55% 0 0 0;
	margin:0 0 0 0;
	z-index:0;
}
.mini_grf iframe{
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
	z-index:0;
}
.money{
	font-family:'Quicksand';
	font-size:20px;
	color:#dc143c;
}
</style>
</head>
<body onload="grf_display01();grf_display02();">
<div style="font-family:'Quicksand';margin-top:20px;font-size:28px;text-align:center;font-weight:bold;color:#333333;">SE-LifePlan-Simulation</div>
<div style="font-family:'Quicksand';font-size:17px;text-align:center;color:#333333;margin-bottom:15px;">～What should I choose?～</div>
<div style="font-size:14px;text-align:center;color:grey;margin-bottom:20px;">国民年金基金 VS iDeCo</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<?php

//自分が生きている間だけできるだけ多く貰えばいいという場合は保証期間無し(B型)を選び、
//自分が早く死んだ場合には遺族に何かしら残したいという場合は保証期間有り(A型:15年)を選ぶ
//保証期間がA型の方が掛け金が高い

//国民年金基金
$age = $_POST['age_year'];
$age_save = $_POST['age_year'];
$diff_month = $_POST['age_month'];
$one_kuchime_type = $_POST['one_kuchime'];
$A_su = $_POST['A_kuchisu'];
$B_su = $_POST['B_kuchisu'];

//iDeCo
$ideco_rate = 1 + $_POST['ideco_rate'] / 100;

//echo $ideco_rate.'<br>';

switch ($one_kuchime_type){
case '0':
	$type = 'A';
	break;
case '1':
	$type = 'B';
	break;
}

$kakekin_tsukigaku_one = 0;
$kakekin_tsukigaku_two = 0;

//◆1口目(男性:終身年金(AorB))
if($age==20){										switch ($type){case 'A':$kakekin_tsukigaku_one=7020;break;case 'B':$kakekin_tsukigaku_one=6180;break;}}
if(($age==20 and $diff_month>=1) or ($age==21)){	switch ($type){case 'A':$kakekin_tsukigaku_one=7260;break;case 'B':$kakekin_tsukigaku_one=6400;break;}}
if(($age==21 and $diff_month>=1) or ($age==22)){	switch ($type){case 'A':$kakekin_tsukigaku_one=7520;break;case 'B':$kakekin_tsukigaku_one=6620;break;}}
if(($age==22 and $diff_month>=1) or ($age==23)){	switch ($type){case 'A':$kakekin_tsukigaku_one=7780;break;case 'B':$kakekin_tsukigaku_one=6860;break;}}
if(($age==23 and $diff_month>=1) or ($age==24)){	switch ($type){case 'A':$kakekin_tsukigaku_one=8070;break;case 'B':$kakekin_tsukigaku_one=7110;break;}}
if(($age==24 and $diff_month>=1) or ($age==25)){	switch ($type){case 'A':$kakekin_tsukigaku_one=8370;break;case 'B':$kakekin_tsukigaku_one=7380;break;}}
if(($age==25 and $diff_month>=1) or ($age==26)){	switch ($type){case 'A':$kakekin_tsukigaku_one=8680;break;case 'B':$kakekin_tsukigaku_one=7660;break;}}
if(($age==26 and $diff_month>=1) or ($age==27)){	switch ($type){case 'A':$kakekin_tsukigaku_one=9020;break;case 'B':$kakekin_tsukigaku_one=7960;break;}}
if(($age==27 and $diff_month>=1) or ($age==28)){	switch ($type){case 'A':$kakekin_tsukigaku_one=9380;break;case 'B':$kakekin_tsukigaku_one=8280;break;}}
if(($age==28 and $diff_month>=1) or ($age==29)){	switch ($type){case 'A':$kakekin_tsukigaku_one=9760;break;case 'B':$kakekin_tsukigaku_one=8630;break;}}
if(($age==29 and $diff_month>=1) or ($age==30)){	switch ($type){case 'A':$kakekin_tsukigaku_one=10170;break;case 'B':$kakekin_tsukigaku_one=8990;break;}}
if(($age==30 and $diff_month>=1) or ($age==31)){	switch ($type){case 'A':$kakekin_tsukigaku_one=10610;break;case 'B':$kakekin_tsukigaku_one=9380;break;}}
if(($age==31 and $diff_month>=1) or ($age==32)){	switch ($type){case 'A':$kakekin_tsukigaku_one=11080;break;case 'B':$kakekin_tsukigaku_one=9800;break;}}
if(($age==32 and $diff_month>=1) or ($age==33)){	switch ($type){case 'A':$kakekin_tsukigaku_one=11580;break;case 'B':$kakekin_tsukigaku_one=10250;break;}}
if(($age==33 and $diff_month>=1) or ($age==34)){	switch ($type){case 'A':$kakekin_tsukigaku_one=12120;break;case 'B':$kakekin_tsukigaku_one=10740;break;}}
if(($age==34 and $diff_month>=1) or ($age==35)){	switch ($type){case 'A':$kakekin_tsukigaku_one=12710;break;case 'B':$kakekin_tsukigaku_one=11270;break;}}
if(($age==35 and $diff_month>=1) or ($age==36)){	switch ($type){case 'A':$kakekin_tsukigaku_one=10005;break;case 'B':$kakekin_tsukigaku_one=8880;break;}}
if(($age==36 and $diff_month>=1) or ($age==37)){	switch ($type){case 'A':$kakekin_tsukigaku_one=10530;break;case 'B':$kakekin_tsukigaku_one=9345;break;}}
if(($age==37 and $diff_month>=1) or ($age==38)){	switch ($type){case 'A':$kakekin_tsukigaku_one=11100;break;case 'B':$kakekin_tsukigaku_one=9855;break;}}
if(($age==38 and $diff_month>=1) or ($age==39)){	switch ($type){case 'A':$kakekin_tsukigaku_one=11730;break;case 'B':$kakekin_tsukigaku_one=10425;break;}}
if(($age==39 and $diff_month>=1) or ($age==40)){	switch ($type){case 'A':$kakekin_tsukigaku_one=12405;break;case 'B':$kakekin_tsukigaku_one=11040;break;}}
if(($age==40 and $diff_month>=1) or ($age==41)){	switch ($type){case 'A':$kakekin_tsukigaku_one=13170;break;case 'B':$kakekin_tsukigaku_one=11715;break;}}
if(($age==41 and $diff_month>=1) or ($age==42)){	switch ($type){case 'A':$kakekin_tsukigaku_one=14010;break;case 'B':$kakekin_tsukigaku_one=12480;break;}}
if(($age==42 and $diff_month>=1) or ($age==43)){	switch ($type){case 'A':$kakekin_tsukigaku_one=14955;break;case 'B':$kakekin_tsukigaku_one=13335;break;}}
if(($age==43 and $diff_month>=1) or ($age==44)){	switch ($type){case 'A':$kakekin_tsukigaku_one=16020;break;case 'B':$kakekin_tsukigaku_one=14295;break;}}
if(($age==44 and $diff_month>=1) or ($age==45)){	switch ($type){case 'A':$kakekin_tsukigaku_one=17235;break;case 'B':$kakekin_tsukigaku_one=15390;break;}}
if(($age==45 and $diff_month>=1) or ($age==46)){	switch ($type){case 'A':$kakekin_tsukigaku_one=12410;break;case 'B':$kakekin_tsukigaku_one=11090;break;}}
if(($age==46 and $diff_month>=1) or ($age==47)){	switch ($type){case 'A':$kakekin_tsukigaku_one=13470;break;case 'B':$kakekin_tsukigaku_one=12050;break;}}
if(($age==47 and $diff_month>=1) or ($age==48)){	switch ($type){case 'A':$kakekin_tsukigaku_one=14710;break;case 'B':$kakekin_tsukigaku_one=13180;break;}}
if(($age==48 and $diff_month>=1) or ($age==49)){	switch ($type){case 'A':$kakekin_tsukigaku_one=16180;break;case 'B':$kakekin_tsukigaku_one=14510;break;}}
if(($age==49 and $diff_month>=1) or ($age==50)){	switch ($type){case 'A':$kakekin_tsukigaku_one=17940;break;case 'B':$kakekin_tsukigaku_one=16110;break;}}

//◆2口目以降(男性:終身年金(AorB))
if($age==20){										$kakekin_tsukigaku_two=3510*$A_su + 3090*$B_su;}
if(($age==20 and $diff_month>=1) or ($age==21)){	$kakekin_tsukigaku_two=3630*$A_su + 3200*$B_su;}
if(($age==21 and $diff_month>=1) or ($age==22)){	$kakekin_tsukigaku_two=3760*$A_su + 3310*$B_su;}
if(($age==22 and $diff_month>=1) or ($age==23)){	$kakekin_tsukigaku_two=3890*$A_su + 3430*$B_su;}
if(($age==23 and $diff_month>=1) or ($age==24)){	$kakekin_tsukigaku_two=4035*$A_su + 3555*$B_su;}
if(($age==24 and $diff_month>=1) or ($age==25)){	$kakekin_tsukigaku_two=4185*$A_su + 3690*$B_su;}
if(($age==25 and $diff_month>=1) or ($age==26)){	$kakekin_tsukigaku_two=4340*$A_su + 3830*$B_su;}
if(($age==26 and $diff_month>=1) or ($age==27)){	$kakekin_tsukigaku_two=4510*$A_su + 3980*$B_su;}
if(($age==27 and $diff_month>=1) or ($age==28)){	$kakekin_tsukigaku_two=4690*$A_su + 4140*$B_su;}
if(($age==28 and $diff_month>=1) or ($age==29)){	$kakekin_tsukigaku_two=4880*$A_su + 4315*$B_su;}
if(($age==29 and $diff_month>=1) or ($age==30)){	$kakekin_tsukigaku_two=5085*$A_su + 4495*$B_su;}
if(($age==30 and $diff_month>=1) or ($age==31)){	$kakekin_tsukigaku_two=5305*$A_su + 4690*$B_su;}
if(($age==31 and $diff_month>=1) or ($age==32)){	$kakekin_tsukigaku_two=5540*$A_su + 4900*$B_su;}
if(($age==32 and $diff_month>=1) or ($age==33)){	$kakekin_tsukigaku_two=5790*$A_su + 5125*$B_su;}
if(($age==33 and $diff_month>=1) or ($age==34)){	$kakekin_tsukigaku_two=6060*$A_su + 5370*$B_su;}
if(($age==34 and $diff_month>=1) or ($age==35)){	$kakekin_tsukigaku_two=6355*$A_su + 5635*$B_su;}
if(($age==35 and $diff_month>=1) or ($age==36)){	$kakekin_tsukigaku_two=3335*$A_su + 2960*$B_su;}
if(($age==36 and $diff_month>=1) or ($age==37)){	$kakekin_tsukigaku_two=3510*$A_su + 3115*$B_su;}
if(($age==37 and $diff_month>=1) or ($age==38)){	$kakekin_tsukigaku_two=3700*$A_su + 3285*$B_su;}
if(($age==38 and $diff_month>=1) or ($age==39)){	$kakekin_tsukigaku_two=3910*$A_su + 3475*$B_su;}
if(($age==39 and $diff_month>=1) or ($age==40)){	$kakekin_tsukigaku_two=4135*$A_su + 3680*$B_su;}
if(($age==40 and $diff_month>=1) or ($age==41)){	$kakekin_tsukigaku_two=4390*$A_su + 3905*$B_su;}
if(($age==41 and $diff_month>=1) or ($age==42)){	$kakekin_tsukigaku_two=4670*$A_su + 4160*$B_su;}
if(($age==42 and $diff_month>=1) or ($age==43)){	$kakekin_tsukigaku_two=4985*$A_su + 4445*$B_su;}
if(($age==43 and $diff_month>=1) or ($age==44)){	$kakekin_tsukigaku_two=5340*$A_su + 4765*$B_su;}
if(($age==44 and $diff_month>=1) or ($age==45)){	$kakekin_tsukigaku_two=5745*$A_su + 5130*$B_su;}
if(($age==45 and $diff_month>=1) or ($age==46)){	$kakekin_tsukigaku_two=6205*$A_su + 5545*$B_su;}
if(($age==46 and $diff_month>=1) or ($age==47)){	$kakekin_tsukigaku_two=6735*$A_su + 6025*$B_su;}
if(($age==47 and $diff_month>=1) or ($age==48)){	$kakekin_tsukigaku_two=7355*$A_su + 6590*$B_su;}
if(($age==48 and $diff_month>=1) or ($age==49)){	$kakekin_tsukigaku_two=8090*$A_su + 7255*$B_su;}
if(($age==49 and $diff_month>=1) or ($age==50)){	$kakekin_tsukigaku_two=8970*$A_su + 8055*$B_su;}

//echo '<br>';
//echo '掛金月額(1口目):'.$kakekin_tsukigaku_one.'<br>';
//echo '掛金月額(2口目):'.$kakekin_tsukigaku_two.'<br>';

$kakekin_tsukigaku = $kakekin_tsukigaku_one + $kakekin_tsukigaku_two;
//echo '掛金月額(合計):'.$kakekin_tsukigaku.'<br>';

//***************************************************************************************************
//◆受給額計算
//***************************************************************************************************
$kihon_jukyu_gaku = 0;
$kihon_jukyu_gaku_1st = 0;
$kihon_jukyu_gaku_2nd = 0;

//◆1口目
if($age==20){										$kihon_jukyu_gaku_1st=20000*12;}
if(($age==20 and $diff_month>=1) or ($age==21)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==21 and $diff_month>=1) or ($age==22)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==22 and $diff_month>=1) or ($age==23)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==23 and $diff_month>=1) or ($age==24)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==24 and $diff_month>=1) or ($age==25)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==25 and $diff_month>=1) or ($age==26)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==26 and $diff_month>=1) or ($age==27)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==27 and $diff_month>=1) or ($age==28)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==28 and $diff_month>=1) or ($age==29)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==29 and $diff_month>=1) or ($age==30)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==30 and $diff_month>=1) or ($age==31)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==31 and $diff_month>=1) or ($age==32)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==32 and $diff_month>=1) or ($age==33)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==33 and $diff_month>=1) or ($age==34)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==34 and $diff_month>=1) or ($age==35)){	$kihon_jukyu_gaku_1st=20000*12;}
if(($age==35 and $diff_month>=1) or ($age==36)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==36 and $diff_month>=1) or ($age==37)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==37 and $diff_month>=1) or ($age==38)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==38 and $diff_month>=1) or ($age==39)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==39 and $diff_month>=1) or ($age==40)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==40 and $diff_month>=1) or ($age==41)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==41 and $diff_month>=1) or ($age==42)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==42 and $diff_month>=1) or ($age==43)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==43 and $diff_month>=1) or ($age==44)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==44 and $diff_month>=1) or ($age==45)){	$kihon_jukyu_gaku_1st=15000*12;}
if(($age==45 and $diff_month>=1) or ($age==46)){	$kihon_jukyu_gaku_1st=10000*12;}
if(($age==46 and $diff_month>=1) or ($age==47)){	$kihon_jukyu_gaku_1st=10000*12;}
if(($age==47 and $diff_month>=1) or ($age==48)){	$kihon_jukyu_gaku_1st=10000*12;}
if(($age==48 and $diff_month>=1) or ($age==49)){	$kihon_jukyu_gaku_1st=10000*12;}
if(($age==49 and $diff_month>=1) or ($age==50)){	$kihon_jukyu_gaku_1st=10000*12;}

//◆2口目以降
if($age==20){										$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==20 and $diff_month>=1) or ($age==21)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==21 and $diff_month>=1) or ($age==22)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==22 and $diff_month>=1) or ($age==23)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==23 and $diff_month>=1) or ($age==24)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==24 and $diff_month>=1) or ($age==25)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==25 and $diff_month>=1) or ($age==26)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==26 and $diff_month>=1) or ($age==27)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==27 and $diff_month>=1) or ($age==28)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==28 and $diff_month>=1) or ($age==29)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==29 and $diff_month>=1) or ($age==30)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==30 and $diff_month>=1) or ($age==31)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==31 and $diff_month>=1) or ($age==32)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==32 and $diff_month>=1) or ($age==33)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==33 and $diff_month>=1) or ($age==34)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==34 and $diff_month>=1) or ($age==35)){	$kihon_jukyu_gaku_2nd=(10000*($A_su+$B_su)*12);}
if(($age==35 and $diff_month>=1) or ($age==36)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==36 and $diff_month>=1) or ($age==37)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==37 and $diff_month>=1) or ($age==38)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==38 and $diff_month>=1) or ($age==39)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==39 and $diff_month>=1) or ($age==40)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==40 and $diff_month>=1) or ($age==41)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==41 and $diff_month>=1) or ($age==42)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==42 and $diff_month>=1) or ($age==43)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==43 and $diff_month>=1) or ($age==44)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==44 and $diff_month>=1) or ($age==45)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==45 and $diff_month>=1) or ($age==46)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==46 and $diff_month>=1) or ($age==47)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==47 and $diff_month>=1) or ($age==48)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==48 and $diff_month>=1) or ($age==49)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}
if(($age==49 and $diff_month>=1) or ($age==50)){	$kihon_jukyu_gaku_2nd=(5000*($A_su+$B_su)*12);}

$kihon_jukyu_gaku = $kihon_jukyu_gaku_1st + $kihon_jukyu_gaku_2nd;

$tani_kasan_gaku = 0;
$tani_kasan_gaku_one = 0;
$tani_kasan_gaku_two = 0;

//***************************************************************************************************
//◆加算月数による加算
//  (加算月数:ご加入の翌月から次年齢に到達する月までの月数)
//　(※2口目以降の加算額は全型共通)
//***************************************************************************************************
//◆1口目(男性:終身年金(AorB))
	if($diff_month == 0){
		$kasan_tsukisu = 0;
	}else{
		$kasan_tsukisu = 12 - $diff_month;
	}

	//echo '加算月数:'.$kasan_tsukisu.'<br>';

	if($age == 20){$tani_kasan_gaku_one = 676*$kasan_tsukisu;}
	if($age == 21){$tani_kasan_gaku_one = 688*$kasan_tsukisu;}
	if($age == 22){$tani_kasan_gaku_one = 704*$kasan_tsukisu;}
	if($age == 23){$tani_kasan_gaku_one = 720*$kasan_tsukisu;}
	if($age == 24){$tani_kasan_gaku_one = 736*$kasan_tsukisu;}
	if($age == 25){$tani_kasan_gaku_one = 752*$kasan_tsukisu;}
	if($age == 26){$tani_kasan_gaku_one = 768*$kasan_tsukisu;}
	if($age == 27){$tani_kasan_gaku_one = 788*$kasan_tsukisu;}
	if($age == 28){$tani_kasan_gaku_one = 808*$kasan_tsukisu;}
	if($age == 29){$tani_kasan_gaku_one = 828*$kasan_tsukisu;}
	if($age == 30){$tani_kasan_gaku_one = 848*$kasan_tsukisu;}
	if($age == 31){$tani_kasan_gaku_one = 872*$kasan_tsukisu;}
	if($age == 32){$tani_kasan_gaku_one = 900*$kasan_tsukisu;}
	if($age == 33){$tani_kasan_gaku_one = 928*$kasan_tsukisu;}
	if($age == 34){$tani_kasan_gaku_one = 960*$kasan_tsukisu;}
	if($age == 35){$tani_kasan_gaku_one = 744*$kasan_tsukisu;}
	if($age == 36){$tani_kasan_gaku_one = 771*$kasan_tsukisu;}
	if($age == 37){$tani_kasan_gaku_one = 801*$kasan_tsukisu;}
	if($age == 38){$tani_kasan_gaku_one = 834*$kasan_tsukisu;}
	if($age == 39){$tani_kasan_gaku_one = 867*$kasan_tsukisu;}
	if($age == 40){$tani_kasan_gaku_one = 906*$kasan_tsukisu;}
	if($age == 41){$tani_kasan_gaku_one = 951*$kasan_tsukisu;}
	if($age == 42){$tani_kasan_gaku_one = 999*$kasan_tsukisu;}
	if($age == 43){$tani_kasan_gaku_one = 1056*$kasan_tsukisu;}
	if($age == 44){$tani_kasan_gaku_one = 1116*$kasan_tsukisu;}
	if($age == 45){$tani_kasan_gaku_one = 792*$kasan_tsukisu;}
	if($age == 46){$tani_kasan_gaku_one = 848*$kasan_tsukisu;}
	if($age == 47){$tani_kasan_gaku_one = 910*$kasan_tsukisu;}
	if($age == 48){$tani_kasan_gaku_one = 986*$kasan_tsukisu;}
	if($age == 49){$tani_kasan_gaku_one = 1076*$kasan_tsukisu;}

//◆2口目以降
	if($age == 20){$tani_kasan_gaku_two = 338*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 21){$tani_kasan_gaku_two = 344*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 22){$tani_kasan_gaku_two = 352*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 23){$tani_kasan_gaku_two = 360*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 24){$tani_kasan_gaku_two = 368*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 25){$tani_kasan_gaku_two = 376*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 26){$tani_kasan_gaku_two = 384*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 27){$tani_kasan_gaku_two = 394*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 28){$tani_kasan_gaku_two = 404*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 29){$tani_kasan_gaku_two = 414*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 30){$tani_kasan_gaku_two = 424*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 31){$tani_kasan_gaku_two = 436*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 32){$tani_kasan_gaku_two = 450*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 33){$tani_kasan_gaku_two = 464*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 34){$tani_kasan_gaku_two = 480*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 35){$tani_kasan_gaku_two = 248*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 36){$tani_kasan_gaku_two = 257*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 37){$tani_kasan_gaku_two = 267*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 38){$tani_kasan_gaku_two = 278*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 39){$tani_kasan_gaku_two = 289*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 40){$tani_kasan_gaku_two = 302*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 41){$tani_kasan_gaku_two = 317*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 42){$tani_kasan_gaku_two = 333*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 43){$tani_kasan_gaku_two = 352*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 44){$tani_kasan_gaku_two = 372*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 45){$tani_kasan_gaku_two = 396*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 46){$tani_kasan_gaku_two = 424*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 47){$tani_kasan_gaku_two = 455*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 48){$tani_kasan_gaku_two = 493*$kasan_tsukisu*($A_su+$B_su);}
	if($age == 49){$tani_kasan_gaku_two = 538*$kasan_tsukisu*($A_su+$B_su);}

$jukyu_gaku = $kihon_jukyu_gaku + $tani_kasan_gaku_one + $tani_kasan_gaku_two;
//echo '<br>年間支給額:'.$jukyu_gaku;

$ideco_kakekin = $_POST['ideco_kakekin'];
if($ideco_kakekin == 99){
	//国民年金基金と同じ金額を設定
	$ideco_kakekin = $kakekin_tsukigaku + (1000 - $kakekin_tsukigaku%1000)%1000;
}else{
	$ideco_kakekin = $_POST['ideco_kakekin'];
}

$kikin_plami = 0;
$ideco_plami = 0;
$ideco_jukyu = 0;
$now_month = date('m');

$kikin_plami_max = 0;
$ideco_plami_max = 0;

//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
//LOOPスタート
//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
//85歳までシュミレーション		
$age_cnt = 85 - $age + 1;
$ideco_unyoeki = 0;

$kikin_backup_age = 0;
$ideco_backup_age = 0;

$kinzoku_year = 0;
$taisyoku_syotoku_kojo_a = 0;
$taisyoku_syotoku_kojo_b = 0;
$taisyoku_syotoku = 0;

$syotokuzei = 0;
$juminzei = 0;

for ($i=0;$i<$age_cnt;$i++){

	$kikin_kakekin = 0;
	$ideco_kakekin_sum= 0;

	//グラフ出力用データ格納
	//◆年齢
	$age_ary[] = $age;

	//******************************************
	//国民年基金掛金
	//******************************************
	//国民年基金掛金
	if($age < 60){
		//◆掛金
		if($i == 0){
			//加入年が年の途中であれば12月までの期間分の掛け金を算出
			$kikin_kakekin = $kakekin_tsukigaku * (12 - $now_month + 1) * -1;
		}else{
			$kikin_kakekin = $kakekin_tsukigaku * 12 * -1;
		}
		//◆差引
		$kikin_plami = $kikin_plami + ($kakekin_tsukigaku * 12 * -1);
	}

	//国民年基金受給額
	if($age >= 65){
		//◆掛金
		$kikin_kakekin = 0;
		//◆差引
		$kikin_plami = $kikin_plami + $jukyu_gaku;

		if($kikin_plami >= 0){
			if($kikin_backup_age == 0){
				$kikin_backup_age = $age;
			}
		}
	}
	
	//受給額退避
	if($age == 65){
		$kikin_jukyu = round($jukyu_gaku/12,0);
	}

	$kikin_kakekin_ary[] = $kikin_kakekin /10000;
	$kikin_plami_ary[] = $kikin_plami /10000;

	//******************************************
	//iDeCo
	//******************************************
	$ideco_kakekin_year = 0;
	
	if($age < 60){
		if($i == 0){
			//加入年が年の途中であれば12月までの期間分の掛け金に対して運用益を算出
			$ideco_unyoeki = round($ideco_unyoeki + (($ideco_kakekin * (12 - $now_month + 1))) * $ideco_rate,0);
			$ideco_kakekin_year = $ideco_kakekin * (12 - $now_month + 1) * -1;
			//echo $ideco_unyoeki.'<br>';

		}else{
			$ideco_unyoeki = round(($ideco_unyoeki + $ideco_kakekin * 12) * $ideco_rate,0);
			$ideco_kakekin_year = $ideco_kakekin * 12 * -1;
			//echo $ideco_unyoeki.'<br>';
		}
		
		$ideco_plami = $ideco_plami + $ideco_kakekin_year;
	}

	//59歳時点で掛金累計金額を算出
	if($age == 59){
		//◆国民年金基金
		$kikin_plami_max = $kikin_plami * -1;
		//◆iDeCo
		$ideco_plami_max = $ideco_plami * -1;
	}

	//60歳一括受取
	if($age == 60){
	
		//退職所得として税金が掛かるか算出
		$kinzoku_year = 60 - $age_save;
		
		if($kinzoku_year <= 20){
			$taisyoku_syotoku_kojo = $kinzoku_year * 400000;
		}else{
			$taisyoku_syotoku_kojo_a = 20 * 400000;
			$taisyoku_syotoku_kojo_b = ($kinzoku_year - 20) * 700000;
			$taisyoku_syotoku_kojo = $taisyoku_syotoku_kojo_a + $taisyoku_syotoku_kojo_b;
		}

		$taisyoku_syotoku = ($ideco_unyoeki - $taisyoku_syotoku_kojo) * 0.5;

		//echo '勤続年数:'.$kinzoku_year.'<br>';
		//echo '退職所得控除:'.$taisyoku_syotoku_kojo.'<br/>';
		//echo '退職所得:'.$taisyoku_syotoku;

		if($taisyoku_syotoku > 0){
			$syotokuzei = 0;
			if($taisyoku_syotoku>=1000){$syotokuzei=$taisyoku_syotoku*0.05;}
			if($taisyoku_syotoku>=1950000){$syotokuzei=$taisyoku_syotoku*0.10-97500;}
			if($taisyoku_syotoku>=3300000){$syotokuzei=$taisyoku_syotoku*0.20-427500;}
			if($taisyoku_syotoku>=6950000){$syotokuzei=$taisyoku_syotoku*0.23-636000;}
			if($taisyoku_syotoku>=9000000){$syotokuzei=$taisyoku_syotoku*0.33-1536000;}
			if($taisyoku_syotoku>=18000000){$syotokuzei=$taisyoku_syotoku*0.40-2796000;}
			if($taisyoku_syotoku>=40000000){$syotokuzei=$taisyoku_syotoku*0.45-4796000;}

			$juminzei = $taisyoku_syotoku * 0.1;
		}else{
			$juminzei = 0;
			$syotokuzei = 0;
		}
	
		$ideco_plami = $ideco_plami + $ideco_unyoeki;
		$ideco_jukyu = round($ideco_unyoeki - $syotokuzei - $juminzei,0);
		
		if($ideco_plami >= 0){
			$ideco_backup_age = $age;
		}else{
			$ideco_backup_age = '--';
		}
	}
	$ideco_kakekin_ary[] = $ideco_kakekin_year /10000;
	$ideco_unyoeki_ary[] = $ideco_unyoeki /10000;
	$ideco_plami_ary[] = $ideco_plami /10000;

	//******************************************
	//共通
	//******************************************
	//受給額

	//60歳一括受取(iDeCo)
	if($age == 60){
		$common_jukyu_gaku = $ideco_unyoeki;
	}else{
		$common_jukyu_gaku = 0;
	}

	//受給額(国民年基金)
	if($age >= 65){
		$common_jukyu_gaku = $jukyu_gaku;
	}

	$common_jukyu_gaku_ary[] = $common_jukyu_gaku /10000;

	$age = $age + 1;

}

//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
//表出力用データ作成
//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
$age_td ='';
foreach($age_ary as $value){
	$age_td = $age_td.'<th>'.$value.'</th>';
}

//********************************************
//◆国民年金基金
//********************************************
$kikin_kakekin_td = '';
$common_jukyu_gaku_td = '';
$kikin_plami_td = '';

foreach($kikin_kakekin_ary as $value){
	$kikin_kakekin_td = $kikin_kakekin_td.'<td>'.$value.'</td>';
}

foreach($common_jukyu_gaku_ary as $value){
	$common_jukyu_gaku_td = $common_jukyu_gaku_td.'<td>'.$value.'</td>';
}

foreach($kikin_plami_ary as $value){
	$kikin_plami_td = $kikin_plami_td.'<td>'.$value.'</td>';
}

//********************************************
//◆iDeCo
//********************************************
$ideco_kakekin_td = '';
$ideco_unyoeki_td = '';
$ideco_plami_td = '';

foreach($ideco_kakekin_ary as $value){
	$ideco_kakekin_td = $ideco_kakekin_td.'<td>'.$value.'</td>';
}

foreach($ideco_unyoeki_ary as $value){
	$ideco_unyoeki_td = $ideco_unyoeki_td.'<td>'.$value.'</td>';
}

foreach($ideco_plami_ary as $value){
	$ideco_plami_td = $ideco_plami_td.'<td>'.$value.'</td>';
}

//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
//グラフ①出力
//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
$age_csv = "'".implode("','",$age_ary)."'";
//********************************************
//◆国民年金基金
//********************************************
$kikin_kakekin_csv = "'".implode("','",$kikin_kakekin_ary)."'";
$common_jukyu_gaku_csv = "'".implode("','",$common_jukyu_gaku_ary)."'";
$kikin_plami_csv = "'".implode("','",$kikin_plami_ary)."'";

//********************************************
//◆iDeCo
//********************************************
$ideco_kakekin_csv = "'".implode("','",$ideco_kakekin_ary)."'";
$ideco_plami_csv = "'".implode("','",$ideco_plami_ary)."'";
//$ideco_jukyu_csv = "'".implode("','",$ideco_jukyu_ary)."'";

echo "<script>";
echo "window.onload = function() {";
echo "FixedMidashi.create();";

echo "    ctx = document.getElementById('canvas_01').getContext('2d');";
echo "    ctx.canvas.height = 120;";
echo "    window.myBar = new Chart(ctx, {";
echo "        type: 'bar',";
echo "        data: barChartData,";
echo "        options: complexChartOption";
echo "    });";
echo "};";

echo "var barChartData = {";
echo "    labels: [".$age_csv."],";
echo "    datasets: [";

//◆1本目(掛金(基金))(左)
echo "    {";
echo "        type: 'bar',";
echo "        label: '掛金(年金基金)',";
echo "        data: [".$kikin_kakekin_csv."],";
echo "        borderColor : 'rgba(0,0,205,0.8)',";
echo "        backgroundColor : 'rgba(0,0,205,0.5)',";
echo "        yAxisID: 'y-axis-1',";
echo "    },";

//◆1本目(掛金(iDeCo))(左)
echo "    {";
echo "        type: 'bar',";
echo "        label: '掛金(iDeCo)',";
echo "        data: [".$ideco_kakekin_csv."],";
echo "        borderColor : 'rgba(54,164,235,0.8)',";
echo "        backgroundColor : 'rgba(54,164,235,0.5)',";
echo "        yAxisID: 'y-axis-1',";
echo "    },";

//◆2本目(受給額(基金))(左)
echo "    {";
echo "        type: 'bar',";
echo "        label: '受給額',";
echo "        data: [".$common_jukyu_gaku_csv."],";
echo "        borderColor : 'rgba(0,128,0,0.8)',";
echo "        backgroundColor : 'rgba(0,128,0,0.5)',";
echo "        yAxisID: 'y-axis-1',";
echo "    },";

//◆3本目(差引(基金))(右)
echo "    {";
echo "        type: 'line',";
echo "        label: '収支(年金基金)',";
echo "        data: [".$kikin_plami_csv."],";
echo "        borderColor : 'rgba(254,97,132,0.8)',";
echo "        backgroundColor : 'rgba(254,97,132,0.5)',";
echo "        yAxisID: 'y-axis-2',";
echo "    },";

//◆3本目(差引(iDeCo))(右)
echo "    {";
echo "        type: 'line',";
echo "        label: '収支(iDeCo)',";
echo "        data: [".$ideco_plami_csv."],";
echo "        borderColor : 'rgba(255,165,0,0.8)',";
echo "        backgroundColor : 'rgba(255,165,0,0.5)',";
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

echo "<div id='grf_rap'>";
	echo "<div id='grf_area'>";
	echo "    <canvas id='canvas_01'></canvas>";
	echo "</div>";
	echo "<div style='float:left;font-size:12px;margin:0 0 0 6px;'>【60歳】iDeCo加入により支払われる一時金　</br>【65歳～】国民年金基金加入により支払われる年金</div>";
echo "</div>";

//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
//表出力
//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
//echo "<div id='scroller'>";
//echo "<table id='resultTbl' _fixedhead='rows:1; cols:1;'>";
//echo "        <tr><th>年齢</th>".$age_td."</tr>";
//echo "        <tr><td id='age'>掛金</td>".$kikin_kakekin_td."</tr>";
//echo "        <tr><td id='age'>受給額</td>".$common_jukyu_gaku_td."</tr>";
//echo "        <tr><td id='age'>差引</td>".$kikin_plami_td."</tr>";
//echo "</table>";
//echo "</div>";

echo "<div id='info_rap'>";

	echo "<script async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>";
	echo "<ins class='adsbygoogle'";
	echo "     style='display:block'";
	echo "     data-ad-client='ca-pub-7384099347990686'";
	echo "     data-ad-slot='9568557043'";
	echo "     data-ad-format='auto'";
	echo "     data-full-width-responsive='true'></ins>";
	echo "<script>";
	echo "(adsbygoogle = window.adsbygoogle || []).push({});";
	echo "</script>";

echo "<div style='width:90%;margin:0 auto 0 auto;'>";
	echo "<div style='border-bottom:1px solid #ccc;padding:0 0 10px 0;text-align:center;font-size:25px;margin:30px 0 12px;'>国民年金基金</div>";
	echo "<table><tr><td>毎月の掛金</td><td><span class='money'>".$kakekin_tsukigaku."</span><span class='yen'>円</span><br/><span style='font-size:13px;'>(実際の金額は百円単位)</span></td></tr>";
	echo "		<tr><td>掛金の累計金額</td><td><span class='money'>".$kikin_plami_max."</span><span class='yen'>円</span></td></tr>";
	echo "		<tr><td>毎月の年金額</td><td><span class='money'>".$kikin_jukyu."</span><span class='yen'>円</span></td></tr>";
	echo "</table>";

	echo "<div style='border-bottom:1px solid #ccc;padding:0 0 10px 0;text-align:center;font-size:25px;margin:30px 0 12px;'>iDeCo</div>";
	echo "<table><tr><td>毎月の掛金<td><span class='money'>".$ideco_kakekin."</span><span class='yen'>円</span></td></tr>";
	echo "<tr><td>掛金の累計金額</td><td><span class='money'>".$ideco_plami_max."</span><span class='yen'>円</span></td></tr>";
	echo "<tr><td>一時金</td><td><span class='money'>".$ideco_jukyu."</span><span class='yen'>円(税引後)</span><span style='font-size:16px'><br />(所得税:".round($syotokuzei,0)."円 住民税:".round($juminzei,0)."円)</span></td></tr>";
	echo "</table>";

	echo "<div style='border-bottom:1px solid #ccc;padding:0 0 10px 0;text-align:center;font-size:25px;margin:30px 0 12px;'>";
	echo "掛金を回収できる年齢<br>";
	echo "<span style='font-size:13px;text-align:center;'>(掛金の節税効果は考慮せず)</span>";
	echo "</div>";
	echo "<table><tr><td>国民年金基金<td><span class='money'>".$kikin_backup_age."</span><span class='yen'>歳</span></td></tr>";
	echo "<tr><td>iDeCo</td><td><span class='money'>".$ideco_backup_age."</span><span class='yen'>歳</span></td></tr>";
	echo "</table>";

	echo "</div>";
?>
