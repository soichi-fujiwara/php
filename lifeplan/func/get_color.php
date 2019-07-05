<?php
function get_color($ptn){

	$color = '';

	switch ($ptn){
	case 1:
		//濃い水色
		$color = '2,136,209';
		break;
	case 2:
		//水色
		$color = '3,169,244';
		break;
	case 3:
		$color = '255,204,204';
		break;
	default:
		$color = '255,204,204';
	}	
		return $color;
	}
?>