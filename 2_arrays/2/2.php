<?php
	function getArithmeticMeansArr(array $arr): array {
		
		$arrLength = count($arr);
		
		for ($i = 1; $i <= $arrLength; $i++) {
			$newArr[$i] = getArithmeticMeanOf($i, $arr);
		}
		
		return $newArr;
	}
	
	function getArithmeticMeanOf(int $beforeItem, array $arr) {
		$arrLength = count($arr);
		$summItem = 0;
		
		if ($arrLength > 0) {
			
			for ($i = 0; $i < $beforeItem; $i++) {
				$summItem += $arr[$i];
			}
			
			return $summItem / $beforeItem;
		}
		
		return false;
	}
	
	echo "<pre>";
	print_r (getArithmeticMeansArr([2, 4, 1, 5, 7, 10, 21, 1]));
	echo "</pre>";
	
?>