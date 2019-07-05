<?php

include 'get_syotoku_zei.php';
include 'get_kokumin_kenko_hoken.php';
include 'get_kazei_taisyo.php';

//*****************************		
//outgo calc		
//*****************************		
function outgo_calc($i,$age,$workstyle,$income,$haigusya_flg,$haigusya_age,$child1_flg,$child1_age,$child2_flg,$child2_age,$child3_flg,$child3_age,$hoken,$keihi,$seikatsu_in_keihi,$no_out_keihi,$home,$retire,$syokibo,$sonota_seikatsuhi,$retire_plan,$jutaku_loan_kojo,$child1_type,$child2_type,$child3_type,$ideco_kakekin,$syokibo_in_year,$nenkin_in_ary){
		
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
	$Gakuhi1 = get_Gakuhi($child1_age,$child1_type);
	$Gakuhi2 = get_Gakuhi($child2_age,$child2_type);
	$Gakuhi3 = get_Gakuhi($child3_age,$child3_type);

	$Gakuhi = $Gakuhi1 + $Gakuhi2 + $Gakuhi3;

	//グラフ出力用データ格納
	if($workstyle == 0){
		$Gakuhi_ary = $_SESSION['Gakuhi'];
		$Gakuhi_ary[] = $Gakuhi;
		$_SESSION['Gakuhi'] = $Gakuhi_ary;
	}
	//echo 'Gakuhi:'.$Gakuhi.'<br/>';

	//*********************************************************
	//所得の算出
	//*********************************************************
	//(収入-経費)
	if($age < $retire){
		$syotoku = get_income_minus_keihi($age,$income,$keihi,$no_out_keihi,$retire);
		$nenkin_flg = 0;
	}else{
		//(年金収入)
		if($age >= 65){
			$syotoku = $nenkin_in_ary[$i];
			$nenkin_flg = 1;
		}else{
			//リタイアから年金受給までの空白期間
			$syotoku = 0;
			$nenkin_flg = 0;
		}
	}
	if($workstyle == 1){
		$income_minus_keihi_ary = $_SESSION['INCOME_MINUS_KEIHI'];
		$KihonSeikatsuHiSal_ary[] = $syotoku;
		$_SESSION['INCOME_MINUS_KEIHI'] = $income_minus_keihi_ary;
	}

	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//正社員	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆	
	if($workstyle == 0){
		
		//===============================================
		//生活費	
		//===============================================
		//リタイア年で基本生活費を分岐
		//▼(経費($seikatsu_in_keihi)となり得る項目も支出としてカウント)
		if($age < 60){
			$Kihon_Seikatsu_Hi = $sonota_seikatsuhi + $seikatsu_in_keihi;
		}else{
			switch ($retire_plan) {
			    case 0:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 0.80;
			        break;
			    case 1:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 1.0;
			        break;
			    case 2:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 1.2;
			        break;
			}
		}

		//グラフ出力用データ格納
		$KihonSeikatsuHiSal_ary = $_SESSION['KihonSeikatsuHiSal'];
		$KihonSeikatsuHiSal_ary[] = $Kihon_Seikatsu_Hi;
		$_SESSION['KihonSeikatsuHiSal'] = $KihonSeikatsuHiSal_ary;

		if($age == 59){
			$_SESSION['income_59_sal'] = $income;
		}

		//===============================================
		//▼国民健康保険(リタイア後1年目の社会保険料控除算出用)
		//リタイア年以降は国民健康保険に加入
		//===============================================
		//(加入者数算出)
		if($age >= 60){
			$KanyusyaSu = 1;
			if($haigusya_flg == 1){
				$KanyusyaSu = $KanyusyaSu + 1;
			}
			//扶養に入るのは22までとする(社会人になる為)
			if($child1_flg = 1 and $child1_age <= 22){
				$KanyusyaSu = $KanyusyaSu + 1;
			}
			if($child2_flg = 1 and $child2_age <= 22){
				$KanyusyaSu = $KanyusyaSu + 1;
			}
			if($child3_flg = 1 and $child3_age <= 22){
				$KanyusyaSu = $KanyusyaSu + 1;
			}

			//===============================================
			//▼社会保険料控除額を算出
			//===============================================
			$syakaihokenryo_kojo = 0;
			$income_59_sal = $_SESSION['income_59_sal'];

			//●健康保険料 支払い分
			//59歳の収入をベースに国民健康保険料を計算し、その金額を60歳で社会保険料控除として差し引く
			if($age == 60){
				//前年中の総収入額－給与所得控除額－基礎控除額(33万円)
				
				if($income_59_sal <= 9999){ $kyuyo_syotoku_kojo = $income_59_sal * 0.1 + 120;}
				if($income_59_sal <= 660){ $kyuyo_syotoku_kojo = $income_59_sal * 0.2 + 54;}
				if($income_59_sal <= 360){ $kyuyo_syotoku_kojo = $income_59_sal * 0.3 + 18;}
				if($income_59_sal <= 180){ $kyuyo_syotoku_kojo = $income_59_sal * 0.4;}
				if($income_59_sal < 65){ $kyuyo_syotoku_kojo = 65;}

				$kijun_gaku = $income_59_sal - $kyuyo_syotoku_kojo;

				//リタイア後1年目の社会保険料控除額を算出する為の計算
				$Kenko_Hoken_Kazei_Taisyo = get_Kazei_Taisyo($i,'J',$kijun_gaku,$workstyle,$haigusya_age,$child1_age,$child2_age,$child3_age,$nenkin_flg,$age,$retire);
				$Kokumin_Kenko_Hoken = get_Kokumin_Kenko_Hoken($i,$Kenko_Hoken_Kazei_Taisyo,$age,$workstyle,$KanyusyaSu,$nenkin_flg,'KARI');
				
				$syakaihokenryo_kojo = $Kokumin_Kenko_Hoken;
			}else{
				//前年分の国民健康保険料を社会保険料控除として使用
				$syakaihokenryo_kojo = $syakaihokenryo_kojo +  $_SESSION['KenpoSal'][$i-1];
			}
			
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			//社会保険料控除退避
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			$syakai_hoken_kojo_ary = $_SESSION['SYAKAI_HOKEN_KOJO_SAL_CALC'];
			if($i == 0){
				//▼徴収は1年遅れの為、2回挿入することで1年ずらす
				$KenpoFree_ary[] = $syakaihokenryo_kojo;
				$_SESSION['SYAKAI_HOKEN_KOJO_SAL_CALC'] = $syakai_hoken_kojo_ary;
			}
			$syakai_hoken_kojo_ary[] = $syakaihokenryo_kojo;
			$_SESSION['SYAKAI_HOKEN_KOJO_SAL_CALC'] = $syakai_hoken_kojo_ary;
	
			//------------------------------------------
			//▼国民健康保険(本計算)
			//------------------------------------------
			//社会保険料控除額分を差し引く
			$p_syotoku = $syotoku - $syakaihokenryo_kojo;
			$Kenko_Hoken_Kazei_Taisyo = get_Kazei_Taisyo($i,'J',$p_syotoku,$workstyle,$haigusya_age,$child1_age,$child2_age,$child3_age,$nenkin_flg,$age,$retire);
			$Kokumin_Kenko_Hoken = get_Kokumin_Kenko_Hoken($i,$Kenko_Hoken_Kazei_Taisyo,$age,$workstyle,$KanyusyaSu,$nenkin_flg,'HON');

		}else{

			$kenko_hoken_calc_ary = $_SESSION['KENKO_HOKEN_SAL_CALC'];
			//if($i == 0){
			//	$kenko_hoken_calc_ary[] = '(給与天引き)';
			//	$_SESSION['KENKO_HOKEN_SAL_CALC'] = $kenko_hoken_calc_ary;
			//}
			$kenko_hoken_calc_ary[] = '(給与天引き)';
			$_SESSION['KENKO_HOKEN_SAL_CALC'] = $kenko_hoken_calc_ary;
		}

		//------------------------------------------
		//(▼国民健康保険料)
		//------------------------------------------
		$KenpoSal_ary = $_SESSION['KenpoSal'];

		//▼徴収は1年遅れの為、2回挿入することで1年ずらす
		//リタイア1年目
		if($age == 60){
			$KenpoSal_ary[] = $Kokumin_Kenko_Hoken;
			$_SESSION['KenpoSal'] = $KenpoSal_ary;
		}

		//59歳以下
		if($age < 60){
			$Kokumin_Kenko_Hoken = 0;
			$KenpoSal_ary[] = '-';
			$_SESSION['KenpoSal'] = $KenpoSal_ary;

		//61歳以降
		}else{
			$KenpoSal_ary[] = $Kokumin_Kenko_Hoken;
			$_SESSION['KenpoSal'] = $KenpoSal_ary;
		}

		$outgo = $Gakuhi + $Kihon_Seikatsu_Hi + $hoken + $Kokumin_Kenko_Hoken + $home;
		
	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆	
	//フリーランス	
	//◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆◆	
	}else{	

		//============================
		//▼国民健康保険(1年目の社会保険料控除算出用)
		//============================
		//(加入者数算出)
		$KanyusyaSu = 1;
		if($haigusya_flg == 1){
			$KanyusyaSu = $KanyusyaSu + 1;
		}
		//扶養は22歳まで
		if($child1_flg == 1 and $child1_age <= 22){
			$KanyusyaSu = $KanyusyaSu + 1;
		}
		if($child2_flg == 1 and $child2_age <= 22){
			$KanyusyaSu = $KanyusyaSu + 1;
		}
		if($child3_flg == 1 and $child3_age <= 22){
			$KanyusyaSu = $KanyusyaSu + 1;
		}

		//初年の社会保険料控除額を算出する為の一時計算
		if($i==0){
			$Kenko_Hoken_Kazei_Taisyo = get_Kazei_Taisyo($i,'J',$syotoku,$workstyle,$haigusya_age,$child1_age,$child2_age,$child3_age,$nenkin_flg,$age,$retire);
			$Kokumin_Kenko_Hoken = get_Kokumin_Kenko_Hoken($i,$Kenko_Hoken_Kazei_Taisyo,$age,$workstyle,$KanyusyaSu,$nenkin_flg,'KARI');
		}
		//======================================
		//▼社会保険料控除額を算出
		//対象(国民年金/健康保険)
		//======================================
		$syakaihokenryo_kojo = 0;

		//共通で引ける社会保険料控除
		//●国民年金 支払い分
		if($age < 60){
			$syakaihokenryo_kojo = 1.6 * 12;
		}else{
			$syakaihokenryo_kojo = 0;
		}

		if($haigusya_age < 60){
			$syakaihokenryo_kojo = $syakaihokenryo_kojo + (1.6 * 12);
		}else{
			$syakaihokenryo_kojo = $syakaihokenryo_kojo + 0;
		}
		
		//●健康保険料 支払い分
		if($i==0){
			//初年は1年目と同じ国民健康保険料を支払っていたと仮定
			$syakaihokenryo_kojo = $syakaihokenryo_kojo +  $Kokumin_Kenko_Hoken;
		}else{
			//次年以降は前年の国民健康保険料を社会保険料控除として使用
			$syakaihokenryo_kojo = $syakaihokenryo_kojo +  $_SESSION['KenpoFree'][$i-1];
		}

		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		//社会保険料控除退避
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		$syakai_hoken_kojo_ary = $_SESSION['SYAKAI_HOKEN_KOJO_FREE_CALC'];
		if($i == 0){
			//▼徴収は1年遅れの為、2回挿入することで1年ずらす
			$KenpoFree_ary[] = $syakaihokenryo_kojo;
			$_SESSION['SYAKAI_HOKEN_KOJO_FREE_CALC'] = $syakai_hoken_kojo_ary;
		}
		$syakai_hoken_kojo_ary[] = $syakaihokenryo_kojo;
		$_SESSION['SYAKAI_HOKEN_KOJO_FREE_CALC'] = $syakai_hoken_kojo_ary;
	
		//------------------------------------------
		//▼国民健康保険(本計算)
		//------------------------------------------
		//社会保険料控除額分を差し引く
		$p_syotoku = $syotoku - $syakaihokenryo_kojo;
		$Kenko_Hoken_Kazei_Taisyo = get_Kazei_Taisyo($i,'J',$p_syotoku,$workstyle,$haigusya_age,$child1_age,$child2_age,$child3_age,$nenkin_flg,$age,$retire);
		$Kokumin_Kenko_Hoken = get_Kokumin_Kenko_Hoken($i,$Kenko_Hoken_Kazei_Taisyo,$age,$workstyle,$KanyusyaSu,$nenkin_flg,'HON');

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
		//▼生活費	
		//============================
		//リタイア年で基本生活費を分岐
		if($age < $retire){
		//(経費($seikatsu_in_keihi)となり得る項目も支出としてカウント)
			$Kihon_Seikatsu_Hi = $sonota_seikatsuhi + $seikatsu_in_keihi;
		}else{
			switch ($retire_plan) {
			    case 0:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 0.85;
			        break;
			    case 1:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 1.0;
			        break;
			    case 2:
					$Kihon_Seikatsu_Hi = ($sonota_seikatsuhi) * 1.15;
			        break;
			}
		}

		//グラフ出力用データ格納
		$KihonSeikatsuHiFree_ary = $_SESSION['KihonSeikatsuHiFree'];
		$KihonSeikatsuHiFree_ary[] = $Kihon_Seikatsu_Hi;
		$_SESSION['KihonSeikatsuHiFree'] = $KihonSeikatsuHiFree_ary;

		//============================
		//▼住民税	
		//============================
		//①住民税の課税対象額
		//社会保険料控除額分を差し引く
		$p_syotoku = $syotoku - $syakaihokenryo_kojo;
		$Jumin_Kazei_Taisyo = get_Kazei_Taisyo($i,'J',$p_syotoku,$workstyle,$haigusya_age,$child1_age,$child2_age,$child3_age,$nenkin_flg,$age,$retire);
		
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
		//社会保険料控除額分を差し引く
		$p_syotoku = $syotoku - $syakaihokenryo_kojo;
		$Syotoku_Kazei_Taisyo = get_Kazei_Taisyo($i,'S',$p_syotoku,$workstyle,$haigusya_age,$child1_age,$child2_age,$child3_age,$nenkin_flg,$age,$retire);
		$Syotoku_Zei = get_Syotoku_Zei($i,$Syotoku_Kazei_Taisyo);

		//グラフ出力用データ格納
		$SyotokuZeiFree_ary = $_SESSION['SyotokuZeiFree'];
		
		if($i == 0){
			//▼徴収は1年遅れの為、2回挿入することで1年ずらす
			$SyotokuZeiFree_ary[] = $Syotoku_Zei;
			$_SESSION['SyotokuZeiFree'] = $SyotokuZeiFree_ary;
		}
		$SyotokuZeiFree_ary[] = $Syotoku_Zei;
		$_SESSION['SyotokuZeiFree'] = $SyotokuZeiFree_ary;

		//----------------------------
		//▼住宅ローン控除額を所得税から差し引き
		//----------------------------
		if($Syotoku_Zei - $jutaku_loan_kojo < 0){
			$Syotoku_Zei = 0;
		}else{
			$Syotoku_Zei = $Syotoku_Zei - $jutaku_loan_kojo;
		}

		//============================
		//▼国民年金
		//============================
		if($age < 60){
			$Kokumin_Nenkin = 1.6 * 12;
		}else{
			$Kokumin_Nenkin = 0;
		}

		if($haigusya_age < 60){
			$Kokumin_Nenkin = $Kokumin_Nenkin + (1.6 * 12);
		}else{
			$Kokumin_Nenkin = $Kokumin_Nenkin + 0;
		}

		//グラフ出力用データ格納
		$NenkinFree_ary = $_SESSION['NenkinFree'];
		$NenkinFree_ary[] = $Kokumin_Nenkin;
		$_SESSION['NenkinFree'] = $NenkinFree_ary;

		//============================
		//▼小規模企業共済	
		//============================
		if($age < $syokibo_in_year){
			$syokibo_kigyo_hoken = $syokibo * 12;
		}else{
			$syokibo_kigyo_hoken = 0;
		}

		//グラフ出力用データ格納
		$Syokibo_ary = $_SESSION['Syokibo_unit'];
		$Syokibo_ary[] = $syokibo_kigyo_hoken;
		$_SESSION['Syokibo_unit'] = $Syokibo_ary;

		//============================
		//▼iDeCo	
		//============================
		//掛金の拠出は60歳まで
		if($age < 60){
			$ideco_kakekin = $ideco_kakekin * 12;
		}else{
			$ideco_kakekin = 0;
		}

		//グラフ出力用データ格納
		$ideco_ary = $_SESSION['ideco_sal_unit'];
		$ideco_ary[] = $ideco_kakekin;
		$_SESSION['ideco_sal_unit'] = $ideco_ary;

		$ideco_ary = $_SESSION['ideco_free_unit'];
		$ideco_ary[] = $ideco_kakekin;
		$_SESSION['ideco_free_unit'] = $ideco_ary;

		//支出合計額
		$outgo = $Gakuhi + $Jumin_Zei + $Kihon_Seikatsu_Hi + $Kokumin_Nenkin + $Kokumin_Kenko_Hoken + $Syotoku_Zei + $hoken + $home + $syokibo_kigyo_hoken + $ideco_kakekin;
	}	
		
	return $outgo;
}		
?>