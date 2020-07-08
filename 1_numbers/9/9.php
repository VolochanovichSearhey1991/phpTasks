<?php
	function isAutomorphic(int $number): bool {
		$number = getAbsolute($number);
		$numbSquare = getSquare($number);
		$digitsCount = digitCount($number);
		$lastDigitOfSquare = transformLastDigToNumb($numbSquare, $digitsCount);
		
		if ($lastDigitOfSquare === $number) {
			return true;
		}
		
		return false;
	}

	function getSquare(int $number): int {
		$number *= $number;
		return $number;
	}
	
	function digitCount(int $number = 0): int {
		$count = 0;
		$number = getAbsolute($number);
		
		if ($number === 0) {
			return 1;
		}
		
		while ($number >= 1) {
			$number = (int)($number/10);
			$count++;
		}
		
		return $count;
	}
	
	function transformLastDigToNumb(int $number, int $digitsCount): int {
		$resultNumber = 0;
		$range = 1;
		$number = getAbsolute($number);
		
		while ($digitsCount > 0) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			$resultNumber = $resultNumber + $digit * $range;
			$range *= 10;
			$digitsCount--;
		}
		
		return $resultNumber;
	}
	
	function getAbsolute(int $number): int {
		
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	//пример
	echo isAutomorphic(376);
?>