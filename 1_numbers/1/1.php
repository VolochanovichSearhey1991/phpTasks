<?php
	function CountNumbLessThenGivenNumb(int $number, int $givenNumb = 5): int {
		$count = 0;
		
		while ($number >= 1) {
			
			$digit = $number % 10;
			$number = (int)($number/10);
			
			if (isLessThanGivenNumb($digit, $givenNumb)) {
				$count++;
			}
		
		}
		
		return $count;
	
	}
	
	function isLessThanGivenNumb(int $digit, int $givenNumb = 5) {
		
		if ($digit < $givenNumb) {
			return true;
		}
		
		return false;
	}
	
	//Пример 
	echo CountNumbLessThenGivenNumb(113849);
?>