<?php

	function getFrindlyNumbers(int $start, int $finish) {
		
		for ($number = $start; $number <= $finish; $number++) {
			
			for ($subNumber = $finish; $subNumber > $number; $subNumber--) {
				
				if(isFrindlyNumber($number, $subNumber)) {
					
					echo $number . " | " . $subNumber . "</br>";
				
				}
			
			}
				
		}
		
	}
	
	function isFrindlyNumber(int $number1, int $number2): bool {
		$number1 = getAbsolute($number1);
		$number2 = getAbsolute($number2);
		if (getSumDividersOf($number1) === $number2 && getSumDividersOf($number2) === $number1) {
			return true;
		}
		
		return false;
	}
	
	function getSumDividersOf(int $number): int {
		$sum = 1;
		
		switch($number) {
			case 0: return -1;
			case 1: return 1; break;
		}
		
		$range = $number / 2;
		for ($divider = 2; $divider <= $range; $divider++) {
			
			if(isDivider($number, $divider)) {
				$sum += $divider;
			}
			
		}
		
		return $sum;
	}
	
	function isDivider(int $number, int $divider): bool {
		$remainder = $number % $divider;
		
		if ($remainder === 0) {
			return true;
		}
		
		return false;
	}
	
	function getAbsolute(int $number): int {
		
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	//пример
	getFrindlyNumbers(1, 300);
	
?>