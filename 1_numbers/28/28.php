<?php
	
	function getBiggestNumberList(int $start, int $finish) {
		
		for ($number = $start; $number <= $finish; $number++) {
			
			echo " before " . $number . " after " . getSortedDigits($number) . "</br>";
			
		}
		
	}

	function getSortedDigits(int $number): int {
		$number = getAbsolute($number);
		$storeNumber = $number;
		
		if ($number < 10) {
			return $number;
		}
		
		while (!isDecreaseSequence($storeNumber)) {
			$prewDigit = $number % 10;
			$number = (int)($number/10);
			$count = 1;
			
			while ($number >= 1) {
				$digit = $number % 10;
				$number = (int)($number/10);
				$count++;
					
				if ($digit < $prewDigit) {
					$prewDigit = $digit;
					$storeNumber = swapDigits($storeNumber, $count, --$count);
					$count++;
				} else {
					$prewDigit = $digit;
				}
			}
		
		$number = $storeNumber;
		
		}
		
		return $storeNumber;
				
	}
	
	function swapDigits(int $number, int $pos1, int $pos2): int {
		$storeNumber = $number;
		$rank = 1;
		$count = 0;
		$bufNum1 = 0;
		$bufNum2 = 0;
		
		while ($number >= 1) {
			$digit = $number % 10;
			$number = (int)($number/10);
			$count++;
			
			if ($count === $pos1) {
				$bufNum1 = $digit;
			}
			
			if ($count === $pos2) {
				$bufNum2 = $digit;
			}
			
		}
		
		$number = $storeNumber;
		$count = 0;
		
		while ($number >= 1) {
			$digit = $number % 10;
			$number = (int)($number/10);
			$count++;
			
			if ($count === $pos1) {
				$digit = $bufNum2;
			}
			
			if ($count === $pos2) {
				$digit = $bufNum1;
			}
			
			$newNumber = $newNumber + $rank * $digit;
			$rank *= 10;
		}
		
		return $newNumber;
		
	}
	
	function isDecreaseSequence(int $number): bool {
		$prevDigit = 0;
		$digCount = 0;
		
		while ($number >= 1) {
			$digit = $number % 10;
			$number = (int)($number/10);
			$digCount++;
			
			if ($digit < $prevDigit) {
				return false;
			} 

			$prevDigit = $digit;
		}
		
		if ($digCount >= 1) {
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
	
	echo getBiggestNumberList(100, 400);
	
?>
