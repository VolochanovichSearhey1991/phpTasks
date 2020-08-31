<?php
	function swapItems(int $item1, int $item2, array $arr): array {
		
		$buf = $arr[$item1];
		$arr[$item1] = $arr[$item2];
		$arr[$item2] = $buf;
		return $arr;
		
	}

	function getFirstPositiveItemIndex(array $arr) {
		$arrLength = count($arr);
		
		if ($arrLength > 0) {
			
			for ($i = 0; $i < $arrLength; $i++) {
				
				if ((int)$arr[$i] > 0) {
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
	
	$array = [-2, 3, 8, -4, -2, 3, 9, -11, 2, 7, 10];
	$lastNegativeItem = getLastNegativeItemIndex($array);
	$firstPositiveItem = getFirstPositiveItemIndex($array);
	$newArray = swapItems($lastNegativeItem, $firstPositiveItem, $array);
	echo "<pre>";
	print_r($newArray);
	echo "</pre>";
?>