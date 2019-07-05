<?php

//*****************************
//
// フリーランス収入金額算出		
//
//*****************************
function free_income_calc($age,$income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$retire,$kosei_nenkin_jukyu,$kokumin_nenkin_jukyu,$ideco_unyoeki,$ideco_in_year,$syokibo_in_year){

	//echo '運用益:'.$ideco_unyoeki.'<br />';
	//echo '受給年'.$ideco_in_year.'<br />';

	//リタイア年で定年
	if($age >= $retire){
		$income = 0;
	}
	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//報酬
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
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//65歳以降は年金
	$kokumin_nenkin_jukyu_sum = 0;

	if($age >= 65){
		$kokumin_nenkin_jukyu_sum = $kokumin_nenkin_jukyu;
	}

	//配偶者が受給する国民年金は満額6.5万円(/月)とする。
	if($haigusya_age >= 65){
		$kokumin_nenkin_jukyu_sum = $kokumin_nenkin_jukyu_sum + (6.5 * 12);
	}

	if($age >= 65 or $haigusya_age >= 65){
		$ret_income = $ret_income + $kokumin_nenkin_jukyu_sum + $kosei_nenkin_jukyu;
		//グラフ出力用データ格納
		$free_nenkin_in_ary = $_SESSION['Free_nenkin_in'];
		$free_nenkin_in_ary[] = $kokumin_nenkin_jukyu_sum + $kosei_nenkin_jukyu;
		$_SESSION['Free_nenkin_in'] = $free_nenkin_in_ary;
	}else{
		$free_nenkin_in_ary = $_SESSION['Free_nenkin_in'];
		$free_nenkin_in_ary[] = 0;
		$_SESSION['Free_nenkin_in'] = $free_nenkin_in_ary;
	}

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//小規模企業共済(累計掛金)
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	if(isset($_SESSION['SyokiboKigyo_Sum'])){
		$syokibo = $_SESSION['SyokiboKigyo_Sum'];
	}
	
	//------------------------------------------------------
	//共済金Aが先
	//------------------------------------------------------
	if($syokibo_in_year < $ideco_in_year){
		//ideco受給が14年以内？
		if($ideco_in_year - $syokibo_in_year < 15){
			//yes→共済金Aとidecoの合算額から税金を引く(ideco受給年に)
			$taisyoku_syotoku_flg = 'IDECO_MINUS_ZEI';
		}else{
			//15年以上離れている(加算不要)
			$taisyoku_syotoku_flg = 'NO';
		}
	}

	//------------------------------------------------------
	//iDecoが先
	//------------------------------------------------------
	if($ideco_in_year < $syokibo_in_year){
		//共済金A受給が4年以内？{
		if($syokibo_in_year - $ideco_in_year < 5){
			//yes→iDeCoと共済金Aの合算額から税金を引く(共済金A受給年に)
			$taisyoku_syotoku_flg = 'SYOKIBO_MINUS_ZEI';
		}else{
			//5年以上離れている(加算不要)
			$taisyoku_syotoku_flg = 'NO';
		}
	}

	//------------------------------------------------------
	//共済金A=iDeco
	//------------------------------------------------------
	if($ideco_in_year == $syokibo_in_year){
		//yes→iDeCoと共済金Aの合算額から税金を引く(同年に)
		$taisyoku_syotoku_flg = 'DOJI_MINUS_ZEI';
	}

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//小規模企業共済
	//◆◆◆◆◆◆◆◆◆◆◆◆◆
	if($age == $syokibo_in_year){

		if($taisyoku_syotoku_flg == 'SYOKIBO_MINUS_ZEI'){
			$syokibo = $syokibo + $_SESSION['ideco_syotoku'];
		}

		//==========================================	
		//退職所得としての税金を算出
		//==========================================	
		$kinzoku_year = $syokibo_in_year - $_POST['age'];
		
		//iDecoとの同年受給はiDeCo計算時に算出する為、スキップ
		if($taisyoku_syotoku_flg <> 'DOJI_MINUS_ZEI'){
			$taisyoku_syotoku = get_taisyoku_syotoku($kinzoku_year,$syokibo);
			$syotokuzei = get_taisyoku_syotoku_zei($taisyoku_syotoku);
			$juminzei = round($taisyoku_syotoku * 0.1,0);
		}else{
			$taisyoku_syotoku = 0;
			$syotokuzei = 0;
			$juminzei = 0;
		}

		//退避
		$_SESSION['syokibo_syotoku'] = $syokibo;

		//退職所得-所得税-住民税
		if($taisyoku_syotoku_flg == 'SYOKIBO_MINUS_ZEI'){
			$syokibo = $syokibo - $syotokuzei - $juminzei - $_SESSION['ideco_syotoku'];
		}else{
			$syokibo = $syokibo - $syotokuzei - $juminzei;
		}

		//税金支出算出用
		if($juminzei > 0){
			$_SESSION['JuminZei_syokibo_plus_age'] = $syokibo_in_year;
			$_SESSION['JuminZei_syokibo_plus'] = $juminzei;
		}
		if($syotokuzei > 0){
			$_SESSION['SyotokuZei_syokibo_plus_age'] = $syokibo_in_year;
			$_SESSION['SyotokuZei_syokibo_plus'] = $syotokuzei;
		}
		
		$SyokiboKIgyo_in_ary = $_SESSION['SyokiboKigyo_in'];
		$SyokiboKIgyo_in_ary[] = $syokibo;
		$_SESSION['SyokiboKigyo_in'] = $SyokiboKIgyo_in_ary;

		//小規模企業共済(共済金A)支給
		$ret_income = $ret_income + $syokibo;
	}else{
		$SyokiboKIgyo_in_ary = $_SESSION['SyokiboKigyo_in'];
		$SyokiboKIgyo_in_ary[] = 0;
		$_SESSION['SyokiboKigyo_in'] = $SyokiboKIgyo_in_ary;
	}
	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//iDeCo
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	if($age == $ideco_in_year){

		if($taisyoku_syotoku_flg == 'IDECO_MINUS_ZEI' or $taisyoku_syotoku_flg == 'DOJI_MINUS_ZEI'){
			$ideco_unyoeki = $ideco_unyoeki + $_SESSION['syokibo_syotoku'];
		}

		//==========================================	
		//退職所得としての税金を算出
		//==========================================	
		$kinzoku_year = $ideco_in_year - $_POST['age'];
		
		$taisyoku_syotoku = get_taisyoku_syotoku($kinzoku_year,$ideco_unyoeki);
		$syotokuzei = get_taisyoku_syotoku_zei($taisyoku_syotoku);
		$juminzei = round($taisyoku_syotoku * 0.1,0);

		//退避
		$_SESSION['ideco_syotoku'] = $ideco_unyoeki;

		//退職所得-所得税-住民税
		if($taisyoku_syotoku_flg == 'IDECO_MINUS_ZEI' or $taisyoku_syotoku_flg == 'DOJI_MINUS_ZEI'){
			$ideco_unyoeki = $ideco_unyoeki - $syotokuzei - $juminzei - $_SESSION['syokibo_syotoku'];
		}else{
			$ideco_unyoeki = $ideco_unyoeki - $syotokuzei - $juminzei;
		}

		//税金支出算出用
		if($juminzei > 0){
			$_SESSION['JuminZei_ideco_plus_age'] = $ideco_in_year;
			//$_SESSION['JuminZei_ideco_plus'] = $juminzei;
		}
		if($syotokuzei > 0){
			$_SESSION['SyotokuZei_ideco_plus_age'] = $ideco_in_year;
			$_SESSION['SyotokuZei_ideco_plus'] = $syotokuzei;
		}
		
		$ideco_in_ary = $_SESSION['ideco_free_in'];
		$ideco_in_ary[] = $ideco_unyoeki;
		$_SESSION['ideco_free_in'] = $ideco_in_ary;

		//iDeCo一括支給
		$ret_income = $ret_income + $ideco_unyoeki;
	}else{
		$ideco_in_ary = $_SESSION['ideco_free_in'];
		$ideco_in_ary[] = 0;
		$_SESSION['ideco_free_in'] = $ideco_in_ary;
	}

	return $ret_income;
}
//*****************************
//
// フリーランス退職所得算出		
//
//*****************************
function get_taisyoku_syotoku($kinzoku_year,$syotoku){

	if($kinzoku_year <= 20){
		$taisyoku_syotoku_kojo = $kinzoku_year * 400000;
	}else{
		$taisyoku_syotoku_kojo_a = 20 * 400000;
		$taisyoku_syotoku_kojo_b = ($kinzoku_year - 20) * 700000;
		$taisyoku_syotoku_kojo = $taisyoku_syotoku_kojo_a + $taisyoku_syotoku_kojo_b;
	}

	$taisyoku_syotoku = ($syotoku - ($taisyoku_syotoku_kojo/10000)) * 0.5;

	return $taisyoku_syotoku;

}
//*****************************
//
// フリーランス退職所得に掛かる所得税算出		
//
//*****************************
function get_taisyoku_syotoku_zei($taisyoku_syotoku){

	$syotokuzei = 0;
	$taisyoku_syotoku = $taisyoku_syotoku * 10000;

	if($taisyoku_syotoku > 0){
		if($taisyoku_syotoku>=1000){$syotokuzei=$taisyoku_syotoku*0.05;}
		if($taisyoku_syotoku>=1950000){$syotokuzei=$taisyoku_syotoku*0.10-97500;}
		if($taisyoku_syotoku>=3300000){$syotokuzei=$taisyoku_syotoku*0.20-427500;}
		if($taisyoku_syotoku>=6950000){$syotokuzei=$taisyoku_syotoku*0.23-636000;}
		if($taisyoku_syotoku>=9000000){$syotokuzei=$taisyoku_syotoku*0.33-1536000;}
		if($taisyoku_syotoku>=18000000){$syotokuzei=$taisyoku_syotoku*0.40-2796000;}
		if($taisyoku_syotoku>=40000000){$syotokuzei=$taisyoku_syotoku*0.45-4796000;}
	}
	
	$syotokuzei = $syotokuzei /10000;
	
	return $syotokuzei;
}
?>
