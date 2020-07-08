<?php
	function dispAllNumbers (int $startInterval = 10, int $finishInterval = 1000) {
		
		for ($num = $startInterval; $num  <= $finishInterval; $num++) {
			$digitsSum = getDigitsSum($num);
			
			if (isDivWithoutRemainder($num, $digitsSum)) {
				echo $num.'</br>';
			}
			
		}
		
	}

	function getDigitsSum(int $number): int {
		$number = getAbsolute($number);
		$digitsSum = 0;
		
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			
			$digitsSum += $digit;
		
		}
		
		return $digitsSum;
	}
	
	function getAbsolute(int $number): int {
		
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	function isDivWithoutRemainder(int $dividend, int $divider): bool {
		
		if (($dividend % $divider) === 0 ) {
			return true;
		}
		
		return false;
	}
	
	//Пример
	dispAllNumbers();
	
?>