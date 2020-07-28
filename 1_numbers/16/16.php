<?php

	function getPerfectNumbers(int $start, int $finish) {
		
		for ($number = $start; $number <= $finish; $number++) {
			
			if(isPerfectNumber($number)) {
				echo $number . "</br>";
			}
			
		}
		
	}
	
	function isPerfectNumber(int $number): bool {
		$number = getAbsolute($number);
		
		if (getSumDividersOf($number) === $number) {
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
	getPerfectNumbers(1, 10000);
	
?>