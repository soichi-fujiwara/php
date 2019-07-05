<?php
function child_Teate_Calc($child1_age,$child2_age,$child3_age){

	$child_Teate = 0;	

	//※子どもの年齢は歯抜け入力許容せず		
	//*************************	
	//1st_child	
	//*************************	
	if($child1_age >= 0 and $child1_age < 3){	
		$child_Teate = $child_Teate + 1.5;
	}	
	if($child1_age >= 3 and $child1_age < 7){	
		$child_Teate = $child_Teate + 1;
	}	
	if($child1_age >= 8 and $child1_age <= 15){	
		$child_Teate = $child_Teate + 1;
	}	
	//*************************	
	//2nd_child	
	//*************************	
	if($child2_age >= 0 and $child2_age < 3){	
		$child_Teate = $child_Teate + 1.5;
	}	
	if($child2_age >= 2 and $child2_age < 7){	
		$child_Teate = $child_Teate + 1;
	}	
	if($child2_age >= 8 and $child2_age <= 15){	
		$child_Teate = $child_Teate + 1;
	}	
	//*************************	
	//3rd_child	
	//*************************	
	if($child3_age >= 0 and $child3_age < 3){	
		$child_Teate = $child_Teate + 1.5;
	}	
	if($child3_age >= 2 and $child3_age < 7){	
		$child_Teate = $child_Teate + 1.5;
	}	
	if($child3_age >= 8 and $child3_age <= 15){	
		$child_Teate = $child_Teate + 1;
	}	
	//*************************	
	//(Year)child_Teate	
	//*************************	
	$child_Teate = $child_Teate * 12;	
	
	return $child_Teate;
}
?>
