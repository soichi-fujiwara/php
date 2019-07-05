<?php
function get_Gakuhi($child_age,$child_type){

	//https://sho.jp/topic/8106
	$Gakuhi = 0;
	
	switch ($child_age) {
	    case 4:
	        $Gakuhi = 28.6;
	        break;
	    case 5:
	        $Gakuhi = 30.3;
	        break;
	    case 6:
	        $Gakuhi = 34.4;
	        break;
	    case 7:
			switch ($child_type) {
				case 1:
				case 4:
				case 7:
		    	    $Gakuhi = 209.2;
			        break;
				case 2:
				case 3:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 52.1;
			        break;
			}
	        break;
	    case 8:
			switch ($child_type) {
				case 1:
				case 4:
				case 7:
		    	    $Gakuhi = 206.9;
			        break;
				case 2:
				case 3:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 51.2;
			        break;
			}
	        break;
	    case 9:
			switch ($child_type) {
				case 1:
				case 4:
				case 7:
		    	    $Gakuhi = 207.2;
			        break;
				case 2:
				case 3:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 52.3;
			        break;
			}
	        break;
	    case 10:
			switch ($child_type) {
				case 1:
				case 4:
				case 7:
		    	    $Gakuhi = 214.9;
			        break;
				case 2:
				case 3:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 54.2;
			        break;
			}
	        break;
	    case 11:
			switch ($child_type) {
				case 1:
				case 4:
				case 7:
		    	    $Gakuhi = 221.6;
			        break;
				case 2:
				case 3:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 56.9;
			        break;
			}
	        break;
	    case 12:
			switch ($child_type) {
				case 1:
				case 4:
				case 7:
		    	    $Gakuhi = 229.1;
			        break;
				case 2:
				case 3:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 57.0;
			        break;
			}
	        break;
	    case 13:
			switch ($child_type) {
				case 1:
				case 2:
				case 4:
				case 5:
				case 7:
				case 8:
		    	    $Gakuhi = 160.5;
			        break;
				case 3:
				case 6:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 70.1;
			        break;
			}
	        break;
	    case 14:
			switch ($child_type) {
				case 1:
				case 2:
				case 4:
				case 5:
				case 7:
				case 8:
		    	    $Gakuhi = 163.5;
			        break;
				case 3:
				case 6:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 73.5;
			        break;
			}
	        break;
	    case 15:
			switch ($child_type) {
				case 1:
				case 2:
				case 4:
				case 5:
				case 7:
				case 8:
		    	    $Gakuhi = 170.4;
			        break;
				case 3:
				case 6:
				case 9:
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 89.2;
			        break;
			}
	        break;
	    case 16:
			switch ($child_type) {
				case 1:
				case 2:
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
		    	    $Gakuhi = 127.3;
			        break;
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 59.4;
			        break;
			}
	        break;
	    case 17:
			switch ($child_type) {
				case 1:
				case 2:
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
		    	    $Gakuhi = 132.5;
			        break;
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 62.7;
			        break;
			}
	        break;
	    case 18:
			switch ($child_type) {
				case 1:
				case 2:
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
		    	    $Gakuhi = 137.1;
			        break;
				case 10:
				case 11:
				case 12:
		    	    $Gakuhi = 65.4;
			        break;
			}
	        break;
	    case 19:
			switch ($child_type) {
				case 1:
				case 2:
				case 3:
		    	    $Gakuhi = 67.8;
			        break;
				case 4:
				case 5:
				case 6:
				case 10:
		    	    $Gakuhi = 152;
			        break;
				case 7:
				case 8:
				case 9:
				case 11:
		    	    $Gakuhi = 115.1;
			        break;
				case 12:
		    	    $Gakuhi = 82.3;
			        break;
				}
	        break;
	    case 20:
			switch ($child_type) {
				case 1:
				case 2:
				case 3:
		    	    $Gakuhi = 43.3;
			        break;
				case 4:
				case 5:
				case 6:
				case 10:
		    	    $Gakuhi = 126.3;
			        break;
				case 7:
				case 8:
				case 9:
				case 11:
		    	    $Gakuhi = 91.6;
			        break;
				case 12:
		    	    $Gakuhi = 53.5;
			        break;
				}
	        break;
	    case 21:
			switch ($child_type) {
				case 1:
				case 2:
				case 3:
		    	    $Gakuhi = 0;
			        break;
				case 4:
				case 5:
				case 6:
				case 10:
		    	    $Gakuhi = 126.3;
			        break;
				case 7:
				case 8:
				case 9:
				case 11:
		    	    $Gakuhi = 91.6;
			        break;
				case 12:
		    	    $Gakuhi = 53.5;
			        break;
				}
	        break;
	    case 22:
			switch ($child_type) {
				case 1:
				case 2:
				case 3:
		    	    $Gakuhi = 0;
			        break;
				case 4:
				case 5:
				case 6:
				case 10:
		    	    $Gakuhi = 126.3;
			        break;
				case 7:
				case 8:
				case 9:
				case 11:
		    	    $Gakuhi = 91.6;
			        break;
				case 12:
		    	    $Gakuhi = 53.5;
			        break;
			}
        break;
	}
	
	return $Gakuhi;

}
?>