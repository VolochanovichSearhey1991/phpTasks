<?php
	function getLCM(int $number1, int $number2): int {
		$number1 = getAbsolute($number1);
		$number2 = getAbsolute($number2);
		
		if (!($number1 > 0 && $number2 > 0)) {
			return 0;
		}
		
		$lcm = ($number1 * $number2) / getGCD($number1, $number2);
		return $lcm;
	}

	function getGCD(int $number1, int $number2): int {
		$number1 = getAbsolute($number1);
		$number2 = getAbsolute($number2);
		$start = 0;
		
		if (!($number1 > 0 && $number2 > 0)) {
			return 0;
		}
		
		$fewer = $number1 < $number2 ? $number1 : $number2;
		
		for ($divider = $fewer; $divider > 1; $divider--) {
			
			
			if (isDivider($number1, $divider) && isDivider($number2, $divider)) {
				return $divider;
			}
			
		}
		
		return 1;
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
	echo getLCM(2, 17);
?>