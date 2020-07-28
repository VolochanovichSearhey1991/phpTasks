<?php
	function decomposeNumber(int $number) {
		$number = getAbsolute($number);
		$min = 2;
		
		if  ($number === 0) {
			return 0;
		}
		
		while ($number !== 1) {
			
			if ($number % $min === 0) {
				$number /= $min;
				echo $number *  $min . " | " . $min . "</br>";
			} else {
				$min++;
			}
			
		}
		
		echo "1 |";
	}
	
	function getAbsolute(int $number): int {
		
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	//пример
	decomposeNumber(1026);
?>