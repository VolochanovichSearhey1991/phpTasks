<?php
	function dispAllNumbers (int $startInterval = 1000, int $finishInterval = 9999) {
		
		for ($num = $startInterval; $num  <= $finishInterval; $num++) {
			
			if (isContainsDigits($num)) {
				echo $num."</br>";
			}
			
		}
		
	}
	
	function isContainsDigits($number) {
		
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			
			if (($digit !== 0) && ($digit !== 2) && ($digit !== 3) && ($digit !== 7)) {
				return false;
			} 
			
		}
		
		return true;
	}
	
	echo dispAllNumbers ();
?>