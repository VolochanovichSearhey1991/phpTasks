<?php
	function maxDividersNumber(int $start, int $finish):int {
		$maxSumDividerNum = $start;
		
		for ($number = $start + 1; $number <= $finish; $number++) {
			$sumDividersPrev = getSumDividersOf($maxSumDividerNum);
			$sumDividersNow = getSumDividersOf($number);
			
			if ($sumDividersPrev < $sumDividersNow) {
				$maxSumDividerNum = $number;
			}
			
		}
		
		return $maxSumDividerNum;
		
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
	
	function getAbsolute(int $number): int {
		
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	//пример
	echo maxDividersNumber(1,299);
?>