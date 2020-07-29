<?php

	function maxSumOfDivNumber(int $start, int $finish): int {
		$maxSum = getSumDividersOf($start);
		$foundNumber = $start;
		for ($number = $start + 1; $number <= $finish; $number++) {
			
			if (getSumDividersOf($number) > $maxSum) {
				$maxSum = getSumDividersOf($number);
				$foundNumber = $number;
			}
			
		}
		
		return $foundNumber;
	}

	function getSumDividersOf(int $number): int {
		$sum = 1 + $number;
		
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
	
	
	
	echo maxSumOfDivNumber(1, 119);
?>