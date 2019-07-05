<?php
if(isset($_POST['age'])){
 setcookie('free_sal_workstyle', $_POST['workstyle'], time() + 7776000);
 setcookie('free_sal_age', $_POST['age'], time() + 7776000);
 setcookie('free_sal_free_income', $_POST['free_income'], time() + 7776000);
 setcookie('free_sal_sal_income', $_POST['sal_income'], time() + 7776000);
 setcookie('free_sal_sal_year', $_POST['sal_year'], time() + 7776000);
 setcookie('free_sal_haigusya', $_POST['haigusya'], time() + 7776000);
 setcookie('free_sal_child1', $_POST['child1'], time() + 7776000);
 setcookie('free_sal_child2', $_POST['child2'], time() + 7776000);
 setcookie('free_sal_child3', $_POST['child3'], time() + 7776000);
 setcookie('free_sal_home', $_POST['home'], time() + 7776000);
 setcookie('free_sal_ryohi', $_POST['ryohi'], time() + 7776000);
 setcookie('free_sal_it', $_POST['it'], time() + 7776000);
 setcookie('free_sal_book', $_POST['book'], time() + 7776000);
 setcookie('free_sal_settai', $_POST['settai'], time() + 7776000);
 setcookie('free_sal_lunch', $_POST['lunch'], time() + 7776000);
 setcookie('free_sal_sonota_seikatsuhi', $_POST['sonota_seikatsuhi'], time() + 7776000);
 setcookie('free_sal_retire', $_POST['retire'], time() + 7776000);
 setcookie('free_sal_saving', $_POST['saving'], time() + 7776000);
 setcookie('free_sal_car', $_POST['car'], time() + 7776000);
 setcookie('free_sal_car_by_year', $_POST['car_by_year'], time() + 7776000);
 setcookie('free_sal_retire_plan', $_POST['retire_plan'], time() + 7776000);
 setcookie('free_sal_iryohi_kami', $_POST['iryohi_kami'], time() + 7776000);
 setcookie('free_sal_trip', $_POST['trip'], time() + 7776000);
 setcookie('free_sal_hoken1', $_POST['hoken1'], time() + 7776000);
 setcookie('free_sal_hoken_zan1', $_POST['hoken_zan1'], time() + 7776000);
 setcookie('free_sal_hoken2', $_POST['hoken2'], time() + 7776000);
 setcookie('free_sal_hoken_zan2', $_POST['hoken_zan2'], time() + 7776000);
 setcookie('free_sal_senjusya', $_POST['senjusya'], time() + 7776000);
 setcookie('free_sal_syokibo', $_POST['syokibo'], time() + 7776000);
 setcookie('free_sal_child1_type', $_POST['child1_type'], time() + 7776000);
 setcookie('free_sal_child2_type', $_POST['child2_type'], time() + 7776000);
 setcookie('free_sal_child3_type', $_POST['child3_type'], time() + 7776000);
 setcookie('free_sal_ideco', $_POST['ideco'], time() + 7776000);
 setcookie('free_sal_ideco_rate', $_POST['ideco_rate'], time() + 7776000);
 setcookie('free_sal_ideco_in_year', $_POST['ideco_in_year'], time() + 7776000);
 setcookie('free_sal_syokibo_in_year', $_POST['syokibo_in_year'], time() + 7776000);
 }
 ?>
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
	background-color:#F0F0F0;
}
.midashi_head{
    padding:8px;
    font-weight:600;
    font-size:13px;
    margin:0 0 8px 0;
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
		border-radius:5px;
		box-shadow: 2px 2px 4px #CCCCCC;
		padding:15px 0 15px 0px;
	}
	#fp_ad{
		padding:12px;
		margin-bottom:8px;
	}
	.title_name{
		font-family:'Kosugi Maru';
		font-size:18px;
		font-weight:700;
	    border-bottom:solid 2px #777777;
	    padding:1% 0 1% 0;
		margin:20px 0 10px 0px;
		text-align:center;
	}
	#range_rap{
		width:91%;
		overflow:scroll;
		background-color:#ffffff;
		border-radius:5px;
		box-shadow: 2px 2px 4px #CCCCCC;
		padding:15px 15px 15px 15px;
		font-family:'Kosugi Maru';
		margin:10px 0 0 0;
	}
	#o_age{
		font-family:'Kosugi Maru';
		font-size:15px;
		text-align:center;
	}
	#o_age div{
		margin:0 0 14px 0;
	}
	#zei_calc{
		margin:5px 0 0 0;
		font-size:12px;
	}
	.zei_calc_title{
		margin:20px 0 6px 0;
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
		height:400px;
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
		/*width:80%;*/
		width:70%;
		background-color:#ffffff;
		border-radius:5px;
		/*box-shadow: 2px 2px 4px #CCCCCC;*/
		/*padding:4% 3% 2% 3%;*/
		padding:2% 0.6% 2% 0.6%;
		margin:0 0 10px 2%;
		float:left;
	}
	#fp_ad{
		padding:12px;
		margin-bottom:8px;
		min-height:250px;
	}
	.case_title{
		font-family:'Kosugi Maru';
		font-size:22px;
		font-weight:700;
	    padding:1% 0 1% 0;
	    wiidth:95%;
		margin:15px 0 10px 0px;
	}
	.title_name{
		font-family:'Kosugi Maru';
		font-size:22px;
		font-weight:700;
	    border-bottom:solid 2px #777777;
	    padding:1% 0 1% 0;
	    wiidth:90%;
		margin:15px 0 10px 0px;
		text-align:center;
	}
	#grf_range_rap{
		background-color:#ffffff;
		border-radius:5px;
		box-shadow: 2px 2px 4px #CCCCCC;
		padding:1% 1% 1% 1%;
		display:table-cell;
		min-width:90%;
	}
	#range_rap{
		width:24%;
		background-color:#ffffff;
		border-radius:5px;
		/*box-shadow: 2px 2px 4px #CCCCCC;*/
		padding:3.5% 1% 2% 1%;
		/*margin:auto;*/
		float:left;
	}
	#o_age{
		font-family:'Kosugi Maru';
		font-size:14px;
		text-align:center;
	}
	#zei_calc{
		margin:5px 0 0 0;
		font-size:12px;
	}
	.zei_calc_title{
		margin:20px 0 6px 0;
	}
}
th{
	font-weight:normal;
	color:#FFFFFF;
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
  /*background: #D19B9B;*/
  /*color: #fff;*/
  background:#FFF0F0;
  color:#000000;
}
#resultTbl tbody td {
  text-align:center;
}

#resultTbl tbody td:first-child#minus{
  background:#f5f5f5;
  /*background:#e6e6fa;*/
  color:#000000;
  /*font-weight:bold;*/
  /*display: table-cell;*/
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}

#resultTbl tbody td:first-child#income{
  background:#FFF0F0;
  /*background:#FFF0F0;*/
  color:#000000;
  /*color:#AA5A5A;*/
  /*font-weight:bold;*/
  /*display: table-cell;*/
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}

#resultTbl tbody td:first-child#age{
  background:#FFF0F0;
  /*color:#006400;*/
  color:#000000;
  /*font-weight:bold;*/
  /*display: table-cell;*/
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}

#resultTbl tbody td:first-child#saving{
  background:#FFCCCC;
  color:#000000;
  /*font-weight:bold;*/
  display: table-cell;
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}
#resultTbl tbody td:first-child#in_sum{
  background:#FFCCCC;
  color:#000000;
  display: table-cell;
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}
#resultTbl tbody td:first-child#out_sum{
  background:#d3d3d3;
  color:#000000;
  display: table-cell;
  vertical-align:middle;
  border: solid 1px #8a8a8a;
}
/*----------------------------*/
/*header                      */
/*----------------------------*/
/*◆固定行*/
#resultTbl tr:first-child{
	/*background-color:#223a70;*/
	background-color:#dbafbe;
	color:white;
	height:19px;
	border: solid 1px #8a8a8a;
}
/*◆固定列*/
#resultTbl td:first-child{
  min-width:70px;
  height:16px;
  border: solid 1px #8a8a8a;
}
#resultTbl td{
  min-width:35px;
  height:18px;
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
.hidden_box {
    margin: 0;/*前後の余白*/
    padding: 0;
}
/*ボタン装飾*/
.hidden_box label {
    /*padding: 3px;*/
    cursor :pointer;

    color:#FFFFFF;
    width:96.5%;
    padding:8px;
    background:#03c4eb;
    font-weight:600;
    font-size:13px;
    margin:0 0 8px 0;
    letter-spacing: 2px;
	display:block;
}
/*チェックは見えなくする*/
.hidden_box input {
    display: none;
}
/*中身を非表示にしておく*/
.hidden_box .hidden_show {
    height: 0;
    padding: 0;
    overflow: hidden;
    opacity: 0;
    transition: 0.8s;
}
/*クリックで中身表示*/
.hidden_box input:checked ~ .hidden_show {
    padding: 0;
    height: auto;
    opacity: 1;
}
.head_title{
	background:#0288D1;
	color:#FFFFFF;
	padding:20px 0 20px 0px;
	margin:0 -2% 15px -2%;
}
/*レンジ*/
input[type=range] {
  -webkit-appearance: none;
  margin: 5px 5% 18px 5%;
  width: 90%;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  /*box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;*/
  /*◆バーの色◆*/
  background: #87ceeb;
  border-radius: 1.3px;
  /*border: 0.2px solid #010101;*/
}
input[type=range]::-webkit-slider-thumb {
  /*box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;*/
  /*border: 1px solid #000000;*/
  height: 20px;
  width: 20px;
  /*border-radius: 3px;*/
  border-radius: 50%;
  /*◆つまみの色◆*/
  background: #0288D1;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -7px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #87ceeb;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  /*box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;*/
  /*◆バーの色◆*/
  background: #87ceeb;
  border-radius: 1.3px;
  /*border: 0.2px solid #010101;*/
}
input[type=range]::-moz-range-thumb {
  /*box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;*/
  border: 1px solid #ffffff;
  height: 20px;
  width: 20px;
  /*border-radius: 3px;*/
  border-radius: 50%;
  /*◆つまみの色◆*/
  background: #0288D1;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  border-width: 16px 0;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #87ceeb;
  /*border: 0.2px solid #010101;*/
  border-radius: 2.6px;
  /*box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;*/
}
input[type=range]::-ms-fill-upper {
  /*◆バーの色◆*/
  background: #87ceeb;
  /*border: 0.2px solid #010101;*/
  border-radius: 2.6px;
  /*box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;*/
}
input[type=range]::-ms-thumb {
  /*box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;*/
  border: 1px solid #ffffff;
  height: 20px;
  width: 20px;
  /*border-radius: 3px;*/
  border-radius: 50%;
  /*◆つまみの色◆*/
  background: #0288D1;
  cursor: pointer;
}
input[type=range]:focus::-ms-fill-lower {
  /*◆バーの色◆*/
  background: #87ceeb;
}
input[type=range]:focus::-ms-fill-upper {
  background: #87ceeb;
}
#calc_table{
	margin:15px auto 12px auto;
}
#calc_table td{
	padding:5px;
}
#calc_table tr:first-child{
	/*background-color:#dbafbe;*/
}

</style>
</head>
<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<?php
//----------------------------------------------
//アクセスログ
$filename = "./log.txt"; //ログファイル名
$time = date("Y/m/d H:i"); //アクセス時刻
$ip = $_SERVER["REMOTE_ADDR"];

if(isset($_POST['age'])){
	$log_age = $_POST['age']; //年齢
}else{
	$log_age = '';
}

if(isset($_POST['saving'])){
	$log_saving = $_POST['saving']; //貯蓄額

	//ログ本文
	$log = $time .",". $ip .",". $log_age . ",". $log_saving."\n" ;

	//ログ書き込み
	$fp = fopen($filename, "a");
	fputs($fp, $log);
	fclose($fp);
}

//----------------------------------------------

//*****************************
//include
//*****************************
include 'func/get_gakuhi.php';
include 'func/get_iryohi.php';
include 'func/get_income_minus_keihi.php';

include 'func/income_calc.php';
include 'func/free_income_calc.php';
include 'func/child_teate_calc.php';

include 'func/outgo_calc.php';

//*****************************
//入力情報
//*****************************
//---------------------------------
//年齢
//---------------------------------
if(isset($_POST['free_income'])){
	$age = abs($_POST['age']);
}else{
	//年齢が未入力の場合はエラー
	echo "<div style='text-align:center;height:100%;'>申し訳ございません。専用入力フォームよりご利用下さい。</div>";
	echo "<div style='text-align:center'><a href='https://www.fp-support-engineer.com/lifeplan/inputdata/index.php'>https://www.fp-support-engineer.com/lifeplan/inputdata/index.php</div>";
	exit;
}

//85歳までシュミレーション		
$age_cnt = 85 - $age + 1;

//---------------------------------
//収入
//---------------------------------
if(isset($_POST['free_income'])){
	$free_income = abs($_POST['free_income']*12);
}else{
	$free_income = 0;
}

if(isset($_POST['sal_income'])){
	$sal_income = abs($_POST['sal_income']*12);
}else{
	$sal_income = 0;		
}

if(isset($_POST['home'])){
	$home = abs($_POST['home']*12);
}else{
	$home = 0;
}

//---------------------------------
//旅行
//---------------------------------
if(isset($_POST['trip'])){
	$trip = abs($_POST['trip']);	
}else{
	$trip = 0;
}

