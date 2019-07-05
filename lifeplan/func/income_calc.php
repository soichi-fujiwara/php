<?php

//*****************************
//income calc(正社員)		
//*****************************
function income_calc($age,$income,$haigusya_age,$child1_age,$child2_age,$child3_age,$hoken,$taisyokukin,$kosei_nenkin_jukyu,$kokumin_nenkin_jukyu,$jutaku_loan_kojo,$ideco_unyoeki,$ideco_in_year){

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
	//60歳で退職金
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

		$taisyokukin = 0;
	}

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//iDeCo
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	if($age == $ideco_in_year){

		//===================================================================	
		//退職金支給から15年以内にiDeCo受給の為、退職所得としての税金を算出
		//===================================================================	
		$wk = $taisyokukin + $ideco_unyoeki;

		//60歳で退職と言う前提
		$kinzoku_year = 60 - $_POST['age'];
		
		if($kinzoku_year <= 20){
			$taisyoku_syotoku_kojo = $kinzoku_year * 400000;
		}else{
			$taisyoku_syotoku_kojo_a = 20 * 400000;
			$taisyoku_syotoku_kojo_b = ($kinzoku_year - 20) * 700000;
			$taisyoku_syotoku_kojo = $taisyoku_syotoku_kojo_a + $taisyoku_syotoku_kojo_b;
		}

		$taisyoku_syotoku = ($wk - ($taisyoku_syotoku_kojo/10000)) * 0.5;

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
			$syotokuzei = 0;
			$juminzei = 0;
		}

		//退職所得-所得税-住民税
		$ideco_unyoeki = $ideco_unyoeki - $syotokuzei - $juminzei;

		$ideco_in_ary = $_SESSION['ideco_sal_in'];
		$ideco_in_ary[] = $ideco_unyoeki;
		$_SESSION['ideco_sal_in'] = $ideco_in_ary;

		$ret_income = $ret_income + $ideco_unyoeki;
	}else{
		$ideco_in_ary = $_SESSION['ideco_sal_in'];
		$ideco_in_ary[] = 0;
		$_SESSION['ideco_sal_in'] = $ideco_in_ary;

		$ideco_unyoeki = 0;
	}

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

	if($age >= 65){
		$ret_income = $ret_income + $kosei_nenkin_jukyu + $kokumin_nenkin_jukyu_sum;
		//グラフ出力用データ格納
		$sal_nenkin_in_ary = $_SESSION['Sal_nenkin_in'];
		$sal_nenkin_in_ary[] = $kosei_nenkin_jukyu + $kokumin_nenkin_jukyu_sum;
		$_SESSION['Sal_nenkin_in'] = $sal_nenkin_in_ary;
	}else{
		//グラフ出力用データ格納
		$sal_nenkin_in_ary = $_SESSION['Sal_nenkin_in'];
		$sal_nenkin_in_ary[] = 0;
		$_SESSION['Sal_nenkin_in'] = $sal_nenkin_in_ary;
	}

	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//住宅ローン控除による所得税還付
	//◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//所得税超概算
	$x = ($income / 0.8) * 0.15;

	if($x < $jutaku_loan_kojo){
		$jutaku_loan_kojo = $x;
	}
	$jutaku_loan_kanpu_ary = $_SESSION['Jutaku_loan_kanpu'];
	$jutaku_loan_kanpu_ary[] = $jutaku_loan_kojo;
	$_SESSION['Jutaku_loan_kanpu'] = $jutaku_loan_kanpu_ary;

	return $ret_income;
}		
?>