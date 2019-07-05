<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title>LifePlan</title>

<style>
body{
	font-size:13px;
}
#resultTbl {
  border-collapse: collapse;
  visibility:hidden;
  /*width:100%;*/
  font-size:9px;
  position:relative;
  margin:0px;
  padding:0px;
  z-index:-99;
  table-layout:fixed;
}
#resultTbl th,#resultTbl td {
  /*padding: 5px;*/
  border: solid 1px #987777;
}
#resultTbl thead th {
  background: #D19B9B;
  color: #fff;
}
#resultTbl tbody th {
  background: #FFF0F0;
  color: #AA5A5A;
}
#resultTbl tbody td {
  background: #FBFBFB;
  text-align:center;
}

#resultTbl tbody th#minus{
  background:#e6e6fa;
  color:#483d8b;
}

#resultTbl tbody th#age{
  background:#98fb98;
  color:#006400;
}

#resultTbl tbody th#saving{
  background:#ee82ee;
  color:#800080;
}


/*先頭列以外の幅･高さ指定*/
#resultTbl thead tr th,
#resultTbl tbody tr th{
	min-width:30px;
	min-height:18px;
}

/*先頭列の幅･高さ指定*/
#resultTbl thead tr th:nth-of-type(1),
#resultTbl tbody tr th:nth-of-type(1){
	min-width:55px;
	min-height:18px;
}

#resultTblRap{
	margin:0px;
	padding:0px;
	display:none;
	height:150px;
	width:1310px;
	overflow:scroll;
}

#detail{
	border-radius:50%;
	height:80px;
	width:80px;
	text-align:center;
	line-height: 80px;
	vertical-align:middle;
	right:15px;
	top:15px;
	color:white;
	font-weight:bold;
	font-size:14px;
	background:orange;
	filter:alpha(opacity=50);
	-moz-opacity: 0.5;
	opacity: 0.5;
	position:absolute;
	cursor: pointer;
}

#anken{
	border-radius:50%;
	height:80px;
	width:80px;
	text-align:center;
	line-height: 80px;
	vertical-align:middle;
	right:15px;
	top:110px;
	color:white;
	font-weight:bold;
	font-size:14px;
	background:orange;
	filter:alpha(opacity=50);
	-moz-opacity: 0.5;
	opacity: 0.5;
	position:absolute;
	cursor: pointer;
	text-decoration: none;
}

input[type=text] {
	text-align:left;
	width: 50px;
	font-size:13px;
	height:14px;
	margin:0px 0px 2px 2px;
}

.box_unit{
	float:left;
	margin:0 4px  5px 0px;
}