//---------------------------------
//ワークスタイル
//---------------------------------
$workstyle = $_POST['workstyle']; //0:salary 1:free		

echo '<div class="head_title">';
echo '	<div style="font-family:'."'".'Quicksand'."'".';margin-top:20px;font-size:28px;text-align:center;font-weight:bold;">SE-Lifeplan-Simulation</div>';
echo '	<div style="font-family:'."'".'Quicksand'."'".';font-size:17px;text-align:center;margin-bottom:15px;">～Salary man VS Freelance～</div>';
echo '	<div style="font-size:14px;text-align:center;">サラリーマン、フリーランスの生涯収支比較</div>';
//
if($workstyle == 0){
	echo '<div style="font-size:14px;text-align:center;margin-bottom:20px;">(あなたが'.$_POST['age'].'歳のサラリーマンの場合)</div>';
}else{
	echo '<div style="font-size:14px;text-align:center;margin-bottom:20px;">(あなたが'.$_POST['age'].'歳のフリーランスの場合)</div>';
}
//
echo '</div>';

//---------------------------------
//リタイア
//---------------------------------
if(isset($_POST['retire'])){
	if($_POST['retire'] == 0){
		$retire = 60;	
	}else{
		if($age <= abs($_POST['retire'])){
			$retire = abs($_POST['retire']);
		}else{
			$retire = 60;	
		}
	}
}else{
	$retire = 60;	
}

//正社員はリタイア年齢は60歳固定
if($workstyle == 0){
	$retire = 60;	
}

//リタイア年齢
$_SESSION['retire_age'] = $retire;

//余生年数
$_SESSION['yosei'] = 85 - $retire;

//---------------------------------
//貯金
//---------------------------------
$saving_Sal = $_POST['saving'];	
$saving_Free = $_POST['saving'];	

//---------------------------------
//保険
//---------------------------------
if(isset($_POST['hoken1'])){
	$hoken1 = abs($_POST['hoken1']);
}else{
	$hoken1 = 0;
}	
if(isset($_POST['hoken_zan1'])){
	if($hoken1 > 0){
		if(isset($_POST['hoken_zan1'])){
			$hoken_zan1 = abs($_POST['hoken_zan1']);
		}else{
			$hoken_zan1 = 0;
		}
	}else{
		$hoken_zan1 = 0;
	}
}else{
	$hoken_zan1 = 0;
}	

if(isset($_POST['hoken2'])){
	$hoken2 = abs($_POST['hoken2']);
}else{
	$hoken2 = 0;
}	
if(isset($_POST['hoken_zan2'])){
	if($hoken2 > 0){
		if(isset($_POST['hoken_zan2'])){
			$hoken_zan2 = abs($_POST['hoken_zan2']);
		}else{
			$hoken_zan2 = 0;
		}
	}else{
		$hoken_zan2 = 0;
	}
}else{
	$hoken_zan2 = 0;
}	

$hoken1_year_pay = 0;
$hoken2_year_pay = 0;

//1年毎に支払う平均保険料の算出
if($hoken_zan1 == 99){
	$hoken1_year_pay = $hoken1;
}else{
	$hoken1_year_pay = ($hoken1 * $hoken_zan1) / (85 - $age);
}

if($hoken_zan2 == 99){
	$hoken2_year_pay = $hoken2;
}else{
	$hoken2_year_pay = ($hoken2 * $hoken_zan2) / (85 - $age);
}

$_SESSION['hoken_year_pay'] = round(($hoken1_year_pay + $hoken2_year_pay),1);

//---------------------------------
//車
//---------------------------------
if(isset($_POST['car'])){
	$car = abs($_POST['car']);	
}else{
	$car = 0;
}
if(isset($_POST['car_by_year'])){
	$car_by_year = abs($_POST['car_by_year']);	
}else{
	$car_by_year = 0;	
}

//---------------------------------
//配偶者･家族年齢
//---------------------------------
if(isset($_POST['haigusya'])){
	$haigusya_age = abs($_POST['haigusya']);
	if($haigusya_age == ''){
		$haigusya_flg = 0;
		$haigusya_age = 99;
	}else{
		$haigusya_flg = 1;
	}
}else{
	$haigusya_flg = 0;
	$haigusya_age = 99;
}

if(isset($_POST['child1'])){
	$child1_age = $_POST['child1'];
	if($child1_age == ''){
		$child1_flg = 0;
		$child1_age = 99;
	}else{
		$child1_flg = 1;
	}
}else{
	$child1_flg = 0;
	$child1_age = 99;
}

if(isset($_POST['child2'])){
	$child2_age = $_POST['child2'];
	if($child2_age == ''){
		$child2_flg = 0;
		$child2_age = 99;
	}else{
		$child2_flg = 1;
	}
}else{
	$child2_flg = 0;
	$child2_age = 99;
}

if(isset($_POST['child3'])){
	$child3_age = $_POST['child3'];
	if($child3_age == ''){
		$child3_flg = 0;
		$child3_age = 99;
	}else{
		$child3_flg = 1;
	}
}else{
	$child3_flg = 0;
	$child3_age = 99;
}

//最終学歴未入力
if($_POST['child1_type'] == '0'){
	$child1_flg = 0;
	$child1_age = 99;
}
if($_POST['child2_type'] == '0'){
	$child2_flg = 0;
	$child2_age = 99;
}
if($_POST['child3_type'] == '0'){
	$child3_flg = 0;
	$child3_age = 99;
}

$haigusya_nenkin_start_diff = 65 + ($age - $haigusya_age);

$haigusya_age_save = $haigusya_age;
$child1_age_save = $child1_age;
$child2_age_save = $child2_age;
$child3_age_save = $child3_age;

//---------------------------------
//子ども進学タイプ
//---------------------------------
if(isset($_POST['child1_type'])){
	$child1_type = $_POST['child1_type'];
	if($child1_type == ''){
		$child1_type = 99;
	}
}
if(isset($_POST['child2_type'])){
	$child2_type = $_POST['child2_type'];
	if($child2_type == ''){
		$child2_type = 99;
	}
}
if(isset($_POST['child3_type'])){
	$child3_type = $_POST['child3_type'];
	if($child3_type == ''){
		$child3_type = 99;
	}
}
//---------------------------------
//iDeCo
//---------------------------------
if(isset($_POST['ideco'])){
	if(trim($_POST['ideco'])==''){
		$ideco_kakekin = 0;	
	}else{
		$ideco_kakekin = $_POST['ideco'];	
	}
}else{
	$ideco_kakekin = 0;
}

if(isset($_POST['ideco_rate'])){
	if(trim($_POST['ideco_rate'])==''){
		$ideco_rate = 0;	
	}else{
		$ideco_rate = $_POST['ideco_rate'];	
	}
}else{
	$ideco_rate = 0;
}
$ideco_rate = 1 + $ideco_rate / 100;

if(isset($_POST['ideco_in_year'])){
	if(trim($_POST['ideco_in_year'])==''){
		$ideco_in_year = 60;	
	}else{
		$ideco_in_year = $_POST['ideco_in_year'];	
	}
}else{
	$ideco_in_year = 60;
}

if($ideco_kakekin <= 0){
	$ideco_in_year = 99;
}

//---------------------------------
//小規模企業共済
//---------------------------------
if(isset($_POST['syokibo'])){
	if(trim($_POST['syokibo'])==''){
		$syokibo = 0;	
	}else{
		$syokibo = $_POST['syokibo'];	
	}
}else{
	$syokibo = 0;
}

if(isset($_POST['syokibo_in_year'])){
	if(trim($_POST['syokibo_in_year'])==''){
		$syokibo_in_year = 60;	
	}else{
		$syokibo_in_year = $_POST['syokibo_in_year'];	
	}
}else{
	$syokibo_in_year = 60;
}

if($syokibo <= 0){
	$syokibo_in_year = 99;
}

//---------------------------------
//経費関連
//---------------------------------
$ryohi = abs($_POST['ryohi']);
$it = abs($_POST['it']);
$book = abs($_POST['book']);
$settai = abs($_POST['settai']);

//▼住宅ローン関連
if(isset($_POST['home_back_end_age'])){
	$home_back_end_age = abs($_POST['home_back_end_age']);
}else{
	$home_back_end_age = 0;
}

if(isset($_POST['home_back_zankin'])){
	$home_back_zankin = abs($_POST['home_back_zankin']);
}else{
	$home_back_zankin = 0;
}

if(isset($_POST['home_back_year_cnt'])){
	$home_back_year_cnt = $_POST['home_back_year_cnt'];
}else{
	$home_back_year_cnt = 0;
}

$keihi = ($ryohi + $it + $book + $settai + $syokibo + ($home/12*0.3) + $ideco_kakekin) * 12;
$seikatsu_in_keihi = ($ryohi + $it + $book + $settai) * 12;

//---------------------------------
//仕事上の個人的な食費
//---------------------------------
if(isset($_POST['lunch'])){
	$lunch = abs($_POST['lunch']) * 12;	
}else{
	$lunch = 0;
}

//---------------------------------
//その他生活費
//---------------------------------
if(isset($_POST['sonota_seikatsuhi'])){
	$sonota_seikatsuhi = abs($_POST['sonota_seikatsuhi']) * 12;	
}else{
	$sonota_seikatsuhi = 0;
}

$sonota_seikatsuhi = $sonota_seikatsuhi + $lunch;

//---------------------------------
//経費となるが出費ではないもの
//---------------------------------
if(isset($_POST['on_keihi'])){
	$on_keihi = abs($_POST['on_keihi']);
}else{
	$on_keihi = 0;
}

if(isset($_POST['senjusya'])){
	$senjusya = abs($_POST['senjusya']);
}else{
	$senjusya = 0;
}

$no_out_keihi = ($on_keihi + $senjusya) * 12;

//---------------------------------
//一時収支
//---------------------------------
//収支1
if(isset($_POST['add_age1'])){
	$add_age1 = abs($_POST['add_age1']);	
	if($add_age1 == ''){
		$add_age1 = 99;
	}
}else{
	$add_age1 = 99;
}
if(isset($_POST['add_kingaku1'])){
	$add_kingaku1 = $_POST['add_kingaku1'];	
	if($add_kingaku1 == ''){
		$add_kingaku1 = 0;
	}
}else{
	$add_kingaku1 = 0;
}

//収支2
if(isset($_POST['add_age2'])){
	$add_age2 = abs($_POST['add_age2']);	
	if($add_age2 == ''){
		$add_age2 = 99;
	}
}else{
	$add_age2 = 99;
}
if(isset($_POST['add_kingaku2'])){
	$add_kingaku2 = $_POST['add_kingaku2'];	
	if($add_kingaku2 == ''){
		$add_kingaku2 = 0;
	}
}else{
	$add_kingaku2 = 0;
}

//---------------------------------
//ケガ･病気(未収入期間)
//---------------------------------
if(isset($_POST['kega_age'])){
	$kega_age = abs($_POST['kega_age']);	
	if($kega_age == ''){
		$kega_age = 99;
	}
}else{
	$kega_age = 99;
}
if(isset($_POST['kega_month'])){
	$kega_month = abs($_POST['kega_month']);	
	if($kega_month == ''){
		$kega_month = 0;
	}
}else{
	$kega_month = 0;
}

//---------------------------------
//老後ワークスタイル
//---------------------------------
$retire_plan = $_POST['retire_plan']; //0:節約 1:現状維持 2:アクティブ

//---------------------------------
//医療費加味
//---------------------------------
$iryohi_kami = $_POST['iryohi_kami']; //0:する 1:しない		

//---------------------------------
//年金計算用
//---------------------------------
if(isset($_POST['sal_year'])){
	$sal_year = abs($_POST['sal_year'])-1;	
}else{
	$sal_year = 0;
}

$free_year = 40;

//年金額
$nenkin_kanyu_year_after = $retire - $age;
//echo '年金加入期間(未来):'.$nenkin_kanyu_year_after.'<br>';
//echo '年金加入期間(過去):'.$sal_year.'<br>';

//標準月額算出
$hyojun_gaku_a = $sal_income/12;
$hyojun_gaku_b = $sal_income/12;

//*****************************************
//◆正社員としての年金◆
//*****************************************
//将来の標準月額算出
//*****************************************
$hyojun_gaku_sum = 0;
$sal_year_a_cnt = 0;

while ($sal_year_a_cnt < $nenkin_kanyu_year_after){
	if(($age+$sal_year_a_cnt)<=40){
		$hyojun_gaku_a = $hyojun_gaku_a * 1.05;
		$hyojun_gaku_sum = $hyojun_gaku_sum + $hyojun_gaku_a;
	}else{
		if(($age+$sal_year_a_cnt)<=50){
			$hyojun_gaku_a = $hyojun_gaku_a * 1.01;
			$hyojun_gaku_sum = $hyojun_gaku_sum + $hyojun_gaku_a;
		}else{
			$hyojun_gaku_sum = $hyojun_gaku_sum + $hyojun_gaku_a;
		}
	}
	$sal_year_a_cnt++;
}

//*****************************************
//過去の標準月額算出
//*****************************************
$count2 = 0;
while ($count2 < $sal_year){
	if($age - $count2 <= 40){
		$hyojun_gaku_b = $hyojun_gaku_b * 0.95;
	}else{
		if($age - $count2 <= 50){
			$hyojun_gaku_b = $hyojun_gaku_b * 0.99;
		}else{
			$hyojun_gaku_b = $hyojun_gaku_b;
		}
	}
	
	$hyojun_gaku_sum = $hyojun_gaku_sum + $hyojun_gaku_b;
	$count2++;
}

