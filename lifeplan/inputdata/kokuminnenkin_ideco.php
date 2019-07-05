<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="UTF-8" />
<title>国民年金基金-iDeCo シミュレーション</title>
<link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet">
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/mailform.css" />
<style>
.hidden_box {
    margin: 0;/*前後の余白*/
    padding: 0;
}
/*ボタン装飾*/
.hidden_box label {
    padding: 3px;
    font-weight: bold;
    cursor :pointer;
    position:relative;
    left:90%;
	top:-27px;
	font-size:13px;
}
/*ボタンホバー時*/
.hidden_box label:hover {
    background: #efefef;
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
	font-size:13px;
}
/*クリックで中身表示*/
.hidden_box input:checked ~ .hidden_show {
    padding: 0;
    height: auto;
    opacity: 1;
}
.imptnt{
    color:#e74c3c;
    font-weight:bold;
}
</style>
<script type="text/javascript" charset="UTF-8" src="../../js/refchk.js"></script>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>

	<div style="text-align:center;margin:20px 0 -30px 0;">
	<a style="padding:2px 10px 2px 10px;color:#ffffff;background-color:#337ab7;margin:0 4px 0px 0;border-radius:4px;" href="https://www.fp-support-engineer.com/" target="_blank"><i class="fas fa-home"></i></a>
	</div>

	<div style="font-family:'Quicksand';margin-top:60px;font-size:28px;text-align:center;font-weight:bold;color:#333333;">SE-Lifeplan-Simulation</div>
	<div style="font-size:14px;text-align:center;color:grey;margin-bottom:-20px;"><h1>国民年基金、iDeCoの比較用シミュレーションツールです。</h1></div>

	<form action="../kokuminnenkin_ideco_comp.php" target="_blank" method="post" id="mail_form">
	
		<dl>
			<div style="float:left"><b>国民年金基金</b></div>
			<dt>加入時年齢<span>Age</span></dt>
			<dd class="required">
			<select name="age_year">
				<?php
					if(isset($_COOKIE['age_year'])){
						$ckke_chk = $_COOKIE['age_year'];
					}else{
						$ckke_chk = '';
					}

					if($ckke_chk == ''){
						echo "<option value='20' selected='true'>20</option>";
					}else{
						echo "<option value='20'>20</option>";
					}

					for ($i=21;$i<50;$i=$i+1){
						if($i == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			 歳

			<select name="age_month">
				<?php
					if(isset($_COOKIE['age_month'])){
						$ckke_chk = $_COOKIE['age_month'];
					}else{
						$ckke_chk = '';
					}

					if($ckke_chk == ''){
						echo "<option value='0' selected='true'>0</option>";
					}else{
						echo "<option value='0'>0</option>";
					}

					for ($i=1;$i<12;$i=$i+1){
						if($i == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			 ヶ月
			<div class="hidden_box">
			    <label for="label1">説明</label>
			    <input type="checkbox" id="label1"/>
			    <div class="hidden_show">	
					<!--非表示ここから-->
					入力頂いたご年齢を加入時年齢として、国民年金基金の掛け金、支給額を算出します。<br>
					毎月の掛け金は加入時の年齢と口数で決まります。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>1口目<span>Type</span></dt>
			<dd class="required">
				<ul>
					<li><label><input type="radio" class="one_kuchime" name="one_kuchime" value="0"
						<?php
							$chk_flg = '';
							if(isset($_COOKIE['one_kuchime'])){
								$chk_flg = $_COOKIE['one_kuchime'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 0 or $chk_flg == 9){
								echo ' checked="checked"';
							}
						?>
						/>A型</label>
					</li>
					<li><label><input type="radio" class="one_kuchime" name="one_kuchime" value="1"
						<?php
							$chk_flg = '';
							if(isset($_COOKIE['one_kuchime'])){
								$chk_flg = $_COOKIE['one_kuchime'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 1){
									echo ' checked="checked"';
							}
						?>
						/>B型</label>
					</li>
				</ul>

			<div class="hidden_box">
			    <label for="label2">説明</label>
			    <input type="checkbox" id="label2"/>
			    <div class="hidden_show">	
					<!--非表示ここから-->
					1口目の型を選択して下さい。<br />
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>2口目以降(A型)<span>Number of A type</span></dt>
			<dd class="required">
			<select name="A_kuchisu">
				<?php
					if(isset($_COOKIE['A_kuchisu'])){
						$ckke_chk = $_COOKIE['A_kuchisu'];
					}else{
						$ckke_chk = '';
					}

					if($ckke_chk == ''){
						echo "<option value='0' selected='true'>0</option>";
					}else{
						echo "<option value='0'>0</option>";
					}

					for ($i=1;$i<11;$i=$i+1){
						if($i == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			 口<br />
			<div class="hidden_box">
			    <label for="label3">説明</label>
			    <input type="checkbox" id="label3"/>
			    <div class="hidden_show">	
					<!--非表示ここから-->
					A型の口数を入力して下さい。<br />
					A型は保証期間付の為、ご本人死亡時は遺族一時金の支給があります。<br />
					遺族一時金の詳細は<a href="https://www.npfa.or.jp/system/lump_sum.html">国民年金基金連合会</a>のサイトをご覧下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>2口目以降(B型)<span>Number of B type</span></dt>
			<dd class="required">
			<select name="B_kuchisu">
				<?php
					if(isset($_COOKIE['B_kuchisu'])){
						$ckke_chk = $_COOKIE['B_kuchisu'];
					}else{
						$ckke_chk = '';
					}

					if($ckke_chk == ''){
						echo "<option value='0' selected='true'>0</option>";
					}else{
						echo "<option value='0'>0</option>";
					}

					for ($i=1;$i<11;$i=$i+1){
						if($i == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			 口<br />
			<div class="hidden_box">
			    <label for="label4">説明</label>
			    <input type="checkbox" id="label4"/>
			    <div class="hidden_show">	
					<!--非表示ここから-->
					B型の口数を入力して下さい。<br />
					B型は保証期間が無い為、ご本人死亡時の遺族一時金の支給は1万円のみとなります。<br />
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<div style="float:left"><b>iDeCo</b></div>
			<dt>掛け金<span>Premium for iDeCo</span></dt>
			<dd class="required">
			<select name="ideco_kakekin">
				<?php
					if(isset($_COOKIE['ideco_kakekin'])){
						$ckke_chk = $_COOKIE['ideco_kakekin'];
					}else{
						$ckke_chk = '';
					}

					if($ckke_chk == '' or $ckke_chk == 99){
						echo "<option value='99' selected='true'>国民年金基金と同じ掛け金を設定</option>";
					}else{
						echo "<option value='99'>国民年金基金と同じ掛け金を設定</option>";
					}

					for ($i=5000;$i<69000;$i=$i+1000){
						if($i == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			 円<br />
			<div class="hidden_box">
				<br/>
			    <label for="label5">説明</label>
			    <input type="checkbox" id="label5"/>
			    <div class="hidden_show">	
					<!--非表示ここから-->
					iDeCoの掛け金(月額)を入力して下さい。<br />
					<b><u>サラリーマンの場合</u></b>：<br />
					上限は23000円となります。<br />
					<b><u>フリーランスの場合</u></b>：<br />
					上限は68000円となります。<br /><br />
					なお、<b>国民年金基金の口数から算出した掛金と同じ掛金</b>でのシミュレーションも可能です。
					(その場合、「入力項目：掛け金」は無視されます)<br />
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>運用利率<span>Investment interest rate for iDeCo</span></dt>
			<dd class="required">
			<select name="ideco_rate">
				<?php
					if(isset($_COOKIE['ideco_rate'])){
						$ckke_chk = $_COOKIE['ideco_rate'];
					}else{
						$ckke_chk = '';
					}

					for ($i=-5;$i<-0.1;$i=$i+0.1){
						if($i == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}

					if($ckke_chk == ''){
						echo "<option value='0' selected='true'>0</option>";
					}else{
						echo "<option value='0'>0</option>";
					}

					for ($i=0.1;$i<10.0;$i=$i+0.1){
						if(round($i,1) == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			 ％<br />
			<div class="hidden_box">
			    <label for="label6">説明</label>
			    <input type="checkbox" id="label6"/>
			    <div class="hidden_show">	
					<!--非表示ここから-->
					iDeCoの運用利率を入力して下さい。<br />
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
		</dl>
		
		<p id="form_submit"><input type="button" id="form_submit_button" value="シミュレーションする" /></p>

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-7384099347990686"
		     data-ad-slot="9568557043"
		     data-ad-format="auto"
		     data-full-width-responsive="true"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</form>
	<br/><br/>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="js/mailform-js.php"></script>

</body>
</html>
