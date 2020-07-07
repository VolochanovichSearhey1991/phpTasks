<?php
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
	
	//Пример
	echo toInverse(7102);
	
?>
