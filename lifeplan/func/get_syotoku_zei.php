<?php
function get_Syotoku_Zei($i,$Kazei_Taisyo_Syotoku){

	$Syotoku_Zei = 0;

	$ritu = 0;
	$kojo = 0;
	
	if($Kazei_Taisyo_Syotoku > 0){

		if($Kazei_Taisyo_Syotoku <= 99999){ $ritu = 0.45;  $kojo = 479.6;}
		if($Kazei_Taisyo_Syotoku <= 4000) { $ritu = 0.4;   $kojo = 279.6;}
		if($Kazei_Taisyo_Syotoku <= 1800) { $ritu = 0.33;  $kojo = 153.6;}
		if($Kazei_Taisyo_Syotoku <= 900)  { $ritu = 0.23;  $kojo = 63.6; }
		if($Kazei_Taisyo_Syotoku <= 695)  { $ritu = 0.2;   $kojo = 42.75;}
		if($Kazei_Taisyo_Syotoku <= 330)  { $ritu = 0.1;   $kojo = 9.75; }
		if($Kazei_Taisyo_Syotoku <= 195)  { $ritu = 0.05;  $kojo = 0;    }

		$Syotoku_Zei = ($Kazei_Taisyo_Syotoku * $ritu) - $kojo;

	}else{
		$Syotoku_Zei = 0;
	}
	
	
	//復興特別支援税(2037年まで)
	$fukko = 0;
	if($i < 2037-(date("Y"))+1){
		if($Kazei_Taisyo_Syotoku > 0 ){
			//復興特別支援税
			$fukko = $Kazei_Taisyo_Syotoku * 0.021;
			$Syotoku_Zei = $Syotoku_Zei + $fukko;
		}
	}

	$syotoku_zei_calc_ary = $_SESSION['SYOTOKU_ZEI_CALC'];

	if($Syotoku_Zei > 0){

		//1年目のみ1回多く追加
		if($i == 0){
			if($fukko > 0){
				$syotoku_zei_calc_ary[] = round($Syotoku_Zei,1).'万円(復興特別支援税('.round($fukko,1).'万円含む))';
			}else{
				$syotoku_zei_calc_ary[] = round($Syotoku_Zei,1).'万円';
			}
			$_SESSION['SYOTOKU_ZEI_CALC'] = $syotoku_zei_calc_ary;
		}

		if($fukko > 0){
			$syotoku_zei_calc_ary[] = round($Syotoku_Zei,1).'万円(復興特別支援税('.round($fukko,1).'万円含む))';
		}else{
			$syotoku_zei_calc_ary[] = round($Syotoku_Zei,1).'万円';
		}
	}else{
		$syotoku_zei_calc_ary[] = '0万円';
	}	

	$_SESSION['SYOTOKU_ZEI_CALC'] = $syotoku_zei_calc_ary;
	
	return $Syotoku_Zei;
}
?>