.title{
	margin:0 0 3px 0;
	padding:0 0 0 4px;
	clear:both;
	color:#ffffff;
	width:98%;
	border-radius:5px;
	background:rgba(254,97,132,1);
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

<script type="text/javascript">
$(function() {
	$('#detail').on('click', function(event){
		if(document.getElementById('resultTbl').style.visibility == 'visible'){
			document.getElementById('resultTbl').style.visibility='hidden';
			document.getElementById('resultTblRap').style.display='none';
		}else{
			document.getElementById('resultTbl').style.visibility='visible';
			document.getElementById('resultTblRap').style.display='block';
		}
	});
});	
</script>

<div id="detail">詳細</div>
<a id="anken" href="summary.php" target="_blank">案件統計</a>

<?php
//★国民年金:加入年数 * 2
//★厚生年金:報酬月額 * 660 * 加入年数
//★ライフスタイル 老後はアクティブ(生活費*1.2)

//★サラリーマンの住宅ローン控除
//★住宅ローンの収支反映

//*****************************
//入力情報
//*****************************
$free_income = abs($_POST['free_income']*12);		
$sal_income = abs($_POST['sal_income']*12);		
$home = abs($_POST['home']*12);

//---------------------------------
//旅行
//---------------------------------
if(isset($_POST['trip'])){
	$trip = abs($_POST['trip']);	
}else{
	$trip = 0;
}

//---------------------------------
//年齢
//---------------------------------
$age = abs($_POST['age']);
//85歳までシュミレーション		
$age_cnt = 85 - $age + 1;

//---------------------------------
//ワークスタイル
//---------------------------------
$workstyle = $_POST['workstyle']; //0:salary 1:free		

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
//配偶者･家族
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

//---------------------------------
//経費関連
//---------------------------------
$ryohi = abs($_POST['ryohi']);
$it = abs($_POST['it']);
$book = abs($_POST['book']);
$settai = abs($_POST['settai']);
$syokibo = abs($_POST['syokibo']);

//▼住宅ローン関連
$home_back_end_age = abs($_POST['home_back_end_age']);
$home_back_zankin = abs($_POST['home_back_zankin']);
$home_back_year_cnt = $_POST['home_back_year_cnt'];

$keihi = ($ryohi + $it + $book + $settai + $syokibo + ($home/12*0.3)) * 12;
$seikatsu_in_keihi = ($ryohi + $it + $book + $settai) * 12;

//---------------------------------
//その他生活費
//---------------------------------
if(isset($_POST['sonota_seikatsuhi'])){
	$sonota_seikatsuhi = abs($_POST['sonota_seikatsuhi']) * 12;	
}else{
	$sonota_seikatsuhi = 0;
}

//---------------------------------
//経費となるが出費ではないもの
//---------------------------------
$on_keihi = abs($_POST['on_keihi']);
$senjusya = abs($_POST['senjusya']);
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
//特別支出
//---------------------------------
if(isset($_POST['tokusyutsu'])){
	$tokusyutsu = abs($_POST['tokusyutsu']);	
}else{
	$tokusyutsu = 0;	
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
$iryohi_kami = $_POST['iryohi_kami']; //0:しない 1:する		

//---------------------------------
//年金計算用
//---------------------------------
if(isset($_POST['sal_year'])){
	$sal_year = abs($_POST['sal_year']);	
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

$kosei_nenkin_jukyu_free = ($hyojun_gaku * 660 * $sal_year_sum)/10000;
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

//小規模企業共催(初期化)
$syokibo_sum = 0;

$_SESSION['JuminZeiSal'] = '';
$_SESSION['SyotokuZeiSal'] = '';
$_SESSION['KenpoSal'] = '';
$_SESSION['NenkinSal'] = '';
$_SESSION['JuminZeiFree'] = '';
$_SESSION['SyotokuZeiFree'] = '';
$_SESSION['KenpoFree'] = '';
$_SESSION['NenkinFree'] = '';
$_SESSION['Gakuhi'] = '';
$_SESSION['SyokiboKigyo_Sum'] = '';
$_SESSION['KihonSeikatsuHiFree'] = '';
$_SESSION['KihonSeikatsuHiSal'] = '';
$_SESSION['Syokibo_unit'] = '';
$_SESSION['Toku_syutsu'] = '';
$_SESSION['Iryohi'] = '';
$_SESSION['Sal_nenkin_in'] = '';
$_SESSION['Free_nenkin_in'] = '';
$_SESSION['Child_Teate'] = '';
$_SESSION['Kyuyo_Hosyu_Sal'] = '';
$_SESSION['Kyuyo_Hosyu_Free'] = '';
$_SESSION['TaisyokuKin'] = '';
$_SESSION['SyokiboKigyo_in'] = '';
$_SESSION['add_minus_kingaku'] = '';
$_SESSION['add_plus_kingaku'] = '';
$_SESSION['Jutaku_loan_kanpu'] = '';

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
	//フリーの収入は45歳まで上昇。以後頭打ちとする。
	if($age <= 40 ){
		$free_income = $free_income * 1.02;
	}
	
	if($age <= 40){
		$sal_income = $sal_income * 1.05;
	}else{
		if($age <= 50 ){
			$sal_income = $sal_income * 1.01;
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

	//=================================
	//家電(10年で家電6種買い替え(6家電*各7万と仮定) 10年で42万 1年で4.2万)
	//=================================
	$temp_outgo = $temp_outgo + 4.2;

	//グラフ出力用データ格納
	$age_ary[] = $age;
	$home_ary[] = $home;
	$kaden_ary[] = 4.2;
	
	//小規模企業共済
	$syokibo_sum = $syokibo_sum + $syokibo;
	$_SESSION['SyokiboKigyo_Sum'] = $syokibo_sum;

	//=================================
	//▼住宅ローン控除額計算
	//=================================
	//返済10年間は住宅ローン控除適用
	$jutaku_loan_kojo = 0;
	//住宅ローン返済額計算
	if($i==0){
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

	if($iryohi_kami == 1){
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
	
	//=================================
	//特別支出	
	//=================================
	//グラフ出力用データ格納
	$Toku_syutsu_ary = $_SESSION['Toku_syutsu'];
	$Toku_syutsu_ary[] = $tokusyutsu;
	$_SESSION['Toku_syutsu'] = $Toku_syutsu_ary;

	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
	//正社員
	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
	//●income
	$income_commit = income_calc($age,$sal_income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$taisyokukin,$kosei_nenkin_jukyu_sal,$kokumin_nenkin_jukyu_sal,$jutaku_loan_kojo);
	$income_commit = $income_commit + $temp_income;
	
	//●outgo
	$outgo_commit = outgo_calc($i,$age,0,$sal_income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$keihi,$seikatsu_in_keihi,$no_out_keihi,$home,$retire,$syokibo,$sonota_seikatsuhi,$retire_plan,$jutaku_loan_kojo);
	$outgo_commit = $outgo_commit + $temp_outgo + $tokusyutsu;

	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
	//フリーランス
	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆
	//●income_calc
	$income_commit = free_income_calc($age,$free_income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$retire,$kosei_nenkin_jukyu_free,$kokumin_nenkin_jukyu_free);
	$income_commit = $income_commit + $temp_income;

	//●outgo
	$outgo_commit = outgo_calc($i,$age,1,$free_income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$keihi,$seikatsu_in_keihi,$no_out_keihi,$home,$retire,$syokibo,$sonota_seikatsuhi,$retire_plan,$jutaku_loan_kojo);
	$outgo_commit = $outgo_commit + $temp_outgo + $tokusyutsu;
	
	$haigusya_age = $haigusya_age + 1;
	$child1_age = $child1_age + 1;
	$child2_age = $child2_age + 1;
	$child3_age = $child3_age + 1;

	$age = $age + 1;

}		

//*****************************		
//グラフ出力
//*****************************		
output_grhaf($age_ary,$home_ary,$kaden_ary,$hoken_ary,$car_ary,$trip_ary,$workstyle,$iryohi_kami,$jutaku_loan_zankin_ary,$jutaku_loan_hensai_ary);

//*****************************
//income calc(正社員)		
//*****************************
function income_calc($age,$income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$taisyokukin,$kosei_nenkin_jukyu,$kokumin_nenkin_jukyu,$jutaku_loan_kojo){		

	//リタイア年で退職
	if($age >= 60){
		$income = 0;
	}
	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//給与	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//グラフ出力用データ格納
	$kyuyo_hosyu_ary = $_SESSION['Kyuyo_Hosyu_Sal'];
	$kyuyo_hosyu_ary[] = $income;
	$_SESSION['Kyuyo_Hosyu_Sal'] = $kyuyo_hosyu_ary;

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//子ども手当	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	$child_Teate = child_Teate_Calc($child1_age,$child2_age,$child3_age);
	$ret_income =  $income + $child_Teate;

	//グラフ出力用データ格納
	$child_teate_ary = $_SESSION['Child_Teate'];
	$child_teate_ary[] = $child_Teate;
	$_SESSION['Child_Teate'] = $child_teate_ary;

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//退職金	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//リタイア年で退職金
	if($age == 60){

		//グラフ出力用データ格納
		$TaisyokuKin_ary = $_SESSION['TaisyokuKin'];
		$TaisyokuKin_ary[] = $taisyokukin;
		$_SESSION['TaisyokuKin'] = $TaisyokuKin_ary;

		$ret_income = $ret_income + $taisyokukin;
	}else{
	
		//グラフ出力用データ格納
		$TaisyokuKin_ary = $_SESSION['TaisyokuKin'];
		$TaisyokuKin_ary[] = 0;
		$_SESSION['TaisyokuKin'] = $TaisyokuKin_ary;
	}

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//年金	
	//★相談者ご自身の年金のみとする。
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//65歳以降は年金
	if($age >= 65){
		$ret_income = $ret_income + $kosei_nenkin_jukyu + $kokumin_nenkin_jukyu;
		//グラフ出力用データ格納
		$sal_nenkin_in_ary = $_SESSION['Sal_nenkin_in'];
		$sal_nenkin_in_ary[] = $kosei_nenkin_jukyu + $kokumin_nenkin_jukyu;
		$_SESSION['Sal_nenkin_in'] = $sal_nenkin_in_ary;
	}else{
		//グラフ出力用データ格納
		$sal_nenkin_in_ary = $_SESSION['Sal_nenkin_in'];
		$sal_nenkin_in_ary[] = 0;
		$_SESSION['Sal_nenkin_in'] = $sal_nenkin_in_ary;
	}

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//▼住宅ローン控除による所得税還付
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//所得税超概算
	$x = ($income / 0.8) * 0.15;

	if($x < $jutaku_loan_kojo){
		$jutaku_loan_kojo = $x;
	}

	//グラフ出力用データ格納
	$jutaku_loan_kanpu_ary = $_SESSION['Jutaku_loan_kanpu'];
	$jutaku_loan_kanpu_ary[] = $jutaku_loan_kojo;
	$_SESSION['Jutaku_loan_kanpu'] = $jutaku_loan_kanpu_ary;

	return $ret_income;
}		

//*****************************
//free_income calc		
//*****************************
function free_income_calc($age,$income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$retire,$kosei_nenkin_jukyu,$kokumin_nenkin_jukyu){

	//リタイア年で定年
	if($age >= $retire){
		$income = 0;
	}
	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//給与
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//グラフ出力用データ格納
	$kyuyo_hosyu_ary = $_SESSION['Kyuyo_Hosyu_Free'];
	$kyuyo_hosyu_ary[] = $income;
	$_SESSION['Kyuyo_Hosyu_Free'] = $kyuyo_hosyu_ary;

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//子ども手当
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	$child_Teate = child_Teate_Calc($child1_age,$child2_age,$child3_age);
	$ret_income =  $income + $child_Teate;

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//年金
	//★相談者ご自身の年金のみとする。
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//65歳以降は年金
	if($age >= 65){
		$ret_income = $ret_income + $kokumin_nenkin_jukyu + $kosei_nenkin_jukyu;
		//グラフ出力用データ格納
		$free_nenkin_in_ary = $_SESSION['Free_nenkin_in'];
		$free_nenkin_in_ary[] = $kokumin_nenkin_jukyu + $kosei_nenkin_jukyu;
		$_SESSION['Free_nenkin_in'] = $free_nenkin_in_ary;
	}else{
		$free_nenkin_in_ary = $_SESSION['Free_nenkin_in'];
		$free_nenkin_in_ary[] = 0;
		$_SESSION['Free_nenkin_in'] = $free_nenkin_in_ary;
	}

	//リタイア年で小規模企業共済(廃業)
	if(isset($_SESSION['SyokiboKigyo_Sum'])){
		$syokibo = $_SESSION['SyokiboKigyo_Sum'];
	}else{
		$syokibo = 0;
	}

	if($age == $retire){
		//グラフ出力用データ格納
		$SyokiboKIgyo_in_ary = $_SESSION['SyokiboKigyo_in'];
		$SyokiboKIgyo_in_ary[] = ($syokibo * 12);
		$_SESSION['SyokiboKigyo_in'] = $SyokiboKIgyo_in_ary;

		$ret_income = $ret_income + ($syokibo * 12);
	}else{

		//グラフ出力用データ格納
		$SyokiboKIgyo_in_ary = $_SESSION['SyokiboKigyo_in'];
		$SyokiboKIgyo_in_ary[] = 0;
		$_SESSION['SyokiboKigyo_in'] = $SyokiboKIgyo_in_ary;
	}
	
	return $ret_income;
}		

//*****************************		
//outgo calc		
//*****************************		
function outgo_calc($i,$age,$workstyle,$income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$keihi,$seikatsu_in_keihi,$no_out_keihi,$home,$retire,$syokibo,$sonota_seikatsuhi,$retire_plan,$jutaku_loan_kojo){
		
	$outgo = 0;	
		
	//サラリーマン
	if($workstyle == 0){
		//リタイア年で定年
		if($age >= 60){
			$income = 0;
		}
	//フリー
	}else{
		//リタイア年で定年
		if($age >= $retire){
			$income = 0;
		}
	}
	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//学費	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	$Gakuhi1 = get_Gakuhi($child1_age);
	$Gakuhi2 = get_Gakuhi($child2_age);
	$Gakuhi3 = get_Gakuhi($child3_age);

	$Gakuhi = $Gakuhi1 + $Gakuhi2 + $Gakuhi3;

	//グラフ出力用データ格納
	if($workstyle == 0){
		$Gakuhi_ary = $_SESSION['Gakuhi'];
		$Gakuhi_ary[] = $Gakuhi;
		$_SESSION['Gakuhi'] = $Gakuhi_ary;
	}
	//echo 'Gakuhi:'.$Gakuhi.'<br/>';

	//所得の算出
	//(収入-経費)
	$income_minus_keihi = get_income_minus_keihi($age,$income,$keihi,$no_out_keihi,$retire);

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//正社員	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	if($workstyle == 0){
		
		//============================
		//生活費	
		//============================
		//リタイア年で基本生活費を分岐
		//▼(経費($seikatsu_in_keihi)となり得る項目も支出としてカウント)
		if($age < 60){
			$Kihon_Seikatsu_Hi = $sonota_seikatsuhi + $seikatsu_in_keihi;
		}else{
			switch ($retire_plan) {
			    case 0:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 0.85 + $seikatsu_in_keihi;
			        break;
			    case 1:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 1.0 + $seikatsu_in_keihi;
			        break;
			    case 2:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 1.15 + $seikatsu_in_keihi;
			        break;
			}
		}

		//============================
		//国民健康保険	
		//============================
		//リタイア年以降は国民健康保険に加入
		if($age >= 60){
			$KanyusyaSu = 1;
			if($haigusya_flg = 1){
				$KanyusyaSu = $KanyusyaSu + 1;
			}
			if($child1_flg = 1 and $child1_age <= 28){
				$KanyusyaSu = $KanyusyaSu + 1;
			}
			if($child2_flg = 1 and $child2_age <= 28){
				$KanyusyaSu = $KanyusyaSu + 1;
			}
			if($child3_flg = 1 and $child3_age <= 28){
				$KanyusyaSu = $KanyusyaSu + 1;
			}

			$Kenko_Hoken_Kazei_Taisyo = get_Kazei_Taisyo('J',$income,1,$haigusya_age,$child1_age,$child2_age,$child3_age);
			$Kokumin_Kenko_Hoken = get_Kokumin_Kenko_Hoken($Kenko_Hoken_Kazei_Taisyo,$age,$KanyusyaSu);

		}else{
			$Kokumin_Kenko_Hoken = 0;
		}

		//グラフ出力用データ格納
		$KihonSeikatsuHiSal_ary = $_SESSION['KihonSeikatsuHiSal'];
		$KihonSeikatsuHiSal_ary[] = $Kihon_Seikatsu_Hi;
		$_SESSION['KihonSeikatsuHiSal'] = $KihonSeikatsuHiSal_ary;

		$outgo = $Gakuhi + $Kihon_Seikatsu_Hi + $hoken + $Kokumin_Kenko_Hoken + $home;
		
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//フリーランス	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	}else{	

		//============================
		//▼生活費	
		//============================
		//リタイア年で基本生活費を分岐
		if($age < $retire){
		//(経費($seikatsu_in_keihi)となり得る項目も支出としてカウント)
			$Kihon_Seikatsu_Hi = $sonota_seikatsuhi + $seikatsu_in_keihi;
		}else{
			switch ($retire_plan) {
			    case 0:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 0.85 + $seikatsu_in_keihi;
			        break;
			    case 1:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 1.0 + $seikatsu_in_keihi;
			        break;
			    case 2:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 1.15 + $seikatsu_in_keihi;
			        break;
			}
		}

		//============================
		//▼住民税	
		//============================
		//①住民税の課税対象額
		$Jumin_Kazei_Taisyo = get_Kazei_Taisyo('J',$income_minus_keihi,1,$haigusya_age,$child1_age,$child2_age,$child3_age);
		
		//②調整控除額
		//考慮せず
		
		//③住民税の算出
		$KintoWari = 0.6;
		//所得割 (0.06+0.04)+ 均等割(6000円固定)
		if($Jumin_Kazei_Taisyo > 0){
			$Jumin_Zei = ($Jumin_Kazei_Taisyo * 0.1) + $KintoWari; 
		}else{
			$Jumin_Zei = 0; 
		}

		//グラフ出力用データ格納
		$JuminZeiFree_ary = $_SESSION['JuminZeiFree'];
		if($i == 0){
			//▼徴収は1年遅れの為、2回挿入することで1年ずらす
			$JuminZeiFree_ary[] = $Jumin_Zei;
			$_SESSION['JuminZeiFree'] = $JuminZeiFree_ary;
		}
		$JuminZeiFree_ary[] = $Jumin_Zei;
		$_SESSION['JuminZeiFree'] = $JuminZeiFree_ary;

		//============================
		//▼所得税	
		//============================
		//所得税の課税対象所得計算
		$Syotoku_Kazei_Taisyo = get_Kazei_Taisyo('S',$income_minus_keihi,1,$haigusya_age,$child1_age,$child2_age,$child3_age);
		$Syotoku_Zei = get_Syotoku_Zei($Syotoku_Kazei_Taisyo);

		//----------------------------
		//▼住宅ローン控除
		//----------------------------
		if($Syotoku_Zei - $jutaku_loan_kojo < 0){
			$Syotoku_Zei = 0;
		}else{
			$Syotoku_Zei = $Syotoku_Zei - $jutaku_loan_kojo;
		}

		//グラフ出力用データ格納
		$SyotokuZeiFree_ary = $_SESSION['SyotokuZeiFree'];
		if($i == 0){
			//▼徴収は1年遅れの為、2回挿入することで1年ずらす
			$SyotokuZeiFree_ary[] = $Syotoku_Zei;
			$_SESSION['SyotokuZeiFree'] = $SyotokuZeiFree_ary;
		}
		$SyotokuZeiFree_ary[] = $Syotoku_Zei;
		$_SESSION['SyotokuZeiFree'] = $SyotokuZeiFree_ary;

		//============================
		//▼生活費	
		//============================
		$KihonSeikatsuHiFree_ary = $_SESSION['KihonSeikatsuHiFree'];
		$KihonSeikatsuHiFree_ary[] = $Kihon_Seikatsu_Hi;
		$_SESSION['KihonSeikatsuHiFree'] = $KihonSeikatsuHiFree_ary;

		//============================
		//▼国民年金	
		//============================
		if($age < 60){
			$Kokumin_Nenkin = 1.6 * 12;
		}else{
			$Kokumin_Nenkin = 0;
		}

		//グラフ出力用データ格納
		$NenkinFree_ary = $_SESSION['NenkinFree'];
		$NenkinFree_ary[] = $Kokumin_Nenkin;
		$_SESSION['NenkinFree'] = $NenkinFree_ary;

		//============================
		//▼国民健康保険	
		//============================
		$KanyusyaSu = 1;
		if($haigusya_flg = 1){
			$KanyusyaSu = $KanyusyaSu + 1;
		}
		if($child1_flg = 1 and $child1_age <= 28){
			$KanyusyaSu = $KanyusyaSu + 1;
		}
		if($child2_flg = 1 and $child2_age <= 28){
			$KanyusyaSu = $KanyusyaSu + 1;
		}
		if($child3_flg = 1 and $child3_age <= 28){
			$KanyusyaSu = $KanyusyaSu + 1;
		}

		$Kenko_Hoken_Kazei_Taisyo = get_Kazei_Taisyo('J',$income_minus_keihi,1,$haigusya_age,$child1_age,$child2_age,$child3_age);
		$Kokumin_Kenko_Hoken = get_Kokumin_Kenko_Hoken($Kenko_Hoken_Kazei_Taisyo,$age,$KanyusyaSu);

		//グラフ出力用データ格納
		$KenpoFree_ary = $_SESSION['KenpoFree'];
		if($i == 0){
			//▼徴収は1年遅れの為、2回挿入することで1年ずらす
			$KenpoFree_ary[] = $Kokumin_Kenko_Hoken;
			$_SESSION['KenpoFree'] = $KenpoFree_ary;
		}
		$KenpoFree_ary[] = $Kokumin_Kenko_Hoken;
		$_SESSION['KenpoFree'] = $KenpoFree_ary;

		//============================
		//▼小規模企業共済	
		//============================
		//リタイア年で分岐
		if($age < $retire){
			$syokibo_kigyo_hoken = $syokibo * 12;
		}else{
			$syokibo_kigyo_hoken = 0;
		}

		//グラフ出力用データ格納
		$Syokibo_ary = $_SESSION['Syokibo_unit'];
		$Syokibo_ary[] = $syokibo_kigyo_hoken;
		$_SESSION['Syokibo_unit'] = $Syokibo_ary;

		//支出合計額
		$outgo = $Gakuhi + $Jumin_Zei + $Kihon_Seikatsu_Hi + $Kokumin_Nenkin + $Kokumin_Kenko_Hoken + $Syotoku_Zei + $hoken + $home + $syokibo_kigyo_hoken;
	}	
		
	return $outgo;
}		

function get_Gakuhi($child_age){

	//https://sho.jp/topic/8106
	$Gakuhi = 0;
	
	switch ($child_age) {
	    case 4:
	        $Gakuhi = 36.3;
	        break;
	    case 5:
	        $Gakuhi = 34;
	        break;
	    case 6:
	        $Gakuhi = 33.6;
	        break;

	    case 7:
	        $Gakuhi = 25.3;
	        break;
	    case 8:
	        $Gakuhi = 26.4;
	        break;
	    case 9:
	        $Gakuhi = 27.1;
	        break;
	    case 10:
	        $Gakuhi = 28.4;
	        break;
	    case 11:
	        $Gakuhi = 30.7;
	        break;
	    case 12:
	        $Gakuhi = 29.9 + 19; //学外教育費を加算
	        break;

	    case 13:
	        $Gakuhi = 33.7 + 17.5; //学外教育費を加算
	        break;
	    case 14:
	        $Gakuhi = 25 + 22; //学外教育費を加算
	        break;
	    case 15:
	        $Gakuhi = 24 + 35.8; //学外教育費を加算
	        break;

		//公立+私立の平均値を採用
	    case 16:
	        $Gakuhi = (27.6 + 75.5)/2;
	        break;
	    case 17:
	        $Gakuhi = (27.6 + 75.5)/2;
	        break;
	    case 18:
	        $Gakuhi = (27.6 + 75.5)/2;
	        break;

		//国立･公立+私立の平均値を採用
	    case 19:
	        $Gakuhi = (34 + 25.6)/2 + (53 + 110)/2;
	        break;
	    case 20:
	        $Gakuhi = (53.8 + 110)/2;
	        break;
	    case 21:
	        $Gakuhi = (53.8 + 110)/2;
	        break;
	    case 22:
	        $Gakuhi = (53.8 + 110)/2;
	        break;
	}
	
	return $Gakuhi;

}

function child_Teate_Calc($child1_age,$child2_age,$child3_age){

	$child_Teate = 0;	
		
	//*************************	
	//1st_child	
	//*************************	
	if($child1_age >= 0 and $child1_age < 3){	
		$child_Teate = $child_Teate + 1.5;
	}	
	if($child1_age >= 3 and $child1_age < 7){	
		$child_Teate = $child_Teate + 1;
	}	
	if($child1_age >= 8 and $child1_age <= 15){	
		$child_Teate = $child_Teate + 1;
	}	
	//*************************	
	//2nd_child	
	//*************************	
	if($child2_age >= 0 and $child2_age < 3){	
		$child_Teate = $child_Teate + 1.5;
	}	
	if($child2_age >= 2 and $child2_age < 7){	
		$child_Teate = $child_Teate + 1;
	}	
	if($child2_age >= 8 and $child2_age <= 15){	
		$child_Teate = $child_Teate + 1;
	}	
	//*************************	
	//3rd_child	
	//*************************	
	if($child3_age >= 0 and $child3_age < 3){	
		$child_Teate = $child_Teate + 1.5;
	}	
	if($child3_age >= 2 and $child3_age < 7){	
		$child_Teate = $child_Teate + 1.5;
	}	
	if($child3_age >= 8 and $child3_age <= 15){	
		$child_Teate = $child_Teate + 1;
	}	
	//*************************	
	//(Year)child_Teate	
	//*************************	
	$child_Teate = $child_Teate * 12;	
	
	return $child_Teate;
}

function get_Syotoku_Zei($income){

	$Syotoku_Zei = 0;
	$Kazei_Taisyo_Syotoku = $income;
	
	if($Kazei_Taisyo_Syotoku > 0){
		if($Kazei_Taisyo_Syotoku <= 99999) $Syotoku_Zei = $Kazei_Taisyo_Syotoku * 0.45 - 479.6;
		if($Kazei_Taisyo_Syotoku <= 4000) $Syotoku_Zei = $Kazei_Taisyo_Syotoku * 0.4 - 279.6;
		if($Kazei_Taisyo_Syotoku <= 1800) $Syotoku_Zei = $Kazei_Taisyo_Syotoku * 0.33 - 153.6;	
		if($Kazei_Taisyo_Syotoku <= 900) $Syotoku_Zei = $Kazei_Taisyo_Syotoku * 0.23 - 63.6;	
		if($Kazei_Taisyo_Syotoku <= 695) $Syotoku_Zei = $Kazei_Taisyo_Syotoku * 0.2 - 42.75;	
		if($Kazei_Taisyo_Syotoku <= 330) $Syotoku_Zei = $Kazei_Taisyo_Syotoku * 0.1 - 9.75;	
		if($Kazei_Taisyo_Syotoku <= 195) $Syotoku_Zei = $Kazei_Taisyo_Syotoku * 0.05;	
	}else{
		$Syotoku_Zei = 0;
	}
	
	
	if($Syotoku_Zei > 0 ){
		//復興特別支援税
		$Syotoku_Zei = $Syotoku_Zei + $Kazei_Taisyo_Syotoku * 0.021;
	}
	
	return $Syotoku_Zei;
}

function get_Kosei_Nenkin($income){

	$Hyojun_Hosyu_Getugaku = $income/12;
	
	$Kosei_Nenkin = 0;
	
	//労使折半額
	if($Hyojun_Hosyu_Getugaku >= 15) $Kosei_Nenkin = 1.3750;	
	if($Hyojun_Hosyu_Getugaku >= 16) $Kosei_Nenkin = 1.4640;	
	if($Hyojun_Hosyu_Getugaku >= 17) $Kosei_Nenkin = 1.5555;	
	if($Hyojun_Hosyu_Getugaku >= 18) $Kosei_Nenkin = 1.6470;	
	if($Hyojun_Hosyu_Getugaku >= 19) $Kosei_Nenkin = 1.7385;	
	if($Hyojun_Hosyu_Getugaku >= 20) $Kosei_Nenkin = 1.8300;	
	if($Hyojun_Hosyu_Getugaku >= 22) $Kosei_Nenkin = 2.0130;	
	if($Hyojun_Hosyu_Getugaku >= 24) $Kosei_Nenkin = 2.1960;	
	if($Hyojun_Hosyu_Getugaku >= 26) $Kosei_Nenkin = 2.3790;	
	if($Hyojun_Hosyu_Getugaku >= 28) $Kosei_Nenkin = 2.5620;	
	if($Hyojun_Hosyu_Getugaku >= 30) $Kosei_Nenkin = 2.7450;	
	if($Hyojun_Hosyu_Getugaku >= 32) $Kosei_Nenkin = 2.9280;	
	if($Hyojun_Hosyu_Getugaku >= 34) $Kosei_Nenkin = 3.1110;	
	if($Hyojun_Hosyu_Getugaku >= 36) $Kosei_Nenkin = 3.2940;	
	if($Hyojun_Hosyu_Getugaku >= 38) $Kosei_Nenkin = 3.4770;	
	if($Hyojun_Hosyu_Getugaku >= 41) $Kosei_Nenkin = 3.7515;	
	if($Hyojun_Hosyu_Getugaku >= 44) $Kosei_Nenkin = 4.0260;	
	if($Hyojun_Hosyu_Getugaku >= 47) $Kosei_Nenkin = 4.3005;	
	if($Hyojun_Hosyu_Getugaku >= 50) $Kosei_Nenkin = 4.5750;	
		
	$Kosei_Nenkin = $Kosei_Nenkin * 12;
	return $Kosei_Nenkin;
	//echo 'KoseiNenkin:'.$Kosei_Nenkin.'<br/>';

}

function get_Kenko_Hoken($income,$age){

	$Hyojun_Hosyu_Getugaku = $income/12;
	
	//労使折半額
	if($Hyojun_Hosyu_Getugaku >= 15) $Kenko_Hoken = 7387.5;	
	if($Hyojun_Hosyu_Getugaku >= 16) $Kenko_Hoken = 7880;	
	if($Hyojun_Hosyu_Getugaku >= 17) $Kenko_Hoken = 8372.5;	
	if($Hyojun_Hosyu_Getugaku >= 18) $Kenko_Hoken = 8865;	
	if($Hyojun_Hosyu_Getugaku >= 19) $Kenko_Hoken = 9357.5;	
	if($Hyojun_Hosyu_Getugaku >= 20) $Kenko_Hoken = 9850;	
	if($Hyojun_Hosyu_Getugaku >= 22) $Kenko_Hoken = 10835;	
	if($Hyojun_Hosyu_Getugaku >= 24) $Kenko_Hoken = 11820;	
	if($Hyojun_Hosyu_Getugaku >= 26) $Kenko_Hoken = 12805;	
	if($Hyojun_Hosyu_Getugaku >= 28) $Kenko_Hoken = 13790;	
	if($Hyojun_Hosyu_Getugaku >= 30) $Kenko_Hoken = 14775;	
	if($Hyojun_Hosyu_Getugaku >= 32) $Kenko_Hoken = 15760;	
	if($Hyojun_Hosyu_Getugaku >= 34) $Kenko_Hoken = 16745;	
	if($Hyojun_Hosyu_Getugaku >= 36) $Kenko_Hoken = 17730;	
	if($Hyojun_Hosyu_Getugaku >= 38) $Kenko_Hoken = 18715;	
	if($Hyojun_Hosyu_Getugaku >= 41) $Kenko_Hoken = 20192.5;	
	if($Hyojun_Hosyu_Getugaku >= 44) $Kenko_Hoken = 21670;	
	if($Hyojun_Hosyu_Getugaku >= 47) $Kenko_Hoken = 23147.5;	
	if($Hyojun_Hosyu_Getugaku >= 50) $Kenko_Hoken = 24625;	
	if($Hyojun_Hosyu_Getugaku >= 53) $Kenko_Hoken = 26102.5;	
	if($Hyojun_Hosyu_Getugaku >= 56) $Kenko_Hoken = 27580;	
	if($Hyojun_Hosyu_Getugaku >= 59) $Kenko_Hoken = 29057.5;	
	if($Hyojun_Hosyu_Getugaku >= 62) $Kenko_Hoken = 30535;	
	if($Hyojun_Hosyu_Getugaku >= 65) $Kenko_Hoken = 32012.5;	
		
	$Kenko_Hoken = $Kenko_Hoken * 12 / 10000;
	if($age >= 40){
		$Kenko_Hoken = $Kenko_Hoken + ($Hyojun_Hosyu_Getugaku * 0.0157);
	}

	//echo 'Kenko_Hoken:'.$Kenko_Hoken.'<br/>';
	return $Kenko_Hoken;
}

function get_Kokumin_Kenko_Hoken($income,$age,$KanyusyaSu){

	$KijunGaku = $income;
	
	if($income == 0){
		$Syotoku_Wari = 0;
	}else{
		//①所得割
		//a.基礎分
		$Kisobun1 = $KijunGaku * 6.86 / 100;
		//b.支援金分
		$Shienkinbun1 = $KijunGaku * 2.02 / 100;
		//c.介護分
		if($age >= 40 and $age <= 64){
			$Kaigobun1 = $KijunGaku * 1.52 / 100;
		}else{
			$Kaigobun1 = 0;
		}
		$Syotoku_Wari = $Kisobun1 + $Shienkinbun1 + $Kaigobun1;
	}

	//②均等割
	//a.基礎分
	$Kisobun2 = 3.54 * $KanyusyaSu;
	//b.支援金分
	$Shienkinbun2 = 1.08 * $KanyusyaSu;
	//c.介護分
	if($age >= 40 and $age <= 64){
		$Kaigobun2 = 1.47 * $KanyusyaSu;
	}else{
		$Kaigobun2 = 0;
	}
	$Kito_Wari = $Kisobun2 + $Shienkinbun2 + $Kaigobun2;

	//③合計
	$Kokumin_Kenko_Hoken = $Syotoku_Wari + $Kito_Wari;

	//echo 'Kokumin_Kenko_Hoken:'.$Kokumin_Kenko_Hoken.'<br/>';
	return $Kokumin_Kenko_Hoken;
}

function get_Kazei_Taisyo($kbn,$income,$workstyle,$haigusya_age,$child1_age,$child2_age,$child3_age){

	//所得控除額の算出
	$Syotoku_Kojo = 0;

	//扶養控除の算出
	$Fuyo_Kojo1 = 0;
	$Fuyo_Kojo2 = 0;
	$Fuyo_Kojo3 = 0;
	
	if($child1_age >= 16 and $child1_age < 19) $Fuyo_Kojo1 = 38;	
	if($child1_age >= 19 and $child1_age < 23) $Fuyo_Kojo1 = 63;	
	if($child1_age >= 70) $Fuyo_Kojo1 = 58;

	if($child2_age >= 16 and $child2_age < 19) $Fuyo_Kojo2 = 38;	
	if($child2_age >= 19 and $child2_age < 23) $Fuyo_Kojo2 = 63;	
	if($child2_age >= 70) $Fuyo_Kojo2 = 58;

	if($child3_age >= 16 and $child3_age < 19) $Fuyo_Kojo3 = 38;	
	if($child3_age >= 19 and $child3_age < 23) $Fuyo_Kojo3 = 63;	
	if($child3_age >= 70) $Fuyo_Kojo3 = 58;

	$Fuyo_Kojo = $Fuyo_Kojo1 + $Fuyo_Kojo2 + $Fuyo_Kojo3; 

	switch ($kbn) {
		//住民税,国民健康保険
	    case 'J':
			$Kiso_Kojo = 33;
	        break;
		//所得税
	    case 'S':
			$Kiso_Kojo = 38;
	        break;
	}

	//*************************	
	//salary	
	//*************************	
	if($workstyle == 0){

		//配偶者控除
		if($haigusya_age >=0){
			$Haigusya_Kojo = 38;
		}

		//社会保険料控除
		$Syakai_Hoken_Kojo = 0;

		$Syotoku_Kojo = $Kiso_Kojo + $Haigusya_Kojo + $Fuyo_Kojo + $Syakai_Hoken_Kojo;
		$Syotoku_Kazei_Taisyo = $income - $Syotoku_Kojo;
	
	}else{
	//*************************	
	//free	
	//*************************	
	
		//青色申告特別控除
		//(配偶者･扶養控除無効)
		$Aoiro_Shinkoku_Kojo = 65;
		//社会保険料控除
		$Syakai_Hoken_Kojo = 0;

		$Syotoku_Kojo = $Kiso_Kojo + $Fuyo_Kojo + $Aoiro_Shinkoku_Kojo + $Syakai_Hoken_Kojo;
		$Syotoku_Kazei_Taisyo = $income - $Syotoku_Kojo;
	}

	if($Syotoku_Kazei_Taisyo < 0){
		$Syotoku_Kazei_Taisyo = 0;
	}

	return $Syotoku_Kazei_Taisyo;
}

function get_income_minus_keihi($age,$income,$keihi,$no_out_keihi,$retire){

	//仕事はリタイア年までとして、経費もその1年前まで。
	if($age < $retire){
		$income_minus_keihi = $income - $keihi - $no_out_keihi;
	}else{
		$income_minus_keihi = $income;
	}

	//経費を引き算してマイナスになった場合はゼロに置き換え
	if($income_minus_keihi < 0){
		$income_minus_keihi = 0;
	}
	
	return $income_minus_keihi;
}

function get_iryohi($age){

	//https://www.mhlw.go.jp/file/06-Seisakujouhou-12400000-Hokenkyoku/nenrei_h25.pdf
	$ret_iryohi = 0;

	if($age >= 0) $ret_iryohi = 3.7;
	if($age >= 5) $ret_iryohi = 2.7;
	if($age >= 10) $ret_iryohi = 2.1;	
	if($age >= 15) $ret_iryohi = 1.6;	
	if($age >= 20) $ret_iryohi = 1.7;	
	if($age >= 25) $ret_iryohi = 2.1;	
	if($age >= 30) $ret_iryohi = 2.5;	
	if($age >= 35) $ret_iryohi = 2.8;	
	if($age >= 40) $ret_iryohi = 3.1;	
	if($age >= 45) $ret_iryohi = 3.9;	
	if($age >= 50) $ret_iryohi = 4.8;	
	if($age >= 55) $ret_iryohi = 6.1;	
	if($age >= 60) $ret_iryohi = 7.6;	
	if($age >= 65) $ret_iryohi = 9.1;	
	if($age >= 70) $ret_iryohi = 7.6;	
	if($age >= 75) $ret_iryohi = 6.5;	
	if($age >= 80) $ret_iryohi = 7.5;	
	if($age >= 85) $ret_iryohi = 8.1;	

	return $ret_iryohi;
}

//*************************	
//グラフ出力	
//*************************	
function output_grhaf($age_ary,$home_ary,$kaden_ary,$hoken_ary,$car_ary,$trip_ary,$workstyle,$iryohi_kami,$jutaku_loan_zankin_ary,$jutaku_loan_hensai_ary){

	$age_td = '';
	$haigusya_td = '';
	$child1_td = '';
	$child2_td = '';
	$child3_td = '';
	$child_teate_td = '';
	$kyuyo_hosyu_td = '';
	$home_td = '';
	$income_td = '';
	$SyotokuZei_td = '';
	$Nenkin_td = '';
	$Kenpo_td = '';
	$juminZei_td = '';
	$Gakuhi_td = '';
	$outgo_td = '';
	$saving_td = '';
	$hoken_td = '';
	$car_td = '';
	$trip_td = '';
	$seikatsu_td = '';
	$kaden_td = '';
	$syokibo_td = '';
	$tokusyutsu_td = '';
	$iryohi_td = '';
	$sal_nenkin_in_td = '';
	$free_nenkin_in_td = '';
	$taisyokukin_td = '';
	$syokibo_in_td = '';
	$add_plus_td = '';
	$add_minus_td = '';
	$add_plus_kingaku_td = '';
	$add_minus_kingaku_td = '';
	$jutaku_loan_kanpu_td = '';
	$jutaku_loan_hensai_td = '';

	//配偶者の有無を設定
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

	//子供の有無を設定
	if(isset($_POST['child1'])){
		$child1_age = $_POST['child1'];
		if($child1_age == ''){
			$child1_flg = 0;
		}else{
			$child1_flg = 1;
		}
	}else{
		$child1_flg = 0;
	}

	if(isset($_POST['child2'])){
		$child2_age = $_POST['child2'];
		if($child2_age == ''){
			$child2_flg = 0;
		}else{
			$child2_flg = 1;
		}
	}else{
		$child2_flg = 0;
	}

	if(isset($_POST['child3'])){
		$child3_age = $_POST['child3'];
		if($child3_age == ''){
			$child3_flg = 0;
		}else{
			$child3_flg = 1;
		}
	}else{
		$child3_flg = 0;
	}

	//▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
	//出力用配列作成
	//▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲▲
	//▼年齢
	foreach($age_ary as $value){
		$age_td = $age_td.'<th>'.round($value).'</th>';
	}

	foreach($home_ary as $value){
	
		//▼家賃
		$home_td = $home_td.'<td>'.round($value).'</td>';
		//配偶者の年齢
		$haigusya_td = $haigusya_td.'<td>'.$haigusya_age.'</td>';

		//▼子ども1の年齢
		if($child1_age < 0){
			$child1_td = $child1_td.'<td>-</td>';
		}else{
			$child1_td = $child1_td.'<td>'.$child1_age.'</td>';
		}

		//▼子ども2の年齢
		if($child2_age < 0){
			$child2_td = $child2_td.'<td>-</td>';
		}else{
			$child2_td = $child2_td.'<td>'.$child2_age.'</td>';
		}

		//▼子ども3の年齢
		if($child3_age < 0){
			$child3_td = $child3_td.'<td>-</td>';
		}else{
			$child3_td = $child3_td.'<td>'.$child3_age.'</td>';
		}
	
		$haigusya_age = $haigusya_age +  1;
		$child1_age = $child1_age +  1;
		$child2_age = $child2_age +  1;
		$child3_age = $child3_age +  1;
	}

	//▼住宅ローン
	foreach($jutaku_loan_hensai_ary as $value){
		$jutaku_loan_hensai_td = $jutaku_loan_hensai_td.'<td>'.round($value).'</td>';
	}

	//▼総収入、総支出、貯金額算出
	$n = 0;
	$wk_saving_sal = 0;
	$wk_saving_free = 0;

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
		$wk_minus_cmn = $wk_minus_cmn + $_SESSION['Toku_syutsu'][$n];
		$wk_minus_cmn = $wk_minus_cmn + $_SESSION['add_minus_kingaku'][$n];
		$wk_minus_cmn = $wk_minus_cmn + $jutaku_loan_hensai_ary[$n];

		if($iryohi_kami == 1){
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

		//●マイナス
		$wk_minus_sal = $wk_minus_sal + $_SESSION['KihonSeikatsuHiSal'][$n];

		//==========================================================
		//★フリーランス
		//==========================================================
		//●プラス
		$wk_plus_free =  $wk_plus_free + $_SESSION['Kyuyo_Hosyu_Free'][$n];
		$wk_plus_free =  $wk_plus_free + $_SESSION['Free_nenkin_in'][$n];
		$wk_plus_free =  $wk_plus_free + $_SESSION['SyokiboKigyo_in'][$n];

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
		$wk_minus_free = $wk_minus_free + $_SESSION['KihonSeikatsuHiFree'][$n];
		$wk_minus_free = $wk_minus_free + $_SESSION['Syokibo_unit'][$n];
	
		if($n == 0){
			$wk_saving_sal = $_POST['saving'] + $wk_plus_sal - $wk_minus_sal + $wk_plus_cmn - $wk_minus_cmn;
			$wk_saving_free = $_POST['saving'] + $wk_plus_free - $wk_minus_free + $wk_plus_cmn - $wk_minus_cmn;
		}else{
			$wk_saving_sal = $wk_saving_sal + $wk_plus_sal - $wk_minus_sal + $wk_plus_cmn - $wk_minus_cmn;
			$wk_saving_free = $wk_saving_free + $wk_plus_free - $wk_minus_free + $wk_plus_cmn - $wk_minus_cmn;
		}

		//▼出力用データ格納
		$income_result_sal_ary[] = $wk_plus_sal + $wk_plus_cmn;
		$income_result_free_ary[] = $wk_plus_free + $wk_plus_cmn;

		$outgo_result_sal_ary[] = $wk_minus_sal + $wk_minus_cmn;
		$outgo_result_free_ary[] = $wk_minus_free + $wk_minus_cmn;

		$saving_result_sal_ary[] = $wk_saving_sal;
		$saving_result_free_ary[] = $wk_saving_free;

		$n = $n + 1;
	}

	//==========================================================
	//キャッシュフロー表作成
	//==========================================================
	//●共通
	//▼(+)子ども手当
	foreach($_SESSION['Child_Teate'] as $value){
		$child_teate_td = $child_teate_td.'<td>'.round($value).'</td>';
	}
	//▼(-)家電
	foreach($kaden_ary as $value){
		$kaden_td = $kaden_td.'<td>'.round($value).'</td>';
	}
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
	//▼(+)一時収入
	foreach($_SESSION['add_plus_kingaku'] as $value){
		$add_plus_kingaku_td = $add_plus_kingaku_td.'<td>'.round($value).'</td>';
	}
	//▼(-)一時支出
	foreach($_SESSION['add_minus_kingaku'] as $value){
		$add_minus_kingaku_td = $add_minus_kingaku_td.'<td>'.round($value).'</td>';
	}
	//▼(-)特別支出
	foreach($_SESSION['Toku_syutsu'] as $value){
		$tokusyutsu_td = $tokusyutsu_td.'<td>'.round($value).'</td>';
	}
	//▼(-)医療費
	foreach($_SESSION['Iryohi'] as $value){
		$iryohi_td = $iryohi_td.'<td>'.round($value).'</td>';
	}

	//●サラリーマン
	if($workstyle == 0){
		//▼(+)給与･報酬
		foreach($_SESSION['Kyuyo_Hosyu_Sal'] as $value){
			$kyuyo_hosyu_td = $kyuyo_hosyu_td.'<td>'.round($value).'</td>';
		}
		//▼(+)退職金
		foreach($_SESSION['TaisyokuKin'] as $value){
			$taisyokukin_td = $taisyokukin_td.'<td>'.round($value).'</td>';
		}
		//▼(+)住宅ローン控除による所得税還付
		foreach($_SESSION['Jutaku_loan_kanpu'] as $value){
			$jutaku_loan_kanpu_td = $jutaku_loan_kanpu_td.'<td>'.round($value).'</td>';
		}
		//▼(+)年金支給
		foreach($_SESSION['Sal_nenkin_in'] as $value){
			$sal_nenkin_in_td = $sal_nenkin_in_td.'<td>'.round($value).'</td>';
		}
		//▼(-)基本生活費
		foreach($_SESSION['KihonSeikatsuHiSal'] as $value){
			$seikatsu_td = $seikatsu_td.'<td>'.round($value).'</td>';
		}
		//★(=)収入合計
		foreach($income_result_sal_ary as $value){
			$income_td = $income_td.'<td>'.round($value).'</td>';
		}
		//★(=)支出合計
		foreach($outgo_result_sal_ary as $value){
			$outgo_td = $outgo_td.'<td>'.round($value).'</td>';
		}
		//★(=)貯蓄
		foreach($saving_result_sal_ary as $value){
			$saving_td = $saving_td.'<td>'.round($value).'</td>';
		}
	//●フリーランス
	}else{
		//▼(+)給与･報酬
		foreach($_SESSION['Kyuyo_Hosyu_Free'] as $value){
			$kyuyo_hosyu_td = $kyuyo_hosyu_td.'<td>'.round($value).'</td>';
		}
		//▼(+)小規模企業共済(退職金)
		foreach($_SESSION['SyokiboKigyo_in'] as $value){
			$syokibo_in_td = $syokibo_in_td.'<td>'.round($value).'</td>';
		}
		//▼(+)年金支給
		foreach($_SESSION['Free_nenkin_in'] as $value){
			$free_nenkin_in_td = $free_nenkin_in_td.'<td>'.round($value).'</td>';
		}
		//▼(-)所得税 
		foreach($_SESSION['SyotokuZeiFree'] as $value){
			$SyotokuZei_td = $SyotokuZei_td.'<td>'.round($value).'</td>';
		}
		//▼(-)住民税
		foreach($_SESSION['JuminZeiFree'] as $value){
			$juminZei_td = $juminZei_td.'<td>'.round($value).'</td>';
		}
		//▼(-)国民健康保険
		foreach($_SESSION['KenpoFree'] as $value){
			$Kenpo_td = $Kenpo_td.'<td>'.round($value).'</td>';
		}
		//▼(-)年金
		foreach($_SESSION['NenkinFree'] as $value){
			$Nenkin_td = $Nenkin_td.'<td>'.round($value).'</td>';
		}
		//▼(-)基本生活費
		foreach($_SESSION['KihonSeikatsuHiFree'] as $value){
			$seikatsu_td = $seikatsu_td.'<td>'.round($value).'</td>';
		}
		//▼(-)小規模企業共済
		foreach($_SESSION['Syokibo_unit'] as $value){
			$syokibo_td = $syokibo_td.'<td>'.round($value).'</td>';
		}
		//★(=)収入合計
		foreach($income_result_free_ary as $value){
			$income_td = $income_td.'<td>'.round($value).'</td>';
		}
		//★(=)支出合計
		foreach($outgo_result_free_ary as $value){
			$outgo_td = $outgo_td.'<td>'.round($value).'</td>';
		}
		//★(=)貯金
		foreach($saving_result_free_ary as $value){
			$saving_td = $saving_td.'<td>'.round($value).'</td>';
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

	echo "<script>";
	echo "window.onload = function() {";
	echo "    ctx = document.getElementById('canvas').getContext('2d');";
	echo "    ctx.canvas.height = 100;";
	echo "    window.myBar = new Chart(ctx, {";
	echo "        type: 'bar',";
	echo "        data: barChartData,";
	echo "        options: complexChartOption";
	echo "    });";
	echo "};";
	echo "</script>";

	echo "<script>";
	echo "var barChartData = {";
	echo "    labels: [".$age_value;
	echo "    ],";
	echo "    datasets: [";

	//◆1本目(収入)(右)
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
	echo "        yAxisID: 'y-axis-2',";
	echo "    },";

	//◆2本目(支出)(右)
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
	echo "        yAxisID: 'y-axis-2',";
	echo "    },";

	//◆3本目(貯金)(左)
	echo "    {";
	echo "        type: 'line',";

	if($workstyle == 0){
		echo "        label: 'saving(sal)',";
		echo "        data: [".$saving_sal_value;
	}else{
		echo "        label: 'saving(free)',";
		echo "        data: [".$saving_free_value;
	}

	echo "        ],";
	echo "        borderColor : 'rgba(254,97,132,0.8)',";
	echo "        backgroundColor : 'rgba(254,97,132,0.5)',";
	echo "        yAxisID: 'y-axis-1',";
	echo "    },";

	//◆4本目(住宅ローン残金)(左)
	if($_POST['home_back_zankin'] > 0){
		echo "    {";
		echo "        type: 'line',";
		echo "        label: 'loan',";
		echo "        lineTension: 0,";
		echo "        data: [".$jutaku_loan_zankin_value;

		echo "        ],";
		echo "        borderColor : 'rgba(128,128,128,0.8)',";
		echo "        backgroundColor : 'rgba(128,128,128,0.5)',";
		echo "        yAxisID: 'y-axis-1',";
		echo "    },";
	}

	//◆5本目(貯金比較用)(左)
	echo "    {";
	echo "        type: 'line',";

	if($workstyle == 0){
		echo "        label: 'saving(free)',";
		echo "        data: [".$saving_free_value;
	}else{
		echo "        label: 'saving(sal)',";
		echo "        data: [".$saving_sal_value;
	}

	echo "        ],";
	echo "        hidden : 'true',";
	echo "        borderColor : 'rgba(255,196,0,0.8)',";
	echo "        backgroundColor : 'rgba(255,196,0,0.5)',";
	echo "        yAxisID: 'y-axis-1',";
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

    echo "      ticks: {";
    echo "        beginAtZero: true,";
    echo "        min: 0";
    echo "      },";

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

	//****************************************************
	//表出力
	//****************************************************
	
	echo "<div id='resultTblRap'>";
	echo "<table id='resultTbl'>";
	echo "    <thead>";
	echo "        <tr><th>本人</th>".$age_td."</tr>";
	echo "    </thead>";

	echo "    <tbody>";

	if($haigusya_flg == 1 ){
		echo "        <tr><th id='age'>配偶者</th>".$haigusya_td."</tr>";
	}
	if($child1_flg == 1 ){
		echo "        <tr><th id='age'>子1</th>".$child1_td."</tr>";
	}
	if($child2_flg == 1 ){
		echo "        <tr><th id='age'>子2</th>".$child2_td."</tr>";
	}
	if($child3_flg == 1 ){
		echo "        <tr><th id='age'>子3</th>".$child3_td."</tr>";
	}

	//▼収入
	echo "        <tr><th>給与/報酬</th>".$kyuyo_hosyu_td."</tr>";

	if($workstyle == 0){
		echo "        <tr><th>退職金</th>".$taisyokukin_td."</tr>";
	}else{
		echo "        <tr><th>退職金</th>".$syokibo_in_td."</tr>";
	}

	echo "        <tr><th>子ども手当</th>".$child_teate_td."</tr>";

	if($workstyle == 0){
		echo "        <tr><th>年金</th>".$sal_nenkin_in_td."</tr>";
		echo "        <tr><th>所得税還付</th>".$jutaku_loan_kanpu_td."</tr>";
	}else{
		echo "        <tr><th>年金</th>".$free_nenkin_in_td."</tr>";
	}

	echo "        <tr><th>一時収入</th>".$add_plus_kingaku_td."</tr>";
	echo "        <tr><th>収入(計)</th>".$income_td."</tr>";

	//▼支出
	if($workstyle == 1){
		echo "        <tr><th id='minus'>所得税</th>".$SyotokuZei_td."</tr>";
		echo "        <tr><th id='minus'>住民税</th>".$juminZei_td."</tr>";
		echo "        <tr><th id='minus'>健保</th>".$Kenpo_td."</tr>";
		echo "        <tr><th id='minus'>年金</th>".$Nenkin_td."</tr>";
	}

	echo "        <tr><th id='minus'>生活費</th>".$seikatsu_td."</tr>";
	echo "        <tr><th id='minus'>住宅</th>".$home_td."</tr>";
	echo "        <tr><th id='minus'>住宅ローン</th>".$jutaku_loan_hensai_td."</tr>";
	echo "        <tr><th id='minus'>学費</th>".$Gakuhi_td."</tr>";
	echo "        <tr><th id='minus'>車</th>".$car_td."</tr>";
	echo "        <tr><th id='minus'>保険</th>".$hoken_td."</tr>";
	if($workstyle == 1){
		echo "        <tr><th id='minus'>小企共</th>".$syokibo_td."</tr>";
	}

	if($iryohi_kami == 1){
		echo "        <tr><th id='minus'>医療費</th>".$iryohi_td."</tr>";
	}

	echo "        <tr><th id='minus'>旅行</th>".$trip_td."</tr>";
	echo "        <tr><th id='minus'>家電</th>".$kaden_td."</tr>";
	echo "        <tr><th id='minus'>特別支出</th>".$tokusyutsu_td."</tr>";
	echo "        <tr><th id='minus'>一時支出</th>".$add_minus_kingaku_td."</tr>";
	echo "        <tr><th id='minus'>支出(計)</th>".$outgo_td."</tr>";

	//▼貯金
	echo "        <tr><th id='saving'>貯金</th>".$saving_td."</tr>";

	echo "    </tbody>";
	echo "</table>";
	echo "</div>";

}
?>
<!--◆再入力◆-->
<form action = "result.php" method = "post" autocomplete="off">
<div class="title">基本情報</div>
<div class="box_unit">年齢
<select name="age">
	<?php
	for ($i=25;$i<61;$i++){
	
		if($i == $_POST['age']){
			$select_sts = " selected='true'";
		}else{
			$select_sts = '';
		}
		echo "<option value='".$i."'".$select_sts.">".$i."</option>";
	}
	?>
</select>
</div>
<div class="box_unit">雇用形態
<select name="workstyle">
	<option value="0" <?php if($_POST['workstyle']==0) echo " selected='true';" ?>>正社員</option>
	<option value="1" <?php if($_POST['workstyle']==1) echo " selected='true';" ?>>フリーランス</option>
</select>
</div>
<div class="box_unit">正規雇用歴<input type="text" value="<?php echo abs($_POST['sal_year']) ?>" name="sal_year" /></div>
<div class="box_unit">(正)月収<input type="text" value="<?php echo abs($_POST['sal_income']) ?>" name="sal_income" /></div>
<div class="box_unit">(フ)報酬<input type="text" value="<?php echo abs($_POST['free_income']) ?>" name="free_income" /></div>
<div class="box_unit">貯金<input type="text" value="<?php echo $_POST['saving'] ?>" name="saving" /></div>
<div class="box_unit">リタイア年齢<input type="text" name = "retire" value="<?php echo abs($_POST['retire']) ?>" /></div>
<div class="box_unit">配偶者<input id="range_haigusya" type="text" name="haigusya" value="<?php echo abs($_POST['haigusya']) ?>"/></div>
<div class="box_unit">子ども1<input id="range_child1" type="text" name="child1" value="<?php echo $_POST['child1'] ?>"/></div>
<div class="box_unit">子ども2<input id="range_child2" type="text" name="child2" value="<?php echo $_POST['child2'] ?>"/></div>
<div class="box_unit">子ども3<input id="range_child3" type="text" name="child3" value="<?php echo $_POST['child3'] ?>"/></div>

<div class="title">支出</div>
<div class="box_unit">家賃<input type="text" id="text_home" name = "home" value="<?php echo abs($_POST['home']) ?>" /></div>

<div class="box_unit">住宅ローン控除<input type="text" id="home_back_end_age" name="home_back_end_age" value="<?php echo abs($_POST['home_back_end_age']) ?>" />歳まで
	<input type="text" id="home_back_zankin" name="home_back_zankin" value="<?php echo abs($_POST['home_back_zankin']) ?>" />万円 
	<input type="text" id="home_back_year_cnt" name="home_back_year_cnt" value="<?php echo $_POST['home_back_year_cnt'] ?>" />年目 
</div>

<div class="box_unit">旅費交通費<input type="text" id="text_ryohi" name = "ryohi" value="<?php echo abs($_POST['ryohi']) ?>" /></div>
<div class="box_unit">情報通信費<input type="text" id="text_it" name = "it" value="<?php echo abs($_POST['it']) ?>" /></div>
<div class="box_unit">書籍代<input type="text" id="text_book" name="book" value="<?php echo abs($_POST['book']) ?>" /></div>
<div class="box_unit">接待交際費<input type="text" id="text_settai" name="settai" value="<?php echo abs($_POST['settai']) ?>" /></div>
<div class="box_unit">食費/公共料金/娯楽/他<input type="text" id="text_sonota_seikatsuhi" name = "sonota_seikatsuhi" value="<?php echo abs($_POST['sonota_seikatsuhi']) ?>" />　</div>

<div class="box_unit">小規模企業共済<input type="text" id="text_syokibo" name="syokibo" value="<?php echo abs($_POST['syokibo']) ?>" /></div>
<div class="box_unit">専従者給与<input type="text" id="text_senjisya" name="senjusya" value="<?php echo abs($_POST['senjusya']) ?>" /></div>
<div class="box_unit">上乗せ<input type="text" id="text_on_keihi" name="on_keihi" value="<?php echo abs($_POST['on_keihi']) ?>" /></div>
    
<div class="title">その他収支</div>
<div class="box_unit">自動車購入<input type="text" id="car" name="car" value="<?php echo abs($_POST['car']) ?>" /><input type="text" id="car_by_year" name="car_by_year" value="<?php echo abs($_POST['car_by_year']) ?>" /></div>
<div class="box_unit">旅行<input type="text" id="trip" name="trip" value="<?php echo abs($_POST['trip']) ?>" /></div>
<div class="box_unit">年間保険1<input id ="text_hoken1" type="text" value="<?php echo abs($_POST['hoken1']) ?>" name="hoken1" /></div>
<div class="box_unit">残年数1<input id ="text_hoken_zan1" type="text" value="<?php echo abs($_POST['hoken_zan1']) ?>" name="hoken_zan1" /></div>
<div class="box_unit">年間保険2<input id ="text_hoken2" type="text" value="<?php echo abs($_POST['hoken2']) ?>" name="hoken2" /></div>
<div class="box_unit">残年数2<input id ="text_hoken_zan2" type="text" value="<?php echo abs($_POST['hoken_zan2']) ?>" name="hoken_zan2" /></div>
<div class="box_unit">追加収支1
<input id="add_age1" type="text" name="add_age1" value="<?php if($_POST['add_age1']!=''){echo abs($_POST['add_age1']);} ?>" />
<input id="add_kingaku1" type="text" name="add_kingaku1" value="<?php echo $_POST['add_kingaku1'] ?>"/>
</div>
<div class="box_unit">追加収支2
<input id="add_age2" type="text" name="add_age2" value="<?php if($_POST['add_age2']!=''){echo abs($_POST['add_age2']);} ?>" />
<input id="add_kingaku2" type="text" name="add_kingaku2" value="<?php echo $_POST['add_kingaku2'] ?>"/>
</div>
<div class="box_unit">特別支出
<input id="tokusyutsu" type="text" name="tokusyutsu" value="<?php if($_POST['tokusyutsu']!=''){echo abs($_POST['tokusyutsu']);} ?>" />
</div>
<div class="box_unit">未収入
<input id="kega_age" type="text" name="kega_age" value="<?php if($_POST['kega_age']!=''){echo abs($_POST['kega_age']);} ?>" />
<input id="kega_month" type="text" name="kega_month" value="<?php if($_POST['kega_month']!=''){echo abs($_POST['kega_month']);} ?>"/>
</div>
<div class="box_unit">老後ワークスタイル
<select name="retire_plan">
	<option value="0" <?php if($_POST['retire_plan']==0) echo " selected='true';" ?>>節約</option>
	<option value="1" <?php if($_POST['retire_plan']==1) echo " selected='true';" ?>>現状維持</option>
	<option value="2" <?php if($_POST['retire_plan']==2) echo " selected='true';" ?>>アクティブ</option>
</select>
<div class="box_unit">医療費考慮
<select name="iryohi_kami">
	<option value="0" <?php if($_POST['iryohi_kami']==0) echo " selected='true';" ?>>しない</option>
	<option value="1" <?php if($_POST['iryohi_kami']==1) echo " selected='true';" ?>>する</option>
</select>
</div>

<input type = "submit" id="submitLink" style="clear:both" value ="再検証"/>
</form>
<br/><br/>
</body>
</html>
