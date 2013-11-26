<?php
class CKeyGen {
	
	const NN = 5; 		// number of numbers
	const NS = 2;		// number of stars
	
	const MINN = 1;		// min number
	const MAXN = 50;		// max number
	
	const MINS = 1;		// min star
	const MAXS = 11;		// max star
	
	
	public $numbers;		// array with the numbers
	public $stars;		// array with the stars
	
	// constructor
	public function __construct() {
		$this->regenerate();
	}
	
	public function regenerate() {
		$extractorN = new CKeyExtractor(CKeyGen::NN, CKeyGen::MINN, CKeyGen::MAXN);
		$this->numbers = $extractorN -> extractor();
		$extractorS = new CKeyExtractor(CKeyGen::NS, CKeyGen::MINS, CKeyGen::MAXS);
		$this->stars = $extractorS ->extractor();
	}
	
	function key2HTML() {
		$html = "";
		// first list - numbers
		$html .= "<ul class='numbers'>";
		// iterate over all numbers
		foreach($this->numbers as $thenumber) {
			$html .= "<li>".$thenumber."</li>";
		}
		$html .= "</ul>";
		
		$html .= "<ul class='stars'>";
		// iterate over all stars
		foreach($this->stars as $thestar) {
			$html .= "<li>".$thestar."</li>";
		}
		$html .= "</ul>";
		return $html;
		
	} 
	function key2XHTML() {
		$xhtml = new SimpleXMLElement("<div/>");
		// first list - numbers
		$uln = $xhtml->addChild("ul");
		$uln->addAttribute("class","numbers");
		// iterate over all numbers
		foreach($this->numbers as $thenumber) {
			$uln->addChild("li",$thenumber);
		}
		$uls = $xhtml->addChild("ul");
		$uls->addAttribute("class","stars");
		// iterate over all numbers
		foreach($this->stars as $thestar) {
			$uls->addChild("li",$thestar);
		}
		
		return $xhtml->asXML();
		
	} 
	
	public function KeyAsJSON() {
		return json_encode($this);
	}
		
		
	public function key2XML() {
		$xml = new SimpleXMLElement("<key/>");
		// first list - numbers
		$uln = $xml->addChild("numbers");
		// iterate over all numbers
		foreach($this->numbers as $thenumber) {
			$uln->addChild("num",$thenumber);
		}
		$uls = $xml->addChild("stars");
		// iterate over all numbers
		foreach($this->stars as $thestar) {
			$uls->addChild("num",$thestar);
		}
		
		return $xml->asXML();
		
	} 
	
}

class CKeyExtractor {
	
	public $key;
	public $_nel;
	public $_min;
	public $_max;
	
	public function __construct($nel,$min,$max) {
		$this->_nel = $nel;
		$this->_min = $min;
		$this->_max = $max;
		//$this->extractor();
	}
	
	function extractor() {
		$bagofnumbers = array();
		$range = $this->_max - $this->_min + 1;
		for ($i=0; $i<$range; $i++) {
			$bagofnumbers[$i] = $i + $this->_min;
		}
		for ($k=0; $k<$this->_nel; $k++) {
			 $idx = rand(0,count($bagofnumbers)-1);
			 $key[] = $bagofnumbers[$idx];
			 array_splice($bagofnumbers,$idx,1);
		}
		sort($key);
		//var_dump($key);
		return $key;
	}
	
}
//$keygenerator = new CKeyGen();
?>