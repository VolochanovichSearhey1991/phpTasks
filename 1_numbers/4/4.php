<?php
	
	function dispAllNumbers (int $startInterval = 1000, int $finishInterval = 9999) {
		
		for ($num = $startInterval; $num  <= $finishInterval; $num++) {
			
			if (isEven($num) && (isIncreaseSequence($num) || isDecreaseSequence($num))) {
				echo $num."</br>";
			}
			
		}
		
	}

	function isIncreaseSequence(int $number): bool {
		$prevDigit = 10;
		$digCount = 0;
		
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			$digCount++;
			
			if ($digit >= $prevDigit) {
				return false;
			} 
			
			$prevDigit = $digit;
		}
		
		if ($digCount > 1) {
			return true;
		}
		
		return false;
	}
	
	function isDecreaseSequence(int $number): bool {
		$prevDigit = -1;
		$digCount = 0;
		
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			$digCount++;
			if ($digit <= $prevDigit) {
				return false;
			} 
			
			$prevDigit = $digit;
		}
		
		if ($digCount > 1) {
			return true;
		}
		
		return false;
	}
	
	function isEven(int $number): bool {
		
		if (($number !== 0) && ($number % 2) === 0) {
			return true;
		}
		
		return false;
	}
	
	dispAllNumbers ();
?>