<?php
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
?>