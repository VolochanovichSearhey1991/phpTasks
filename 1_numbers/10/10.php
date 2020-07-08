<?php
	function dispAllPalindNumbersLessN(int $limit = 100) {
		for ($num = 0; $num < $limit; $num++) {
			$numSquare = getSquare($num);
			
			if (isPalindrome($numSquare)) {
				echo $num."</br>";
			}
			
		}
	}

	function isPalindrome(int $number): bool {
		$inverseNumb = toInverse($number);
		
		if($inverseNumb === $number) {
			return true;
		}
		
		return false;
	}
	
	function toInverse(int $number): int {
		$inversedNumber = 0;
		$number = getAbsolute($number);
		
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			$inversedNumber = $inversedNumber * 10 + $digit;
		
		}
		
		return $inversedNumber;
	}
	
	function getAbsolute(int $number): int {
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	function getSquare(int $number): int {
		$number *= $number;
		return $number;
	}
	
	//Пример
	dispAllPalindNumbersLessN(10000);
?>