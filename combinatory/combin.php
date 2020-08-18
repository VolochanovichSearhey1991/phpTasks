<?php
	class Combinator {
		private $initString, $lenghtRezString;
		
		function __construct($initString, $lenghtRezString) {
			
			try {
				
				if (!$this->isInteger($lenghtRezString)) {
					throw new Exception("second parameter must be a number");
				} else if ($this->isEmptyString($initString)) {
					throw new Exception("string is empty or consist of only spaces");
				}
				
				$this->initString = (string) $initString;
				$this->lenghtRezString = $lenghtRezString;
			} catch (Exception $ex) {
				echo $ex->getMessage();
			}
			
		}
		
		public function __set($name, $value) {
			
			switch($name) {
				
				case "initString": {
					
					if ($this->isEmptyString($value)) {
					throw new Exception("string is empty or consist of only spaces");
					} 
					
					$this->initString = $value;
					}
					
					break;
					
				case "lenghtRezString": {
					
					if (!$this->isInteger($value)) {
					throw new Exception("second parameter must be a number");
					}
					
					$this->lenghtRezString = $value;
					}
					
					break;
					
				default: {throw new Exception("incorrect field");}
				
			}
		}
		
		public function __get($name) {
			
			switch($name) {
				
				case "initString": {return $this->initString;}
					break;
					
				case "lenghtRezString": {return $this->lenghtRezString;}
					break;
					
				default: {throw new Exception("incorrect field");}
				
			}
			
		}
		
		public function displayPlacementsArray() {
			$finalPlacementsArray = $this->getArrayForDisplay();
			
			foreach ($finalPlacementsArray as $key => $value) {
				echo ++$key . " | " . $value . "</br>";
			}
		}
		
		public function getArrayForDisplay() {
			$finalPlacementsArray = Array();
			$allPlacementsArray = $this->getPlacementsArray();
			
			foreach ($allPlacementsArray as $value) {
				$placement = $this->getStringFromArray($value);
				$finalPlacementsArray[] = $placement;
			}
			
			return $finalPlacementsArray;
			
		}
		
		private function getPlacementsArray(): array {
			$allPlacementsArray = Array();
			$combinedArr = $this->getСombinationsArray();
			
			foreach ($combinedArr as $value) {
				$bufArr = $this->getArrayFromString($value);
				$placementsArray = $this->getAllPlacementsOf($bufArr);
				$allPlacementsArray = array_merge($allPlacementsArray, $placementsArray);
			}
			
			return $allPlacementsArray;
		}
		
		private function getСombinationsArray(): array {
			$origArr = $this->getArrayFromString($this->initString);
			$arrayofKeys = $this->getArrayOfKeys($origArr);
			$combinedArr = $this->combineKeys($arrayofKeys, $this->lenghtRezString);
			$combinedArr = $this->reindexResult($combinedArr, $origArr);
			return $combinedArr;
		}
		
		public function getPlacementsCount(): int {
			$n = strlen($this->initString);
			$m = $this->lenghtRezString;
			$nFactor = $this->getFactorialOf($n);
			$nmFactor = $this->getFactorialOf($n - $m);
			$placementsCount = $nFactor/$nmFactor;
			return $placementsCount;
		}
		
		private function getAllPlacementsOf($InArray, $InProcessedArray = array()) {
			$ReturnArray = array();
			
			foreach($InArray as $Key=>$value) {
				$CopyArray = $InProcessedArray;
				$CopyArray[$Key] = $value;
				$TempArray = array_diff_key($InArray, $CopyArray);
				
				if (count($TempArray) == 0) {
					$ReturnArray[] = $CopyArray;
				}
				else {
					$ReturnArray = array_merge($ReturnArray, $this->getAllPlacementsOf($TempArray, $CopyArray));
				}
				
			}
			
			return $ReturnArray;
		}
		
		private function reindexResult($combinedArr, $origArr) {
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
		
		private function combineKeys(array $arrayofKeys, $from): array {
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
		
		private function getArrayFromString(string $str): array {
			$symbArr = str_split($str);
			return $symbArr;
		}
		
		private function getStringFromArray(array $array): string {
			$rezString = implode("", $array);
			return $rezString;
		}
		
		private function getArrayOfKeys(array $origArr): array {
			
			foreach ($origArr as $key=>$val) {
			$arrOfKeys[] = $key+1;
			}
		
			return $arrOfKeys;
		}
		
		private function getFactorialOf(int $number): int {
			$n = 1;
			$factorial = 1;
			
			if ($number === 0) {
				return 1;
			}
			
			while ($n <= $number) {
				$factorial *= $n;
				$n++;
			}
			
			return $factorial;
	}
		
		private function isInteger($value): bool {
			
			if (gettype($value) === "integer") {
				return true;
			} 
			
			return false;
		}
		
		private function isEmptyString(string $str): bool {
			
			if (preg_match('/^\s+$/', $str) || empty($str)) {
				return true;
			}
			
			return false;
		}
		
		private function ifCorrectCondition(): bool {
			$initStringCount = strlen($this->initString);
			
			if ($initStringCount >= $this->lenghtRezString) {
				return true;
			}
			
			return false;
		}
		
		private function checkResult(int $countByFormula, array $finalPlacementsArray): bool {
			
			$countByArray = count($finalPlacementsArray);
			
			if ($countByArray === $countByFormula) {
				return true;
			}
			
			return false;
			
		}
		
		
		
		private function getError() {
			$countByFormula = $this->getPlacementsCount();
			$finalPlacementsArray = $this->getArrayForDisplay();
			
			if (!$this->ifCorrectCondition()) {
				return "condition incorrect";
			} else if (!$this->checkResult($countByFormula, $finalPlacementsArray)) {
				return "result incorrect";
			}
			
			return "correct";

		}
		
		public function displayError() {
			$error = $this->getError();
			echo $error;
		}
		
		
	}
	
	$combinator = new Combinator("123A", 3);
	echo "by formula we have " . $combinator->getPlacementsCount() . " placements";
	echo "</br>";
	$combinator->displayPlacementsArray();
	echo "</br>";
	$combinator->displayError();
?>