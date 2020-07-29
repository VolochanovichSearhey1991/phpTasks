<?php

	function maxSumOfDivNumber(int $start, int $finish): int {
		
		$maxSum = getSumPrimeDividersOf($start);
		$foundNumber = $start;
		$start = getAbsolute($start);
		$finish = getAbsolute($finish);
		
		for ($number = $start + 1; $number <= $finish; $number++) {
			
			if (getSumPrimeDividersOf($number) > $maxSum) {
				$maxSum = getSumPrimeDividersOf($number);
				$foundNumber = $number;
			}
			
		}
		
		return $foundNumber;
	}

	function getSumPrimeDividersOf(int $number): int {
		
		if (isPrimeNumber($number)) {
			return $number;
		}
		
		switch($number) {
			case 0: return -1;
			case 1: return 0; break;
		}
		
		$range = $number / 2;
		
		for ($divider = 2; $divider <= $range; $divider++) {
			
			if(isDivider($number, $divider)) {
				
				if (isPrimeNumber($divider)) {
					$sum += $divider;
				}
				
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
	
	function isPrimeNumber(int $number): bool {
		$number = getAbsolute($number);
		
		if ($number <= 1) {
			return false;
		}
		
		for ($i = 2; $i <= getSqrt($number); $i++) {
			
			if (($number % $i) === 0) {
				return false;
			}
			
		}
		
		return true;
	}
	
	function getAbsolute(int $number): int {
		
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	function getSqrt(int $number): float {
		$sqrRoot = $number / 2;
		
    do{
		$buf = $sqrRoot;
		$sqrRoot = ($buf + ($number / $buf)) / 2;
    }
    while(($buf-$sqrRoot) !=0 );
	
		return $sqrRoot;
	}
	
	echo maxSumOfDivNumber(0, 100)
	
?>