$sal_year_sum = $sal_year_a_cnt+$sal_year;
$hyojun_gaku = $hyojun_gaku_sum/($sal_year_a_cnt+$sal_year);

$kosei_nenkin_jukyu_sal = ($hyojun_gaku * 660 * $sal_year_sum)/10000;
$kokumin_nenkin_jukyu_sal = ($free_year * 2);

//*****************************************
//◆フリーランスとしての年金◆
//*****************************************
//将来の標準月額算出
//*****************************************
$hyojun_gaku_sum = 0;
$sal_year_a_cnt = 0;

//*****************************************
//過去の標準月額算出
//*****************************************
$count2 = 0;
while ($count2 < $sal_year){
	if($age - $count2 <= 40){
		$hyojun_gaku_b = $hyojun_gaku_b * 0.95;
	}else{
		if($age - $count2 <= 50){
			$hyojun_gaku_b = $hyojun_gaku_b * 0.99;
		}else{
			$hyojun_gaku_b = $hyojun_gaku_b;
		}
	}
	
	$hyojun_gaku_sum = $hyojun_gaku_sum + $hyojun_gaku_b;
	$count2++;
}

$sal_year_sum = $sal_year;

//▼異常値チェック
if($sal_year == '' or $sal_year == 0 or $sal_year < 0){
	$hyojun_gaku = $hyojun_gaku_sum;
}else{
	$hyojun_gaku = $hyojun_gaku_sum/($sal_year);
}

//厚生年金受給額
$kosei_nenkin_jukyu_free = ($hyojun_gaku * 660 * $sal_year_sum)/10000;

//国民年金受給額
$kokumin_nenkin_jukyu_free = ($free_year * 2);

//---------------------------------
//勤続年数から退職金算出
//---------------------------------
$kinzoku_nensu = $sal_year + $retire - $age;

//http://www.sangyo-rodo.metro.tokyo.jp/
//卒業後すぐに入社し、普通の能力と成績で勤務した場合の退職金水準」をモデル
//中小企業(10～299人)のモデル退職金(自己都合)
//(http://www.sangyo-rodo.metro.tokyo.jp/toukei/koyou/28chingin_2_8.pdf)
if($kinzoku_nensu >= 0) $taisyokukin = 50;
if($kinzoku_nensu >= 10) $taisyokukin = 114.8;
if($kinzoku_nensu >= 15) $taisyokukin = 225.1;
if($kinzoku_nensu >= 20) $taisyokukin = 380.5;
if($kinzoku_nensu >= 25) $taisyokukin = 562.6;
if($kinzoku_nensu >= 30) $taisyokukin = 749;

//小規模企業共済(初期化)
$syokibo_sum = 0;
//iDeco(初期化)
$ideco_sal_unyoeki = 0;
$ideco_free_unyoeki = 0;

$_SESSION['JuminZeiSal'] = '';		$_SESSION['SyotokuZeiSal'] = '';
$_SESSION['KenpoSal'] = '';			$_SESSION['NenkinSal'] = '';
$_SESSION['JuminZeiFree'] = '';		$_SESSION['SyotokuZeiFree'] = '';
$_SESSION['KenpoFree'] = '';		$_SESSION['NenkinFree'] = '';
$_SESSION['Gakuhi'] = '';			$_SESSION['SyokiboKigyo_Sum'] = '';
$_SESSION['KihonSeikatsuHiFree'] = '';	$_SESSION['KihonSeikatsuHiSal'] = '';
$_SESSION['Syokibo_unit'] = '';			$_SESSION['Iryohi'] = '';
$_SESSION['Sal_nenkin_in'] = '';		$_SESSION['Free_nenkin_in'] = '';
$_SESSION['Child_Teate'] = '';			$_SESSION['Kyuyo_Hosyu_Sal'] = '';
$_SESSION['Kyuyo_Hosyu_Free'] = '';		$_SESSION['TaisyokuKin'] = '';
$_SESSION['SyokiboKigyo_in'] = '';		$_SESSION['add_minus_kingaku'] = '';
$_SESSION['add_plus_kingaku'] = '';		$_SESSION['Jutaku_loan_kanpu'] = '';
$_SESSION['child_plan'] = '';			
$_SESSION['ideco_sal_in'] = '';			$_SESSION['ideco_free_in'] = '';
$_SESSION['ideco_sal_unit'] = '';		$_SESSION['ideco_free_unit'] = '';

$_SESSION['KENKO_HOKEN_SAL_CALC'] = '';
$_SESSION['KENKO_HOKEN_FREE_CALC'] = '';

$_SESSION['SYOTOKU_ZEI_CALC'] = '';
$_SESSION['INCOME_MINUS_KEIHI']= '';

$_SESSION['SYAKAI_HOKEN_KOJO_SAL_CALC'] = '';
$_SESSION['SYAKAI_HOKEN_KOJO_FREE_CALC'] = '';
$_SESSION['income_59_sal'] = '';

$ideco_kakekin_sum_ary = '';

$syobyo_teate = 0;
$free_income_save = 0;
$sal_income_save = 0;

//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
//LOOPスタート
//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
for ($i=0;$i<$age_cnt;$i++){
	
	//=================================
	//▼傷病手当をベースに標準報酬月額と見なさないよう
	//退避していた値を再設定
	//=================================
	if($sal_income_save > 0){
		$sal_income = $sal_income_save;
		$sal_income_save = 0;
		$syobyo_teate = 0;
	}
	if($free_income_save > 0){
		$free_income = $free_income_save;
		$free_income_save = 0;
	}
	
	//=================================
	//収入(昇給考慮)
	//=================================
	if($i > 0){
		//フリーの収入は45歳まで上昇。以後頭打ちとする。
		if($age <= 40 ){
			$free_income = $free_income * 1.02;
		}

		//フリーの収入は60歳以降4割とする。
		if($age == 60 ){
			$free_income = $free_income * 0.4;
		}
		
		if($age <= 40){
			$sal_income = $sal_income * 1.05;
		}else{
			if($age <= 50 ){
				$sal_income = $sal_income * 1.01;
			}
		}
	}
	
	//一時出費
	$temp_outgo = 0;
	
	//echo $i.'year<br/>';
	//echo 'age:'. $age .'<br/>';
	
	//保険1払込期間終了
	if($i >= $hoken_zan1){
		$hoken1 = 0;
	}

	//保険2払込期間終了
	if($i >= $hoken_zan2){
		$hoken2 = 0;
	}

	$hoken = $hoken1 + $hoken2;

	//グラフ出力用データ格納
	$hoken_ary[] = $hoken;

	//=================================
	//自動車
	//=================================
	if($car == 0 or $car_by_year == 0){
		//グラフ出力用データ格納
		$car_ary[] = 0;
	}else{
		if($age <= 64){
			if((($i+1)%$car_by_year)==0){
				$temp_outgo = $car;
				//グラフ出力用データ格納
				$car_ary[] = $car;
			}else{
				$temp_outgo = 0;
				//グラフ出力用データ格納
				$car_ary[] = 0;
			}
		}else{
			//グラフ出力用データ格納
			$car_ary[] = 0;
		}
	}

	//グラフ出力用データ格納
	$age_ary[] = $age;
	$home_ary[] = $home;
	$kaden_ary[] = 0;
	
	//=================================
	//▼小規模企業共済
	//=================================
	if($age < $syokibo_in_year){
		$syokibo_sum = $syokibo_sum + ($syokibo * 12);
		$_SESSION['SyokiboKigyo_Sum'] = $syokibo_sum;
	}

	//出力用データ格納
	$syokibo_kakekin_sum = 0;
	if($i > 0){
		$syokibo_kakekin_sum = $syokibo_kakekin_sum_ary[$i-1];
	}
	$syokibo_kakekin_sum_ary[] = $syokibo_kakekin_sum + ($syokibo * 12);

	//=================================
	//▼iDeCo
	//=================================
	$ideco_sal_kakekin = $ideco_kakekin;
	$ideco_free_kakekin = $ideco_kakekin;
	
	//出力用データ格納
	$ideco_kakekin_sum = 0;
	if($i > 0){
		$ideco_kakekin_sum = $ideco_kakekin_sum_ary[$i-1];
	}
	$ideco_kakekin_sum_ary[] = $ideco_kakekin_sum + $ideco_kakekin * 12;

	if($age < 60){
		$ideco_sal_unyoeki = round(($ideco_sal_unyoeki + $ideco_sal_kakekin * 12) * $ideco_rate,0);
		$ideco_free_unyoeki = round(($ideco_free_unyoeki + $ideco_free_kakekin * 12) * $ideco_rate,0);
	}else{
		if($age < 70){
			$ideco_sal_unyoeki = round($ideco_sal_unyoeki * $ideco_rate,0);
			$ideco_free_unyoeki = round($ideco_free_unyoeki * $ideco_rate,0);
		}
	}
	
	//=================================
	//▼住宅ローン控除額計算
	//=================================
	//返済10年間は住宅ローン控除適用
	$jutaku_loan_kojo = 0;
	//住宅ローン返済額計算
	if($i==0){
		//将来住宅ローンを組みたい場合は負数が設定されている
		if($home_back_year_cnt < 0){
			$jutaku_loan_hensaigaku = $home_back_zankin / ($home_back_end_age - $age + $home_back_year_cnt);
		}else{
			$jutaku_loan_hensaigaku = $home_back_zankin / ($home_back_end_age - $age + 1);
		}
	}
	if($home_back_year_cnt >= 1 && ($home_back_end_age != 0 || $home_back_end_age <= $age)){

		//住宅ローン控除フラグ
		if($home_back_year_cnt <= 10){
			$jutaku_loan_kojo_flg = 1;
			$jutaku_loan_kojo = round($home_back_zankin * 0.01);
		}else{
			$jutaku_loan_kojo_flg = 0;
		}

		//残金計算
		if($home_back_zankin - $jutaku_loan_hensaigaku < 0){
			$home_back_zankin = 0;
		}else{
			$home_back_zankin = $home_back_zankin - $jutaku_loan_hensaigaku;
		}
		//グラフ出力用データ格納
		$jutaku_loan_zankin_ary[] = $home_back_zankin * -1;

	}else{
		//グラフ出力用データ格納
		$jutaku_loan_zankin_ary[] = 0;
	}

	//グラフ出力用データ格納
	if($age <= $home_back_end_age){
			$jutaku_loan_hensai_ary[] = $jutaku_loan_hensaigaku;
	}else{
			$jutaku_loan_hensai_ary[] = 0;
	}

	//返済N年目 カウントアップ
	$home_back_year_cnt = $home_back_year_cnt + 1;
	

	//=================================
	//▼医療費
	//=================================
	//https://www.mhlw.go.jp/toukei/saikin/hw/k-iryohi/15/dl/data.pdf
	$iryohi = 0;
	$iryohi_wk = 0;

	//医療費加味
	if($iryohi_kami == 0){
		$iryohi_wk = get_iryohi($age);
		$iryohi = $iryohi + $iryohi_wk;

		$iryohi_wk = get_iryohi($haigusya_age);
		$iryohi = $iryohi + $iryohi_wk;

		if($child1_age < 23){
			$iryohi_wk = get_iryohi($child1_age);
			$iryohi = $iryohi + $iryohi_wk;
		}

		if($child2_age < 23){
			$iryohi_wk = get_iryohi($child2_age);
			$iryohi = $iryohi + $iryohi_wk;
		}

		if($child3_age < 23){
			$iryohi_wk = get_iryohi($child3_age);
			$iryohi = $iryohi + $iryohi_wk;
		}
	}

	//グラフ出力用データ格納
	$iryohi_ary = $_SESSION['Iryohi'];
	$iryohi_ary[] = $iryohi;
	$_SESSION['Iryohi'] = $iryohi_ary;

	$temp_outgo = $temp_outgo + $iryohi;

	//=================================
	//旅行
	//=================================
	$temp_outgo = $temp_outgo + $trip;
	//グラフ出力用データ格納
	$trip_ary[] = $trip;

	//=================================
	//一時収支(出費)
	//=================================
	$add_minus_kingaku = 0;
	$add_plus_kingaku = 0;
	
	if($age == $add_age1 and $add_kingaku1 < 0){
		$add_minus_kingaku = $add_minus_kingaku + ($add_kingaku1 * -1);
		$temp_outgo = $temp_outgo + ($add_kingaku1 * -1);
	}
	if($age == $add_age2 and $add_kingaku2 < 0){
		$add_minus_kingaku = $add_minus_kingaku + ($add_kingaku2 * -1);
		$temp_outgo = $temp_outgo + ($add_kingaku2 * -1);
	}

	//グラフ出力用データ格納
	$add_minus_kingaku_ary = $_SESSION['add_minus_kingaku'];
	$add_minus_kingaku_ary[] = $add_minus_kingaku;
	$_SESSION['add_minus_kingaku'] = $add_minus_kingaku_ary;

	//=================================
	//一時収支(収入)
	//=================================
	$temp_income = 0;
	if($age == $add_age1 and $add_kingaku1 > 0){
		$add_plus_kingaku = $add_plus_kingaku + $add_kingaku1;
		$temp_income = $temp_income + $add_kingaku1;
	}else{
		$temp_income = 0;
	}
	if($age == $add_age2 and $add_kingaku2 > 0){
		$add_plus_kingaku = $add_plus_kingaku + $add_kingaku2;
		$temp_income = $temp_income + $add_kingaku2;
	}else{
		$temp_income = $temp_income;
	}

	//グラフ出力用データ格納
	$add_plus_kingaku_ary = $_SESSION['add_plus_kingaku'];
	$add_plus_kingaku_ary[] = $add_plus_kingaku;
	$_SESSION['add_plus_kingaku'] = $add_plus_kingaku_ary;

	//=================================
	//▼未収入月加味	
	//=================================
	if($age == $kega_age){
		
		//退避
		$free_income_save = $free_income;
		$sal_income_save = $sal_income;
		
		//サラリーマン
		//(未収入の月収 + 標準報酬月額の2/3(傷病手当)が支給)
		$sal_income = ($sal_income * ((12 - $kega_month) / 12)) + ($sal_income * ($kega_month / 12) * (2/3));
		$syobyo_teate = $sal_income * ($kega_month / 12) * (2/3);
		
		//フリー
		$free_income = $free_income * ((12 - $kega_month) / 12);
	}
	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
	//正社員
	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
	//●income
	$income_commit = income_calc($age,$sal_income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$taisyokukin,$kosei_nenkin_jukyu_sal,$kokumin_nenkin_jukyu_sal,$jutaku_loan_kojo,$ideco_sal_unyoeki,$ideco_in_year);
	$income_commit = $income_commit + $temp_income;
	
	//●outgo
	$outgo_commit = outgo_calc($i,$age,0,$sal_income,$haigusya_flg,$haigusya_age,$child1_flg,$child1_age,$child2_flg,$child2_age,$child3_flg,$child3_age,$hoken,$keihi,$seikatsu_in_keihi,$no_out_keihi,$home,$retire,$syokibo,$sonota_seikatsuhi,$retire_plan,$jutaku_loan_kojo,$child1_type,$child2_type,$child3_type,$ideco_sal_kakekin,$syokibo_in_year,$_SESSION['Sal_nenkin_in']);
	$outgo_commit = $outgo_commit + $temp_outgo;

	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
	//フリーランス
	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
	//●income_calc
	$income_commit = free_income_calc($age,$free_income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$retire,$kosei_nenkin_jukyu_free,$kokumin_nenkin_jukyu_free,$ideco_free_unyoeki,$ideco_in_year,$syokibo_in_year);
	$income_commit = $income_commit + $temp_income;

	//●outgo
	$outgo_commit = outgo_calc($i,$age,1,$free_income,$haigusya_flg,$haigusya_age,$child1_flg,$child1_age,$child2_flg,$child2_age,$child3_flg,$child3_age,$hoken,$keihi,$seikatsu_in_keihi,$no_out_keihi,$home,$retire,$syokibo,$sonota_seikatsuhi,$retire_plan,$jutaku_loan_kojo,$child1_type,$child2_type,$child3_type,$ideco_free_kakekin,$syokibo_in_year,$_SESSION['Free_nenkin_in']);
	$outgo_commit = $outgo_commit + $temp_outgo;
	
	if($child1_age < 0 or $child2_age < 0 or $child3_age < 0){
		$_SESSION['child_plan'] = 1;
	}
	
	$haigusya_age = $haigusya_age + 1;
	$child1_age = $child1_age + 1;
	$child2_age = $child2_age + 1;
	$child3_age = $child3_age + 1;

	$age = $age + 1;

}		

