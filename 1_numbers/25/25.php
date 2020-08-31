<?php

	function getFactorionsData(int $start, int $finish): string {
		$count = 0;
		$factorionsSum = 0;
		
		for ($number = $start; $number <= $finish; $number++) {
			
			if (isEqualDigFactSum($number)) {
				$count++;
				$factorionsSum += $number;
			}
			
		}
		
		return "count of factorions is " . $count . " sum is " . $factorionsSum;
		
	}

	function isEqualDigFactSum(int $number): bool {
		
		if ($number === getFactSumDigitsOf($number)) {
			return true;
		} 
		
		return false;
	}

	function getFactSumDigitsOf(int $number): int {
		$finalSum = 0;
		
		if ($number === 0) {
			return 1;
		}
		
		while ($number >= 1) {
			$digit = $number % 10;
			$number = (int)($number/10);
			$finalSum += getFactorialOf($digit);
		}
		
		return $finalSum;
	}

	function getFactorialOf(int $number): int {
		$n = 1;
		$factorial = 1;
		
		if ($number === 0) {
			return 1;
		}
		
		while ($n <= $number) {
			$factorial *= $n;
			$n++;
		}
		
		return $factorial;
	}
	                                       
	echo getFactorionsData(0, 40700);
?>