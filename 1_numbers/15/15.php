<?php

	function countDividersOf(int $number) {
		$count = 2;
		$number = getAbsolute($number);
		
		switch($number) {
			case 0: return 'infinity'; break;
			case 1: return 1; break;
		}
		
		for ($divider = 2; $divider <= $number / 2; $divider++) {
			
			if(isDivider($number, $divider)) {
				$count++;
			}
			
		}
		
		return $count;
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
	echo countDividersOf(1122);
?>