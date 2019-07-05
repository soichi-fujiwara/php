<?php
//◆対象となる金額
//対象となる金額は1月から12月までの1年間に支払った、
//社会保険料の全額が控除対象になります。

function get_Kazei_Taisyo($i,$kbn,$income,$workstyle,$haigusya_age,$child1_age,$child2_age,$child3_age,$nenkin_flg,$age,$retire){

	//所得控除額の算出
	$Syotoku_Kojo = 0;

	//扶養控除の算出
	$Fuyo_Kojo1 = 0;
	$Fuyo_Kojo2 = 0;
	$Fuyo_Kojo3 = 0;
	
	//★卒業タイミングで不要から外れるように修正
	if($child1_age <= 23){
		if($child1_age >= 16 and $child1_age < 19){ $Fuyo_Kojo1 = 38;}	
		if($child1_age >= 19 and $child1_age < 23){ $Fuyo_Kojo1 = 63;}	
		if($child1_age >= 70){ $Fuyo_Kojo1 = 58;}
	}

	if($child2_age <= 23){
		if($child2_age >= 16 and $child2_age < 19){ $Fuyo_Kojo2 = 38;}	
		if($child2_age >= 19 and $child2_age < 23){ $Fuyo_Kojo2 = 63;}	
		if($child2_age >= 70){ $Fuyo_Kojo2 = 58;}
	}

	if($child3_age <= 23){
		if($child3_age >= 16 and $child3_age < 19){ $Fuyo_Kojo3 = 38;}	
		if($child3_age >= 19 and $child3_age < 23){ $Fuyo_Kojo3 = 63;}	
		if($child3_age >= 70){ $Fuyo_Kojo3 = 58;}
	}
	
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
	//salary(リタイア年以降の税金計算)
	//*************************	
	if($workstyle == 0){

		$Syotoku_Kazei_Taisyo = $income - $Kiso_Kojo;
	
	}else{
	//*************************	
	//free(現役～)
	//*************************	
	
		//青色申告特別控除
		//(妻の配偶者控除･扶養控除無効)
		if($age < $retire){
			$Aoiro_Shinkoku_Kojo = 65;
		}else{
			$Aoiro_Shinkoku_Kojo = 0;
		}
		
		//年金以外の収入のみ
		if($nenkin_flg == 0){

			$Syotoku_Kojo = $Kiso_Kojo + $Fuyo_Kojo + $Aoiro_Shinkoku_Kojo;
			$Syotoku_Kazei_Taisyo = $income - $Syotoku_Kojo;

		//年金収入のみ
		}else{
		
			//課税対象所得から年金所得控除を差し引く
			//65歳以上の場合の速算表
			if($income <= 120){$kazei_wk = 0;}
			if($income > 120 and $income < 330){$kazei_wk = $income - ($income * 0.75 - 37.5);}
			if($income >= 330 and $income < 410){$kazei_wk = $income - ($income * 0.85 - 78.5);}
			if($income >= 410 and $income < 770){$kazei_wk = $income - ($income * 0.95 - 155.5);}
			if($income >= 770){$kazei_wk = $income - ($income * 0.75 - 37.5);}

			$Syotoku_Kojo = $Kiso_Kojo + $Fuyo_Kojo + $Aoiro_Shinkoku_Kojo;
			$Syotoku_Kazei_Taisyo = $kazei_wk - $Syotoku_Kojo;

		}
	}

	if($Syotoku_Kazei_Taisyo < 0){
		$Syotoku_Kazei_Taisyo = 0;
	}

	//if($workstyle == '1' and $kbn = 'S'){
	//	echo $i.'/収入-経費:'.$income.'(課税対象:'.$Syotoku_Kazei_Taisyo.') 扶養控除('.$Fuyo_Kojo.') 基礎控除('.$Kiso_Kojo.') 青色申告控除('.$Aoiro_Shinkoku_Kojo.')<br />';
	//}
	return $Syotoku_Kazei_Taisyo;
}
?>