//*********************************************************************
//グラフ出力
//*********************************************************************
//調整
$sal_year = $sal_year + 1;

$age_td = '';		 			$haigusya_td = '';
$child1_td = '';				$child2_td = '';
$child3_td = '';				$child_teate_td = '';
$kyuyo_hosyu_td = '';			$home_td = '';
$income_td = '';				$SyotokuZei_td = '';
$Nenkin_td = '';				$Kenpo_td = '';
$juminZei_td = '';				$Gakuhi_td = '';
$outgo_td = '';					$saving_td = '';
$hoken_td = '';					$car_td = '';
$trip_td = '';					$seikatsu_td = '';
$kaden_td = '';					$syokibo_td = '';
$iryohi_td = '';				$sal_nenkin_in_td = '';
$free_nenkin_in_td = '';		$taisyokukin_td = '';
$syokibo_in_td = '';			$add_plus_td = '';
$add_minus_td = '';				$add_plus_kingaku_td = '';
$add_minus_kingaku_td = '';		$jutaku_loan_kanpu_td = '';
$jutaku_loan_hensai_td = '';	$outgo_out_zei_td = '';
$izoku_kosei_nenkin_td = '';	$izoku_kiso_nenkin_td = '';
$tyukorei_kafu_kasan_td = '';	
$ideco_td = '';					$ideco_in_td = '';
$ideco_free_in_td = '';			$ideco_sal_in_td = '';

//配偶者年齢 再取得
$haigusya_age = $haigusya_age_save;

//子ども年齢 再取得
$child1_age = $child1_age_save;
$child2_age = $child2_age_save;
$child3_age = $child3_age_save;

//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
//出力用配列作成
//▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲
//▼年齢
foreach($age_ary as $value){
	$age_td = $age_td.'<th>'.round($value).'</th>';
}

$i = 0;
$jutaku_loan_wk = 0;

foreach($home_ary as $value){

	//遺族基礎年金
	$izoku_kiso_nenkin_ko_kasan = 0;

	//▼家賃
	$jutaku_loan_wk = $jutaku_loan_hensai_ary[$i];
	$home_td = $home_td.'<td>'.round($value+$jutaku_loan_wk).'</td>';

	//配偶者の年齢
	$haigusya_td = $haigusya_td.'<td>'.$haigusya_age.'</td>';

	//▼子ども1の年齢
	if($child1_age < 0){
		$child1_td = $child1_td.'<td>-</td>';
	}else{
		$child1_td = $child1_td.'<td>'.$child1_age.'</td>';
	}
	if($child1_flg == 1 and $child1_age < 18){
		//$izoku_kiso_nenkin_ko_kasan = 22.43;
	}

	//▼子ども2の年齢
	if($child2_age < 0){
		$child2_td = $child2_td.'<td>-</td>';
	}else{
		$child2_td = $child2_td.'<td>'.$child2_age.'</td>';
	}
	if($child2_flg == 1 and $child2_age < 18){
		$izoku_kiso_nenkin_ko_kasan = $izoku_kiso_nenkin_ko_kasan + 22.43;
	}
	
	//▼子ども3の年齢
	if($child3_age < 0){
		$child3_td = $child3_td.'<td>-</td>';
	}else{
		$child3_td = $child3_td.'<td>'.$child3_age.'</td>';
	}
	if($child3_flg == 1 and $child3_age < 18){
		$izoku_kiso_nenkin_ko_kasan = $izoku_kiso_nenkin_ko_kasan + 7.48;
	}

	//必要保障額算出用
	//*****************************************
	//◆遺族厚生年金
	//平均標準報酬月額×5.481/1000×平成15年4月以降の被保険者期間の月数
	//支給期間は一生。厚生年金加入期間が【10年以上】必要
	//*****************************************
	if($sal_year >= 10){
		$izoku_kosei_nenkin[] = ($hyojun_gaku_b * 5.481 / 1000) * ($sal_year * 12);
	}else{
		$izoku_kosei_nenkin[] = 0;
	}
	//*****************************************
	//◆遺族基礎年金
	//*****************************************
	//支給要件：18歳未満の子どもがいる
	//779,300円+子の加算
	//子の加算　第1子・第2子　各　224,300円
	//第3子以降　各　74,800円
	//-----------------------------------------
	if($izoku_kiso_nenkin_ko_kasan > 0){
		$izoku_kiso_nenkin[] = 77.93 + $izoku_kiso_nenkin_ko_kasan;
	}else{
		$izoku_kiso_nenkin[] = 0;
	}
	
	//*****************************************
	//◆中高齢寡婦加算
	//*****************************************
	//支給要件：18歳未満の子どもが居ない)=遺族基礎年金がゼロで判断
	//①会社員として厚生年金に加入中に死亡･･･◆短期要件の遺族厚生年金
	//②現在フリー。会社員として厚生年金に加入したことがあり･･･◆長期要件の遺族厚生年金(★加入期間が25年必要)
	if(($workstyle == '0' and ($haigusya_age >= 40 and $haigusya_age < 65) and $izoku_kiso_nenkin[$i] == 0) or
	  ($workstyle == '1' and ($haigusya_age >= 40 and $haigusya_age < 65) and $izoku_kiso_nenkin[$i] == 0 and $sal_year >= 25)){
		$tyukorei_kafu_kasan[] = 58.4;
	}else{
		$tyukorei_kafu_kasan[] = 0;
	}

	//*****************************************
	//◆配偶者(専業主婦)の国民年金
	//*****************************************
	//支給要件：65歳
	if($haigusya_age >= 65){
		$haigusya_nenkin_jukyu_flg[] = 9;
	}else{
		$haigusya_nenkin_jukyu_flg[] = 0;
	}

	//*****************************************
	//◆子どもが独立するまで
	//*****************************************
	if(($child1_flg == 1 and $child1_age <= 22) or ($child2_flg == 1 and $child2_age <= 22) or ($child3_flg == 1 and $child3_age <= 22)){
		$child_independence_flg[] = 0;
	}else{
		$child_independence_flg[] = 9;
	}

	$haigusya_age = $haigusya_age +  1;
	$child1_age = $child1_age +  1;
	$child2_age = $child2_age +  1;
	$child3_age = $child3_age +  1;
	$i = $i + 1;
}

//▼住宅ローン
//foreach($jutaku_loan_hensai_ary as $value){
//	$jutaku_loan_hensai_td = $jutaku_loan_hensai_td.'<td>'.round($value).'</td>';
//}

//▼総収入、総支出、貯金額算出
$n = 0;
$wk_saving_sal = 0;
$wk_saving_free = 0;

$cnt_out_to34 = 0;
$sum_out_34 = 0;
$sum_out_35_39 = 0;
$sum_out_40_44 = 0;
$sum_out_45_49 = 0;
$sum_out_50_54 = 0;
$sum_out_55_59 = 0;
$sum_out_60_64 = 0;
$sum_out_65_69 = 0;
$sum_out_70_74 = 0;
$sum_out_75_79 = 0;
$sum_out_80_84 = 0;
$sum_out_85 = 0;


$cnt_in_to34 = 0;
$cnt_outof_70 = 0;
$sum_in_34 = 0;
$sum_in_35_39 = 0;
$sum_in_40_44 = 0;
$sum_in_45_49 = 0;
$sum_in_50_54 = 0;
$sum_in_55_59 = 0;
$sum_in_60_64 = 0;
$sum_in_65_69 = 0;
$sum_in_70 = 0;;

$outgo_die_sum = 0;
$saving_start = 0;
$to_haigusya_nenkin = 0;
$to_child_independence = 0;

$hituryo_hosyo_msg = '';

