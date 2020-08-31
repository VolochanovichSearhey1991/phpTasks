<?php
		function dispPairNumbers(int $n = 10) {
		$count = 0;
		$number = 3;
		$prevPrimeNumber = 2;
		while ($count < $n) {
			
			if (isPrimeNumber($number)) {
				
				if (isPairNumbers($number, $prevPrimeNumber)) {
					echo $prevPrimeNumber.' || '.$number.'</br>';
					$count++;
				}
				
				$prevPrimeNumber = $number;
			}
			
			$number++;
		}
		
	}

	function isPairNumbers(int $prewNumber, int $nextNumber): bool {
		$prewNumber = getAbsolute($prewNumber);
		$nextNumber = getAbsolute($nextNumber);
		
		if (distanceBtwnNumbers($prewNumber, $nextNumber) === 2) {
			return true;
		}
		
		return false;
	}

	function distanceBtwnNumbers(int $number1, int $number2): int {
		$distace = $number1 - $number2;
		return $distace;
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
		
		if ($number === 0) {
			return 0;
		}
		
		$sqrRoot = $number / 2;
		
		do{
			$buf = $sqrRoot;
			$sqrRoot = ($buf + ($number / $buf)) / 2;
		}
		while(($buf-$sqrRoot) !=0 );
	
		return $sqrRoot;
	}
	
	dispPairNumbers();
?>