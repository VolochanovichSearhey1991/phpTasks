<?php

		function checkSequence(int $start, int $finish, int $k) {
			
			for ($number = $start; $number <= $finish; $number++) {
				$strViewOfNumb = (string)$number;
				$combinationsArr = getAllCombinationsArray($strViewOfNumb);
				
				if (ifSumNumbersEqual($combinationsArr,$k)) {
					echo $number . " - Yes - " . ifSumNumbersEqual($combinationsArr,$k) . " </br>";
				} else {
					echo $number . " - No </br>";
				}
				
			}
			
		}
		
		function ifSumNumbersEqual(array $combinationsArr, int $k) {
			
			for ($i = 0; $i < count($combinationsArr); $i++) {
				$numb = (int)$combinationsArr[$i];
				
				if (getSumDigitsOf($numb) === $k) {
					return $numb;
				}
			}
			
			return false;
				
		}

		function getAllCombinationsArray(string $number): array {
			$rezArr = Array();
			
			for ($i = 2; $i < strlen($number); $i++) {
				$combArr = getСombinationsArray($number, $i);
				$rezArr = array_merge($rezArr, $combArr);
			}
			
			return $rezArr;
		}
	
		function getСombinationsArray(string $initString, int $lenghtRezString): array {
			$origArr = getArrayFromString($initString);
			$arrayofKeys = getArrayOfKeys($origArr);
			$combinedArr = combineKeys($arrayofKeys, $lenghtRezString);
			$combinedArr = reindexResult($combinedArr, $origArr);
			return $combinedArr;
		}
		
		
		function reindexResult(array $combinedArr, array $origArr): array {
			$bufStr = "";
			
			for ($i = 0; $i < count($combinedArr); $i++) {
				$buf = str_split($combinedArr[$i]);
				
				for ($j = 0; $j < count($buf); $j++) {
					$bufStr .= $origArr[$buf[$j] - 1];
				}
				
				$combinedArr[$i] = $bufStr;
				$bufStr = "";
			}
			
			return $combinedArr;
		}
		
		function combineKeys(array $arrayofKeys, $from): array {
			$cnt = count($arrayofKeys);
			$plac = [""];   
			
			for($n = 0; $n < $from; $n++){
				$plac_old = $plac; 
				$plac = [];
				
				foreach($plac_old as $item){
					$last = strlen($item)-1;
					
					for($m = $n; $m < $cnt; $m++){
						
						if($arrayofKeys[$m] > $item[$last]){
                        $plac[] = $item.$arrayofKeys[$m];
						}
					
					}
					
				}
			
			}
    
			return $plac;
		}
		
		function getArrayFromString(string $str): array {
			$symbArr = str_split($str);
			return $symbArr;
		}
		

		function getArrayOfKeys(array $origArr): array {
			
			foreach ($origArr as $key=>$val) {
			$arrOfKeys[] = $key+1;
			}
		
			return $arrOfKeys;
		}
		
		function getSumDigitsOf(int $number): int {
			$finalSum = 0;
			
			if ($number === 0) {
				return 0;
			}
			
			while ($number >= 1) {
				$digit = $number % 10;
				$number = (int)($number/10);
				$finalSum += $digit;
			}
			
			return $finalSum;
		}
	
	//пример
	checkSequence(100, 400, 8);
?>