<?php
	function getSummNegativeItemsAfter(int $startItem, array $arr) {
		$arrLength = count($arr);
		$summOddItems = 0;
		
		if ($arrLength > 0) {
			
			if ($startItem !== false) {
				
				for ($i = $startItem + 1; $i < $arrLength; $i++) {
					
					if (!ifEvenNumber($arr[$i])) {
						$summOddItems += $arr[$i];
					}
					
				}
				
				return $summOddItems;
				
			}
			
			return false;
		}
		
		return false;
	}

	function getCountItemsBefore(int $breakItem, array $arr) {
		$arrLength = count($arr);
		$countItems = 0;
		
		if ($arrLength > 0) {
			
			if ($breakItem !== false) {
				
				for ($i = 0; $i < $breakItem; $i++) {
					$countItems++;
				}
				
				return $countItems;
			}
			
			return false;
		}
		
		return false;
	}
	
	function getFirstNegativeItemIndex(array $arr) {
		$arrLength = count($arr);
		
		if ($arrLength > 0) {
			
			for ($i = 0; $i < $arrLength; $i++) {
				
				if ((int)$arr[$i] < 0) {
					return $i;
				}
				
			}
				
			return false;
		}
		
		return false;
	}
	
	function getLastNegativeItemIndex(array $arr) {
		$arrLength = count($arr);
		
		if ($arrLength > 0) {
			
			for ($i = $arrLength - 1; $i >= 0; $i--) {
				
				if ((int)$arr[$i] < 0) {
					return $i;
				}
			
			}
				
			return false;
		}
		
		return false;
	}
	
	function ifEvenNumber(int $number): bool {
		
		if ($number % 2 === 0) {
			return true;
		}
		
		return false;
	}
	
	$array = array(1, 7, 8, -9, 3, 7, -4, 1, 8, 2, 7, 11);
	$breakItem = getFirstNegativeItemIndex($array);
	$startItem = getLastNegativeItemIndex($array);
	echo "число  элементов,  предшествующих  первому отрицательному элементу = " . 
			getCountItemsBefore($breakItem, $array) . "</br>";
	echo "сумма нечетных элементов массива, следующих за последним отрицательным элементом = " . 
			getSummNegativeItemsAfter($startItem, $array) . "</br>";

?>