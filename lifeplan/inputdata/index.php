<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="UTF-8" />
<title>ライフプランシミュレーション</title>
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111531836-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111531836-4');
</script>
</head>
<body>
	<div style="text-align:center;margin:20px 0 -30px 0;">
	<a style="padding:2px 10px 2px 10px;color:#ffffff;background-color:#337ab7;margin:0 4px 0px 0;border-radius:4px;" href="https://www.fp-support-engineer.com/" target="_blank"><i class="fas fa-home"></i></a>
	<a style="padding:2px 10px 2px 10px;color:#ffffff;background-color:#337ab7;margin:0 4px 0px 0;border-radius:4px;" href="https://www.fp-support-engineer.com/tool_detail/" target="_blank"><i class="fas fa-question-circle"></i></a>
	<a style="padding:2px 10px 2px 10px;color:#ffffff;background-color:#337ab7;margin:0 0px 0px 0;border-radius:4px;" href="https://www.fp-support-engineer.com/tool_history/" target="_blank"><i class="fas fa-history"></i></a>
	</div>

	<div style="font-family:'Quicksand';margin-top:60px;font-size:28px;text-align:center;font-weight:bold;color:#333333;">SE-Lifeplan-Simulation</div>
	<div style="font-size:14px;text-align:center;color:grey;margin-bottom:-20px;"><h1>正社員、フリーランスの生涯収支の比較に特化した家計のシミュレーションツールです。</h1></div>

	<form action="../result.php" target="_blank" method="post" id="mail_form">
	
		<dl>
			<dt>キャッシュフロー表<span>Cash flow(Base)</span></dt>
			<dd class="required">
				<ul>
					<li><label><input type="radio" class="workstyle" name="workstyle" value="0" id="radio_sal" 
						<?php
							$chk_flg = '';
							if(isset($_COOKIE['free_sal_workstyle'])){
								$chk_flg = $_COOKIE['free_sal_workstyle'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 0 or $chk_flg == 9){
								echo ' checked="checked"';
							}
						?>
						/><b>正社員をベース</b>にフリーランスと比較</label>
					</li>
					<li><label><input type="radio" class="workstyle" name="workstyle" value="1"
						<?php
							$chk_flg = '';
							if(isset($_COOKIE['free_sal_workstyle'])){
								$chk_flg = $_COOKIE['free_sal_workstyle'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 1){
									echo ' checked="checked"';
							}
						?>
						/><b>フリーランスをベース</b>に正社員と比較</label>
					</li>
				</ul>
			</dd>

			<dt>年齢<span>Age</span></dt>
			<dd class="required">
			<select name="age">
				<?php
					if(isset($_COOKIE['free_sal_age'])){
						$ckke_chk = $_COOKIE['free_sal_age'];
					}else{
						$ckke_chk = '';
					}

					for ($i=25;$i<50;$i++){
						if($i == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			<div class="hidden_box">
			    <label for="label1">説明</label>
			    <input type="checkbox" id="label1"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
			      <span class="imptnt">今年度の3月31日時点</span>のご自身の年齢を入力して下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			<dt>正社員歴<span>Period of regular employee</span></dt>
			<dd class="required">
			<select name="sal_year">
				<?php
					if(isset($_COOKIE['free_sal_sal_year'])){
						$ckke_chk = $_COOKIE['free_sal_sal_year'];
					}else{
						$ckke_chk = '';
					}

					if($ckke_chk == ''){
						echo "<option value='' selected='true'> </option>";
					}else{
						echo "<option value=''> </option>";
					}

					for ($i=0;$i<61;$i=$i+1){
						if($i == $ckke_chk){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
				?>
			</select>
			 年目<br />
			<div class="hidden_box">
			    <label for="label2">説明</label>
			    <input type="checkbox" id="label2"/>
			    <div class="hidden_show">	
					<!--非表示ここから-->
					年金受給金額の概算値を算出する為に必要な項目です。<br />
					<b><u>現時点でサラリーマンの場合</u></b>：<br />
					サラリーマン歴が何年目かを入力して下さい。<br />
					<b><u>現時点でフリーランスの場合</u></b>：<br />
					過去、サラリーマン歴が何年あったかを入力して下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			<dt>配偶者<span>Spouse</span></dt>
			<dd>
				<select name="haigusya">
					<?php
						if(isset($_COOKIE['free_sal_haigusya'])){
							$ckke_chk = $_COOKIE['free_sal_haigusya'];
						}else{
							$ckke_chk = '';
						}

						if($ckke_chk == ''){
							echo "<option value='' selected='true'> </option>";
						}else{
							echo "<option value=''> </option>";
						}

						for ($i=20;$i<60;$i=$i+1){
							if($i == $ckke_chk){
								echo "<option value='".$i."' selected='true'>".$i."</option>";
							}else{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
					?>
				</select>
			 歳
			<div class="hidden_box">
			    <label for="label3">説明</label>
			    <input type="checkbox" id="label3"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
						<span class="imptnt">今年度の3月31日時点</span>の配偶者の年齢を入力して下さい。	
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			
			<dt>第1子<span>Child's age1</span></dt>
			<dd>
				<select name="child1">
					<?php
						if(isset($_COOKIE['free_sal_child1'])){
							$ckke_chk = $_COOKIE['free_sal_child1'];

							if($_COOKIE['free_sal_child1'] == ''){
								echo "<option value='' selected='true'>   </option>";
								$ckke_chk = '99';
							}else{
								echo "<option value=''>   </option>";
							}
						}else{
							$ckke_chk = '99';
							echo "<option value='' selected='true'>   </option>";
						}

						for ($i=-10;$i<21;$i=$i+1){
							if($i == $ckke_chk){
								echo "<option value='".$i."' selected='true'>".$i."</option>";
							}else{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
					?>
				</select>
			 歳
			<!--進学タイプ-->
				<select name="child1_type">
					<?php
						if(isset($_COOKIE['free_sal_child1_type'])){
							$ckke_chk = $_COOKIE['free_sal_child1_type'];

							if($_COOKIE['free_sal_child1_type'] == ''){
								echo "<option value='0' selected='true'>選択して下さい</option>";
								$ckke_chk = '99';
							}else{
								echo "<option value='0'>選択して下さい</option>";
							}
						}else{
							echo "<option value='0' selected='true'>選択して下さい</option>";
							$ckke_chk = '99';
						}
						if($ckke_chk == 1){echo "<option value='1' selected='true'>小から私立 - 短大進学</option>";}else{echo "<option value='1'>小から私立 - 短大進学</option>";}
						if($ckke_chk == 2){echo "<option value='2' selected='true'>中から私立 - 短大進学</option>";}else{echo "<option value='2'>中から私立 - 短大進学</option>";}
						if($ckke_chk == 3){echo "<option value='3' selected='true'>高から私立 - 短大進学</option>";}else{echo "<option value='3'>高から私立 - 短大進学</option>";}
						if($ckke_chk == 4){echo "<option value='4' selected='true'>小から私立 - 大学(理系)進学</option>";}else{echo "<option value='4'>小から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 5){echo "<option value='5' selected='true'>中から私立 - 大学(理系)進学</option>";}else{echo "<option value='5'>中から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 6){echo "<option value='6' selected='true'>高から私立 - 大学(理系)進学</option>";}else{echo "<option value='6'>高から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 7){echo "<option value='7' selected='true'>小から私立 - 大学(文系)進学</option>";}else{echo "<option value='7'>小から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 8){echo "<option value='8' selected='true'>中から私立 - 大学(文系)進学</option>";}else{echo "<option value='8'>中から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 9){echo "<option value='9' selected='true'>高から私立 - 大学(文系)進学</option>";}else{echo "<option value='9'>高から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 10){echo "<option value='10' selected='true'>大から私立 - 大学(理系)進学</option>";}else{echo "<option value='10'>大から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 11){echo "<option value='11' selected='true'>大から私立 - 大学(文系)進学</option>";}else{echo "<option value='11'>大から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 12){echo "<option value='12' selected='true'>ずっと公立･国立 - 大学進学</option>";}else{echo "<option value='12'>ずっと公立･国立 - 大学進学</option>";}
					?>
				</select>
			<!--進学タイプ-->
			<div class="hidden_box">
			    <label for="label4">説明</label>
			    <input type="checkbox" id="label4"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
				・お子様の年齢は<span class="imptnt">第1子＞第2子＞第3子</span>となるように入力して下さい。<br />
				・<span class="imptnt">今年度の3月31日時点</span>のお子様の年齢を入力して下さい。<br />
				(3年後にお子様のご出産を想定したい場合は「-3」と入力して下さい。)
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			
			<dt>第2子<span>Child's age2</span></dt>
			<dd>
				<select name="child2">
					<?php
						if(isset($_COOKIE['free_sal_child2'])){
							$ckke_chk = $_COOKIE['free_sal_child2'];

							if($_COOKIE['free_sal_child2'] == ''){
								echo "<option value='' selected='true'>   </option>";
								$ckke_chk = '99';
							}else{
								echo "<option value=''>   </option>";
							}

						}else{
							$ckke_chk = '99';
							echo "<option value='' selected='true'>   </option>";
						}

						for ($i=-10;$i<21;$i=$i+1){
							if($i == $ckke_chk){
								echo "<option value='".$i."' selected='true'>".$i."</option>";
							}else{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
					?>
				</select>
			 歳
			<!--進学タイプ-->
				<select name="child2_type">
					<?php
						if(isset($_COOKIE['free_sal_child2_type'])){
							$ckke_chk = $_COOKIE['free_sal_child2_type'];

							if($_COOKIE['free_sal_child2_type'] == ''){
								echo "<option value='0' selected='true'>選択して下さい</option>";
								$ckke_chk = '99';
							}else{
								echo "<option value='0'>選択して下さい</option>";
							}
						}else{
							echo "<option value='0' selected='true'>選択して下さい</option>";
							$ckke_chk = '99';
						}
						if($ckke_chk == 1){echo "<option value='1' selected='true'>小から私立 - 短大進学</option>";}else{echo "<option value='1'>小から私立 - 短大進学</option>";}
						if($ckke_chk == 2){echo "<option value='2' selected='true'>中から私立 - 短大進学</option>";}else{echo "<option value='2'>中から私立 - 短大進学</option>";}
						if($ckke_chk == 3){echo "<option value='3' selected='true'>高から私立 - 短大進学</option>";}else{echo "<option value='3'>高から私立 - 短大進学</option>";}
						if($ckke_chk == 4){echo "<option value='4' selected='true'>小から私立 - 大学(理系)進学</option>";}else{echo "<option value='4'>小から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 5){echo "<option value='5' selected='true'>中から私立 - 大学(理系)進学</option>";}else{echo "<option value='5'>中から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 6){echo "<option value='6' selected='true'>高から私立 - 大学(理系)進学</option>";}else{echo "<option value='6'>高から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 7){echo "<option value='7' selected='true'>小から私立 - 大学(文系)進学</option>";}else{echo "<option value='7'>小から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 8){echo "<option value='8' selected='true'>中から私立 - 大学(文系)進学</option>";}else{echo "<option value='8'>中から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 9){echo "<option value='9' selected='true'>高から私立 - 大学(文系)進学</option>";}else{echo "<option value='9'>高から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 10){echo "<option value='10' selected='true'>大から私立 - 大学(理系)進学</option>";}else{echo "<option value='10'>大から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 11){echo "<option value='11' selected='true'>大から私立 - 大学(文系)進学</option>";}else{echo "<option value='11'>大から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 12){echo "<option value='12' selected='true'>ずっと公立･国立 - 大学進学</option>";}else{echo "<option value='12'>ずっと公立･国立 - 大学進学</option>";}
					?>
				</select>
			<!--進学タイプ-->
			 </dd>
			
			<dt>第3子<span>Child's age3</span></dt>
			<dd>
				<select name="child3">
					<?php
						if(isset($_COOKIE['free_sal_child3'])){
							$ckke_chk = $_COOKIE['free_sal_child3'];

							if($_COOKIE['free_sal_child3'] == ''){
								echo "<option value='' selected='true'>   </option>";
								$ckke_chk = '99';
							}else{
								echo "<option value=''>   </option>";
							}
						}else{
							$ckke_chk = '99';
							echo "<option value='' selected='true'>   </option>";
						}

						for ($i=-10;$i<21;$i=$i+1){
							if($i == $ckke_chk){
								echo "<option value='".$i."' selected='true'>".$i."</option>";
							}else{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
					?>
				</select>
			 歳
			<!--進学タイプ-->
				<select name="child3_type">
					<?php
						if(isset($_COOKIE['free_sal_child3_type'])){
							$ckke_chk = $_COOKIE['free_sal_child3_type'];

							if($_COOKIE['free_sal_child3_type'] == ''){
								echo "<option value='0' selected='true'>選択して下さい</option>";
								$ckke_chk = '99';
							}else{
								echo "<option value='0'>選択して下さい</option>";
							}
						}else{
							echo "<option value='0' selected='true'>選択して下さい</option>";
							$ckke_chk = '99';
						}
						if($ckke_chk == 1){echo "<option value='1' selected='true'>小から私立 - 短大進学</option>";}else{echo "<option value='1'>小から私立 - 短大進学</option>";}
						if($ckke_chk == 2){echo "<option value='2' selected='true'>中から私立 - 短大進学</option>";}else{echo "<option value='2'>中から私立 - 短大進学</option>";}
						if($ckke_chk == 3){echo "<option value='3' selected='true'>高から私立 - 短大進学</option>";}else{echo "<option value='3'>高から私立 - 短大進学</option>";}
						if($ckke_chk == 4){echo "<option value='4' selected='true'>小から私立 - 大学(理系)進学</option>";}else{echo "<option value='4'>小から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 5){echo "<option value='5' selected='true'>中から私立 - 大学(理系)進学</option>";}else{echo "<option value='5'>中から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 6){echo "<option value='6' selected='true'>高から私立 - 大学(理系)進学</option>";}else{echo "<option value='6'>高から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 7){echo "<option value='7' selected='true'>小から私立 - 大学(文系)進学</option>";}else{echo "<option value='7'>小から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 8){echo "<option value='8' selected='true'>中から私立 - 大学(文系)進学</option>";}else{echo "<option value='8'>中から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 9){echo "<option value='9' selected='true'>高から私立 - 大学(文系)進学</option>";}else{echo "<option value='9'>高から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 10){echo "<option value='10' selected='true'>大から私立 - 大学(理系)進学</option>";}else{echo "<option value='10'>大から私立 - 大学(理系)進学</option>";}
						if($ckke_chk == 11){echo "<option value='11' selected='true'>大から私立 - 大学(文系)進学</option>";}else{echo "<option value='11'>大から私立 - 大学(文系)進学</option>";}
						if($ckke_chk == 12){echo "<option value='12' selected='true'>ずっと公立･国立 - 大学進学</option>";}else{echo "<option value='12'>ずっと公立･国立 - 大学進学</option>";}
					?>
				</select>
			<!--進学タイプ-->
			 </dd>

			<dt>給与(手取り)<span>Salary</span></dt>
			<dd class="required"><input type="text" id="sal_income" name="sal_income"
				<?php
					if(isset($_COOKIE['free_sal_sal_income'])){
						$sal_income = $_COOKIE['free_sal_sal_income'];
					}else{
						$sal_income = '';
					}
					echo ' value="'.$sal_income.'"';
				?>
			/> 万円<br />
			<div class="hidden_box">
			    <label for="label5">説明</label>
			    <input type="checkbox" id="label5"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					フリーランスの報酬金額(手取り)と比較したい「<span class="imptnt">給料の手取り金額</span>」を入力して下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			
			<dt>報酬(手取り)<span>Compensation</span></dt>
			<dd class="required"><input type="text" id="free_income" name="free_income"
				<?php
					if(isset($_COOKIE['free_sal_free_income'])){
						$free_income = $_COOKIE['free_sal_free_income'];
					}else{
						$free_income = '';
					}
					echo ' value="'.$free_income.'"';
				?>
			/> 万円<br />
			<div class="hidden_box">
			    <label for="label6">説明</label>
			    <input type="checkbox" id="label6"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					正社員の給料(手取り)と比較したい「<span class="imptnt">報酬の手取り金額(税引前)</span>」を入力して下さい。<br />
					<b><単価の目安></b>
					<style>
						#tanka_tbl tr:nth-child(1) {
						    background-color: #223a70;
						    color:#ffffff;
						}
						#tanka_tbl tr:nth-child(even) td {
						    background-color: #ededed;
						}
						#tanka_tbl td {
						    text-align: center;
						}
					</style>
				<table id="tanka_tbl">
					<tr style="border-bottom:1px solid">
						<th>言語/経験年</th>
						<th>経験無</th>
						<th>1年未満</th>
						<th>1～2年 </th>
						<th>2～3年 </th>
						<th>3～5年 </th>
						<th>5年以上</th>
					</tr>
					<tr>
						<th>Swift</th>
						<td>30</td>
						<td>40</td>
						<td>51</td>
						<td>62</td>
						<td>75</td>
						<td>80</td>
					</tr>
					<tr>
						<th>Ruby</th>
						<td>35</td>
						<td>45</td>
						<td>55</td>
						<td>65</td>
						<td>75</td>
						<td>80</td>
					</tr>
					<tr>
						<th>Python</th>
						<td>30</td>
						<td>40</td>
						<td>50</td>
						<td>60</td>
						<td>70</td>
						<td>80</td>
					</tr>
					<tr>
						<th>Java(android)</th>
						<td>30</td>
						<td>37</td>
						<td>47</td>
						<td>57</td>
						<td>67</td>
						<td>75</td>
					</tr>
					<tr>
						<th>Java(Web系)</th>
						<td>30</td>
						<td>37</td>
						<td>46</td>
						<td>55</td>
						<td>65</td>
						<td>72</td>
					</tr>
					<tr>
						<th>Java(業務系)</th>
						<td>30</td>
						<td>35</td>
						<td>44</td>
						<td>53</td>
						<td>63</td>
						<td>70</td>
					</tr>
					<tr>
						<th>PHP</th>
						<td>30</td>
						<td>40</td>
						<td>49</td>
						<td>58</td>
						<td>67</td>
						<td>75</td>
					</tr>
					<tr>
						<th>JavaScript</th>
						<td>30</td>
						<td>40</td>
						<td>48</td>
						<td>56</td>
						<td>65</td>
						<td>70</td>
					</tr>
					<tr>
						<th>C</th>
						<td>30</td>
						<td>35</td>
						<td>41</td>
						<td>47</td>
						<td>54</td>
						<td>60</td>
					</tr>
					<tr>
						<th>.NET</th>
						<td>30</td>
						<td>35</td>
						<td>42</td>
						<td>49</td>
						<td>57</td>
						<td>63</td>
					</tr>
					<tr>
						<th>HTML5</th>
						<td>30</td>
						<td>30</td>
						<td>36</td>
						<td>42</td>
						<td>49</td>
						<td>54</td>
					</tr>
					<tr>
						<th></th>
					</tr>
				</table>
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>リタイア年齢<span>Retirement age(As freelance)</span></dt>
			<dd class="required">
				<select name="retire">
				<?php
				if(isset($_COOKIE['free_sal_retire'])){
					$retire = $_COOKIE['free_sal_retire'];
				}else{
					$retire = 60;
				}
				for ($i=65;$i>49;$i=$i-1){
					if($i == $retire){
						echo "<option value='".$i."' selected='true'>".$i."</option>";
					}else{
						echo "<option value='".$i."'>".$i."</option>";
					}
				}
				?>
				</select> 歳
				<div class="hidden_box">
				    <label for="label7">説明</label>
				    <input type="checkbox" id="label7"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						ご自身が<span class="imptnt">フリーランス</span>だと仮定した場合のリタイア年齢を入力して下さい。<br />
						なお、<span class="imptnt">正社員のリタイア年齢は60歳で固定</span>となっています。
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>貯金<span>Savings and deposits</span></dt>
			<dd class="required"><input type="text" id="saving" name="saving"
				<?php
					if(isset($_COOKIE['free_sal_saving'])){
						$saving = $_COOKIE['free_sal_saving'];
					}else{
						$saving = '';
					}
					echo ' value="'.$saving.'"';
				?>
			/> 万円<br />
			<div class="hidden_box">
			    <label for="label8">説明</label>
			    <input type="checkbox" id="label8"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					<span class="imptnt">今年1月時</span>点のご自身名義の預貯金の残高を入力して下さい。	
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>家賃<span>Rent</span></dt>
			<dd class="required"><input type="text" id="home" name="home"
				<?php
					if(isset($_COOKIE['free_sal_home'])){
						$home = $_COOKIE['free_sal_home'];
					}else{
						$home = '';
					}
					echo ' value="'.$home.'"';
				?>
			/> 万円(月額)
			<div class="hidden_box">
			    <label for="label9">説明</label>
			    <input type="checkbox" id="label9"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					<span class="imptnt">住宅ローンの返済金額以外</span>の住宅費を入力して下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			
			<dt>旅費交通費<span>Business trip</span></dt>
			<dd class="required"><input type="text" id="ryohi" name="ryohi"
				<?php
					if(isset($_COOKIE['free_sal_ryohi'])){
						$ryohi = $_COOKIE['free_sal_ryohi'];
					}else{
						$ryohi = '';
					}
					echo ' value="'.$ryohi.'"';
				?>
			/> 万円(月額)
			<div class="hidden_box">
			    <label for="label10">説明</label>
			    <input type="checkbox" id="label10"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					<span class="imptnt">仕事に関連する</span>交通費を入力して下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			
			<dt>情報通信費<span>Communication </span></dt>
			<dd class="required"><input type="text" id="it" name="it"
				<?php
					if(isset($_COOKIE['free_sal_it'])){
						$it = $_COOKIE['free_sal_it'];
					}else{
						$it = '';
					}
					echo ' value="'.$it.'"';
				?>
			/> 万円(月額)
			<div class="hidden_box">
			    <label for="label11">説明</label>
			    <input type="checkbox" id="label11"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					<span class="imptnt">仕事に関連する</span>携帯料金、インターネット使用料、レンタルサーバ料金などをご入力下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			
			<dt>書籍代<span>Book</span></dt>
			<dd class="required"><input type="text" id="book" name="book"
				<?php
					if(isset($_COOKIE['free_sal_book'])){
						$book = $_COOKIE['free_sal_book'];
					}else{
						$book = '';
					}
					echo ' value="'.$book.'"';
				?>
			/> 万円(月額)
			<div class="hidden_box">
			    <label for="label12">説明</label>
			    <input type="checkbox" id="label12"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					<span class="imptnt">仕事に関連する</span>書籍代をご入力下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			
			<dt>接待交際費<span>Entertainment</span></dt>
			<dd class="required"><input type="text" id="settai" name="settai"
				<?php
					if(isset($_COOKIE['free_sal_settai'])){
						$settai = $_COOKIE['free_sal_settai'];
					}else{
						$settai = '';
					}
					echo ' value="'.$settai.'"';
				?>
			/> 万円(月額)
			<div class="hidden_box">
			    <label for="label13">説明</label>
			    <input type="checkbox" id="label13"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					<span class="imptnt">仕事に関連する</span>接待、お打合せ、会食などの料金をご入力下さい。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>
			
			<dt>食事代<span>Lunch/Dinner</span></dt>
			<dd class="required"><input type="text" id="lunch" name="lunch"
				<?php
					if(isset($_COOKIE['free_sal_lunch'])){
						$lunch = $_COOKIE['free_sal_lunch'];
					}else{
						$lunch = '';
					}
					echo ' value="'.$lunch.'"';
				?>
			/> 万円(月額)
			<div class="hidden_box">
			    <label for="label_l">説明</label>
			    <input type="checkbox" id="label_l"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					<span class="imptnt">仕事とは関係ないが、業務時間中に発生した</span>ご自身分の食事代をご入力下さい。<br />
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>その他生活費<span>Other</span></dt>
			<dd class="required"><input type="text" id="sonota_seikatsuhi" name="sonota_seikatsuhi"
				<?php
					if(isset($_COOKIE['free_sal_sonota_seikatsuhi'])){
						$sonota_seikatsuhi = $_COOKIE['free_sal_sonota_seikatsuhi'];
					}else{
						$sonota_seikatsuhi = '';
					}
					echo ' value="'.$sonota_seikatsuhi.'"';
				?>
			/> 万円(月額)
			<div class="hidden_box">
			    <label for="label14">説明</label>
			    <input type="checkbox" id="label14"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					上記支出に当てはまらないプライベートにおける「食費」「娯楽費」「公共料金(電気･ガス･水道)」などの支出金額をご入力下さい。<br />
					なお、<span class="imptnt">下記項目</span>については別途計算にて算出をする為「その他生活費」には<span class="imptnt">含めないで</span>下さい。<br />
					・教育費全般<br />
					・国民年金保険料<br />
					・国民健康保険料<br />
					・住民税<br />
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>老後ワークスタイル<span>Work style after retirement</span></dt>
			<dd class="required">
				<ul>
					<li><label><input type="radio" class="retire_plan" name="retire_plan" value="0"
						<?php
							$chk_flg = '';
							if(isset($_COOKIE['free_sal_retire_plan'])){
								$chk_flg = $_COOKIE['free_sal_retire_plan'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 0){
								echo ' checked="checked"';
							}
						?>
					/>節約</label></li>
					
					<li><label><input type="radio" class="retire_plan" name="retire_plan" value="1"
						<?php
							$chk_flg = '';
							if(isset($_COOKIE['free_sal_retire_plan'])){
								$chk_flg = $_COOKIE['free_sal_retire_plan'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 1 or $chk_flg == 9){
								echo ' checked="checked"';
							}
						?>
					/>現状維持</label></li>
					
					<li><label><input type="radio" class="retire_plan" name="retire_plan" value="2"
						<?php
							$chk_flg = '';
							if(isset($_COOKIE['free_sal_retire_plan'])){
								$chk_flg = $_COOKIE['free_sal_retire_plan'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 2){
								echo ' checked="checked"';
							}
						?>
					/>アクティブ</label></li>
				</ul>
				<div class="hidden_box">
				    <label for="label15">説明</label>
				    <input type="checkbox" id="label15"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						・<b>節約</b>･･･老後の生活費が現状ベースで2割減<br />
						・<b>現状維持</b>･･･老後の生活費が現状ベースと同じ<br />
						・<b>アクティブ</b>･･･老後の生活費が現状ベースより2割増<br />	
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>医療費<span>Medical</span></dt>
			<dd class="required">
				<ul>
					<li><label><input type="radio" class="iryohi_kami" name="iryohi_kami" value="0"
						<?php
							$chk_flg = '';
							if(isset($_COOKIE['free_sal_iryohi_kami'])){
								$chk_flg = $_COOKIE['free_sal_iryohi_kami'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 0 or $chk_flg == 9){
								echo ' checked="checked"';
							}
						?>
					/>考慮する</label></li>
					
					<li><label><input type="radio" class="iryohi_kami" name="iryohi_kami" value="1"
						<?php
							if(isset($_COOKIE['free_sal_iryohi_kami'])){
								$chk_flg = $_COOKIE['free_sal_iryohi_kami'];
							}else{
								$chk_flg = 9;
							}
						
							if($chk_flg == 1){
								echo ' checked="checked"';
							}
						?>
					/>考慮しない</label></li>
				</ul>
				<div class="hidden_box">
				    <label for="label16">説明</label>
				    <input type="checkbox" id="label16"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						・<b>考慮する</b>：統計データより、年齢別に掛かり得る医療費を反映します。<br />
						・<b>考慮しない</b>：医療費を考慮しません。
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>自動車<span>Car</span></dt>
			<dd>
			<select name="car">
				<?php
				if(isset($_COOKIE['free_sal_car'])){
					$car = $_COOKIE['free_sal_car'];
					
					if($_COOKIE['free_sal_car'] == ''){
						echo "<option value='' selected='true'> </option>";
					}else{
						echo "<option value=''> </option>";
					}
				}else{
					echo "<option value='' selected='true'> </option>";
				}
				for ($i=50;$i<510;$i=$i+10){
					if($i == $car){
						echo "<option value='".$i."' selected='true'>".$i."</option>";
					}else{
						echo "<option value='".$i."'>".$i."</option>";
					}
				}
				?>
			</select> 万円の自動車を
			<select name="car_by_year">
				<?php
				if(isset($_COOKIE['free_sal_car_by_year'])){
					$car_by_year = $_COOKIE['free_sal_car_by_year'];

					if($_COOKIE['free_sal_car_by_year'] == ''){
						echo "<option value='' selected='true'> </option>";
					}else{
						echo "<option value=''> </option>";
					}
				}else{
					echo "<option value='' selected='true'> </option>";
				}
				for ($i=4;$i<21;$i=$i+2){
					if($i == $car_by_year){
						echo "<option value='".$i."' selected='true'>".$i."</option>";
					}else{
						echo "<option value='".$i."'>".$i."</option>";
					}
				}
				?>
			</select> 年毎に購入
			</dd>

			<dt>旅行<span>Travel</span></dt>
			<dd>
			毎年
			<select name="trip">
				<?php
				if(isset($_COOKIE['free_sal_trip'])){
					$trip = $_COOKIE['free_sal_trip'];

					if($_COOKIE['free_sal_trip'] == ''){
						echo "<option value='' selected='true'> </option>";
					}else{
						echo "<option value=''> </option>";
					}
				}else{
					echo "<option value='' selected='true'> </option>";
				}
				for ($i=5;$i<55;$i=$i+5){
					if($i == $trip){
						echo "<option value='".$i."' selected='true'>".$i."</option>";
					}else{
						echo "<option value='".$i."'>".$i."</option>";
					}
				}
				?>
			</select> 万円分の旅行をしたい
			 </dd>

			<dt>年間保険料1<span>Insurance fee1</span></dt>
			<dd>
				<select name="hoken1">
					<?php
						if(isset($_COOKIE['free_sal_hoken1'])){
							$hoken1 = $_COOKIE['free_sal_hoken1'];
							
							if($_COOKIE['free_sal_hoken1'] == ''){
								echo "<option value='' selected='true'> </option>";
							}else{
								echo "<option value=''> </option>";
							}
						}else{
							echo "<option value='' selected='true'> </option>";
						}

						for ($i=1;$i<11;$i=$i+0.5){
							if($i == $hoken1){
								echo "<option value='".$i."' selected='true'>".$i."</option>";
							}else{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
						for ($i=15;$i<155;$i=$i+5){
							if($i == $hoken1){
								echo "<option value='".$i."' selected='true'>".$i."</option>";
							}else{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
					?>
				</select> 万円を あと
				<select name="hoken_zan1">
					<?php
					if(isset($_COOKIE['free_sal_hoken_zan1'])){
						$hoken_zan1 = $_COOKIE['free_sal_hoken_zan1'];

						if($_COOKIE['free_sal_hoken_zan1'] == ''){
							echo "<option value='' selected='true'> </option>";
						}else{
							echo "<option value=''> </option>";
						}

					}else{
						echo "<option value='' selected='true'> </option>";
					}
					for ($i=1;$i<26;$i=$i+1){
						if($i == $hoken_zan1){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}

					if(isset($_COOKIE['free_sal_hoken_zan1'])){
						if($_COOKIE['free_sal_hoken_zan1'] == '99'){
							echo "<option value='99' selected='true'>99</option>";
						}else{
							echo "<option value='99'>99</option>";
						}
					}else{
						echo "<option value='99'>99</option>";
					}
					?>
				</select> 年支払う
				<div class="hidden_box">
				    <label for="label17">説明</label>
				    <input type="checkbox" id="label17"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						・<span class="imptnt">ご本人名義</span>の保険の保険料を入力して下さい。<br />	
						・複数の保険に加入している場合は<span class="imptnt">金額の大きい</span>ものを入力して下さい。<br />	
						・有期保険の場合は、残りの払込年数を入力して下さい(当年含む)。<br />	
						・終身保険の場合は、年数は<span class="imptnt">99</span>と入力して下さい。	<br />
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>年間保険料2<span>Insurance fee2</span></dt>
			<dd>
				<select name="hoken2">
					<?php
						if(isset($_COOKIE['free_sal_hoken2'])){
							$hoken2 = $_COOKIE['free_sal_hoken2'];
							
							if($_COOKIE['free_sal_hoken2'] == ''){
								echo "<option value='' selected='true'> </option>";
							}else{
								echo "<option value=''> </option>";
							}
						}else{
							echo "<option value='' selected='true'> </option>";
						}

						for ($i=1;$i<11;$i=$i+0.5){
							if($i == $hoken2){
								echo "<option value='".$i."' selected='true'>".$i."</option>";
							}else{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
						for ($i=15;$i<155;$i=$i+5){
							if($i == $hoken2){
								echo "<option value='".$i."' selected='true'>".$i."</option>";
							}else{
								echo "<option value='".$i."'>".$i."</option>";
							}
						}
					?>
				</select> 万円を あと
				<select name="hoken_zan2">
					<?php
					if(isset($_COOKIE['free_sal_hoken_zan2'])){
						$hoken_zan2 = $_COOKIE['free_sal_hoken_zan2'];

						if($_COOKIE['free_sal_hoken_zan2'] == ''){
							echo "<option value='' selected='true'> </option>";
						}else{
							echo "<option value=''> </option>";
						}

					}else{
						echo "<option value='' selected='true'> </option>";
					}
					for ($i=1;$i<26;$i=$i+1){
						if($i == $hoken_zan2){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}

					if(isset($_COOKIE['free_sal_hoken_zan2'])){
						if($_COOKIE['free_sal_hoken_zan2'] == '99'){
							echo "<option value='99' selected='true'>99</option>";
						}else{
							echo "<option value='99'>99</option>";
						}
					}else{
						echo "<option value='99'>99</option>";
					}
					?>
				</select> 年支払う
			</dd>

			<dt>追加収支1<span>Income and expenditure1</span></dt>
			<dd>
				<select name="add_age1">
					<?php
					if(isset($_POST['add_age1'])){
						$add_age1 = $_POST['add_age1'];
					}else{
						$add_age1 = '';
					}
					echo "<option value=''>   </option>";
					for ($i=30;$i<80;$i=$i+1){
						if($i == $add_age1){
							$select_sts = " selected='true'";
						}else{
							$select_sts = '';
						}
						echo "<option value='".$i."'".$select_sts.">".$i."</option>";
					}
					?>
				</select> 歳で年間
				<select name="add_kingaku1">
					<?php
						echo "<option value='' selected='true'>   </option>";
						for ($i=-3000;$i<3100;$i=$i+100){
							echo "<option value='".$i."'".$select_sts.">".$i."</option>";
						}
					?>
				</select>
				 万円の収入/支出
				<div class="hidden_box">
				    <label for="label18">説明</label>
				    <input type="checkbox" id="label18"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						<b>(例1)60歳の時に1000万円でリフォームする。</b><br />
						    年齢:60 /金額:-1000<br />
						<b>(例2)65歳の時に500万円が相続される。</b><br />
						    年齢:65 /金額:500<br />
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>追加収支2<span>Income and expenditure2</span></dt>
			<dd>
				<select name="add_age2">
					<?php
					if(isset($_POST['add_age2'])){
						$add_age2 = $_POST['add_age2'];
					}else{
						$add_age2 = '';
					}
					echo "<option value=''>   </option>";
					for ($i=30;$i<80;$i=$i+1){
						if($i == $add_age2){
							$select_sts = " selected='true'";
						}else{
							$select_sts = '';
						}
						echo "<option value='".$i."'".$select_sts.">".$i."</option>";
					}
					?>
				</select> 歳で年間
				<select name="add_kingaku2">
					<?php
						echo "<option value='' selected='true'>   </option>";
						for ($i=-3000;$i<3100;$i=$i+100){
							echo "<option value='".$i."'".$select_sts.">".$i."</option>";
						}
					?>
				</select>
				 万円の収入/支出
			</dd>

			<dt>小規模企業共済<span>Small enterprise mutual aid plan</span></dt>
			<dd>
				<select name="syokibo">
					<?php
					if(isset($_COOKIE['free_sal_syokibo'])){
						$syokibo = $_COOKIE['free_sal_syokibo'];

						if($_COOKIE['free_sal_syokibo'] == ''){
							echo "<option value='' selected='true'> </option>";
						}else{
							echo "<option value=''> </option>";
						}
						
					}else{
						echo "<option value='' selected='true'> </option>";
					}
					for ($i=0.5;$i<7.5;$i=$i+0.5){
						if($i == $syokibo){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
					?>
				</select> 万円(月額)　

				<!--受給年-->
				<select name="syokibo_in_year">
					<?php
						if(isset($_COOKIE['free_sal_syokibo_in_year'])){
							$ckke_chk = $_COOKIE['free_sal_syokibo_in_year'];

							if($_COOKIE['free_sal_syokibo_in_year'] == ''){
								echo "<option value='' selected='true'> </option>";
								$ckke_chk = '99';
							}else{
								echo "<option value=''> </option>";
							}
						}else{
							echo "<option value='' selected='true'> </option>";
							$ckke_chk = '99';
						}
						if($ckke_chk == 60){echo "<option value='60' selected='true'>60</option>";}else{echo "<option value='60'>60</option>";}
						if($ckke_chk == 61){echo "<option value='61' selected='true'>61</option>";}else{echo "<option value='61'>61</option>";}
						if($ckke_chk == 62){echo "<option value='62' selected='true'>62</option>";}else{echo "<option value='62'>62</option>";}
						if($ckke_chk == 63){echo "<option value='63' selected='true'>63</option>";}else{echo "<option value='63'>63</option>";}
						if($ckke_chk == 64){echo "<option value='64' selected='true'>64</option>";}else{echo "<option value='64'>64</option>";}
						if($ckke_chk == 65){echo "<option value='65' selected='true'>65</option>";}else{echo "<option value='65'>65</option>";}
						if($ckke_chk == 66){echo "<option value='66' selected='true'>66</option>";}else{echo "<option value='66'>66</option>";}
						if($ckke_chk == 67){echo "<option value='67' selected='true'>67</option>";}else{echo "<option value='67'>67</option>";}
						if($ckke_chk == 68){echo "<option value='68' selected='true'>68</option>";}else{echo "<option value='68'>68</option>";}
						if($ckke_chk == 69){echo "<option value='69' selected='true'>69</option>";}else{echo "<option value='69'>69</option>";}
						if($ckke_chk == 70){echo "<option value='70' selected='true'>70</option>";}else{echo "<option value='70'>70</option>";}
					?>
				</select> 歳で一括受給
				<!--受給年-->

				<div class="hidden_box">
				    <label for="label19">説明</label>
				    <input type="checkbox" id="label19"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						フリーランスだと仮定した場合の、小規模企業共済の毎月の掛け金を入力して下さい。<br />
						「リタイア年齢」に達した際に、共済金Aが支払われることを想定しています。
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>個人型確定拠出年金<span>iDeCo</span></dt>
			<dd>
				<select name="ideco" id="in_ideco">
					<?php
					if(isset($_COOKIE['free_sal_ideco'])){
						$ideco = $_COOKIE['free_sal_ideco'];

						if($_COOKIE['free_sal_ideco'] == ''){
							echo "<option value='' selected='true'> </option>";
							$ideco = '99';
						}else{
							echo "<option value=''> </option>";
						}
						
					}else{
						echo "<option value='' selected='true'> </option>";
						$ideco = '99';
					}
					for ($i=0.5;$i<6.8;$i=$i+0.1){
						if(round($i,1) == $ideco){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
					?>
				</select> 万円(月額)　
				
				<!--受給年-->
				<select name="ideco_in_year">
					<?php
						if(isset($_COOKIE['free_sal_ideco_in_year'])){
							$ckke_chk = $_COOKIE['free_sal_ideco_in_year'];

							if($_COOKIE['free_sal_ideco_in_year'] == ''){
								echo "<option value='' selected='true'> </option>";
								$ckke_chk = '99';
							}else{
								echo "<option value=''> </option>";
							}
						}else{
							echo "<option value='' selected='true'> </option>";
							$ckke_chk = '99';
						}
						if($ckke_chk == 60){echo "<option value='60' selected='true'>60</option>";}else{echo "<option value='60'>60</option>";}
						if($ckke_chk == 61){echo "<option value='61' selected='true'>61</option>";}else{echo "<option value='61'>61</option>";}
						if($ckke_chk == 62){echo "<option value='62' selected='true'>62</option>";}else{echo "<option value='62'>62</option>";}
						if($ckke_chk == 63){echo "<option value='63' selected='true'>63</option>";}else{echo "<option value='63'>63</option>";}
						if($ckke_chk == 64){echo "<option value='64' selected='true'>64</option>";}else{echo "<option value='64'>64</option>";}
						if($ckke_chk == 65){echo "<option value='65' selected='true'>65</option>";}else{echo "<option value='65'>65</option>";}
						if($ckke_chk == 66){echo "<option value='66' selected='true'>66</option>";}else{echo "<option value='66'>66</option>";}
						if($ckke_chk == 67){echo "<option value='67' selected='true'>67</option>";}else{echo "<option value='67'>67</option>";}
						if($ckke_chk == 68){echo "<option value='68' selected='true'>68</option>";}else{echo "<option value='68'>68</option>";}
						if($ckke_chk == 69){echo "<option value='69' selected='true'>69</option>";}else{echo "<option value='69'>69</option>";}
						if($ckke_chk == 70){echo "<option value='70' selected='true'>70</option>";}else{echo "<option value='70'>70</option>";}
					?>
				</select> 歳で一括受給
				<!--受給年-->

				<div class="hidden_box">
				    <label for="label20">説明</label>
				    <input type="checkbox" id="label20"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						個人型確定拠出年金(iDeCo/イデコ)の毎月の積立額を入力して下さい。<br />
						<b>サラリーマンの場合</b><br />
						    月々の積立額の上限は23000円<br />
						<b>フリーランスの場合</b><br />
						    月々の積立額の上限は68000円<br />
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>運用利率<span>Investment interest rate for iDeCo</span></dt>
			<dd>
			<select name="ideco_rate">
				<?php
					if(isset($_COOKIE['free_sal_ideco_rate'])){
						$ckke_chk = $_COOKIE['free_sal_ideco_rate'];

						if($_COOKIE['free_sal_ideco_rate'] == ''){
							echo "<option value='' selected='true'> </option>";
						}else{
							echo "<option value=''> </option>";
						}
						
					}else{
						echo "<option value='' selected='true'> </option>";
					}

					for ($i=-5;$i<-0.1;$i=$i+0.1){
						if(round($i,1) == $ckke_chk){
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
			 ％
			<div class="hidden_box">
			    <label for="label22">説明</label>
			    <input type="checkbox" id="label22"/>
			    <div class="hidden_show">	
					<!--非表示ここから-->
					iDeCoの運用利率を入力して下さい。<br />
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>専従者給与<span>Wage of family employee</span></dt>
			<dd>
				<select name="senjusya">
					<?php
					if(isset($_COOKIE['free_sal_senjusya'])){
						$senjusya = $_COOKIE['free_sal_senjusya'];

						if($_COOKIE['free_sal_senjusya'] == ''){
							echo "<option value='' selected='true'> </option>";
						}else{
							echo "<option value=''> </option>";
						}
					}else{
						echo "<option value='' selected='true'> </option>";
					}
					for ($i=0.5;$i<8.5;$i=$i+0.5){
						if($i == $senjusya){
							echo "<option value='".$i."' selected='true'>".$i."</option>";
						}else{
							echo "<option value='".$i."'>".$i."</option>";
						}
					}
					?>
				</select> 万円(月額)
				<div class="hidden_box">
				    <label for="label20">説明</label>
				    <input type="checkbox" id="label20"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						フリーランスだと仮定した場合の、専従者給与の毎月の金額を入力して下さい。<br />
						(配偶者が居られる場合にご入力下さい)
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>追加経費<span>Expenses</span></dt>
			<dd>
				<select name="on_keihi">
					<?php
						echo "<option value='' selected='true'>   </option>";
						for ($i=1;$i<51;$i=$i+1){
							echo "<option value='".$i."'>".$i."</option>";
						}
					?>
				</select>
			 万円(月額)
			<div class="hidden_box">
			    <label for="label21">説明</label>
			    <input type="checkbox" id="label21"/>
			    <div class="hidden_show">	
			      <!--非表示ここから-->
					追加したい経費金額(月額)を入力して下さい。
					経費として計上する金額が増えると、どのくらい税金が安くなるかをシミュレーションする為の項目です。
			      <!--ここまで-->
			    </div>
			</div>
			</dd>

			<dt>住宅ローン完済予定<span>Pay off age</span></dt>
			<dd>
				<select name="home_back_end_age">
					<?php
					if(isset($_POST['home_back_end_age'])){
						$home_back_end_age = $_POST['home_back_end_age'];
					}else{
						$home_back_end_age = '';
					}
					echo "<option value=''>   </option>";
					for ($i=40;$i<86;$i=$i+1){
						if($i == $home_back_end_age){
							$select_sts = " selected='true'";
						}else{
							$select_sts = '';
						}
						echo "<option value='".$i."'".$select_sts.">".$i."</option>";
					}
					?>
				</select> 歳
				(現在返済
				<select name="home_back_year_cnt">
					<?php
					if(isset($_POST['home_back_year_cnt'])){
						$home_back_year_cnt = $_POST['home_back_year_cnt'];
					}else{
						$home_back_year_cnt = '';
					}
					echo "<option value=''>   </option>";
					for ($i=-10;$i<0;$i=$i+1){
						if($i == $home_back_year_cnt){
							$select_sts = " selected='true'";
						}else{
							$select_sts = '';
						}
						echo "<option value='".$i."'".$select_sts.">".$i."</option>";
					}
					for ($i=1;$i<31;$i=$i+1){
						if($i == $home_back_year_cnt){
							$select_sts = " selected='true'";
						}else{
							$select_sts = '';
						}
						echo "<option value='".$i."'".$select_sts.">".$i."</option>";
					}
					?>
				</select>
				年目)
				<div class="hidden_box">
				    <label for="label22">説明</label>
				    <input type="checkbox" id="label22"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						3年後に住宅ローン返済を開始したい場合は「-3」年目と入力して下さい。
				      <!--ここまで-->
				    </div>
				</div>
			</dd>

			<dt>住宅ローン残金<span>Loan's balance</span></dt>
			<dd>
				<select name="home_back_zankin">
					<?php
						echo "<option value='' selected='true'>   </option>";
						for ($i=100;$i<5600;$i=$i+100){
							echo "<option value='".$i."'>".$i."</option>";
						}
					?>
				</select>
			 万円</dd>

			<dt>未収入期間<span>Not income period</span></dt>
			<dd>
				<select name="kega_age">
					<?php
					if(isset($_POST['kega_age'])){
						$kega_age = $_POST['kega_age'];
					}else{
						$kega_age = '';
					}
					echo "<option value=''>   </option>";
					for ($i=30;$i<51;$i=$i+1){
						if($i == $kega_age){
							$select_sts = " selected='true'";
						}else{
							$select_sts = '';
						}
						echo "<option value='".$i."'".$select_sts.">".$i."</option>";
					}
					?>
				</select> 歳の
				<select name="kega_month">
					<?php
					if(isset($_POST['kega_month'])){
						$kega_month = $_POST['kega_month'];
					}else{
						$kega_month = '';
					}
					echo "<option value=''>   </option>";
					for ($i=1;$i<13;$i=$i+1){
						if($i == $kega_month){
							$select_sts = " selected='true'";
						}else{
							$select_sts = '';
						}
						echo "<option value='".$i."'".$select_sts.">".$i."</option>";
					}
					?>
				</select> ヶ月間<br />
				<div class="hidden_box">
				    <label for="label23">説明</label>
				    <input type="checkbox" id="label23"/>
				    <div class="hidden_show">	
				      <!--非表示ここから-->
						・ケガ、病気により生じる働けない「年齢」と働けない「期間」を入力して下さい。<br />
						(最大で12ヶ月までシミュレーションが可能です)	<br />
						正社員であれば傷病手当という形で、月額の3分の2が最大1年半支給されます。<br />
						フリーランスであれば、働けない=収入ゼロになります。	<br />
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
	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="js/mailform-js.php"></script>

</body>
</html>