foreach($age_ary as $value){

	$wk_minus_cmn = 0;
	$wk_minus_sal = 0;
	$wk_minus_free = 0;

	$wk_plus_cmn = 0;
	$wk_plus_sal = 0;
	$wk_plus_free = 0;

	//==========================================================
	//★共通
	//==========================================================
	//●マイナス
	$wk_minus_cmn = $home_ary[$n];
	$wk_minus_cmn = $wk_minus_cmn + $_SESSION['Gakuhi'][$n];
	$wk_minus_cmn = $wk_minus_cmn + $car_ary[$n];
	$wk_minus_cmn = $wk_minus_cmn + $hoken_ary[$n];
	$wk_minus_cmn = $wk_minus_cmn + $trip_ary[$n];
	$wk_minus_cmn = $wk_minus_cmn + $kaden_ary[$n];
	$wk_minus_cmn = $wk_minus_cmn + $_SESSION['add_minus_kingaku'][$n];
	$wk_minus_cmn = $wk_minus_cmn + $jutaku_loan_hensai_ary[$n];

	if($iryohi_kami == 0){
		$wk_minus_cmn = $wk_minus_cmn + $_SESSION['Iryohi'][$n];
	}
	
	//●プラス
	$wk_plus_cmn = $_SESSION['Child_Teate'][$n];
	$wk_plus_cmn = $wk_plus_cmn + $_SESSION['add_plus_kingaku'][$n];

	//==========================================================
	//★正社員
	//==========================================================
	//●プラス
	$wk_plus_sal =  $wk_plus_sal + $_SESSION['Kyuyo_Hosyu_Sal'][$n];
	$wk_plus_sal =  $wk_plus_sal + $_SESSION['Sal_nenkin_in'][$n];
	$wk_plus_sal =  $wk_plus_sal + $_SESSION['TaisyokuKin'][$n];
	$wk_plus_sal =  $wk_plus_sal + $_SESSION['Jutaku_loan_kanpu'][$n];
	$wk_plus_sal =  $wk_plus_sal + $_SESSION['ideco_sal_in'][$n];

	//●マイナス
	$wk_minus_sal = $wk_minus_sal + $_SESSION['KihonSeikatsuHiSal'][$n];
	$wk_minus_sal = $wk_minus_sal + $_SESSION['ideco_sal_unit'][$n];

	//徴収は1年遅れの為、1ずらす。最終要素は削除。
	if($n == 0){
		array_pop($_SESSION['KenpoSal']);
	}
	$wk_minus_sal = $wk_minus_sal + $_SESSION['KenpoSal'][$n];

	//==========================================================
	//★フリーランス
	//==========================================================
	//●プラス
	$wk_plus_free =  $wk_plus_free + $_SESSION['Kyuyo_Hosyu_Free'][$n];
	$wk_plus_free =  $wk_plus_free + $_SESSION['Free_nenkin_in'][$n];
	$wk_plus_free =  $wk_plus_free + $_SESSION['SyokiboKigyo_in'][$n];
	$wk_plus_free =  $wk_plus_free + $_SESSION['ideco_free_in'][$n];

	
	//●マイナス
	//徴収は1年遅れの為、1ずらす。最終要素は削除。
	if($n == 0){
		array_pop($_SESSION['SyotokuZeiFree']);
	}
	$wk_minus_free = $wk_minus_free + $_SESSION['SyotokuZeiFree'][$n];

	//徴収は1年遅れの為、1ずらす。最終要素は削除。
	if($n == 0){
		array_pop($_SESSION['JuminZeiFree']);
	}
	$wk_minus_free = $wk_minus_free + $_SESSION['JuminZeiFree'][$n];
	
	//徴収は1年遅れの為、1ずらす。最終要素は削除。
	if($n == 0){
		array_pop($_SESSION['KenpoFree']);
	}
	$wk_minus_free = $wk_minus_free + $_SESSION['KenpoFree'][$n];
	$wk_minus_free = $wk_minus_free + $_SESSION['NenkinFree'][$n];
	
	//フリーランス支出(所得税･住民税･社保･税金のみ)
	$outgo_result_free_out_zei = $wk_minus_free;

	$wk_minus_free = $wk_minus_free + $_SESSION['KihonSeikatsuHiFree'][$n];
	$wk_minus_free = $wk_minus_free + $_SESSION['Syokibo_unit'][$n];
	$wk_minus_free = $wk_minus_free + $_SESSION['ideco_free_unit'][$n];
	
	if($n == 0){
		$wk_saving_sal = $_POST['saving'] + $wk_plus_sal - $wk_minus_sal + $wk_plus_cmn - $wk_minus_cmn;
		$wk_saving_free = $_POST['saving'] + $wk_plus_free - $wk_minus_free + $wk_plus_cmn - $wk_minus_cmn;

		//1年目の貯金額を退避
		if($workstyle=='0'){
			$saving_start = $wk_saving_sal;
			$saving_start2 = $wk_saving_sal;
		}else{
			$saving_start = $wk_saving_free;
			$saving_start2 = $wk_saving_free;
		}
	}else{
		$wk_saving_sal = $wk_saving_sal + $wk_plus_sal - $wk_minus_sal + $wk_plus_cmn - $wk_minus_cmn;
		$wk_saving_free = $wk_saving_free + $wk_plus_free - $wk_minus_free + $wk_plus_cmn - $wk_minus_cmn;
	}

	//▼必要保障額算出
	if($workstyle=='0'){
		$outgo_die_sum = ($wk_minus_sal + $wk_minus_cmn) - 
						$jutaku_loan_hensai_ary[$n] - 
						$izoku_kosei_nenkin[$n] - 
						$izoku_kiso_nenkin[$n] - 
						$tyukorei_kafu_kasan[$n] - 
						$seikatsu_in_keihi - 
						$lunch - 
						$hoken_ary[$n] - 
						$_SESSION['add_plus_kingaku'][$n] - 
						$_SESSION['add_minus_kingaku'][$n] - 
						$_SESSION['ideco_sal_unit'][$n];
						
		$hituryo_hosyo_msg = '死後必要額:'.$outgo_die_sum.'/支出(sal):'.round($wk_minus_sal,0).'+支出(共通):'.$wk_minus_cmn.'-住宅ローン返済:'.$jutaku_loan_hensai_ary[$n].'-遺族厚生年金:'.$izoku_kosei_nenkin[$n].'-遺族基礎年金'.$izoku_kiso_nenkin[$n].'-中高齢寡婦加算:'.$tyukorei_kafu_kasan[$n].'-仕事上の支出:'.$seikatsu_in_keihi.'-保険:'.$hoken_ary[$n].'-ideco:'.$_SESSION['ideco_free_unit'][$n].'<br />';
		//echo $hituryo_hosyo_msg;
	}else{
		$outgo_die_sum = ($wk_minus_free + $wk_minus_cmn) - 
						$jutaku_loan_hensai_ary[$n] - 
						$izoku_kosei_nenkin[$n] - 
						$izoku_kiso_nenkin[$n] - 
						$tyukorei_kafu_kasan[$n] - 
						$outgo_result_free_out_zei - 
						$seikatsu_in_keihi  - 
						$lunch - 
						$_SESSION['Syokibo_unit'][$n] -
						$hoken_ary[$n] - 
						$_SESSION['add_plus_kingaku'][$n] - 
						$_SESSION['add_minus_kingaku'][$n] - 
						$_SESSION['ideco_free_unit'][$n];

		$hituryo_hosyo_msg = '死後必要額:'.$outgo_die_sum.'/支出(free):'.round($wk_minus_free,0).'+支出(共通):'.$wk_minus_cmn.'-住宅ローン返済:'.$jutaku_loan_hensai_ary[$n].'-遺族厚生年金:'.$izoku_kosei_nenkin[$n].'-遺族基礎年金'.$izoku_kiso_nenkin[$n].'-中高齢寡婦加算:'.$tyukorei_kafu_kasan[$n].'-税金:'.$outgo_result_free_out_zei.'-仕事上の支出:'.$seikatsu_in_keihi.'-小規模企業共済:'.$_SESSION['Syokibo_unit'][$n].'-保険:'.$hoken_ary[$n].'-ideco:'.$_SESSION['ideco_free_unit'][$n].'<br />';
		//echo $hituryo_hosyo_msg;
	}			

	//貯蓄＞支出
	if($saving_start2 > $outgo_die_sum){
		$saving_start2 = $saving_start2 - $outgo_die_sum;
		$outgo_die_sum = 0;
	//貯蓄＜支出
	}else{
		$outgo_die_sum = $outgo_die_sum - $saving_start2;
		$saving_start2 = 0;
	}

	//▼来年死んだ場合
	//子どもが独立するまでに必要な金額
	if($n > 0 and $child_independence_flg[$n]==0){
		$to_child_independence = $to_child_independence + $outgo_die_sum;
		$to_child_independence_ary[] = $outgo_die_sum * -1;
		$_SESSION['to_child_independence_ary'] = $to_child_independence_ary;
	}
	
	//専業主婦の配偶者が国民年金を受給するまで
	if($n > 0 and $haigusya_nenkin_jukyu_flg[$n]==0){
		$to_haigusya_nenkin = $to_haigusya_nenkin + $outgo_die_sum;
		$to_haigusya_nenkin_ary[] = $outgo_die_sum * -1;
		$_SESSION['to_haigusya_nenkin_ary'] = $to_haigusya_nenkin_ary;
	}
	
	//まるめ
	$wk_plus_sal = round($wk_plus_sal);
	$wk_plus_free = round($wk_plus_free);
	$wk_plus_cmn = round($wk_plus_cmn);
	$wk_minus_cmn = round($wk_minus_cmn);
	$wk_saving_sal = round($wk_saving_sal);
	$wk_saving_free = round($wk_saving_free);

	//▼miniグラフここから▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
	//▼収入
	$income_result_sal_ary[] = $wk_plus_sal + $wk_plus_cmn;
	$income_result_free_ary[] = $wk_plus_free + $wk_plus_cmn;

	if($workstyle==0){
		//★小規模、idecoも引く？
		//子ども手当、年金(受給)、退職金は差し引く
		$wk_plus = $wk_plus_sal - $_SESSION['Child_Teate'][$n] - $_SESSION['Sal_nenkin_in'][$n] - $_SESSION['TaisyokuKin'][$n];
	}else{
		//子ども手当、年金(受給)、退職金は差し引く
		//報酬から税金を引いた金額を手取り換算金額とする
		$wk_plus = $wk_plus_free - $outgo_result_free_out_zei - $_SESSION['Child_Teate'][$n] - $_SESSION['Free_nenkin_in'][$n] - $_SESSION['TaisyokuKin'][$n];
	}

	if($value < 35){
		$sum_in_34 = $sum_in_34 + $wk_plus;
		$cnt_in_to34 = $cnt_in_to34 + 1;
	}
	if($value >= 35 and $value < 40) $sum_in_35_39 = $sum_in_35_39 + $wk_plus;
	if($value >= 40 and $value < 45) $sum_in_40_44 = $sum_in_40_44 + $wk_plus;
	if($value >= 45 and $value < 50) $sum_in_45_49 = $sum_in_45_49 + $wk_plus;
	if($value >= 50 and $value < 55) $sum_in_50_54 = $sum_in_50_54 + $wk_plus;
	if($value >= 55 and $value < 60) $sum_in_55_59 = $sum_in_55_59 + $wk_plus;
	if($value >= 60 and $value < 65) $sum_in_60_64 = $sum_in_60_64 + $wk_plus;
	if($value >= 65 and $value < 70) $sum_in_65_69 = $sum_in_65_69 + $wk_plus;

	if($value >= 70){
		$sum_in_70 = $sum_in_70 + $wk_plus;
		$cnt_outof_70 = $cnt_outof_70 + 1;
	}
	//▲miniグラフここまで▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

	//▼支出
	$outgo_result_sal_ary[] = $wk_minus_sal + $wk_minus_cmn;
	$outgo_result_free_ary[] = $wk_minus_free + $wk_minus_cmn;

	//▼miniグラフここから▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
	if($workstyle==0){
		$wk_minus = $wk_minus_sal;
	}else{
		$wk_minus = $wk_minus_free;
	}

	if($value < 35){
		$sum_out_34 = $sum_out_34 + ($wk_minus + $wk_minus_cmn);
		$cnt_out_to34 = $cnt_out_to34 + 1;
	}
	
	if($value >= 35 and $value < 40) $sum_out_35_39 = $sum_out_35_39 + ($wk_minus + $wk_minus_cmn);
	if($value >= 40 and $value < 45) $sum_out_40_44 = $sum_out_40_44 + ($wk_minus + $wk_minus_cmn);
	if($value >= 45 and $value < 50) $sum_out_45_49 = $sum_out_45_49 + ($wk_minus + $wk_minus_cmn);
	if($value >= 50 and $value < 55) $sum_out_50_54 = $sum_out_50_54 + ($wk_minus + $wk_minus_cmn);
	if($value >= 55 and $value < 60) $sum_out_55_59 = $sum_out_55_59 + ($wk_minus + $wk_minus_cmn);
	if($value >= 60 and $value < 65) $sum_out_60_64 = $sum_out_60_64 + ($wk_minus + $wk_minus_cmn);
	if($value >= 65 and $value < 70) $sum_out_65_69 = $sum_out_65_69 + ($wk_minus + $wk_minus_cmn);
	if($value >= 70 and $value < 75) $sum_out_70_74 = $sum_out_70_74 + ($wk_minus + $wk_minus_cmn);
	if($value >= 75 and $value < 80) $sum_out_75_79 = $sum_out_75_79 + ($wk_minus + $wk_minus_cmn);
	if($value >= 80 and $value < 85) $sum_out_80_84 = $sum_out_80_84 + ($wk_minus + $wk_minus_cmn);
	if($value >= 85) $sum_out_85 = $sum_out_85 + ($wk_minus + $wk_minus_cmn);

	//フリーランス支出(社保･税金除く)
	$outgo_result_free_out_zei_ary[] = $wk_minus_free + $wk_minus_cmn - $outgo_result_free_out_zei;

	//▲miniグラフここまで▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

	//▼miniグラフここから▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
	//将来30年分のみ
	if($n <= 29){
		$age_30_ary[] = round($value,1);
	}else{
		if($n == 30){
			$_SESSION['age'] = $age_30_ary;
		}
	}

	if($workstyle==0){
		if($n <= 29){
			$income_plus_save_ary[] = round((($wk_plus_sal + $wk_plus_cmn) - ($wk_minus_sal + $wk_minus_cmn)),1);
		}else{
			if($n == 30){
				$_SESSION['plus_save'] = $income_plus_save_ary;
			}
		}
	}else{
		if($n <= 29){
			$income_plus_save_ary[] = round((($wk_plus_free + $wk_plus_cmn) - ($wk_minus_free + $wk_minus_cmn)),1);
		}else{
			if($n == 30){
				$_SESSION['plus_save'] = $income_plus_save_ary;
			}
		}
	}
	//▲miniグラフここまで▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

	$saving_result_sal_ary[] = $wk_saving_sal;
	$saving_result_free_ary[] = $wk_saving_free;

	$n = $n + 1;
}

//▼ミニグラフ出力用
if($to_haigusya_nenkin > 0){
	$_SESSION['to_haigusya_nenkin'] = $to_haigusya_nenkin * -1;
}else{
	$_SESSION['to_haigusya_nenkin'] = 0;
}

if($to_child_independence > 0){
	$_SESSION['to_child_independence'] = $to_child_independence * -1;
}else{
	$_SESSION['to_child_independence'] = 0;
}

//ゼロ除算回避
if($cnt_in_to34 == 0){$cnt_in_to34 = 1;}
if($cnt_out_to34 == 0){$cnt_out_to34 = 1;}

