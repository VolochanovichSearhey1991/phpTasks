<?php

	function dispAllNumbers (int $startInterval = 1000, int $finishInterval = 9999) {
		
		for ($num = $startInterval; $num  <= $finishInterval; $num++) {
			
			if (!isContainsEqualDigits($num)) {
				echo $num."</br>";
			}
			
		}
		
	}

	function isContainsEqualDigits(int $number): bool {
		$number = getAbsolute($number);

		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			$subNumber = $number;
			
			if  (compareToSubDigits($subNumber, $digit)) {
				return true;
			}
			
		}
		
		return false;
		
	}
	
	function compareToSubDigits (int $subLevelNum, int $checkedDigit): bool {
		
		while ($subLevelNum >= 1) {
			
			$subDigit = $subLevelNum % 10;
			$subLevelNum = (int)($subLevelNum/10);
				
			if ($checkedDigit === $subDigit) {
				return true;
			}
				
		}
		
		return false;
			
	}
	
	function getAbsolute(int $number): int {
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	dispAllNumbers ();

?>