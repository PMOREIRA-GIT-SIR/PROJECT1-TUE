<?php

class CKeyGen {
	
	const NN = 5;
	const NS = 2;
	const MINN = 1;
	const MAXN = 50;
	const MINS = 1;
	const MAXS = 11;
	
	public $numbers = array();
	public $stars = array();
	
	public function __construct() {
		$this->genKey();
	}
	
	public function genKey() {
		$extNumbers = new CKeyExtractor(CKeyGen::NN, CKeyGen::MINN, CKeyGen::MAXN);
		$extStars = new CKeyExtractor(CKeyGen::NS, CKeyGen::MINS, CKeyGen::MAXS);
		
		$this->numbers 	= $extNumbers->extract();
		$this->stars 	= $extStars->extract();
	}
	public function keyAsHTML() {
		$html = "<div>";
		$html .= $this->key2UL("numbers", $this->numbers);
		$html .= $this->key2UL("stars", $this->stars);
		$html .= "</div>";
		return $html;
	}
	
	public function keyAsXML() {
		$xml = new SimpleXMLElement("<chave></chave>");
		$xmlN = $xml->addChild("numeros");
		$xmlS = $xml->addChild("estrelas");
		foreach($this->numbers as $thenumber) {
			$xmlN->addChild("num",$thenumber);
		}
		foreach($this->stars as $thestar) {
			$xmlS->addChild("num",$thestar);
		}
		return $xml->asXML();
	}
	
	private function key2UL($class,$key) {
		$htmlUL = "";
		$htmlUL .= "<ul class='$class'>";
		foreach ($key as $value) {
			$htmlUL .= "<li>$value</li>";
		}
		$htmlUL .= "</ul>";
		return $htmlUL;
	}
}

class CKeyExtractor {
	
	private $mynum;
	private $mymax;
	private $mymin;
	
	public $key;
	
	public function __construct($num, $min, $max) {
		$this->mynum = $num;
		$this->mymin = $min;
		$this->mymax = $max;
		$this->extract();
	}
	
	public function extract() {
		
		// fill the bag
		$bag = array();
		$nels =  $this->mymax - $this->mymin + 1;
		for($i=0; $i < $nels ; $i++) {
			$bag[$i] = $this->mymin + $i;
		}
		// extracts
		$this->key = array();		// empty array;
		for($i=0; $i<$this->mynum; $i++) {
			$ridx = rand(0,count($bag)-1);
			$this->key[] = $bag[$ridx];
			array_splice($bag,$ridx,1);
		}
		// sorts
		sort($this->key);
		// returns the sorted key
		return($this->key);
	}
}


?>