$sum_in_34 = round($sum_in_34 / $cnt_in_to34);
$sum_in_35_39 = round($sum_in_35_39 / 5);
$sum_in_40_44 = round($sum_in_40_44 / 5);
$sum_in_45_49 = round($sum_in_45_49 / 5);
$sum_in_50_54 = round($sum_in_50_54 / 5);
$sum_in_55_59 = round($sum_in_55_59 / 5);
$sum_in_60_64 = round($sum_in_60_64 / 5);
$sum_in_65_69 = round($sum_in_65_69 / 5);
$sum_in_70 = round($sum_in_70 / $cnt_outof_70);

$_SESSION['income_avg_by_age'] = $sum_in_34.','.$sum_in_35_39.','.$sum_in_40_44.','.$sum_in_45_49.','.$sum_in_50_54.','.$sum_in_55_59.','.$sum_in_60_64.','.$sum_in_65_69.','.$sum_in_70;

$sum_out_34 = round($sum_out_34 / $cnt_out_to34);
$sum_out_35_39 = round($sum_out_35_39 / 5);
$sum_out_40_44 = round($sum_out_40_44 / 5);
$sum_out_45_49 = round($sum_out_45_49 / 5);
$sum_out_50_54 = round($sum_out_50_54 / 5);
$sum_out_55_59 = round($sum_out_55_59 / 5);
$sum_out_60_64 = round($sum_out_60_64 / 5);
$sum_out_65_69 = round($sum_out_65_69 / 5);
$sum_out_70_74 = round($sum_out_70_74 / 5);
$sum_out_75_79 = round($sum_out_75_79 / 5);
$sum_out_80_84 = round($sum_out_80_84 / 5);
$sum_out_85 =    $sum_out_85;

$_SESSION['outgo_avg_by_age'] = $sum_out_34.','.$sum_out_35_39.','.$sum_out_40_44.','.$sum_out_45_49.','.$sum_out_50_54.','.$sum_out_55_59.','.$sum_out_60_64.','.$sum_out_65_69.','.$sum_out_70_74.','.$sum_out_75_79.','.$sum_out_80_84.','.$sum_out_85;

//==========================================================
//キャッシュフロー表作成
//==========================================================
//●共通
//▼(+)子ども手当
foreach($_SESSION['Child_Teate'] as $value){
	$child_teate_td = $child_teate_td.'<td>'.round($value).'</td>';
}
//▼(-)家電
//foreach($kaden_ary as $value){
//	$kaden_td = $kaden_td.'<td>'.round($value).'</td>';
//}
//▼(-)保険
foreach($hoken_ary as $value){
	$hoken_td = $hoken_td.'<td>'.round($value).'</td>';
}
//▼(-)車
foreach($car_ary as $value){
	$car_td = $car_td.'<td>'.round($value).'</td>';
}
//▼(-)旅行
foreach($trip_ary as $value){
	$trip_td = $trip_td.'<td>'.round($value).'</td>';
}
//▼(-)学費
foreach($_SESSION['Gakuhi'] as $value){
	$Gakuhi_td = $Gakuhi_td.'<td>'.round($value).'</td>';
}
//▼(+)一時収入(住宅ローン控除による所得税還付を含む)
$i = 0;
$jutaku_loan_wk = 0;
foreach($_SESSION['add_plus_kingaku'] as $value){
	if($workstyle == 0){
		$jutaku_loan_wk = $_SESSION['Jutaku_loan_kanpu'][$i];
	}
	$add_plus_kingaku_td = $add_plus_kingaku_td.'<td>'.(round($value+$jutaku_loan_wk)).'</td>';
	$i = $i + 1;
}

//▼(-)一時支出
foreach($_SESSION['add_minus_kingaku'] as $value){
	$add_minus_kingaku_td = $add_minus_kingaku_td.'<td>'.round($value).'</td>';
}
//▼(-)医療費
foreach($_SESSION['Iryohi'] as $value){
	$iryohi_td = $iryohi_td.'<td>'.round($value).'</td>';
}

//▼遺族年金
foreach($izoku_kosei_nenkin as $value){
	$izoku_kosei_nenkin_td = $izoku_kosei_nenkin_td.'<td>'.round($value).'</td>';
}
foreach($izoku_kiso_nenkin as $value){
	$izoku_kiso_nenkin_td = $izoku_kiso_nenkin_td.'<td>'.round($value).'</td>';
}
foreach($tyukorei_kafu_kasan as $value){
	$tyukorei_kafu_kasan_td = $tyukorei_kafu_kasan_td.'<td>'.round($value).'</td>';
}

//●サラリーマン固有
if($workstyle == 0){
	//▼(+)給与･報酬
	foreach($_SESSION['Kyuyo_Hosyu_Sal'] as $value){
		$kyuyo_hosyu_td = $kyuyo_hosyu_td.'<td>'.round($value,1).'</td>';
	}
	//▼(+)退職金
	foreach($_SESSION['TaisyokuKin'] as $value){
		$taisyokukin_td = $taisyokukin_td.'<td>'.round($value,1).'</td>';
	}
	//▼(+)iDeCo
	foreach($_SESSION['ideco_sal_in'] as $value){
		$ideco_sal_in_td = $ideco_sal_in_td.'<td>'.round($value,1).'</td>';
	}
	//▼(+)年金支給
	foreach($_SESSION['Sal_nenkin_in'] as $value){
		$sal_nenkin_in_td = $sal_nenkin_in_td.'<td>'.round($value,1).'</td>';
	}
	//▼(-)基本生活費
	foreach($_SESSION['KihonSeikatsuHiSal'] as $value){
		$seikatsu_td = $seikatsu_td.'<td>'.round($value,0).'</td>';
	}
	//▼(-)iDeCo
	foreach($_SESSION['ideco_sal_unit'] as $value){
		$ideco_td = $ideco_td.'<td>'.round($value,1).'</td>';
	}
	//▼(-)国民健康保険
	foreach($_SESSION['KenpoSal'] as $value){
		if($value > 0){
			$Kenpo_td = $Kenpo_td.'<td>'.round($value,1).'</td>';
		}else{
			$Kenpo_td = $Kenpo_td.'<td>'.$value.'</td>';
		}
	}
	//★(=)収入合計
	foreach($income_result_sal_ary as $value){
		$income_td = $income_td.'<td>'.round($value,1).'</td>';
	}
	//★(=)支出合計
	$cnt_i = 0;
	$age_wk = $_POST['age'];
	$yosei_outgo = 0;

	foreach($outgo_result_sal_ary as $value){
		$outgo_td = $outgo_td.'<td>'.round($value).'</td>';

		if(($age_wk + $cnt_i) > $_SESSION['retire_age'] ){
			$yosei_outgo = $yosei_outgo + round($value);
		}

		$cnt_i = $cnt_i + 1;
	}
	
	//リタイア年から85歳までに掛かる支出
	$_SESSION['yosei_outgo'] = $yosei_outgo;

	//★(=)貯蓄
	$cnt_i = 0;
	$age_wk = $_POST['age'];

	foreach($saving_result_sal_ary as $value){
		$saving_td = $saving_td.'<td>'.round($value).'</td>';

		//老後に貯金額がマイナスになるタイミング
		if($value < 0 and (($age_wk + $cnt_i) > $_SESSION['retire_age']) ){
			$minus_saving[] = $age_wk + $cnt_i;
		}
		
		//最終年の貯金
		$_SESSION['last_saving'] = round($value);

		if(($age_wk + $cnt_i) == 84){
			$sv_84 = round($value);
		}
		if(($age_wk + $cnt_i) == 85){
			$sv_85 = round($value);
		}
		
		$cnt_i = $cnt_i + 1;
	}

	//老後に貯金額がマイナスになるタイミング
	if(isset($minus_saving)){
		$_SESSION['minus_saving'] = $minus_saving;
	}

	//老後の貯金減少額(/年)
	$_SESSION['meberi'] = $sv_84 - $sv_85; 

//●フリーランス固有
}else{
	//▼(+)給与･報酬
	foreach($_SESSION['Kyuyo_Hosyu_Free'] as $value){
		$kyuyo_hosyu_td = $kyuyo_hosyu_td.'<td>'.round($value,1).'</td>';
	}
	//▼(+)小規模企業共済(退職金)
	foreach($_SESSION['SyokiboKigyo_in'] as $value){
		$syokibo_in_td = $syokibo_in_td.'<td>'.round($value,1).'</td>';
	}
	//▼(+)iDeCo
	foreach($_SESSION['ideco_free_in'] as $value){
		$ideco_free_in_td = $ideco_free_in_td.'<td>'.round($value,1).'</td>';
	}
	//▼(+)年金支給
	foreach($_SESSION['Free_nenkin_in'] as $value){
		$free_nenkin_in_td = $free_nenkin_in_td.'<td>'.round($value,1).'</td>';
	}
	//▼(-)所得税 
	foreach($_SESSION['SyotokuZeiFree'] as $value){
		$SyotokuZei_td = $SyotokuZei_td.'<td>'.round($value,1).'</td>';
	}
	//▼(-)住民税
	foreach($_SESSION['JuminZeiFree'] as $value){
		$juminZei_td = $juminZei_td.'<td>'.round($value,1).'</td>';
	}
	//▼(-)国民健康保険
	foreach($_SESSION['KenpoFree'] as $value){
		$Kenpo_td = $Kenpo_td.'<td>'.round($value,1).'</td>';
	}
	//▼(-)年金
	foreach($_SESSION['NenkinFree'] as $value){
		$Nenkin_td = $Nenkin_td.'<td>'.round($value,1).'</td>';
	}
	//▼(-)基本生活費
	foreach($_SESSION['KihonSeikatsuHiFree'] as $value){
		$seikatsu_td = $seikatsu_td.'<td>'.round($value,0).'</td>';
	}
	//▼(-)小規模企業共済
	foreach($_SESSION['Syokibo_unit'] as $value){
		$syokibo_td = $syokibo_td.'<td>'.round($value,1).'</td>';
	}
	//▼(-)iDeCo
	foreach($_SESSION['ideco_free_unit'] as $value){
		$ideco_td = $ideco_td.'<td>'.round($value,1).'</td>';
	}
	//★(=)収入合計
	foreach($income_result_free_ary as $value){
		$income_td = $income_td.'<td>'.round($value).'</td>';
	}
	//★(=)支出合計(社保･税金を除く)
	foreach($outgo_result_free_out_zei_ary as $value){
		$outgo_out_zei_td = $outgo_out_zei_td.'<td>'.round($value).'</td>';
	}
	//★(=)支出合計
	$cnt_i = 0;
	$age_wk = $_POST['age'];
	$yosei_outgo = 0;

	foreach($outgo_result_free_ary as $value){
		$outgo_td = $outgo_td.'<td>'.round($value).'</td>';
		
		if(($age_wk + $cnt_i) > $_SESSION['retire_age'] ){
			$yosei_outgo = $yosei_outgo + round($value);
		}

		$cnt_i = $cnt_i + 1;
		
	}

	//リタイア年から85歳までに掛かる支出
	$_SESSION['yosei_outgo'] = $yosei_outgo;

	//★(=)貯金
	$cnt_i = 0;
	$age_wk = $_POST['age'];

	foreach($saving_result_free_ary as $value){
		$saving_td = $saving_td.'<td>'.round($value).'</td>';

		//老後に貯金額がマイナスになるタイミング
		if($value < 0 and (($age_wk + $cnt_i) > $_SESSION['retire_age']) ){
			$minus_saving[] = $age_wk + $cnt_i;
		}
		
		if(($age_wk + $cnt_i) == 84){
			$sv_84 = round($value);
		}
		if(($age_wk + $cnt_i) == 85){
			$sv_85 = round($value);
		}
		
		//最終年の貯金
		$_SESSION['last_saving'] = round($value);

		$cnt_i = $cnt_i + 1;
	}

	//老後の貯金減少額(/年)
	$_SESSION['meberi'] = $sv_84 - $sv_85; 
	
	//老後に貯金額がマイナスになるタイミング
	if(isset($minus_saving)){
		$_SESSION['minus_saving'] = $minus_saving;
	}
}

//▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲

//グラフ部分出力用(共通)
$jutaku_loan_zankin_value = "'".implode("','",$jutaku_loan_zankin_ary)."'";

//グラフ部分出力用(正社員)
$income_sal_value = "'".implode("','",$income_result_sal_ary)."'";
$outgo_sal_value = "'".implode("','",$outgo_result_sal_ary)."'";
$saving_sal_value = "'".implode("','",$saving_result_sal_ary)."'";

//グラフ部分出力用(フリーランス)
$income_free_value = "'".implode("','",$income_result_free_ary)."'";
$outgo_free_value = "'".implode("','",$outgo_result_free_ary)."'";
$saving_free_value = "'".implode("','",$saving_result_free_ary)."'";

//グラフ部分出力用(共通)
$age_value = "'".implode("','",$age_ary)."'";

//*******************************************************************
//レンジ
//*******************************************************************

$range_str = '';
$i = 0;
$range_age = $_POST['age'];
$in_sabun = 0;
$out_sabun = 0;
$save_sabun = 0;

