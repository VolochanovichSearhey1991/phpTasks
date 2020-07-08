<?php
	
	function dispAllNumbers (int $startInterval = 1000, int $finishInterval = 9999) {
		
		for ($num = $startInterval; $num  <= $finishInterval; $num++) {
			
			if (isEven($num) && isIncDecSequence($num)) {
				echo $num."</br>";
			}
			
		}
		
	}

	function isIncreaseSequence(int $number, int $nextDigit): bool {
		
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			
			if ($digit >= $nextDigit) {
				return false;
			} 
			
			$nextDigit = $digit;
		}

		return true;
	}
	
	function isDecreaseSequence(int $number, int $nextDigit): bool {
		
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			if ($digit <= $nextDigit) {
				return false;
			} 
			
			$nextDigit = $digit;
		}
		
		return true;
	}
	
	function isIncDecSequence(int $number): bool {
		$prevDigit = $number % 10;
		$number = (int)($number/10);
		
		if ($number === 0) {
			return false;
		}
		
		$nextDigit = $number % 10;
		$number = (int)($number/10);
		return kindOfSequence($number, $nextDigit, $prevDigit);
	}
	
	function kindOfSequence(int $number, int $nextDigit, int $prevDigit): bool {
		if ($nextDigit > $prevDigit) {
			return isDecreaseSequence($number, $nextDigit);
		} elseif ($nextDigit < $prevDigit) {
			return isIncreaseSequence($number, $nextDigit);
		} else {
			return false;
		}
	}
	
	function isEven(int $number): bool {
		
		if (($number !== 0) && ($number % 2) === 0) {
			return true;
		}
		
		return false;
	}
	
	dispAllNumbers();