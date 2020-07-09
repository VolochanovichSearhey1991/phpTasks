<?php
	function isSymmetric(int $number): bool {
		$number = getAbsolute($number);
		$digitsCount = getDigitsCount($number);
		
		if ($digitsCount < 2) {
			return false;
		}
		
		$half = $digitsCount / 2;
		
		if (isEven($digitsCount)) {
			$rightHalf = getRightHalfOfNumber($number, $half);
			$leftHalf = getLeftHalfOfNumber($number, $half);
			
			if ($rightHalf === $leftHalf) {
				return true;
			}
		}
		
		return false;
	}

	function getDigitsCount(int $number): int {
		$count = 0;
		
		while ($number >= 1) {
			$number = (int)($number/10);
			$count++;
		
		}
		
		return $count;
	}
	
	
	function getRightHalfOfNumber(int $number, int $digitsCount){
		return getNewNumber($number, $digitsCount);
	}
	
	function getLeftHalfOfNumber(int $number, int $digitsCount){
		$number = (int)($number / setPower(10, $digitsCount));
		return getNewNumber($number, $digitsCount);
	}
	
	function isEven(int $number): bool {
		
		if (($number !== 0) && ($number % 2) === 0) {
			return true;
		}
		
		return false;
	}
	
	function setPower(int $number, int $power): int {
		$powNumber = 1;
		$power = getAbsolute($power);
		
		for ($i = 0; $i < $power; $i++){
			$powNumber *= $number;
		}
		
		return $powNumber;
	}
	
	function getAbsolute(int $number): int {
		
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	function getNewNumber(int $number, int $digitsCount): int {
		$range = 1;
		$newNumber = 0;
		
		while ($digitsCount > 0) {
			$digit = $number % 10;
			$number = (int)($number / 10);
			$newNumber = $newNumber + $digit * $range;
			$range *=10;
			$digitsCount--;
		}
		
		return $newNumber;
	}
	
	//Пример
	echo isSymmetric(123123);
?>
