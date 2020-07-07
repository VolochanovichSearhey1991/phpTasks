<?php
	function dispAllNumbers (int $number, int $startInterval = 1000, int $finishInterval = 9999) {
		
		for ($num = $startInterval; $num  <= $finishInterval; $num++) {
			
			if (isDigitsSumEqualNumber($num, $number)) {
				echo $num."</br>";
			}
		}
		
	}
	
	function isDigitsSumEqualNumber(int $numForDigitsSum, int $numforCompare): bool {
		
		if (getDigitsSum($numForDigitsSum) === $numforCompare) {
			return true;
		}
		
		return false;
	}
	
	function getDigitsSum(int $number): int {
		$digitsSum = 0;
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			
			$digitsSum += $digit;
		
		}
		
		return $digitsSum;
	}
	
	//пример
	dispAllNumbers(4);
?>