if($workstyle == 0){
	foreach($income_result_sal_ary as $value){
		$in_sabun = round($value,0)-round($income_result_free_ary[$i],0);
		if($in_sabun > 0){
			$in_sabun = '+'.$in_sabun;
		}else{
			if($in_sabun == 0){
				$in_sabun = '±'.$in_sabun;
			}
		}
//
		$out_sabun = round($outgo_result_sal_ary[$i],0)-round($outgo_result_free_ary[$i],0);
		if($out_sabun > 0){
			$out_sabun = '+'.$out_sabun;
		}else{
			if($out_sabun == 0){
				$out_sabun = '±'.$out_sabun;
			}
		}
//
		$save_sabun = round($saving_result_sal_ary[$i],0)-round($saving_result_free_ary[$i],0);
		if($save_sabun > 0){
			$save_sabun = '+'.$save_sabun;
		}else{
			if($save_sabun == 0){
				$save_sabun = '±'.$save_sabun;
			}
		}
//
		$range_str = $range_str.'case '."'".$range_age."'".':';
		$range_str = $range_str.'v_str = '."'".'<div>あなたの年齢:'.$range_age."歳</div>'".';';
		$range_str = $range_str.'v_str = v_str +'."'".'<table id="calc_table"><tr><td> </td><td>サラリーマン</td><td>フリーランス比</td></tr>'."';";
		$range_str = $range_str.'v_str = v_str +'."'".'<tr><td>収入</td><td>'.round($value,0).'万円</td><td>'.$in_sabun."</td></tr>'".';';
		$range_str = $range_str.'v_str = v_str +'."'".'<tr><td>支出</td><td>'.round($outgo_result_sal_ary[$i],0).'万円</td><td>'.$out_sabun."</td></tr>'".';';
		$range_str = $range_str.'v_str = v_str +'."'".'<tr><td>貯金</td><td>'.round($saving_result_sal_ary[$i],0).'万円</td><td>'.$save_sabun."</td></tr></table>'".';';

		if($range_age < 60){
			$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">健康保険</div><div>'.$_SESSION['KENKO_HOKEN_SAL_CALC'][$i]."</div></div>'".';';
		}else{
			$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">国民健康保険</div><div>'.$_SESSION['KENKO_HOKEN_SAL_CALC'][$i]."万円</div></div>'".';';
		}

		if($ideco_kakekin_sum_ary[$i] > 0 and $ideco_in_year >= 60 and $range_age < $ideco_in_year){
			$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">iDeCo掛金 支払累計</div><div>'.$ideco_kakekin_sum_ary[$i]."万円</div></div>'".';';
		}

		if($range_age >= 65){
			if($range_age < $haigusya_nenkin_start_diff){
				$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">年金受給額</div><div>'.round($_SESSION['Sal_nenkin_in'][$i],1)."万円(配偶者分含む)</div></div>'".';';
			}else{
				$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">年金受給額</div><div>'.round($_SESSION['Sal_nenkin_in'][$i],1)."万円</div></div>'".';';
			}
		}else{
			if($range_age >= $haigusya_nenkin_start_diff and $range_age < 65){
				$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">年金受給額</div><div>'.round($_SESSION['Sal_nenkin_in'][$i],1)."万円(配偶者分のみ)</div></div>'".';';
			}
		}

		$range_str = $range_str.' break;';

		if($i == 0){
			$init_str = '<div>あなたの年齢:'.$range_age."歳</div>";
			$init_str = $init_str.'<table id="calc_table"><tr><td> </td><td>サラリーマン</td><td>フリーランス比</td></tr>';
			$init_str = $init_str.'<tr><td>収入</td><td>'.round($value,0)."万円</td><td>".$in_sabun."</td></tr>";
			$init_str = $init_str.'<tr><td>支出</td><td>'.round($outgo_result_sal_ary[$i],0)."万円</td><td>".$out_sabun."</td></tr>";
			$init_str = $init_str.'<tr><td>貯金</td><td>'.round($saving_result_sal_ary[$i],0)."万円</td><td>".$save_sabun."</td></tr></table>";
			$init_str = $init_str.'<div id="zei_calc"><div class="zei_calc_title">健康保険</div><div>'.$_SESSION['KENKO_HOKEN_SAL_CALC'][$i]."</div></div>";

			if($ideco_kakekin_sum_ary[$i] > 0 and $ideco_in_year >= 60 and $range_age < $ideco_in_year){
				$init_str = $init_str.'<div id="zei_calc"><div class="zei_calc_title">iDeCo掛金 支払累計</div><div>'.$ideco_kakekin_sum_ary[$i]."万円</div></div>";
			}
		}

		$range_age = $range_age + 1;
		$i = $i + 1;
	}
}else{
	foreach($income_result_free_ary as $value){
		$in_sabun = round($value,0)-round($income_result_sal_ary[$i],0);
		if($in_sabun > 0){
			$in_sabun = '+'.$in_sabun;
		}else{
			if($in_sabun == 0){
				$in_sabun = '±'.$in_sabun;
			}
		}
//
		$out_sabun = round($outgo_result_free_ary[$i],0)-round($outgo_result_sal_ary[$i],0);
		if($out_sabun > 0){
			$out_sabun = '+'.$out_sabun;
		}else{
			if($out_sabun == 0){
				$out_sabun = '±'.$out_sabun;
			}
		}
//
		$save_sabun = round($saving_result_free_ary[$i],0)-round($saving_result_sal_ary[$i],0);
		if($save_sabun > 0){
			$save_sabun = '+'.$save_sabun;
		}else{
			if($save_sabun == 0){
				$save_sabun = '±'.$save_sabun;
			}
		}
//
		$range_str = $range_str.'case '."'".$range_age."'".':';
		$range_str = $range_str.'v_str = '."'".'<div>あなたの年齢:'.$range_age."歳</div>'".';';
		$range_str = $range_str.'v_str = v_str +'."'".'<table id="calc_table"><tr><td> </td><td>フリーランス</td><td>サラリーマン比</td></tr>'."';";
		$range_str = $range_str.'v_str = v_str +'."'".'<tr><td>収入</td><td>'.round($value,0).'万円</td><td>'.$in_sabun."</td></tr>'".';';
		$range_str = $range_str.'v_str = v_str +'."'".'<tr><td>支出</td><td>'.round($outgo_result_free_ary[$i],0).'万円</td><td>'.$out_sabun."</td></tr>'".';';
		$range_str = $range_str.'v_str = v_str +'."'".'<tr><td>貯金</td><td>'.round($saving_result_free_ary[$i],0).'万円</td><td>'.$save_sabun."</td></tr></table>'".';';
		$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">国民健康保険</div><div>'.$_SESSION['KENKO_HOKEN_FREE_CALC'][$i]."万円</div></div>'".';';
		$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">所得税</div><div>'.$_SESSION['SYOTOKU_ZEI_CALC'][$i]."</div></div>'".';';

		if($syokibo_kakekin_sum_ary[$i] > 0 and $syokibo_in_year >= 60 and $range_age < $syokibo_in_year){
			$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">小規模企業共済掛金 支払累計</div><div>'.$syokibo_kakekin_sum_ary[$i]."万円</div></div>'".';';
		}
		if($ideco_kakekin_sum_ary[$i] > 0 and $ideco_in_year >= 60 and $range_age < $ideco_in_year){
			$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">iDeCo掛金 支払累計</div><div>'.$ideco_kakekin_sum_ary[$i]."万円</div></div>'".';';
		}

		if($range_age >= 65){
			if($range_age < $haigusya_nenkin_start_diff){
				$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">年金受給額</div><div>'.round($_SESSION['Free_nenkin_in'][$i],1)."万円</div></div>'".';';
			}else{
				$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">年金受給額</div><div>'.round($_SESSION['Free_nenkin_in'][$i],1)."万円(配偶者分含む)</div></div>'".';';
			}
		}else{
			if($range_age >= $haigusya_nenkin_start_diff and $range_age < 65){
				$range_str = $range_str.'v_str = v_str +'."'".'<div id="zei_calc"><div class="zei_calc_title">年金受給額</div><div>'.round($_SESSION['Free_nenkin_in'][$i],1)."万円(配偶者分のみ)</div></div>'".';';
			}
		}

		$range_str = $range_str.' break;';
		
		if($i == 0){
			$init_str = '<div>あなたの年齢:'.$range_age."歳</div>";
			$init_str = $init_str.'<table id="calc_table"><tr><td> </td><td>フリーランス</td><td>サラリーマン比</td></tr>';
			$init_str = $init_str.'<tr><td>収入</td><td>'.round($value,0)."万円</td><td>".$in_sabun."</td></tr>";
			$init_str = $init_str.'<tr><td>支出</td><td>'.round($outgo_result_free_ary[$i],0)."万円</td><td>".$out_sabun."</td></tr>";
			$init_str = $init_str.'<tr><td>貯金</td><td>'.round($saving_result_free_ary[$i],0)."万円</td><td>".$save_sabun."</td></tr></table>";
			$init_str = $init_str.'<div id="zei_calc"><div class="zei_calc_title">国民健康保険</div><div>'.$_SESSION['KENKO_HOKEN_FREE_CALC'][$i]."万円</div></div>";
			$init_str = $init_str.'<div id="zei_calc"><div class="zei_calc_title">所得税</div><div>'.$_SESSION['SYOTOKU_ZEI_CALC'][$i]."</div></div>";

			if($syokibo_kakekin_sum_ary[$i] > 0 and $syokibo_in_year >= 60 and $range_age < $syokibo_in_year){
				$init_str = $init_str.'<div id="zei_calc"><div class="zei_calc_title">小規模企業共済掛金 支払累計</div><div>'.$syokibo_kakekin_sum_ary[$i]."万円</div></div>";
			}
			if($ideco_kakekin_sum_ary[$i] > 0 and $ideco_in_year >= 60 and $range_age < $ideco_in_year){
				$init_str = $init_str.'<div id="zei_calc"><div class="zei_calc_title">iDeCo掛金 支払累計</div><div>'.$ideco_kakekin_sum_ary[$i]."万円</div></div>";
			}
		}

		$range_age = $range_age + 1;
		$i = $i + 1;
	}
}

echo '<script type="text/javascript">';
echo '$(function() {';
echo "	$('#range_age').on('input change', function(event){";
echo "		v_str = this.value;";
echo "		switch(this.value){";
echo 			$range_str;
echo "		}";
echo "		document.getElementById('o_age').innerHTML=v_str;";
echo '	});';
echo '});';
echo '</script>';
//
echo "<div class='title_name'>資産残高･年間収支グラフ</div>";
//
echo "<script>";
echo "window.onload = function() {";

echo "var retCd;";
echo "retCd = refCheck2();";
echo "if(retCd == '1'){alert('申し訳ございません。専用入力フォームよりご利用下さい。');}";

echo "FixedMidashi.create();";

echo "    ctx = document.getElementById('canvas').getContext('2d');";
echo "    ctx.canvas.height = 130;";
echo "    window.myBar = new Chart(ctx, {";
echo "        type: 'bar',";
echo "        data: barChartData,";
echo "        options: complexChartOption";
echo "    });";
echo "};";

echo "var barChartData = {";
echo "    labels: [".$age_value;
echo "    ],";
echo "    datasets: [";

//◆1本目(収入)(左)
echo "    {";
echo "        type: 'bar',";

if($workstyle == 0){
	echo "        label: 'income(sal)',";
	echo "        data: [".$income_sal_value;
}else{
	echo "        label: 'income(free)',";
	echo "        data: [".$income_free_value;
}

echo "        ],";
echo "        borderColor : 'rgba(54,164,235,0.8)',";
echo "        backgroundColor : 'rgba(54,164,235,0.5)',";
echo "        yAxisID: 'y-axis-1',";
echo "    },";

//◆2本目(支出)(左)
echo "    {";
echo "        type: 'bar',";

if($workstyle == 0){
	echo "        label: 'outgo(sal)',";
	echo "        data: [".$outgo_sal_value;
}else{
	echo "        label: 'outgo(free)',";
	echo "        data: [".$outgo_free_value;
}

echo "        ],";
echo "        borderColor : 'rgba(0,128,0,0.8)',";
echo "        backgroundColor : 'rgba(0,128,0,0.5)',";
echo "        yAxisID: 'y-axis-1',";
echo "    },";

//◆3本目(貯金)(右)
echo "    {";
echo "        type: 'line',";

if($workstyle == 0){
	echo "        label: 'savings(sal)',";
	echo "        data: [".$saving_sal_value;
}else{
	echo "        label: 'savings(free)',";
	echo "        data: [".$saving_free_value;
}

echo "        ],";
echo "        borderColor : 'rgba(254,97,132,0.8)',";
echo "        backgroundColor : 'rgba(254,97,132,0.5)',";
echo "        yAxisID: 'y-axis-2',";
echo "    },";

//◆4本目(住宅ローン残金)(右)
if(isset($_POST['home_back_zankin'])){
	$home_back_zankin = $_POST['home_back_zankin'];
}else{
	$home_back_zankin = 0;
}

if(isset($_POST['home_back_end_age'])){
	$home_back_end_age = $_POST['home_back_end_age'];
}else{
	$home_back_end_age = 0;
}

if($home_back_zankin > 0 and $home_back_end_age > 0){
	echo "    {";
	echo "        type: 'line',";
	echo "        label: 'loan',";
	echo "        lineTension: 0,";
	echo "        data: [".$jutaku_loan_zankin_value;

	echo "        ],";
	echo "        borderColor : 'rgba(128,128,128,0.8)',";
	echo "        backgroundColor : 'rgba(128,128,128,0.5)',";
	echo "        yAxisID: 'y-axis-2',";
	echo "    },";
}

//◆5本目(貯金比較用)(右)
echo "    {";
echo "        type: 'line',";

if($workstyle == 0){
	echo "        label: 'savings(free)',";
	echo "        data: [".$saving_free_value;
}else{
	echo "        label: 'savings(sal)',";
	echo "        data: [".$saving_sal_value;
}

