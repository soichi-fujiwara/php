<?php
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
?>
