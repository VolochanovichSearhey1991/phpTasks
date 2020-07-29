<?php
	function toBinary(int $number) {
		$number = getAbsolute($number);
		$base = 2;
		$finalResult = 0;
		$ranke = 1;
		
		while ($number >= 1) {
			$digit = $number % $base;
			$number = (int)($number/$base);
			$finalResult = $finalResult + $ranke * $digit;
			$ranke *= 10;
		}
		
		return $finalResult;
	}
	
	function toHex(int $number): string {
		$number = getAbsolute($number);
		$base = 16;
		$finalResult = '';
		
		while ($number >= 1) {
			$digit = $number % $base;
			$number = (int)($number/$base);
			$finalResult = $finalResult . hexView($digit);
		}
		
		$finalResult = reverseStr($finalResult);
		
		return $finalResult;
	}
	
	function hexView(int $dig) {
		
		switch ($dig) {
			
			case 10 :  return 'A'; break;
			case 11 :  return 'B'; break;
			case 12 :  return 'C'; break;
			case 13 :  return 'D'; break;
			case 14 :  return 'E'; break;
			case 15 :  return 'F'; break;
			default : return $dig; break;
		}
		
	}
	
	function reverseStr(string $str): string {
		$i = 0;
		$j = 0;
		$resultStr = '';
		
		while ($str[$i] || $str[$i] === '0') {
			$i++;
		 }
		 
		 $i--;
		 
		 while ($i >= 0) {
			$resultStr[$j] = $str[$i];
			$i--;
			$j++;
		 }
		 
		 return $resultStr;
		 
	}
	
	function getAbsolute(int $number): int {
		
		if ($number < 0) {
			return $number * -1;
		}
		
		return $number;
	}
	
	//пример
	echo toHex(4271) . "</br>";
	echo toBinary(4271) . "</br>";
		 
?>