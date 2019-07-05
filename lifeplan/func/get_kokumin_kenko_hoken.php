<?php
function get_Kokumin_Kenko_Hoken($i,$income,$age,$workstyle,$KanyusyaSu,$nenkin_flg,$kari_hon_flg){

//　軽減判定所得：65歳以上で年金所得が15万円以上ある場合は、特例控除として年金所得から15万円を差し引くことができます
//１．33万円以下の世帯	7割軽減
//２．33万円+（27.5万円×被保険者数）以下の世帯	5割軽減
//３．33万円+（50万円×被保険者数）以下の世帯	2割軽減

	if($income <= 0){
		$KijunGaku = 0;
	}else{
		$KijunGaku = $income;
	}
	
	if($KijunGaku <= 0){
		$Syotoku_Wari = 0;
	}else{
		//=====================================
		//①所得割
		//=====================================
		//a.医療分
		$Kisobun1 = $KijunGaku * 6.86 / 100;

		//b.後期高齢者支援金分
		$Shienkinbun1 = $KijunGaku * 2.02 / 100;

		//c.介護分(40-64歳のみ)
		if($age >= 40 and $age <= 64){
			$Kaigobun1 = $KijunGaku * 1.52 / 100;
		}else{
			$Kaigobun1 = 0;
		}
		$Syotoku_Wari = $Kisobun1 + $Shienkinbun1 + $Kaigobun1;
	}

	//=====================================
	//②均等割
	//=====================================
	//a.医療分
	$Kisobun2 = 3.54 * $KanyusyaSu;
	
	//b.後期高齢者支援金分
	$Shienkinbun2 = 1.08 * $KanyusyaSu;

	//c.介護分(40-64歳のみ)
	if($age >= 40 and $age <= 64){
		$Kaigobun2 = 1.47 * $KanyusyaSu;
	}else{
		$Kaigobun2 = 0;
	}
	$Kinto_Wari = $Kisobun2 + $Shienkinbun2 + $Kaigobun2;

	//③合計
	$Kokumin_Kenko_Hoken = $Syotoku_Wari + $Kinto_Wari;


	if($kari_hon_flg == 'HON'){
	
		if($workstyle == 0){
			$kenko_hoken_calc_ary = $_SESSION['KENKO_HOKEN_SAL_CALC'];
		}else{
			$kenko_hoken_calc_ary = $_SESSION['KENKO_HOKEN_FREE_CALC'];
		}

		//$kenko_hoken_calc_ary[] = '算定基礎額('.round($KijunGaku,1).') : 所得割('.round($Syotoku_Wari,1).') + 均等割('.round($Kinto_Wari,1).') = '.round($Kokumin_Kenko_Hoken,1);
		$kenko_hoken_calc_ary[] = '所得割('.round($Syotoku_Wari,1).') + 均等割('.round($Kinto_Wari,1).') = '.round($Kokumin_Kenko_Hoken,1);
		
		if($workstyle == 0){
			$_SESSION['KENKO_HOKEN_SAL_CALC'] = $kenko_hoken_calc_ary;
		}else{
			$_SESSION['KENKO_HOKEN_FREE_CALC'] = $kenko_hoken_calc_ary;
		}

		if($i == 0){
			//フリーランス
			if($workstyle == 1){
				//初年のみ1回多く入れて1年ずらす
				//$kenko_hoken_calc_ary[] = '算定基礎額('.round($KijunGaku,1).') : 所得割('.round($Syotoku_Wari,1).') + 均等割('.round($Kinto_Wari,1).') = '.round($Kokumin_Kenko_Hoken,1);
				$kenko_hoken_calc_ary[] = '所得割('.round($Syotoku_Wari,1).') + 均等割('.round($Kinto_Wari,1).') = '.round($Kokumin_Kenko_Hoken,1);
				$_SESSION['KENKO_HOKEN_FREE_CALC'] = $kenko_hoken_calc_ary;
			}
		}
	}
	return $Kokumin_Kenko_Hoken;
}
?>