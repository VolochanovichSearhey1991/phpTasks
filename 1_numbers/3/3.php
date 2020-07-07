<?php

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
	
	//пример
	if (isIncreaseSequence(1379)) {
		echo 'is increasing sequence';
	} else {
		echo 'is not increasing sequence';
	};
?>
