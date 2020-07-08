<?php

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
	
	//пример 
	echo isPrimeNumber(97);

	
	
?>