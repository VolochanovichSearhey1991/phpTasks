<?php
	function getCountPairOfEqualElem(array $arr): int {
		$arrLenght = count($arr);
		$countOfPair = 0;
		
		for ($i = 0; $i < $arrLenght - 1; $i++) {
			
			if ($arr[$i] === $arr[$i + 1]) {
				$countOfPair++;
			}
			
		}
		
		return $countOfPair;
	}
	
	echo "количество  пар  одинаковых  соседних элементов = " . 
		getCountPairOfEqualElem([1, 2, 2, 3, 4, 4, 5, 7, 9, 9, 10]);
?>