echo "        ],";
echo "        hidden : 'true',";
echo "        borderColor : 'rgba(255,196,0,0.8)',";
echo "        backgroundColor : 'rgba(255,196,0,0.5)',";
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
echo "        min: 0";
echo "      },";

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
	echo '    <canvas id="canvas"></canvas>';
	echo "</div>";
echo "</div>";

//高さ調整
echo "<script>";
echo "$(window).load(function(){";
	echo "if(window.innerWidth >= 1025){";
		echo "$('#range_rap').outerHeight($('#grf_rap').outerHeight());";
	echo "}";
echo "});";
echo "</script>";

echo "<div id='range_rap'>";
echo "<input type='range' id='range_age' value='".$_POST['age']."' min='".$_POST['age']."' max='85' step='1' name='age'><div id='o_age'>".$init_str."</div>";

echo "</div>";
//
//****************************************************
//表出力
//****************************************************
echo "<div class='title_name' style='clear:both'>キャッシュフロー表</div>";
echo "<div id='scroller'>";
echo "<table id='resultTbl' _fixedhead='rows:1; cols:1;'>";
echo "        <tr><th>ご本人</th>".$age_td."</tr>";

if($haigusya_flg == 1 ){
	echo "        <tr><td id='age'>配偶者</td>".$haigusya_td."</tr>";
}
if($child1_flg == 1 ){
	echo "        <tr><td id='age'>子ども1</td>".$child1_td."</tr>";
}
if($child2_flg == 1 ){
	echo "        <tr><td id='age'>子ども2</td>".$child2_td."</tr>";
}
if($child3_flg == 1 ){
	echo "        <tr><td id='age'>子ども3</td>".$child3_td."</tr>";
}

//▼収入
echo "        <tr><td id='income'>給与/報酬</td>".$kyuyo_hosyu_td."</tr>";

echo "        <tr><td id='income'>子ども手当</td>".$child_teate_td."</tr>";
if($workstyle == 0){
	echo "        <tr><td id='income'>退職金</td>".$taisyokukin_td."</tr>";
}else{
	echo "        <tr><td id='income'>共済金A</td>".$syokibo_in_td."</tr>";
}
if($workstyle == 0){
	echo "        <tr><td id='income'>iDeCo</td>".$ideco_sal_in_td."</tr>";
}else{
	echo "        <tr><td id='income'>iDeCo</td>".$ideco_free_in_td."</tr>";
}

if($workstyle == 0){
	echo "        <tr><td id='income'>年金</td>".$sal_nenkin_in_td."</tr>";
}else{
	echo "        <tr><td id='income'>年金</td>".$free_nenkin_in_td."</tr>";
}

echo "        <tr><td id='income'>その他収入</td>".$add_plus_kingaku_td."</tr>";
echo "        <tr><td id='in_sum'>合計</td>".$income_td."</tr>";

//▼支出
echo "        <tr><td id='minus'>生活費</td>".$seikatsu_td."</tr>";
echo "        <tr><td id='minus'>家賃</td>".$home_td."</tr>";
//echo "        <tr><td id='minus'>住宅ローン</td>".$jutaku_loan_hensai_td."</tr>";
echo "        <tr><td id='minus'>教育費</td>".$Gakuhi_td."</tr>";
echo "        <tr><td id='minus'>自動車</td>".$car_td."</tr>";
echo "        <tr><td id='minus'>保険料</td>".$hoken_td."</tr>";

if($workstyle == 1){
	echo "        <tr><td id='minus'>小企共</td>".$syokibo_td."</tr>";
}
	echo "        <tr><td id='minus'>iDeCo</td>".$ideco_td."</tr>";

if($iryohi_kami == 0){
	echo "        <tr><td id='minus'>医療費</td>".$iryohi_td."</tr>";
}

echo "        <tr><td id='minus'>旅行</td>".$trip_td."</tr>";

if($workstyle == 1){
	echo "        <tr><td id='out_sum'>小計(税抜)</td>".$outgo_out_zei_td."</tr>";
	echo "        <tr><td id='minus'>所得税</td>".$SyotokuZei_td."</tr>";
	echo "        <tr><td id='minus'>住民税</td>".$juminZei_td."</tr>";
}
//
echo "        <tr><td id='minus'>健保</td>".$Kenpo_td."</tr>";
//
if($workstyle == 1){
	echo "        <tr><td id='minus'>年金</td>".$Nenkin_td."</tr>";
}
echo "        <tr><td id='minus'>その他支出</td>".$add_minus_kingaku_td."</tr>";
if($workstyle == 1){
	echo "        <tr><td id='out_sum'>合計(税込)</td>".$outgo_td."</tr>";
}else{
	echo "        <tr><td id='out_sum'>合計</td>".$outgo_td."</tr>";
}

//▼貯金
echo "        <tr><td id='saving'>貯金</td>".$saving_td."</tr>";

//▼遺族年金
//echo "        <tr><td id='saving'>遺族基年</td>".$izoku_kiso_nenkin_td."</tr>";
//echo "        <tr><td id='saving'>遺族厚年</td>".$izoku_kosei_nenkin_td."</tr>";
//echo "        <tr><td id='saving'>寡婦加算</td>".$tyukorei_kafu_kasan_td."</tr>";

//★
//echo "    </tbody>";
echo "</table>";
echo "</div>";
//★
//echo "</div>";
//echo "</div>";

echo "<div class='title_name'>各種収支情報</div>";

//必要保障額説明
$age_cnt = 1;
$no_flg = '0';
if(isset($_SESSION['to_haigusya_nenkin_ary'])){
	foreach($_SESSION['to_haigusya_nenkin_ary'] as $value){
		$to_haigusya_nenkin_year_cnt_ary[] = $age_cnt;
		$_SESSION['to_haigusya_nenkin_year_cnt_ary'] = $to_haigusya_nenkin_year_cnt_ary;
		$age_cnt = $age_cnt + 1;
		$no_flg = '0';
	}
}else{
	$no_flg = '1';
}

$age_cnt = 1;
if(isset($_SESSION['to_child_independence_ary'])){
	foreach($_SESSION['to_child_independence_ary'] as $value){
		$to_child_independence_year_cnt_ary[] = $age_cnt;
		$_SESSION['to_child_independence_year_cnt_ary'] = $to_child_independence_year_cnt_ary;
		$age_cnt = $age_cnt + 1;
		$no_flg = '0';
	}
}else{
	if($no_flg == '1'){
		$no_flg = '1';
	}else{
		$no_flg = '0';
	}
}

//①配偶者&子供なし or ②子供の予定あり
if($no_flg == '1' or $_SESSION['child_plan'] == 1){
	$_SESSION['to_child_independence_ary'] = explode(',','0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0');
	$_SESSION['to_child_independence_year_cnt_ary'] = explode(',','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20');
}

?>
<div class="block3" >
	<div class="midashi_head">ご本人死亡後に不足する生活費①</div>
	<div class="mini_grf">
		<iframe src="grf_sibo01.php?sibo=
		<?php
			if($_SESSION['to_child_independence'] < $_SESSION['to_haigusya_nenkin']){
				//配偶者あり
				if(isset($_SESSION['to_haigusya_nenkin_ary'])){
					echo "'".implode("','",$_SESSION['to_haigusya_nenkin_ary'])."'";
				//配偶者無し
				}else{
					echo "'".implode("','",$_SESSION['to_child_independence_ary'])."'";
				}
			}else{
					echo "'".implode("','",$_SESSION['to_child_independence_ary'])."'";
			}
		?>&cnt=
		<?php
			if($_SESSION['to_child_independence'] < $_SESSION['to_haigusya_nenkin']){
				//配偶者あり
				if(isset($_SESSION['to_haigusya_nenkin_ary'])){
					echo "'".implode("','",$_SESSION['to_haigusya_nenkin_year_cnt_ary'])."'";
				}else{
					echo "'".implode("','",$_SESSION['to_child_independence_year_cnt_ary'])."'";
				}
			}else{
				echo "'".implode("','",$_SESSION['to_child_independence_year_cnt_ary'])."'";
			}
		
			echo '&child_plan='.$_SESSION['child_plan'];
		?>" scrolling="no" frameborder="no" width="100%" height="100%" allowfullscreen></iframe>
		</div>
	</div>
</div>

<div class="block3" >
	<div class="midashi_head">ご本人死亡後に不足する生活費②</div>
	<div class="mini_grf">
		<iframe src="grf_sibo02.php?child=
		<?php
			if($_SESSION['child_plan'] == 1){
				echo '0';
			}else{
				echo $_SESSION['to_child_independence'];
			}
		?>&haigusya=
		<?php
			if($_SESSION['child_plan'] == 1){
				echo '0';
			}else{
				echo $_SESSION['to_haigusya_nenkin'];
			}
		
			echo '&child_plan='.$_SESSION['child_plan'];
		?>" scrolling="no" frameborder="no" width="100%" height="100%" allowfullscreen></iframe>
		</div>
	</div>
</div>

<div class="block3">
	<div class="midashi_head">毎年の貯蓄増金額</div>
	<div class="mini_grf" id="plus_save_grf">
		<iframe src="grf_plus_save.php?age=<?php echo "'".implode("','",$_SESSION['age'])."'";?>&plus_save=<?php echo "'".implode("','",$_SESSION['plus_save'])."'";?>" scrolling="no" frameborder="no" width="100%" height="100%" allowfullscreen></iframe>
	</div>
</div>

<div class="block3">
	<div class="midashi_head">年齢別給与(手取換算)</div>
	<div class="mini_grf" id="income_grf">
		<iframe src="grf_income.php?income_val=<?php echo $_SESSION['income_avg_by_age'];?>" scrolling="no" frameborder="no" width="100%" height="100%" allowfullscreen></iframe>
	</div>
</div>

<div class="block3">
	<div class="midashi_head">年齢別消費<?php
		//0:正社員
		if($_POST['workstyle'] == 0){
			echo '(支出項目:[合計]に相当)';	
		//1:フリーランス
		}else{
			echo '(支出項目:[小計(税抜)]に相当)';
		}
	?></div>
	<div class="mini_grf">
		<iframe src="grf_outgo.php?outgo_val=<?php echo $_SESSION['outgo_avg_by_age'];?>" scrolling="no" frameborder="no" width="100%" height="100%" allowfullscreen></iframe>
	</div>
	
</div>

<div class="block3">
	<div class="midashi_head">各種支出</div>
	<div class="mini_grf">
		<iframe src="grf_003.php?<?php

			//自動車
			if(isset($_POST['car'])){
				$you = abs($_POST['car']);	
			}else{
				$you = 0;
			}
			echo "car=".$you."&car_avg=137&lbl1=".urlencode('車購入費')."&";

			//旅行費用
			if(isset($_POST['trip'])){
				$you = abs($_POST['trip']);	
			}else{
				$you = 0;
			}
			if(isset($_POST['haigusya'])){
				if($_POST['haigusya'] > 0){
					$avg = 2.78 * 5.16 * 2;
				}else{
					$avg = 2.78 * 5.16;
				}
			}else{
				$avg = 2.78 * 5.16;
			}
			echo "trip=".$you."&trip_avg=".$avg."&lbl2=".urlencode('旅費')."&";

			//情報通信費
			if(isset($_POST['it'])){
				$you = abs($_POST['it']);	
			}else{
				$you = 0;	
			}
			$you = $you * 12;
			echo "it=".$you."&it_avg=21.3&lbl3=".urlencode('通信費');

		?>" scrolling="no" frameborder="no" width="100%" height="100%" allowfullscreen></iframe>
	</div>
</div>


<!--◆◆◆スクロールスクリプト◆◆◆-->
<script type='text/javascript'>
//window.addEventListener('onload', pieGraphAnim); // 読み込み時の処理
window.addEventListener('scroll', pieGraphAnim); // スクロール時の処理

var chartEl1 = document.getElementById("number1");
var chartEl2 = document.getElementById("number2");

var chartFlag1 = false;
var chartFlag2 = false;

function number1CntUp() {
	//カウントアップ
	var num = <?php echo $_SESSION['to_child_independence_min']; ?>;
	var tgt = <?php echo round($_SESSION['to_child_independence'],0); ?>;
	var speed = 1;
	setInterval(function(){
		if(num <= tgt){
			document.getElementById("number1").innerHTML = num;
			num++;
		}
	},speed);
};
function number2CntUp() {
	//カウントアップ
	var num = <?php echo $_SESSION['to_haigusya_nenkin_min']; ?>;
	var tgt = <?php echo round($_SESSION['to_haigusya_nenkin'],0); ?>;
	var speed = 1;
	setInterval(function(){
		if(num <= tgt){
			document.getElementById("number2").innerHTML = num;
			num++;
		}
	},speed);
};

function pieGraphAnim() {
	var wy = window.pageYOffset,
		//wb = wy + screen.height - 200, 
		wb = wy + screen.height, 
		// ウィンドウの最下部位置を取得
		// 各チャートの位置を取得
		chartElPos1 = wy + chartEl1.getBoundingClientRect().top,
		chartElPos2 = wy + chartEl2.getBoundingClientRect().top;

	// チャートの位置がウィンドウの最下部位置を超えたら起動
	if ( wb > chartElPos1 && chartFlag1 == false ) {
		number1CntUp();
		chartFlag1 = true;
	}
	if ( wb > chartElPos2 && chartFlag2 == false ) {
		number2CntUp();
		chartFlag2 = true;
	}
}
</script>
<!--◆◆◆スクロールスクリプト◆◆◆-->
<!--</div>-->
</body>
</html>
